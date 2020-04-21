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
				)
			), true );

			if ( $result ) {
				$payment = $this->requestData['payment'];
				$credits = $this->requestData['credits'];
				if($payment == "visa"){
					global $cenik;

					if(Tools::checkPresenceOfParam($credits, $cenik)){
						$finalPrice = $cenik[$credits];
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