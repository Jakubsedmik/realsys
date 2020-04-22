<?php


class transakceClass extends zakladniKamenClass {

	protected $db_nazev_sluzby;
	protected $db_id_odesilatel;
	protected $db_id_prijemce;
	protected $db_mnozstvi;
	protected $db_accept;


	protected function zakladniVypis() {
		// TODO: Implement zakladniVypis() method.
	}

	protected function zakladniHtmlVypis() {
		// TODO: Implement zakladniHtmlVypis() method.
	}

	public function getTableName() {
		return "s7_transakce";
	}

	public static function getUserTransactions($user){

	}
}