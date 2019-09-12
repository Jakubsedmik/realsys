<?php


class obrazekClass extends zakladniKamenClass {

	protected $db_titulek;
	protected $db_popisek;
	protected $db_url;
	protected $db_kod;
	protected $db_inzerat_id;
	protected $db_datum_vytvoreni;
	protected $db_front;

	protected function zakladniVypis() {

	}

	protected function zakladniHtmlVypis() {

	}

	protected function getTableName() {
		return "s7_obrazek";
	}
}