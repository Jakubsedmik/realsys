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

				$inzerat->writeDials();
				$inzerat->loadRelatedObjects();
				$this->workData['inzerat'] = $inzerat;
				$this->performView();
			}else{
				trigger_error("Tento inzerát neexistuje");
				frontendError::addMessage("id", ERROR, "zadaný inzerát neexistuje");
				$this->setView("notFound");
			}


		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|inzeratDetailController");
			$this->setView("error");
		}
		$this->performView();

	}
}