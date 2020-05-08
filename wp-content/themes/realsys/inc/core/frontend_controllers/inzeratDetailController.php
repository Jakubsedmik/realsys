<?php


class inzeratDetailController extends frontendController{

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		$is_ok = Tools::postChecker($this->requestData, array(
			"inzerat_id" => array(
				"type"=> "int",
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['inzerat_id'];
			$inzerat = assetsFactory::getEntity("inzeratClass", $id);
			if($inzerat){

				if($inzerat->db_stav_inzeratu == 0){
					if(uzivatelClass::getUserLoggedId() !== false){
						$uzivatel = assetsFactory::getEntity("uzivatelClass", uzivatelClass::getUserLoggedId());
						$this->requestData['aktivni'] = false;
						frontendError::addMessage("Inzerát",WARNING, "Pozor tento inzerát je neaktivní. Buď čeká na schválení administrátorem a nebo jste ho deaktivovali. Tento inzerát vidíte pouze vy.");
						if($uzivatel && $uzivatel->getId() != $inzerat->db_uzivatel_id){
							frontendError::addMessage("Inzerát", ERROR, "Inzerát není aktivní.");
							$this->setView("error");
							return false;
						}
					}else{
						frontendError::addMessage("Inzerát", ERROR, "Inzerát není aktivní.");
						$this->setView("error");
						return false;
					}
				}

				$inzerat->writeDials();
				globalUtils::writeDebug($inzerat);
				$inzerat->loadRelatedObjects();
				$this->workData['inzerat'] = $inzerat;
				$this->performView();
			}else{
				trigger_error("Tento inzerát neexistuje.");
				frontendError::addMessage("Inzerát", ERROR, "zadaný inzerát neexistuje.");
				$this->setView("error");
			}


		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|inzeratDetailController");
			$this->setView("error");
		}
		$this->performView();

	}
}