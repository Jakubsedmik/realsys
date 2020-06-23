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

	public function createInvoiceForOrder(){

	}

	public function updateInvoiceForOrder(){

	}

	public function sendInvoice(objednavkaClass $order){

		if(get_class($order) == "objednavkaClass"){

			$uzivatel = $order->getSubobject("uzivatel");
			$contact = $this->sendContact($uzivatel);


			$invoice_params = array(
				"subject_id" => $contact->id,
				"lines" => array(
					"name" => "Platba za kredity",
					"quantity" => $order->db_mnozstvi,
					"unit_price" => $order->db_cena / $order->db_mnozstvi
				),
				"custom_id" => $order->getId()
			);

			try {

				$response = $this->client->getInvoices(array("custom_id" => $order->getId()));

				if(count($response->getBody()) == 0){
					$response = $this->client->createInvoice($invoice_params);
					return $response->getBody();
				}else{
					$response = $response->getBody();
					$invoice = array_shift($response);

					/* Spárování řádků, máme vždy pouze jeden */
					$line_id = $invoice->lines[0]->id;
					$invoice_params['lines']['id'] = $line_id;

					$response = $this->client->updateInvoice($invoice->id, $invoice_params);
					return $response->getBody();
				}

			}catch (\Fakturoid\Exception $e){
				trigger_error("Došlo k chybám při připojování do Fakturoidu :: sendInvoice : " . $e->getMessage());
			}


		}else{
			trigger_error("Parameter order není potomkem třídy objednavkaClass :: sendInvoice");
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

					//print_r($response->getBody());
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

	}

}