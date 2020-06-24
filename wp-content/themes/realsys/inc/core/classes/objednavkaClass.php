<?php


class objednavkaClass extends zakladniKamenClass {


	// db vars

	protected $db_uzivatel_id;
	protected $db_cena;
	protected $db_mnozstvi;

	protected $db_stav;
	protected $db_hash;
	protected $db_invoice_link;

	protected function zakladniVypis() {

	}

	protected function zakladniHtmlVypis() {

	}

	public function getTableName() {
		return "s7_objednavka";
	}
}