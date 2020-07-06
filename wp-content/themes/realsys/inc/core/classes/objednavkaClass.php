<?php


class objednavkaClass extends zakladniKamenClass {


	// db vars

	protected $db_uzivatel_id;
	protected $db_cena;
	protected $db_mnozstvi;

	protected $db_stav;
	protected $db_hash;
	protected $db_invoice_link;
	protected $db_invoice_id;


	/*
	 * Zde doplněno vytváření faktur ve fakturoidu + stahování
	 */
	public function vytvorit(){
		parent::vytvorit();
		if($this->db_stav == 1){
			$fakturoid = new fakturoidClass();
			$fakturoid->createInvoiceForOrder($this, true, true);
		}
	}

	public function smazat() {
		parent::smazat();
		$fakturoid = new fakturoidClass();
		$fakturoid->removeInvoice($this);
	}


	protected function zakladniVypis() {

	}

	protected function zakladniHtmlVypis() {

	}

	public function getTableName() {
		return "s7_objednavka";
	}
}