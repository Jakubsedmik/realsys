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

		$result = Tools::postChecker($this->requestData, array(
			"jmeno" => array(
				"type" => STRING255,
				"required" => true
			),
			"prijmeni" => array(
				"type" => STRING255,
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
			"zprava" => array(
				"type" => STRING,
				"required" => true
			),
			"uzivatel_id" => array(
				"type" => NUMBER,
				"required" => true
			)
		),true);

		if($result){

			$jmeno = $this->requestData['jmeno'];
			$prijmeni = $this->requestData['prijmeni'];
			$email = $this->requestData['email'];
			$telefon = $this->requestData['telefon'];
			$zprava = $this->requestData['zprava'];
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
}