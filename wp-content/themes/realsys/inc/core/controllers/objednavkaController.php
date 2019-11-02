<?php


class objednavkaController extends controller {

	public function action() {
		$this->performView();
	}

	public function edit(){

		if(Tools::checkPresenceOfParam("id",$this->requestData)){
			$id = $this->requestData['id'];
			$objednavka = assetsFactory::getEntity('objednavkaClass', $id);
			if($objednavka !== false){
				$this->viewData['objednavka'] = $objednavka;
			}

			if(Tools::checkPresenceOfParam("ulozit", $this->requestData)){
				$request_data = $this->requestData;
				$response = Tools::formProcessor(
					array("db_id", "db_cena", "db_mnozstvi", "db_inzerat_id", "db_datum_zalozeni"),
					$request_data,
					'objednavkaClass',
					'edit'
				);
			}

		}else{
			frontendError::addMessage("ID", ERROR, "Chybějící ID");
		}
		$this->setView("upravObjednavku");
		$this->performView();
	}

	public function create(){

		if(Tools::checkPresenceOfParam("vytvorit", $this->requestData)){
			$request_data = $this->requestData;
			$response = Tools::formProcessor(
				array("db_cena", "db_mnozstvi", "db_inzerat_id"),
				$request_data,
				'objednavkaClass',
				'create'
			);

			if($response === true){
				$this->requestData = array();
			}
		}

		$this->setView("vytvoritObjednavku");
		$this->performView();
	}
}