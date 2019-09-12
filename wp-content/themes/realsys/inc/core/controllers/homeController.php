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
		echo '<div class="app"><inzeraty></inzeraty></div>';
		echo frontendError::getBackendErrors();
	}
}