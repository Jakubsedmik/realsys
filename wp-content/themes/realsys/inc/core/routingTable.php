<?php


$base_url_regex = str_replace("/", "\/", BASE_URL);

$routes = array(
	$base_url_regex . 'inzerat\/' => "inzeratDetailController", // inzerat
	$base_url_regex . 'uzytkownik\/' => "uzivatelDetailController", // uzivatel
	$base_url_regex . "login\/" => "loginController", // login
	$base_url_regex . "wyciag\/" => "vypisController", // vypis
	$base_url_regex . "wyciag-mapa\/" => "vypisMapaController", // vypismapa
	$base_url_regex . "gopay\/" => "gopayController", // gopay
	$base_url_regex . "zamowienie\/" => "objednavkaController", // objednavka
	$base_url_regex . "edycja-ogloszenia\/" => "inzeratEditController", // editace-inzeratu
	$base_url_regex . "dodawaj-ogloszenia\/" => "pridatInzeratController", // pridat-inzerat
	$base_url_regex . "pies-strozujacy\/" => "hlidacipesController", // hlidacipes
);



/**
 * Rewrity pro jednotlivé parametry
 */

$rewrites = array(
	'inzerat_id' => array(
		'regex' => '^inzerat/([^/]*)/?',
		'rewrite' => 'index.php?pagename=inzerat&inzerat_id=$matches[1]'
	),
	'uzivatel_id' => array(
		'regex' => '^uzytkownik/([^/]*)/?',
		'rewrite' => 'index.php?pagename=uzytkownik&uzivatel_id=$matches[1]'
	)
);


/*
 * Routing URLS
 */

$routing_urls = array(
	"inzeratClass" => array(
		'detail' => home_url() . '/inzerat/%d/',
		'listing' => home_url() . '/wyciag/',
		'add' => home_url() . '/dodawaj-ogloszenia/',
		'edit' => home_url() . '/edycja-ogloszenia/?id=%d'
	),
	"uzivatelClass" => array(
		'detail' => home_url() . '/uzytkownik/%d/',
		'login' => home_url() . "/login/",
		'loginR' => home_url() . "/login/?redirectBack=%s",
		'resetpwd' => home_url() . '/login/?action=requestResetPassword'
	),
	"vypis" => array(
		'listing' => home_url() . '/wyciag/',
		'map' => home_url() . '/wyciag-mapa/'
	),
	"gopay" => array(
		"payment" => home_url() . '/gopay/?id=%d',
		"confirmation" => home_url() . '/gopay/',
		"quickpayment" => home_url() . "/gopay/?action=quickOrder"
	),
	"hlidacipesClass" => array(
		"detail" => home_url() . "/pies-strozujacy/?id=%d",
		"listing" => home_url() . "/uzytkownik/%d/"
	),
	"objednavkaClass" => array(
		"detail" => home_url() . "/zamowienie/"
	)
);