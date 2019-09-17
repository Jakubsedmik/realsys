<?php


class homeController extends controller {

	public function action() {

		$obrazek = assetsFactory::createEntity(
			"obrazekClass",
			array(
				"titulek" => "Nový obrázek",
				"popisek" => "Testovací popis",
				"url" => "https://test.cz/jpg.jpg",
				"kod" => "asgasgdadgerw",
				"inzerat_id" => 5,
				"datum_vytvoreni" => time(),
				"front" => true
			)
		);
		/* TODO api implementace do url */
		/* TODO zobrazování pouze vybraných polí */

		echo '<div class="app"><inzeraty api_url="/realsys/appdata.json" base_url="" model="inzeratClass" item_controller="" allowed_columns="[\'db_id\', \'db_prijmeni\']"></inzeraty></div>';
		echo frontendError::getBackendErrors();
	}
}