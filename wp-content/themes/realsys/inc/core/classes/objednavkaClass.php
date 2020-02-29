<?php


class objednavkaClass extends zakladniKamenClass {


	// db vars

	protected $db_inzerat_id;
	protected $db_cena;
	protected $db_mnozstvi;

	protected $db_stav;
	protected $db_hash;

	protected function zakladniVypis() {
		// TODO: Implement zakladniVypis() method.
	}

	protected function zakladniHtmlVypis() {
		// TODO: Implement zakladniHtmlVypis() method.
	}

	public function getTableName() {
		return "s7_objednavka";
	}
}