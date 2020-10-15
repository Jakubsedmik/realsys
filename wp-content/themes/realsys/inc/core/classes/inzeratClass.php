<?php


class inzeratClass extends zakladniKamenClass {


	// db vars
	protected $db_titulek;
	protected $db_popis;
	protected $db_typ_nemovitosti;
	protected $db_typ_stavby;
	protected $db_typ_inzeratu;
	protected $db_pocet_mistnosti;
	protected $db_patro;
	protected $db_celkem_podlazi; // OK

	protected $db_parkovaci_misto;
	protected $db_garaz;
	protected $db_balkon;
	protected $db_vytah;
	protected $db_terasa;


	protected $db_stav_objektu;
	protected $db_stav_inzeratu;
	protected $db_vybavenost;
	protected $db_penb;
	protected $db_typ_vlastnictvi;
	protected $db_material;

	protected $db_podlahova_plocha;
	protected $db_uzitkova_plocha;
	protected $db_pozemkova_plocha;

	protected $db_lat;
	protected $db_lng;
	protected $db_ulice;
	protected $db_mesto;
	protected $db_mestska_cast;
	protected $db_psc;
	protected $db_cp;

	protected $db_uzivatel_id;

	protected $db_top;

	protected $db_cena;
	protected $db_cena_poznamka; // OK
	protected $db_cena_najem; // OK
	protected $db_poplatky; // OK
	protected $db_kauce; // OK

	protected $db_vhodny_pro; // OK
	protected $db_k_dispozici_od; // OK
	protected $db_dalsi_vybaveni; // OK




	protected function zakladniVypis() {

	}

	protected function zakladniHtmlVypis() {

	}

	public function getTableName() {
		return "s7_inzerat";
	}


	public function getInterfaceTypes() {
		return array(
			"db_id" => "number",
			"db_titulek" => "string",
			"db_typ_nemovitosti" => "number",
			"db_stav_objektu" => "number"
		);
	}

	public function getConnectedName(){
		return $this->db_typ_inzeratu . " - " . $this->db_pocet_mistnosti . " - " . $this->db_mesto;
	}

	public function getAerialName(){
		return $this->db_mesto . ", " . $this->db_pocet_mistnosti . ", " . $this->getAerial();
	}

	public function getAerial(){
		return $this->db_podlahova_plocha . " m&sup2;";
	}

	public function getTotalAerial(){
		return $this->db_pozemkova_plocha . " m&sup2;";
	}


	/* TODO PŘEDĚLAT ALGORYTMUS NA SPRÁVNÝ -  https://stackoverflow.com/questions/5152683/find-all-locations-near-to-my-gps-location*/

	public function getSimilar($max){
		$latitudeMaxRadius = $this->db_lat + RADIUS;
		$latitudeMinRadius = $this->db_lat - RADIUS;
		$longitudeMaxRadius = $this->db_lng + RADIUS;
		$longitudeMinRadius = $this->db_lng - RADIUS;


		if($latitudeMaxRadius > 90 || $latitudeMinRadius < -90 || $longitudeMaxRadius > 180 || $longitudeMinRadius < -180){
			trigger_error("getSimilar::Špatně zadané souřadnice");
			return false;
		}

		$similar = assetsFactory::getAllEntity(
			"inzeratClass",
			array(
				new filterClass("lat", ">", $latitudeMinRadius),
				new filterClass("lat", "<", $latitudeMaxRadius),
				new filterClass("lng", ">", $longitudeMinRadius),
				new filterClass("lng", "<", $longitudeMaxRadius),
				new filterClass("id", "!=" , $this->db_id),
				new FilterClass("stav_inzeratu","=","1"),
				new FilterClass("typ_inzeratu","=", $this->db_typ_inzeratu),
				new FilterClass("typ_stavby","=", $this->db_typ_stavby),
			),
			0,
			$max
		);

		return $similar;
	}

	public function handleTopInzerat($transakce){
		$user = uzivatelClass::getUserLoggedObject();
		$response = new stdClass();
		if(is_object($transakce) && get_class($transakce) == 'transakceClass' && $user){
			if($transakce->db_accept == 0 && $transakce->db_id_odesilatel == $user->getId()){

				if($this->db_stav_inzeratu==1){
					// already topped, storno transaction and error
					if($this->db_top == 1){
						assetsFactory::removeEntity("transakceClass", $transakce);
						$response->status = -12;
						$response->realization = 0;
						$response->message = "Tento inzerát je již topovaný. Stornuji transakci.";
					}else{
						// confirm transaction
						$transakce->db_accept = 1;
						$transakce->aktualizovat();

						//top inzerat
						$this->db_top = 1;
						$this->db_datum_zalozeni = time();
						$this->aktualizovat();

						// response
						$response->status = 1;
						$response->realization = 1;
						$response->message = "Platba za službu proběhla úspěšně";
						$response->behavior = "finish";
					}
				}else{
					$response->status = -12;
					$response->message = "Inzerát který není aktivní nelze topovat.";
					$response->realization = 0;
				}

			}else{
				$response->status = -10;
				$response->message = "Neodpovídající transakční objekt";
				$response->realization = 0;
			}
		}else{
			$response->status = -11;
			$response->message = "Neplatné vstupní parametry pro realizaci";
			$response->realization = 0;
		}
		return $response;
	}


	public static function cleanUp(){
		$all = assetsFactory::getAllEntity("inzeratClass");
		$toOut = "";
		foreach ($all as $key => $value){


			/* PRONAJEM a SPOLUBYDLENI */
			if($value->db_typ_inzeratu == 1 || $value->db_typ_inzeratu == 3){
				if($value->olderThanMonth()){
					$value->disable();
					$toOut .= $value->getId() . " | " . Tools::formatTime($value->db_datum_upravy) . " Older than one month: <strong>deactivation</strong><br>";
				}else{
					$toOut .= $value->getId() . " | " . Tools::formatTime($value->db_datum_upravy) . "<br>";
				}
			}

			/* PRODEJ */
			if($value->db_typ_inzeratu == 2){
				if($value->olderThanTwoMonth()){
					$value->disable();
					$toOut .= $value->getId() . " | " . Tools::formatTime($value->db_datum_upravy) . " Older than two months: <strong>deactivation</strong><br>";

				}else{
					$toOut .= $value->getId() . " | " . Tools::formatTime($value->db_datum_upravy) . "<br>";
				}
			}

			if($value->olderThanHalfYear()){
				//assetsFactory::removeEntity("inzeratClass", $value->getId());
				$toOut .= $value->getId() . " | " . Tools::formatTime($value->db_datum_upravy) . " Older than half year: <strong>deleting</strong><br>";
			}
		}
		echo $toOut;
	}

	public function olderThanMonth(){
		$one_month_back = time() - 30 * 24 * 60 * 60;
		return $one_month_back >= $this->db_datum_upravy;
	}

	public function olderThanTwoMonth(){
		$two_month_back = time() - 2 * 30 * 24 * 60 * 60;
		return $two_month_back >= $this->db_datum_upravy;
	}

	public function olderThanHalfYear(){
		$half_year_back = time() - 6 * 30 * 24 * 60 * 60;
		return $half_year_back >= $this->db_datum_upravy;
	}

	public function disable(){
		$this->db_stav_inzeratu = 0;
		$this->aktualizovat();
	}

}