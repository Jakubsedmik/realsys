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
		$recaptcha = new invisibleRecaptchaClass();
		$this->requestData['recaptcha'] = $recaptcha;
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

			$verificationArray = array(
				"email" => $this->requestData['email'],
				"given_name" => $this->requestData['jmeno'],
				"family_name" => $this->requestData['prijmeni'],
				"picture" => $this->requestData['image'],
				"sub" => $this->requestData['gid']
			);
			$payload = Tools::googleTokenVerification($this->requestData['token'], $verificationArray);
			globalUtils::writeDebug($payload);

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
			$id = $_SESSION['prihlaseny'];
			unset($_SESSION['prihlaseny']);
			frontendError::addMessage("Odhlášení", SUCCESS, "Úspěšně jsme Vás odhlásili");
			Tools::jsRedirect(home_url(), 1000, "Probíhá přesměrování", "Po úspěšném odhlášení Vás přesměrováváme na <strong>úvodní stránku</strong>");
			return true;
		}
	}


	public function registerUser(){
		/*$result = Tools::postChecker(
			$this->requestData,
			array(
				"jmeno" => array(),
				"prijmeni" => array(),
				""
			),
			true
		);*/


		$request_data = $this->requestData;

		$recaptcha = new invisibleRecaptchaClass();
		$this->requestData['recaptcha'] = $recaptcha;

		globalUtils::writeDebug($this->requestData);

		$result = Tools::postChecker(
			$this->requestData,
			array(
				"db_email" => array(
					"type" => STRING,
					"required" => true
				),
				"db_telefon" => array(
					"type" => TEL,
					"required" => true
				),
				"db_prijmeni" => array(
					"type" => STRING,
					"required" => true
				)
			),
			true
		);

		if($result) {
			$hash_to_send = hash("md5",$this->requestData['db_email'] . $this->requestData['db_telefon'] . $this->requestData['db_prijmeni'] . "salting");
			$request_data['db_hash'] = $hash_to_send;
			$request_data['db_stav'] = 0;

			$email = $this->requestData['db_email'];

			$uzivatel_existuje = assetsFactory::getAllEntity(
				"uzivatelClass",
				array(
					new filterClass(
						"email",
						"=",
						"'" . $email . "'"
					)
				)
			);

			if(count($uzivatel_existuje) > 0){
				frontendError::addMessage("Uživatel", ERROR, "Uživatel s touto emailovou adresou již existuje");
				return false;
			}

			$link = home_url() . "/login/?action=confirmUserCreation&hash=" . $hash_to_send . "&email=" . $email;

			Tools::sendMail(
				$email,
				"Potvrzení emailové adresy",
				"confirmEmail",
				array(
					"link" => $link
				)
			);

			$response = Tools::formProcessor(
				array("db_jmeno", "db_prijmeni","db_email",
					"db_telefon", "db_heslo", "db_stav", "db_hash"),
				$request_data,
				'uzivatelClass',
				'create'
			);

			if($response === true){
				$this->requestData = array();
				$this->setView("registerRequestConfirmation");
			}

		}
	}

	public function confirmUserCreation(){

		$result = Tools::postChecker(
			$this->requestData,
			array(
				"email" => array(
					"type" => EMAIL,
					"required" => true
				),
				"hash" => array(
					"type" => STRING,
					"required" => true
				)
			),
			true
		);


		if($result){
			$email = $this->requestData['email'];
			$hash = $this->requestData['hash'];

			$uzivatel = assetsFactory::getAllEntity(
				"uzivatelClass",
				array(
					new filterClass(
						"email",
						"=",
						"'" . $email . "'"
					)
				)
			);


			if(is_array($uzivatel) && count($uzivatel) == 1){
				$uzivatel = array_shift($uzivatel);

				if(strlen($uzivatel->db_hash)==0){

					frontendError::addMessage("Chyba", ERROR, "Tento uživatel byl již ověřen.");
					$this->setView("error");
					return false;
				}

				if($hash === $uzivatel->db_hash){

					$uzivatel->db_stav = 1;
					$uzivatel->db_hash = "";
					$this->setView("userConfirmed");
					Tools::sendMail(
						$uzivatel->db_email,
						"Vítejte",
						"welcomeInSystem"
					);

					frontendError::addMessage("Úspěch",SUCCESS, "Uživatel byl ověřen.");
					Tools::jsRedirect(Tools::getFERoute("uzivatelClass",$uzivatel->getId()));
					return true;

				}else{
					$this->setView("error");
					frontendError::addMessage("System",ERROR, "Došlo k chybě! Snažíte se o něco špatného. Budete reportováni.");
					return false;
				}
			}else{
				$this->setView("error");
				frontendError::addMessage("System",ERROR, "Zadaný uživatel v systému buď nefiguruje nebo je duplikátem.");
				return false;
			}

		}else{
			$this->setView("error");
			return false;
		}

	}
}