<?php
if(DEPLOYMENT){
	$routes = array(
		"url_regex" => "controller"
	);
}else {
	$routes = array(
		'\/realsys\/new\/' => "homeController",
		'\/realsys\/inzerat\/' => "inzeratDetailController",
		'\/realsys\/uzivatel\/' => "uzivatelDetailController",
		"\/realsys\/login\/" => "loginController",
		"\/realsys\/vypis\/" => "vypisController",
		"\/realsys\/vypismapa\/" => "vypisMapaController",
		"\/realsys\/gopay\/" => "gopayController",
		"\/realsys\/objednavka\/" => "objednavkaController",
	);
}


/**
 * Rewrity pro jednotlivé parametry
 */

$rewrites = array(
	'inzerat_id' => array(
		'regex' => '^inzerat/([^/]*)/?',
		'rewrite' => 'index.php?pagename=inzerat&inzerat_id=$matches[1]'
	),
	'uzivatel_id' => array(
		'regex' => '^uzivatel/([^/]*)/?',
		'rewrite' => 'index.php?pagename=uzivatel&uzivatel_id=$matches[1]'
	)
);


/*
 * Routing URLS
 */

$routing_urls = array(
	"inzeratClass" => array(
		'detail' => home_url() . '/inzerat/%d/',
		'listing' => home_url()
	),
	"uzivatelClass" => array(
		'detail' => home_url() . '/uzivatel/%d/'
	),
	"vypis" => array(
		'listing' => home_url() . '/vypis/',
		'map' => home_url() . '/vypismapa/'
	),
	"gopay" => array(
		"payment" => home_url() . "/gopay/?id=%d",
		"confirmation" => home_url() . "/gopay/"
	)
);