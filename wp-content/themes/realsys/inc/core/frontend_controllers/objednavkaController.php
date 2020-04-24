<?php


class objednavkaController extends frontendController {

	public function beforeHeadersAction() {

	}

	public function action() {
		if(uzivatelClass::getUserLoggedId() == false){
			frontendError::addMessage("Uživatel", ERROR, "Uživatel není přihlášený. Pro nákup kreditů se nejprve přihlašte");
			$this->setView("error");
			return false;
		}

		$result = Tools::postChecker($this->requestData, array(
			'serviceOrder' => array(
				'required' => true,
				'type' => NUMBER
			)
		), true);

		if($result){
			global $cenik_sluzeb;
			$idservice = $this->requestData['serviceOrder'];
			if(isset($cenik_sluzeb[$idservice])){
				$service = $cenik_sluzeb[$idservice];
				$customService = array(
					'ammount' => $service['price'],
					'price' => $service['price'] * ALONE_CREDIT_PRICE,
					'name' => $service['name'],
					'message' => 'Nákupem kreditů nebude služba aktivována, po nákupu kreditů prosím službu opět stejným postupem aktivujte za již nakoupené kredity'
				);
				$this->workData['customService'] = $customService;
			}
		}
	}

	public function processPayment(){
		if(uzivatelClass::getUserLoggedId() !== false) {
			$result = Tools::postChecker( $this->requestData, array(
				"payment" => array(
					"type"     => STRING63,
					"required" => true
				),
				"credits" => array(
					"type"     => NUMBER,
					"required" => true
				),
				"serviceOrder" => array(
					"type" => NUMBER,
					"required" => false
				)
			), true );

			if ( $result ) {
				$payment = $this->requestData['payment'];
				$credits = $this->requestData['credits'];
				if($payment == "visa"){
					global $cenik;

					$serviceOrder = false;
					if(Tools::checkPresenceOfParam("serviceOrder",$this->requestData)){
						global $cenik_sluzeb;
						$serviceId = $this->requestData['serviceOrder'];

						if(isset($cenik_sluzeb[$serviceId])){
							$service = $cenik_sluzeb[$serviceId];
							if($credits == $service['price']){
								$serviceOrder = $service;
							}
						}else{
							frontendError::addMessage("Služba", ERROR, "Tato služba v systému neexistuje.");
							$this->setView("error");
							return false;
						}
					}


					if(Tools::checkPresenceOfParam($credits, $cenik) || $serviceOrder!= false){
						if($serviceOrder!= false){
							$finalPrice = $credits * ALONE_CREDIT_PRICE;
						}else{
							$finalPrice = $cenik[$credits];
						}

						$objednavka = assetsFactory::createEntity("objednavkaClass",array(
							"db_mnozstvi" => $credits,
							"db_cena" => $finalPrice,
							"db_uzivatel_id" => uzivatelClass::getUserLoggedId(),
							"db_stav" => 0
						));
						if($objednavka){
							Tools::jsRedirect(Tools::getFERoute("gopay",$objednavka->getId(),"payment"), 1500, "Potvrzení", "Potvrzujeme objednávku - přesměrováváme Vás na platební bránu");
							frontendError::addMessage("Objednávka", SUCCESS, "Potvrzujeme Vaši objednávku, přesměrováváme Vás na platební bránu");
							return true;
						}else{
							frontendError::addMessage("Objednávka", ERROR, "Objednávku se nepodařilo vytvořit - kontaktujte administrátora");
							$this->setView("error");
							return false;
						}

					}else{
						frontendError::addMessage("Množství kreditů", ERROR, "Toto množství kreditů neprodáváme");
						$this->setView("error");
						return false;
					}
				}else{
					frontendError::addMessage("Platební metoda", ERROR, "Tuto platební metodu systém nepodporuje");
					$this->setView("error");
					return false;
				}
			}else{
				frontendError::addMessage("Pole", "Požadovaná pole nebyla vyplněna");
				return false;
			}
		}else{
			frontendError::addMessage("Uživatel", ERROR, "Uživatel není přihlášený. Pro nákup kreditů se nejprve přihlašte");
			$this->setView("error");
			return false;
		}
	}
}