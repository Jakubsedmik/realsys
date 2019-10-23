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

//PLUGIN SLUG
define("PLUGIN_SLUG","realsys");

//paths
define("BASE_URL", "/realsys/");
define("ASSETS_PATH", "/wp-content/themes/realsys/assets/");
define("ADMIN_BASE_URL", BASE_URL . "wp-admin/admin.php?page=" . PLUGIN_SLUG);


// recaptcha secret BE
define("RECAPTCHA", "6Lf17KsUAAAAAAwgoEi1q0cTz3fXaFlBfHFQrmwv");
define("RECAPTCHA_SITEKEY", "6Lf17KsUAAAAAKbphw_SeDg3SYo9TkMXxHNJ77q9");


// ajax konstanty
define("AJAXURL", admin_url("admin-ajax.php"));


// regex check konstanty
define("REGEX_EMAIL", "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD");
define("REGEX_TELEPHONE", "/^[+]?[()\/0-9. -]{9,}$/");
define("REGEX_TIME", '/^\d{1,2}:\d{1,2}$/m');


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
define("FLOAT", "float");
define("EMAIL", "mail");
define("TEL", "tel");
define("DATE", "date");
define("TIME", "time");
define("BOOL", "bool");
define("URL", "url");
define("IMAGE","image");
define("FOREGIN_KEY","int");


// PRAVIDLA PRO JEDNOTLIVÉ TŘÍDY
// tyto pravidla jsou defaultně zděděné do AJAX interfacu
$field_rules = array(
	"obrazekClass" => array(
		'db_id' => array(
			"type" => NUMBER,
			"required" => true
		),
		"db_titulek" => array(
			"type" => STRING,
			"required" => false
		),
		"db_popisek" => array(
			"type" => STRING,
			"required" => false
		),
		"db_url" => array(
			"type" => IMAGE,
			"required" => true
		),
		"db_kod" => array(
			"type" => STRING,
			"required" => true
		),
		"db_datum_vytvoreni" => array(
			"type" => TIME,
			"required" => false
		),
		"db_inzerat_id" => array(
			"type" => FOREGIN_KEY,
			"required" => false
		),
		"db_front" => array(
			"type" => BOOL,
			"required" => false
		)
	),
	'uzivatelClass' => array(
		"db_id" => array(
			"type" => NUMBER,
			"required" => false
		),
		"db_jmeno" => array(
			"type" => STRING,
			"required" => true
		),
		"db_prijmeni" => array(
			"type" => STRING,
			"required" => true
		),
		"db_email" => array(
			"type" => EMAIL,
			"required" => true
		)
	),
	'objednavkaClass' => array(
		'db_id' => array(
			'type' => NUMBER,
			'required' => false
		),
		'db_cena' => array(
			'type' => NUMBER,
			'required' => true
		),
		'db_mnozstvi' => array(
			'type' => NUMBER,
			'required' => true
		),
		'db_datum_vytvoreni' => array(
			'type' => DATE,
			'required' => false
		)
	),
	"inzeratClass" => array(
		'db_popis' => array(
			"required" => true,
			"type" => STRING
		),
		'db_titulek' => array(
			"required" => true,
			"type" => STRING
		),
		'db_typ_nemovitosti' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_typ_stavby' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_typ_inzeratu' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_pocet_mistnosti' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_patro' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_parkovaci_misto' => array(
			"required" => true,
			"type" => NUMBER
		),
		'db_stav_objektu' => array(
			'required' => true,
			'type' => NUMBER
		),
		'db_podlahova_plocha' => array(
			'required' => true,
			'type' => NUMBER
		),
		'db_pozemkova_plocha' => array(
			'required' => true,
			'type' => NUMBER
		),
		'db_lat' => array(
			'required' => true,
			'type' => FLOAT
		),
		'db_lng' => array(
			'required' => true,
			'type' => FLOAT
		),
		'db_ulice' => array(
			'required' => true,
			'type' => STRING
		),
		'db_mesto' => array(
			'required' => true,
			'type' => STRING
		),
		'db_psc' => array(
			'required' => true,
			'type' => STRING
		),
		'db_cp' => array(
			'required' => true,
			'type' => STRING
		),
		'db_top' => array(
			'required' => true,
			'type' => NUMBER
		),
		'db_stav_inzeratu' => array(
			'required' => true,
			'type' => NUMBER
		)
	),
	"ciselnikClass" => array(
		'db_id' => array(
			'type' => NUMBER,
			'required' => false
		),
		'db_domain' => array(
			'type' => STRING,
			'required' => false
		),
		'db_property' => array(
			'type' => STRING,
			'required' => false
		),
		'db_value' => array(
			'type' => NUMBER,
			'required' => false
		),
		'db_translation' => array(
			'type' => STRING,
			'required' => false
		),
	)
);


// VŠEOBECNÝ SLOVNÍK PRO PŘEKLADY FIELDŮ
$dictionary = array(
    'db_nazev_pob' => 'Název pobočky',
    'db_nazev_kat' => 'Název kategorie',
    'db_nazev' => 'Název',
    'db_nazev_suroviny' => 'Název suroviny',
    'db_mnozstvi' => 'Množství',
    'db_jednotka' => 'Jednotka',
    'db_email' => 'Email',
    'db_telefon' => 'Telefon',
    'db_ulice' => 'Ulice',
    'db_cp' => 'Č.P.',
    'db_mesto' => 'Město',
    'db_psc' => 'PSČ',
    'db_obrazek' => 'Obrázek',
    'db_vaha' => 'Váha',
    'db_cena' => 'Cena',
    'db_kategorieid' => 'Kategorie',
    'db_popisek' => 'Popisek',
    'db_kod' => 'Kód produktu',
	'db_inzerat_id' => 'ID Inzerátu',
	'db_id' => 'ID',
	'db_titulek' => 'Titulek',
	'db_url' => 'Obrázek',
	'db_typ_nemovitosti' => 'Typ nemovitosti',
	'db_stav_objektu' => 'Stav objektu',
	'db_jmeno' => "Jméno",
	'db_prijmeni' => "Příjmení",
	'db_datum_vytvoreni' => "Datum vytvoření",
	'db_typ_stavby' => "Typ stavby",
	'db_typ_inzeratu' => "Typ inzerátu",
	'db_parkovaci_misto' => "Parkovací místo",
	'db_top' => "Top",
	'db_domain' => "Doména",
	'db_property' => "Vlastnost",
	'db_value' => "Hodnota",
	'db_translation' => "Překlad"
);


// EPAYMENT KONSTANTY
define("TEST_MODE", true);

// MODEL / CONTROLLER  napojení
$models = array(
	"obrazekClass" => array(
		"frontendController" => "obrazekController",
		"backendController" => "obrazek"
	),
	"inzeratClass" => array(
		"backendController" => "inzeraty"
	),
	"uzivatelClass" => array(
		"backendController" => "uzivatel"
	),
	"objednavkaClass" => array(
		"backendController" => "objednavka"
	),
	"ciselnikClass" => array(
		"backendController" => "stav"
	)
);

// RELATIONS
$relationships = array(
	"inzeratClass" => array(
		'db_uzivatel_id' => array(
			'class' => 'uzivatelClass',
		)
	),
	"obrazekClass" => array(
		'db_inzerat_id' => array(
			'class' => 'inzeratClass',
		)
	)
);


// CISELNIKY

$dials = array(
	'inzeratClass' => array(
		'db_typ_nemovitosti',
		'db_typ_stavby',
		'db_typ_inzeratu',
		'db_stav_objektu',
		'db_stav_inzeratu'
	),
	'uzivatelClass' => array(
		'db_stav'
	)

);


// clasess

$classes = array(
	'inzeratClass' => "Inzerát",
	'obrazekClass' => "Obrázek",
	'uzivatelClass' => "Uživatel"
);

require_once __DIR__ . "/configuration_images.php";