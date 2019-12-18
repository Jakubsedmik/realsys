<?php
if(DEPLOYMENT){
	$routes = array(
		"url_regex" => "controller"
	);
}else {
	$routes = array(
		'\/realsys\/new\/' => "homeController",
		'\/realsys\/inzerat\/' => "inzeratDetailController"
	);
}


/**
 * Rewrity pro jednotlivé parametry
 */

$rewrites = array(
	'inzerat_id' => array(
		'regex' => '^inzerat/([^/]*)/?',
		'rewrite' => 'index.php?pagename=inzerat&inzerat_id=$matches[1]'
	)
);
