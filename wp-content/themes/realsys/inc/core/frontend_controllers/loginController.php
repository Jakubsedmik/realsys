<?php


class loginController extends frontendController {


	public function beforeHeadersAction() {
		$arr = $_GET;

		if(!(isset($arr['action']) && $arr['action'] == 'logOut')){
			if(uzivatelClass::getUserLoggedId() !== false){
				$idofuser = uzivatelClass::getUserLoggedId();
				wp_redirect(Tools::getFERoute("uzivatelClass", $idofuser));
			}
		}
	}

	public function action() {

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
					$uzivatel->logIn();
					frontendError::addMessage("Přihlášení", SUCCESS, "Přihlášení proběhlo úspěšně, probíhá přesměrování na Váš profil.");
					Tools::jsRedirect(Tools::getFERoute("uzivatelClass",$uzivatel->getId()),1500,"Přesměrování na Váš profil");
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

	public function googleRegistration(){
		globalUtils::writeDebug($this->requestData);
		// first check the token
		// 1. if token is ok create user and log him
		// if token is not ok show error page

		$result = Tools::postChecker(
			$this->requestData,
			array(
				"jmeno" => array(
					"type" => STRING63,
					"required" => true),
				"prijmeni" => array(
					"type" => STRING63,
					"required" => true
				),
				"email" => array(
					"type" => EMAIL,
					"required" => true
				),
				"telefon" => array(
					"type" => TEL,
					"required" => true
				),
				"token" => array(
					"type" => STRING,
					"required" => true
				),
				"gid" => array(
					"type" => STRING,
					"required" => true
				),
				"image" => array(
					"type" => URL,
					"required" => true
				)
			),
			true
		);

		if($result){
			require_once (__DIR__ . "/../lib/google-api-php-client-2.4.0/vendor/autoload.php");
			$client = new Google_Client(['client_id' => GOOGLE_ID]);
			$payload = $client->verifyIdToken($this->requestData['token']);

			if($payload){

				$email = $this->requestData['email'];
				$gid = $this->requestData['gid'];
				$user_exists = assetsFactory::getAllEntity(
					"uzivatelClass",
					array(
						new filterClass("email", "=", "'" . $email . "'"),
						new filterClass("gmid", "=", "'" . $gid . "'")
					),
					false,
					false,
					true
				);

				if(count($user_exists) > 0){
					frontendError::addMessage("System", ERROR, "Uživatel s touto emailovou adresou již existuje");
					$this->setView("error");
					return true;
				}

				$creationArr = array(
					"db_jmeno" => $this->requestData["jmeno"],
					"db_prijmeni" => $this->requestData["prijmeni"],
					"db_email" => $this->requestData["email"],
					"db_telefon" => $this->requestData["telefon"],
					"db_gmid" => $this->requestData["gid"],
					"db_avatar" => $this->requestData["image"]
				);


				$uzivatel = assetsFactory::createEntity("uzivatelClass", $creationArr);

				if($uzivatel){
					frontendError::addMessage("Registrace",SUCCESS, "Registrace proběhla úspěšně. Budete přesměrováni");
					$uzivatel->logIn();
					Tools::jsRedirect(Tools::getFERoute("uzivatelClass",$uzivatel->getId()),1500);
				}else{
					frontendError::addMessage("Registrace", ERROR, "Nastala chyba při vytváření uživatele. Kontaktujte prosím podporu");
				}
			}else{
				frontendError::addMessage("System",ERROR,"Snažíte se o něco špatného. Budete reportováni.");
				$this->setView("error");
			}
		}else{
			frontendError::addMessage("Google",ERROR, "Došlo k chybě v registraci. Některá pole převzatá od systému google nesplňují požadavky systému. Prosím proveďte manuální registraci");
		}
	}

	public function logOut(){
		if(isset($_SESSION['prihlaseny'])){
			echo "OK";
			$id = $_SESSION['prihlaseny'];
			unset($_SESSION['prihlaseny']);
			frontendError::addMessage("Odhlášení", SUCCESS, "Úspěšně jsme Vás odhlásili");
			Tools::jsRedirect(home_url(), 1000, "Probíhá přesměrování", "Po úspěšném odhlášení Vás přesměrováváme na <strong>úvodní stránku</strong>");
			return true;
		}
	}
}