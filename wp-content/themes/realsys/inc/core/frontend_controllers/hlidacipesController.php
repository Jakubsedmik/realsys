<?php


class hlidacipesController extends frontendController {

	public function beforeHeadersAction() {
		if(uzivatelClass::getUserLoggedId() == false){
			if(Tools::checkPresenceOfParam("id",$_GET)){
				$idpes = $_GET['id'];
				wp_redirect(home_url() . "/login/?watchdog=" . $idpes);
				die();
			}else{
				wp_redirect(home_url() . "/login/");
				die();
			}
		}
	}

	public function action() {
		$result = Tools::postChecker($this->requestData, array(
			"id" => array(
				"type"=> NUMBER,
				"required" => true
			)
		), true);
		if($result){
			$pes = $this->requestData['id'];
			$uzivatel = uzivatelClass::getUserLoggedId();

			if($uzivatel != false){
				$uzivatel = assetsFactory::getEntity("uzivatelClass",$uzivatel);
				$uzivatel->loadRelatedObjects("hlidacipesClass");
				$hlidacipsi = $uzivatel->getSubobject("hlidacipesClass");
				if(isset($hlidacipsi[$pes])){
					$pes = $hlidacipsi[$pes];
					$this->requestData['pes'] = $pes;

				}else{
					frontendError::addMessage("Hlídací pes", ERROR, "Tento hlídací pes Vám nepatří.");
					$this->setView("error");
					return false;
				}
			}
		}else{
			frontendError::addMessage("Pole", ERROR, "Některá pole nebyla vyplněna");
			$this->setView("error");
			return false;
		}

	}
}