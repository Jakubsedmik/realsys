<?php


class loginController extends frontendController {


	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {
		// TODO: Implement action() method.
	}

	public function logIn(){
		$result = Tools::postChecker($this->requestData, array(
			"email" => array(
				"type"=> EMAIL,
				"required" => true
			),
			"password" => array(
				"type" => STRING255,
				"required" => true
			)
		), true);

		if($result){
			$email = $this->requestData['email'];
			$heslo = $this->requestData['password'];
			$uzivatel = assetsFactory::getAllEntity("uzivatelClass",array(new filterClass("email","=","'" . $email . "'")));
			if(count($uzivatel) == 1){
				$uzivatel = array_shift($uzivatel);
				$login_result = $uzivatel->verifyPassword($heslo);
				if($login_result){
					// nejdřív je třeba nejěká hesla uložit
					// potom po ověření přesměrovat na detail uživatele

				}else{
					frontendError::addMessage("Uživatel",ERROR, "Špatné heslo");
				}
			}else{
				frontendError::addMessage("Uživatel",ERROR, "Tento uživatel neexistuje");
			}
		}else{
			$this->setView("error");
		}
	}
}