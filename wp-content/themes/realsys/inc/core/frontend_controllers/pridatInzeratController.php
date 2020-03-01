<?php


class pridatInzeratController extends frontendController {

	public function beforeHeadersAction() {
		if(uzivatelClass::getUserLoggedId() == false){
			wp_redirect(home_url() . "/login/?create=1");
		}
	}

	public function action() {

	}
}