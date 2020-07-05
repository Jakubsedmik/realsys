<?php


/**
 * Class fakturoidClass
 */
class fakturoidClass {

	/**
	 * @var \Fakturoid\Client
	 */
	protected $client;

	/**
	 * fakturoidClass constructor.
	 */
	public function __construct() {

		try {

			$this->client = new Fakturoid\Client(FAKTUROID_SLUG,FAKTUROID_MAIL,FAKTUROID_API_KEY, FAKTUROID_AGENT);
			$account = $this->client->getAccount();

		}catch (Exception $e){
			trigger_error("Během připojování k fakturační službe došlo k chybě",E_USER_WARNING);
		}
	}

	/**
	 * @param objednavkaClass $order
	 * @param bool $generateInvoice
	 * @param bool $sendmail
	 *
	 * @return bool|string
	 */
	public function createInvoiceForOrder(objednavkaClass $order, $generateInvoice = true , $sendmail = false){

		$invoice = $this->sendInvoice($order);
		if(is_object($invoice)){

			$invoiceId = $invoice->id;

			if($generateInvoice){

				sleep(2);
				return $this->getAndSaveInvoicePDFForOrder($order,false, $sendmail);
			}

		}else{
			return false;
		}
	}

	/**
	 * @param objednavkaClass $order
	 * @param bool $invoice_id
	 * @param bool $sendmail
	 *
	 * @return bool|string
	 */
	public function getAndSaveInvoicePDFForOrder(objednavkaClass $order, $invoice_id = false, $sendmail = false){

		if($invoice_id && is_numeric($invoice_id)){

			$link = $this->getAndSaveInvoicePDF($invoice_id);
			$order->db_invoice_link = $link;

		}else{
			// dej id objednávky
			$id_order = $order->getId();
			// najdi si dle custom_id ve fakturoidu fakturu
			$invoice = $this->getInvoiceBasedOnId($id_order);

			if($invoice !== false){

				// ulož dle čísla faktury PDF do filu
				$invoice_link = $this->getAndSaveInvoicePDF($invoice, $sendmail, $order->getSubobject("uzivatel")->db_email);

				// ulož link na fakturu do order
				$order->db_invoice_link = $invoice_link;

				return $invoice_link;

			}else{

				// pokud objednávku ve fakturoidu nenalezneme tak ji musíme vytvořit, faktura se dogeneruje a pošle v druhém kolem
				return $this->createInvoiceForOrder($order,false, false);

			}
		}

		return false;
	}


	/**
	 *
	 * @param $invoice
	 * @param bool $sendmail
	 * @param bool $mail
	 *
	 * @return bool|string
	 */
	public function getAndSaveInvoicePDF($invoice, $sendmail = false, $mail = false){
		if(is_object($invoice)){
			$invoiceId = $invoice->id;
			$response = $this->client->getInvoicePdf($invoiceId);
		}elseif (is_numeric($invoice)){
			$invoiceId = $invoice;
			$response = $this->client->getInvoicePdf($invoiceId);
		}else{
			return false;
		}


		$data = $response->getBody();
		if(!is_null($data)){

			$storePath = Tools::getPathTillFolder("wp-content", __DIR__) . INVOICES_PATH;
			$filename = "invoice_{$invoiceId}.pdf";
			$storePath_filename = $storePath . $filename;
			file_put_contents( $storePath_filename , $data);

			if($sendmail){

				Tools::sendMail($mail, "Objednávka služby","sendInvoice",array(), '',array(
					$storePath_filename
				));
			}
			return INVOICES_URL . $filename;
		}


	}


	/**
	 * Vytvoří fakturu v systému fakturoid na základě order, pokud již existuje tak jí updatuje.
	 * Pokud neexistuje kontakt tak ho založí, pokud existuje tak ho nechá být a vytváří pouze fakturu
	 * @param objednavkaClass $order objednávka pro kterou chceme založit fakturu ve fakturoidu
	 *
	 * @return bool|\Fakturoid\Response|null
	 */
	public function sendInvoice(objednavkaClass $order){

		if(get_class($order) == "objednavkaClass"){

			$uzivatel = $order->getSubobject("uzivatel");
			$contact = $this->sendContact($uzivatel);

			if($contact !== false){

				$invoice_params = array(
					"subject_id" => $contact->id,
					"lines" => array(
						"name" => "Platba za kredity",
						"quantity" => $order->db_mnozstvi,
						"unit_price" => $order->db_cena / $order->db_mnozstvi
					),
					"custom_id" => $order->getId(),
					"paid" => true
				);


				try {

					$invoice = $this->getInvoiceBasedOnId($order->getId());

					if($invoice === false){
						$response = $this->client->createInvoice($invoice_params);
						$response = $response->getBody();
						/*$this->client->fireInvoice($response->id, "pay",array(
								"paid_at" => date("d.m.Y",time())
							)
						);*/

						$order->db_invoice_id = $response->id;

						return $response;
					}else{

						/* Spárování řádků, máme vždy pouze jeden */
						$line_id = $invoice->lines[0]->id;
						$invoice_params['lines']['id'] = $line_id;

						$response = $this->client->updateInvoice($invoice->id, $invoice_params);
						$order->db_invoice_id = $invoice->id;

						$paid_at = $invoice->paid_at;
						if(is_null($paid_at)){
							$this->client->fireInvoice($invoice->id, "pay",array(
								"paid_at" => date("d.m.Y",time())
								)
							);
						}
						return $response->getBody();
					}

				}catch (\Fakturoid\Exception $e){
					trigger_error("Došlo k chybám při připojování do Fakturoidu :: sendInvoice : " . $e->getMessage());
					return false;
				}
			}else{
				trigger_error("Uživatele se nepodařilo vytvořit a proto nelze vytvořit fakturu :: sendInvoice()");
				return false;
			}

		}else{
			trigger_error("Parameter order není potomkem třídy objednavkaClass :: sendInvoice");
			return false;
		}

	}

	/**
	 * @param $order_id
	 *
	 * @return bool|mixed
	 */
	public function getInvoiceBasedOnId($order_id){
		try {
			$response = $this->client->getInvoices(array("custom_id" => $order_id));
			if(count($response->getBody()) == 0){
				return false;
			}else{
				$response = $response->getBody();
				$invoice = array_shift($response);
				return $invoice;
			}
		}catch (\Fakturoid\Exception $e){
			trigger_error("Došlo k chybám při připojování do Fakturoidu :: getInvoiceBasedOnId : " . $e->getMessage());
			return false;
		}
	}

	/**
	 * Pokusí se získat kontakt, pokud se ho nepodaří nalézt tak kontakt založí.
	 *
	 * @param uzivatelClass $user instance uživatele pro kterého chceme kontakt založit
	 * @return bool|\Fakturoid\Response|mixed|null vrací fakturoidResponse body a nebo false
	 */
	public function sendContact(uzivatelClass $user){


		if(get_class($user) == "uzivatelClass"){

			$user_array = array(
				'name' => $user->getFullName(),
				'email' => $user->db_email,
				'custom_id' => $user->getId()
			);

			try {

				$response = $this->client->getSubjects(array("custom_id" => $user->getId()));
				if(count($response->getBody()) == 0){
					$response = $this->client->createSubject($user_array);
					return $response->getBody();
				}else{

					$response = $response->getBody();
					$response = array_shift($response);
					return $response;
				}

			}catch (\Fakturoid\Exception $e){
				trigger_error("Došlo k chybám při připojování do Fakturoidu :: sendContact " . $e->getMessage());
			}

		}else{
			trigger_error("Parameter user není potomkem třídy uzivatelClass :: sendContact");
		}
		return false;
	}

	/**
	 * Smaže objednávku z fakturoidu pokud existuje
	 * @param objednavkaClass $order objednávka kterou si přejeme smazat z fakturoidu
	 *
	 * @return bool true pokud byla smazána a nebo false pokud nebyla nalezenena nebo se nepodařila smazat
	 */
	public function removeInvoice(objednavkaClass $order){
		if(get_class($order) == "objednavkaClass"){

			try {

				// dej id objednávky
				$id_order = $order->getId();

				// najdi si dle custom_id ve fakturoidu fakturu
				$invoice = $this->getInvoiceBasedOnId($id_order);

				// pokud invoice existuje tak pokračujeme
				if($invoice !== false){

					// smažeme invoice a pokud se povedlo vracíme true
					$response = $this->client->deleteInvoice($invoice->id);
					if($response->getStatusCode() == 204){
						$order->db_invoice_id = -1;
						$order->db_invoice_link = "";
						return true;
					}
				}else{

					// pokud objednávku ve fakturoidu nenalezneme tak neřešíme
					trigger_error("Objednávka ke smazání nebyla ve fakturoidu nalezena :: removeInvoice");
					return false;
				}

			}catch (\Fakturoid\Exception $e){
				trigger_error("Došlo k chybám při připojování do Fakturoidu :: removeInvoice " . $e->getMessage());
			}
		}else{
			trigger_error("Parameter order není potomkem třídy objednavkaClass :: removeInvoice");
		}
		return false;
	}

	/**
	 * Metoda promaže adresář invoices na základě toho jaké objednávky máme v databázi.
	 * Pokud existuje v souborovém systému faktura v PDF která nekoreluje se záznamem v databázi invoice_id / invoice_link
	 * tak je smazána. Jedná se pouze o objednávky které mají invoice_link a invoice_id vyplněné
	 */
	public function clearUnusedPDFFiles(){
		$all_active_orders = assetsFactory::getAllEntity(
			"objednavkaClass",
			array(
				new filterClass("invoice_id","IS NOT","NULL"),
				new filterClass("invoice_id", "!=", -1)
			)
		);


		$invoices_path = Tools::getPathTillFolder("wp-content", __DIR__) . INVOICES_PATH;
		$files = glob($invoices_path . "/*.pdf", GLOB_BRACE);
		$files = array_map(function($value){
			$re = '/invoice_(\d+)\.pdf/m';
			$matches = "";
			preg_match_all($re, $value, $matches, PREG_SET_ORDER, 0);
			return array(
				"invoice_id" => $matches[0][1],
				"filename" => $value
			);
		}, $files);


		$found = false;
		foreach ($files as $file_k => $file_v){

			foreach ($all_active_orders as $key => $value){
				if($file_v['invoice_id'] == $value->db_invoice_id){
					$found = true;
				}
			}

			if(!$found){
				unlink($file_v['filename']);
				globalUtils::writeDebug("removing file: " . $file_v['filename']);
			}

			$found = false;
		}

	}


	/**
	 * @param bool $sendmail
	 */
	public function generateAllInvoicesPDF($sendmail = false){
		$orders = assetsFactory::getAllEntity("objednavkaClass",
			array(
				new filterClass( "invoice_id","IS NOT","NULL"),
				new filterClass("invoice_link", "IS", "NULL")
			)
		);

		foreach ($orders as $key => $value){
			if($value->db_invoice_id != -1){
				$this->getAndSaveInvoicePDFForOrder($value,false, $sendmail);
			}
		}
		// TODO pozor co když faktury neexistují protože je smazali v adminu fakturoidu
	}


	/**
	 * @param bool $sendmail
	 * @param bool $makepdf
	 */
	public function generateAllInvoices($sendmail = false, $makepdf = false){
		$orders = assetsFactory::getAllEntity("objednavkaClass",
			array(
				new filterClass( "stav","=","1"),
				new filterClass("invoice_id", "IS", "NULL")
			)
		);

		foreach ($orders as $key => $value){
			$this->sendInvoice($value);
		}
	}

	/**
	 * @param $order
	 *
	 * @return bool|\Fakturoid\Response|null
	 */
	public function regenerateInvoiceFromOrder($order){
		return $this->sendInvoice($order);
	}

	/**
	 * @param $order
	 * @param bool $sendmail
	 *
	 * @return bool|string
	 */
	public function regenerateInvoicePDFFromOrder($order,$sendmail = false){
		return $this->getAndSaveInvoicePDFForOrder($order,false, $sendmail);
	}


}