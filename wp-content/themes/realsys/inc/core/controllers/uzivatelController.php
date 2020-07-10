<?php


class uzivatelController extends controller {

	public function action() {
		$this->performView();
	}

	public function edit(){
		
		//  todo při editaci uživatele by se měl změnit kontakt v fakturoidu, respektive tato aktualizace by se měla provádět na tlačítko

		if(Tools::checkPresenceOfParam("id",$this->requestData)){
			$id = $this->requestData['id'];
			$uzivatel = assetsFactory::getEntity('uzivatelClass', $id);
			if($uzivatel !== false){
				$this->viewData['uzivatel'] = $uzivatel;
			}

			if(Tools::checkPresenceOfParam("ulozit", $this->requestData)){
				$request_data = $this->requestData;
				$response = Tools::formProcessor(
					array("db_id", "db_jmeno", "db_prijmeni","db_email",
						"db_telefon", "db_popis", "db_fbid", "db_gmid", "db_stav",
						"db_datum_zalozeni", "db_avatar", "db_heslo"),
					$request_data,
					'uzivatelClass',
					'edit'
				);
			}

		}else{
			frontendError::addMessage("ID", ERROR, "Chybějící ID");
		}
		$this->setView("upravUzivatele");
		$this->performView();
	}


	public function create(){

		if(Tools::checkPresenceOfParam("vytvorit", $this->requestData)){
			$request_data = $this->requestData;
			$response = Tools::formProcessor(
				array("db_jmeno", "db_prijmeni","db_email",
					"db_telefon", "db_popis", "db_fbid", "db_gmid", "db_stav",
					"db_avatar"),
				$request_data,
				'uzivatelClass',
				'create'
			);

			if($response === true){
				$this->requestData = array();
			}
		}

		$this->setView("vytvoritUzivatele");
		$this->performView();
	}
}