<?php


class uzivatelDetailController extends frontendController {

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		$is_ok = Tools::postChecker($this->requestData, array(
			"uzivatel_id" => array(
				"type"=> "int",
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['uzivatel_id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);
			if($uzivatel){

				$uzivatel->writeDials();
				$uzivatel->loadRelatedObjects();
				$this->workData['uzivatel'] = $uzivatel;
				$this->performView();
			}else{
				trigger_error("Tento uživatel neexistuje");
				frontendError::addMessage("id", ERROR, "zadaný uživatel neexistuje");
				$this->setView("notFound");
			}


		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|uzivatelDetailController");
			$this->setView("error");
		}
		$this->performView();

	}
}