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
	protected $db_cena_poznamka;





	protected function zakladniVypis() {
		// TODO: Implement zakladniVypis() method.
	}

	protected function zakladniHtmlVypis() {
		// TODO: Implement zakladniHtmlVypis() method.
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
		return $this->db_podlahova_plocha . " m<sup>2</sup>";
	}

	public function getTotalAerial(){
		return $this->db_pozemkova_plocha . " m<sup>2</sup>";
	}


	/* TODO PŘEDDĚLAT ALGORYTMUS NA SPRÁVNÝ -  https://stackoverflow.com/questions/5152683/find-all-locations-near-to-my-gps-location*/

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
				new filterClass("id", "!=" , $this->db_id)
			),
			0,
			$max
		);

		return $similar;
	}

}