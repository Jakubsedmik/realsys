<?php


class fakturoidClass {

	protected $client;

	public function __construct() {

		try {

			$this->client = new Fakturoid\Client(FAKTUROID_SLUG,FAKTUROID_MAIL,FAKTUROID_API_KEY, FAKTUROID_AGENT);
			$account = $this->client->getAccount();

		}catch (Exception $e){
			trigger_error("Během připojování k fakturační službe došlo k chybě",E_USER_WARNING);
		}
	}

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
				trigger_error("Zadaná faktura v systému nefiguruje :: getAndSaveInvoicePDFForOrder");
				return false;
			}
		}

		return false;
	}

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


	/*
	 * Odešle objednávku do systému fakturoid, pokud již existuje tak jí updatuje
	 * pokud neexistuje kontakt tak ho vytvoří
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

	public function sendContact($user){


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


	public function generateAllInvoicesPDF($sendmail = false){
		$orders = assetsFactory::getAllEntity("objednavkaClass",
			array(
				new filterClass( "invoice_id","IS NOT","NULL"),
				new filterClass("invoice_link", "IS", "NULL")
			)
		);

		foreach ($orders as $key => $value){
			$this->getAndSaveInvoicePDFForOrder($value,false, $sendmail);
		}
		// TODO pozor co když faktury neexistují prtože je smazali v adminu fakturoidu
	}


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

	public function regenerateInvoiceFromOrder($order){
		return $this->sendInvoice($order);
	}

	public function regenerateInvoicePDFFromOrder($order,$sendmail = false){
		return $this->getAndSaveInvoicePDFForOrder($order,false, $sendmail);
	}


}