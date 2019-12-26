<?php
if(DEPLOYMENT){
	$routes = array(
		"url_regex" => "controller"
	);
}else {
	$routes = array(
		'\/realsys\/new\/' => "homeController",
		'\/realsys\/inzerat\/' => "inzeratDetailController",
		'\/realsys\/uzivatel\/' => "uzivatelDetailController"
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
	)
);