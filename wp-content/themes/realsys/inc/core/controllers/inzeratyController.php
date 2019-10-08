<?php


class inzeratyController extends controller {

	public function action() {
		$this->performView();
	}

	public function edit(){


		if(Tools::checkPresenceOfParam("id",$this->requestData)){
			$id = $this->requestData['id'];
			$inzerat = assetsFactory::getEntity('inzeratClass', $id);
			if($inzerat !== false){
				$this->viewData['inzerat'] = $inzerat;
			}

			if(Tools::checkPresenceOfParam("ulozit", $this->requestData)){
				$request_data = $this->requestData;

				$response = Tools::formProcessor(
					array("db_id", "db_popis","db_titulek","db_typ_nemovitosti","db_typ_stavby",
						"db_typ_inzeratu", "db_pocet_mistnosti", "db_patro", "db_parkovaci_misto",
						"db_stav_objektu", "db_podlahova_plocha", "db_pozemkova_plocha", "db_lat",
						"db_lng", "db_ulice", "db_mesto", "db_psc", "db_cp", "db_top", "db_garaz",
						"db_datum_zalozeni", "db_uzivatel_id"),
					$request_data,
					'inzeratClass',
					'edit'
				);
			}

		}else{
			frontendError::addMessage("ID", ERROR, "Chybějící ID");
		}
		$this->setView("upravInzerat");
		$this->performView();
	}
}