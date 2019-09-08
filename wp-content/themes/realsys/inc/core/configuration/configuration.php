<?php

/*
 * RUN VARS
 */
$pluginUrl = get_template_directory_uri();
$actionsStack = array();

/* DEFAULT UPLOAD SIZE */
define("UPLOAD_SIZE", 10000000);

//ZAPNOUT DEBUG PANEL
define("DEBUG_PANEL", false);

// STRÁNKOVÁNÍ
define("PAGING", 6);
define("MAX_PAGING_POSITIONS", 5);

//security nonce
define("GLOBAL_AJAX_NONCE", "ajaxAction7854efas.");

// deployment config
define("DEPLOYMENT", false);


// recaptcha secret BE
define("RECAPTCHA", "6Lf17KsUAAAAAAwgoEi1q0cTz3fXaFlBfHFQrmwv");
define("RECAPTCHA_SITEKEY", "6Lf17KsUAAAAAKbphw_SeDg3SYo9TkMXxHNJ77q9");

//PLUGIN SLUG
define("PLUGIN_SLUG","realsys");

// databázové konstanty


// ajax konstanty
define("AJAXURL", admin_url("admin-ajax.php"));


// regex check konstanty
define("REGEX_EMAIL", "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD");
define("REGEX_TELEPHONE", "/^[+]?[()\/0-9. -]{9,}$/");
define("REGEX_TIME", '/^\d{1,2}:\d{1,2}$/m');


// jaká pole budou zobrazená pro dané entity
// zobrazování v ajax renderu
$INTERFACE_DATA =  
        array(
            "produktClass" => array(
                                "db_obrazek" => "Obrázek",
                                "db_kod" => "Kód", 
                                "db_nazev" => "Název",
                                "Akce" => '<button type="button" class="btn btn-outline-primary btn-sm" style="touch-action: none;"><span class="oi oi-pencil"></span>Upravit<div class="ripple-container"></div></button>'
            ),
            "surovinaClass" => array(
                                "db_mnozstvi" => "Množství",
                                "db_jednotka" => "Jednotka", 
                                "db_alergeny" => "Alergeny",
                                "db_nazev_suroviny" => "Název",
                                "Akce" => '<button type="button" class="btn btn-outline-primary btn-sm" style="touch-action: none;"><span class="oi oi-pencil"></span>Upravit<div class="ripple-container"></div></button>'
            ),
            "userClass" => array(
                                "db_id" => "ID",
                                "username" => "Login",
                                "jmeno" => "Jméno",
                                "prijmeni" => "Příjmení",
                                "email"=>"Email"
            )
        );


// DEFAULT CONTROLLER
define("DEFAULT_CONTROLLER", "home");


// TYPY CHYB
define("ERROR", "danger");
define("WARNING", "warning");
define("SUCCESS", "success");
define("INFO", "info");


// OVĚŘOVACÍ SLOVNÍK
define("STRING", "str");
define("NUMBER", "int");
define("EMAIL", "mail");
define("TEL", "tel");
define("DATE", "date");
define("BOOL", "bool");
define("URL", "url");

$field_rules = array(
	"obrazekClass" => array(
		"db_titulek" => array(
			"type" => STRING,
			"required" => true
		),
		"db_popisek" => array(
			"type" => STRING,
			"required" => true
		),
		"db_url" => array(
			"type" => URL,
			"required" => true
		),
		"db_inzerat_id" => array(
			"type" => NUMBER,
			"required" => true
		)
	)
);



$dictionary = array(
    'db_nazev_pob' => '<i>Název pobočky</i>',
    'db_nazev_kat' => '<i>Název kategorie</i>',
    'db_nazev' => '<i>Název</i>',
    'db_nazev_suroviny' => '<i>Název suroviny</i>',
    'db_mnozstvi' => '<i>Množství</i>',
    'db_jednotka' => '<i>Jednotka</i>',
    'db_email' => '<i>Email</i>',
    'db_telefon' => '<i>Telefon</i>',
    'db_ulice' => '<i>Ulice</i>',
    'db_cp' => '<i>Č.P.</i>',
    'db_mesto' => '<i>Město</i>',
    'db_psc' => '<i>PSČ</i>',
    'db_obrazek' => '<i>Obrázek</i>',
    'db_vaha' => '<i>Váha</i>',
    'db_cena' => '<i>Cena</i>',
    'db_kategorieid' => '<i>Kategorie</i>',
    'db_popisek' => '<i>Popisek</i>',
    'db_kod' => '<i>Kód produktu</i>'
);


// EPAYMENT KONSTANTY
define("TEST_MODE", true);

