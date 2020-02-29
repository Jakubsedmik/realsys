<?php
use GoPay\Definition\Language;
use GoPay\Definition\Payment\Currency;
use GoPay\Definition\Payment\PaymentInstrument;
use GoPay\Definition\Payment\BankSwiftCode;
use GoPay\Definition\Payment\Recurrence;

class gopayController extends frontendController {

	protected $gopay;
	protected $recurrentPayment;
	protected $preauthorizedPayment;

	public function __construct( $actionName ) {
		$this->gopay = GoPay\payments(array(
			'goid' => '8292273517',
			'clientId' => '1466427842',
			'clientSecret' => 'Ebysb4Yw',
			'isProductionMode' => false,
			'language' => Language::CZECH
		));

		// recurrent payment must have field ''
		$this->recurrentPayment = array(
			'recurrence' => array(
				'recurrence_cycle' => Recurrence::DAILY,
				'recurrence_period' => "7",
				'recurrence_date_to' => '2015-12-31'
			)
		);

		// pre-authorized payment must have field 'preauthorization'
		$this->preauthorizedPayment = array(
			'preauthorization' => true
		);


		parent::__construct( $actionName );
	}

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		$result = Tools::postChecker($this->requestData, array(
			"id" => array(
				'required' => true,
				'type' => NUMBER
			)
		), true);

		if($result){
			$id = $this->requestData['id'];
			if(uzivatelClass::getUserLoggedId() !== false){
				$objednavka = assetsFactory::getEntity("objednavkaClass",$id);
				$uzivatel = assetsFactory::getEntity("uzivatelClass", uzivatelClass::getUserLoggedId());

				if($objednavka && $uzivatel){
					if($objednavka->db_stav == 0){
						$this->simpleOrderPayment($objednavka, $uzivatel);
						frontendError::addMessage("Platba", SUCCESS, "Platební brána připravena. Pokračujte do platební brány");
						return true;
					}else{
						$this->setView("error");
						frontendError::addMessage("Objednávka", ERROR, "Tato objednávka již byla zaplacena");
						return false;
					}

				}else{
					$this->setView("error");
					frontendError::addMessage("Objednávka a uživatel", ERROR, "Objednávka nebo uživatel neexistuje");
					return false;
				}
			}else{
				$this->setView("error");
				frontendError::addMessage("Autorizace", ERROR, "Uživatel není přihlášen. Nemůžeme provést platbu");
				return false;
			}
		}else{
			$this->setView("error");
			frontendError::addMessage("Povinná pole",ERROR, "Některá povinná pole nebyla vyplněna");
			return false;
		}

	}

	public function confirmPayment(){

		$result = Tools::postChecker($this->requestData, array(
			"id" => array(
				'required' => true,
				'type' => NUMBER
			),
			'orderid' => array(
				'required' => true,
				'type' => NUMBER
			)
		), true);



		if(uzivatelClass::getUserLoggedId() != false){
			if($result){
				$gopay_id = $this->requestData['id'];
				$status = $this->gopay->getStatus($gopay_id);
				if(is_object($status) && $status->json["state"]=="PAID"){
					$order_number = $status->json["order_number"];

					$objednavka = assetsFactory::getEntity("objednavkaClass", $order_number);
					$uzivatel = assetsFactory::getEntity("uzivatelClass", uzivatelClass::getUserLoggedId());

					if($objednavka && $uzivatel){
						$objednavka->db_hash = $gopay_id;
						$objednavka->db_stav = 1;

						frontendError::addMessage("Úspěch", SUCCESS, "Objednávka byla úspěšně zaplacena.");
						$this->requestData['uzivatel'] = $uzivatel;
						$this->requestData['objednavka'] = $objednavka;
						$this->setView("confirmPayment");
						return true;

					}else{
						frontendError::addMessage("Objednávka",ERROR, "Zadná objednávka v systému neexistuje a nemůže být zaplacena.");
						$this->setView("error");
						return false;
					}

				}else{
					frontendError::addMessage("Objednávka",ERROR, "Objednávka nebyla úspěšně zaplacena. Opakujte proces nebo kontaktujte administrátora");
					$this->requestData['orderid'] = $this->requestData['orderid'];
					$this->setView("errorPayment");
					return false;
				}
			}else{
				frontendError::addMessage("Pole",ERROR, "Některá pole nebyla vyplněna.");
				$this->setView("error");
				return false;
			}
		}else{
			frontendError::addMessage("Nepřihlášený uživatel.",ERROR, "Uživatel není přihlášen");
			$this->setView("error");
			return false;
		}

	}

	protected function simpleOrderPayment($order, $user){
		$contact = array(
			'first_name' => $user->db_jmeno,
			'last_name' => $user->db_prijmeni,
			'email' => $user->db_email,
			'phone_number' => $user->db_telefon,
		);

		$items = array(
			array('name' => 'Objednávka kreditů', 'amount' => $order->db_cena * 100)
		);
		$return_url = GOPAY_STANDARD_CALLBACK . "&orderid=" . $order->getId();
		return $this->simplePayment($order->db_cena, $items, $order->getId(),$contact, $return_url ,"Platba za kredity v systému");
	}

	protected function simplePayment($ammount, $items, $order_number, $contact, $return_url, $order_description){

		$currency = Currency::CZECH_CROWNS;
		$lang = Language::CZECH;

		$gopay = $this->gopay;
		$response = $gopay->createPayment(array(
			'payer' => array(
				'default_payment_instrument' => PaymentInstrument::PAYMENT_CARD,
				'allowed_payment_instruments' => array(PaymentInstrument::BANK_ACCOUNT, PaymentInstrument::PAYMENT_CARD),
				'default_swift' => BankSwiftCode::FIO_BANKA,
				'allowed_swifts' => array(BankSwiftCode::FIO_BANKA, BankSwiftCode::MBANK),
				'contact' => $contact,
			),
			'amount' => $ammount * 100,
			'currency' => $currency,
			'order_number' => $order_number,
			'order_description' => $order_description,
			'items' => $items,
			'callback' => array(
				'return_url' => $return_url
			),
			'lang' => $lang, // if lang is not specified, then default lang is used
		));


		if ($response->hasSucceed()) {
			$templateParameters = array(
				'gatewayUrl' => $response->json['gw_url'],
				'embedJs' => $gopay->urlToEmbedJs()
			);
			$this->requestData['gopayParameters'] = $templateParameters;
			return $response->json['gw_url'];

		} else {
			// errors format: https://doc.gopay.com/en/?shell#http-result-codes
			echo "oops, API returned {$response->statusCode}: {$response}";
		}
	}
}