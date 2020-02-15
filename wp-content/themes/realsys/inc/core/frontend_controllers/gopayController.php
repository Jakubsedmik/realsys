<?php
use GoPay\Definition\Language;
use GoPay\Definition\Payment\Currency;
use GoPay\Definition\Payment\PaymentInstrument;
use GoPay\Definition\Payment\BankSwiftCode;
use GoPay\Definition\Payment\Recurrence;

class gopayController extends frontendController {

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		$gopay = GoPay\payments(array(
			'goid' => '8292273517',
			'clientId' => '1466427842',
			'clientSecret' => 'Ebysb4Yw',
			'isProductionMode' => false,
			'language' => Language::CZECH
		));

		// recurrent payment must have field ''
		$recurrentPayment = array(
			'recurrence' => array(
				'recurrence_cycle' => Recurrence::DAILY,
				'recurrence_period' => "7",
				'recurrence_date_to' => '2015-12-31'
			)
		);

		// pre-authorized payment must have field 'preauthorization'
		$preauthorizedPayment = array(
			'preauthorization' => true
		);

		$response = $gopay->createPayment(array(
			'payer' => array(
				'default_payment_instrument' => PaymentInstrument::PAYMENT_CARD,
				'allowed_payment_instruments' => array(PaymentInstrument::BANK_ACCOUNT, PaymentInstrument::PAYMENT_CARD),
				'default_swift' => BankSwiftCode::FIO_BANKA,
				'allowed_swifts' => array(BankSwiftCode::FIO_BANKA, BankSwiftCode::MBANK),
				'contact' => array(
					'first_name' => 'Test',
					'last_name' => 'Test',
					'email' => 'alpha7@seznam.cz',
					'phone_number' => '+777888999',
					'city' => 'C.Budejovice',
					'street' => 'Plana 67',
					'postal_code' => '373 01',
					'country_code' => 'CZE',
				),
			),
			'amount' => 150,
			'currency' => Currency::CZECH_CROWNS,
			'order_number' => '001',
			'order_description' => 'pojisteni01',
			'items' => array(
				array('name' => 'item01', 'amount' => 50),
				array('name' => 'item02', 'amount' => 100),
			),
			'additional_params' => array(
				array('name' => 'invoicenumber', 'value' => '2015001003')
			),
			'callback' => array(
				'return_url' => 'http://localhost/realsys/cms/'
			),
			'lang' => Language::CZECH, // if lang is not specified, then default lang is used
		));


		if ($response->hasSucceed()) {
			echo '<a href="' . $response->json['gw_url'] . '"> Zaplatit kartou - redirect varianta</a>';

			$templateParameters = array(
				'gatewayUrl' => $response->json['gw_url'],
				'embedJs' => $gopay->urlToEmbedJs()
			);
			$this->requestData['gopayParameters'] = $templateParameters;

		} else {
			// errors format: https://doc.gopay.com/en/?shell#http-result-codes
			echo "oops, API returned {$response->statusCode}: {$response}";
		}


	}
}