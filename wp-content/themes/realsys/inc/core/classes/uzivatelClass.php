<?php


class uzivatelClass extends zakladniKamenClass {

	// db vars
	protected $db_jmeno;
	protected $db_prijmeni;
	protected $db_email;
	protected $db_telefon;

	protected $db_fbid;
	protected $db_gmid;


	protected $db_avatar;
	protected $db_popis;
	protected $db_stav;


	protected function zakladniVypis() {
		// TODO: Implement zakladniVypis() method.
	}

	protected function zakladniHtmlVypis() {
		// TODO: Implement zakladniHtmlVypis() method.
	}

	public function getTableName() {
		return "s7_uzivatel";
	}

}