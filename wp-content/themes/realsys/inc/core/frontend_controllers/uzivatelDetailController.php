<?php


class uzivatelDetailController extends frontendController {

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		$is_ok = Tools::postChecker($this->requestData, array(
			"uzivatel_id" => array(
				"type"=> "int",
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['uzivatel_id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel){

				$uzivatel->writeDials();
				$uzivatel->loadRelatedObjects();
				$this->workData['uzivatel'] = $uzivatel;
				if($uzivatel->isUserLoggedIn()){
					$this->setView("uzivatelDetailPrivate");
				}
				$this->performView();

			}else{

				trigger_error("Tento uživatel neexistuje");
				frontendError::addMessage("id", ERROR, "zadaný uživatel neexistuje");
				$this->setView("notFound");
			}


		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|uzivatelDetailController");
			$this->setView("error");
		}
		$this->performView();

	}

	public function sendMessage(){
		global $wp_query;

		if(!invisibleRecaptchaClass::verifyRecaptchaOnController($this)){return false;}

		$result = Tools::postChecker($this->requestData, array(
			"db_jmeno" => array(
				"type" => STRING255,
				"required" => true
			),
			"db_prijmeni" => array(
				"type" => STRING255,
				"required" => true
			),
			"db_email_nocheck" => array(
				"type" => EMAIL,
				"required" => true
			),
			"db_telefon" => array(
				"type" => TEL,
				"required" => true
			),
			"db_zprava" => array(
				"type" => STRING,
				"required" => true
			),
			"uzivatel_id" => array(
				"type" => NUMBER,
				"required" => true
			)
		),true);

		if($result){

			$jmeno = $this->requestData['db_jmeno'];
			$prijmeni = $this->requestData['db_prijmeni'];
			$email = $this->requestData['db_email_nocheck'];
			$telefon = $this->requestData['db_telefon'];
			$zprava = $this->requestData['db_zprava'];
			$uzivatel_id = $this->requestData['uzivatel_id'];

			$uzivatel = assetsFactory::getEntity("uzivatelClass",$uzivatel_id);
			if($uzivatel){
				$delivering_email = $uzivatel->db_email;

				$data = array(
					'jmeno' => $jmeno,
					'prijmeni' => $prijmeni,
					'email' => $email,
					'telefon' => $telefon,
					'zprava' => $zprava
				);

				$result = Tools::sendMail($delivering_email, "Zpráva z kontaktního formuláře", "message", $data);
				if($result){
					$routeBack = Tools::getFERoute("uzivatelClass",$uzivatel_id);
					$this->requestData['link'] = $routeBack;
					$this->setView("messageSent");
				}else{
					$this->setView("error");
				}
			}else{
				$this->setView("error");
			}
		}else{
			$this->setView("error");
		}

	}

	public function editUser(){

		$is_ok = Tools::postChecker($this->requestData, array(
			"uzivatel_id" => array(
				"type"=> "int",
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['uzivatel_id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel && $uzivatel->isUserLoggedIn()){

				$uzivatel->writeDials();
				$this->workData['uzivatel'] = $uzivatel;
				$this->setView("uzivatelDetailPrivateEdit");
				$this->performView();

			}else{
				trigger_error("Tento uživatel neexistuje nebo nemáte oprávnění");
				frontendError::addMessage("id", ERROR, "Zadaný uživatel neexistuje nebo nemáte oprávnění");
				$this->setView("notFound");
			}

		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|uzivatelDetailController");
			$this->setView("error");
		}

		$this->performView();
	}


	public function changePassword(){
		$is_ok = Tools::postChecker($this->requestData, array(
			"uzivatel_id" => array(
				"type"=> NUMBER,
				"required" => true
			),
			"db_heslo" => array(
				"type" => STRING,
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['uzivatel_id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel && $uzivatel->isUserLoggedIn()){

				$new_password = $this->requestData['db_heslo'];
				$uzivatel->storePassword($new_password);
				$this->workData['uzivatel'] = $uzivatel;

				frontendError::addMessage("Heslo",SUCCESS, "Heslo bylo úspěšně změněno");
				$this->setView("uzivatelDetailPrivateEdit");

				Tools::jsRedirect(Tools::getFERoute("uzivatelClass",$id, "detail"),1000,"Heslo bylo změněno","Právě Vás přesměrováváme zpět do Vašeho profilu");

			}else{
				trigger_error("Tento uživatel neexistuje nebo nemáte oprávnění");
				frontendError::addMessage("id", ERROR, "Zadaný uživatel neexistuje nebo nemáte oprávnění");
				$this->setView("notFound");
			}

		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|uzivatelDetailController");
			$this->setView("error");
		}

		$this->performView();
	}

	public function changeUserDetails(){
		$is_ok = Tools::postChecker($this->requestData, array(
			"uzivatel_id" => array(
				"type"=> NUMBER,
				"required" => true
			)
		),true);

		if($is_ok){

			$id = $this->requestData['uzivatel_id'];
			unset($this->requestData['uzivatel_id']);
			$this->requestData['db_id'] = $id;

			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel && $uzivatel->isUserLoggedIn()){

				$email = $this->requestData['db_email_nocheck'];
				$users = assetsFactory::getAllEntity(
					"uzivatelClass",
					array(
						new filterClass("email","=","'" . $email . "'")
					)
				);
				if(count($users) == 1 ){
					$first_user = array_shift($users);
					if($first_user->getId() != $uzivatel->getId()){
						frontendError::addMessage("Uživatel",ERROR,"Uživatel s tímto emailem v systému již existuje");
						$this->setView("error");
						$this->performView();
						return false;
					}else{
						unset($this->requestData['db_email_nocheck']);
						$this->requestData['db_email'] = $email;
					}
				}elseif (count($users) > 1){
					frontendError::addMessage("Uživatel",ERROR,"Uživatelé s tímto emailem v systému již existují");
					$this->setView("error");
					$this->performView();
					return false;
				}else{
					unset($this->requestData['db_email_nocheck']);
					$this->requestData['db_email'] = $email;
				}


				$response = Tools::formProcessor(
					array(
						'db_jmeno', 'db_prijmeni','db_popis','db_email','db_telefon', 'db_id'
					),
					$this->requestData,
					"uzivatelClass",
					"edit"
				);

				if($response){
					Tools::jsRedirect(Tools::getFERoute("uzivatelClass",$id, "detail"),1000, "Úspěšně změněno", "Uživatel byl úspěšně změněn");
				}
				$this->setView("uzivatelDetailPrivateEdit");
				$this->workData['uzivatel'] = $uzivatel;

			}else{
				trigger_error("Tento uživatel neexistuje nebo nemáte oprávnění");
				frontendError::addMessage("id", ERROR, "Zadaný uživatel neexistuje nebo nemáte oprávnění");
				$this->setView("notFound");
			}

		}else{
			trigger_error("Došlo k chybě ve validaci parametrů :: action|uzivatelDetailController");
			$this->setView("error");
		}

		$this->performView();
	}
}