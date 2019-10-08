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

	protected $db_stav_objektu;
	protected $db_stav_inzeratu;

	protected $db_podlahova_plocha;
	protected $db_pozemkova_plocha;

	protected $db_lat;
	protected $db_lng;
	protected $db_ulice;
	protected $db_mesto;
	protected $db_psc;
	protected $db_cp;

	protected $db_uzivatel_id;

	protected $db_top;





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
}