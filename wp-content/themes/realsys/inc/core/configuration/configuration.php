<?php


/*
 * RUN VARS
 */
$pluginUrl    = get_template_directory_uri();
$actionsStack = array();

/* DEFAULT UPLOAD SIZE */
define( "UPLOAD_SIZE", 10000000 );

//ZAPNOUT DEBUG PANEL
define( "DEBUG_PANEL", false );

// STRÁNKOVÁNÍ
define( "PAGING", 6 );
define( "MAX_PAGING_POSITIONS", 10 );

//security nonce
define( "GLOBAL_AJAX_NONCE", "ajaxAction7854efas." );

// deployment config
define( "DEPLOYMENT", false );

//PLUGIN SLUG
define( "PLUGIN_SLUG", "realsys" );

//paths
define( "ASSETS_PATH", "/wp-content/themes/realsys/assets/" );
define( "ADMIN_BASE_URL", BASE_URL . "wp-admin/admin.php?page=" . PLUGIN_SLUG );


// recaptcha secret BE
define( "RECAPTCHA", "6Ld5jcwUAAAAAHkJW4PKS2g11BUtuxMV7XvP2aud" );
define( "RECAPTCHA_SITEKEY", "6Ld5jcwUAAAAANHZpw5Xa4g-EgVPTOMfmGSSqZ4l" );


// ajax konstanty
define( "AJAXURL", admin_url( "admin-ajax.php" ) );

// Google auth id
define("GOOGLE_ID", "169419171066-51n84mk31m3sdi47rtkj84tprnrppker.apps.googleusercontent.com");
define("GOOGLE_API_KEY", "AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw");
define("GOOGLE_SERVER_API_KEY", "AIzaSyDLb5HxunZlhEtXHmELaNbd9XMajfkoQvc");

// CURRENCY
define("CURRENCY", "Kč");

// regex check konstanty
define( "REGEX_EMAIL", "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD" );
define( "REGEX_TELEPHONE", "/^(\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$/" );
define( "REGEX_TIME", '/^\d{1,2}:\d{1,2}$/m' );
define( "REGEX_URL_ABSOLUTE", '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu' );


// DEFAULT CONTROLLER
define( "DEFAULT_CONTROLLER", "home" );


// TYPY CHYB
define( "ERROR", "danger" );
define( "WARNING", "warning" );
define( "SUCCESS", "success" );
define( "INFO", "info" );


// OVĚŘOVACÍ SLOVNÍK

define( "STRING63", "str63" ); // max 63 chars OK
define( "STRING255", "str255" ); // max 255 chars OK
define( "STRING511", "str511" ); // max 511 chars OK
define( "STRING", "str" ); // string not limited
define( "NUMBER", "int" ); // max 2 147 483 647 positive negative OK
define( "BOOL", "bool" ); // max 1/0 or true/false OK
define( "FLOAT", "float" ); // standard float OK

define( "URL_RELATIVE", "url" ); // url only relative
define( "URL", "url" ); // url only relative
define( "URL_ABSOLUTE", "url_abs" ); // url only absolute with protocol
define( "EMAIL", "mail" ); // standard email OK
define( "FOREIGN_KEY", "fk" ); // foreign key OK (with control against relations var)
define( "TEL", "tel" ); // telephone like +48 777 777 777 OK
define( "PRICE", "price" ); // price only positive till 2 147 483 647 OK
define( "TIMESTAMP", "timestamp" ); // valid timestamp OK

define( "DATE", "date" ); // DEPRECATED
define( "TIME", "time" ); // DEPRECATED


// PRAVIDLA PRO JEDNOTLIVÉ TŘÍDY
// tyto pravidla jsou defaultně zděděné do AJAX interfacu
$field_rules = array(
	"obrazekClass"    => array(
		'db_id'         => array(
			"type"     => NUMBER,
			"required" => true
		),
		"db_titulek"    => array(
			"type"     => STRING255,
			"required" => false
		),
		"db_popisek"    => array(
			"type"     => STRING511,
			"required" => false
		),
		"db_kod"        => array(
			"type"     => STRING255,
			"required" => true
		),
		"db_url"        => array(
			"type"     => URL_RELATIVE,
			"required" => true
		),
		"db_inzerat_id" => array(
			"type"     => FOREIGN_KEY,
			"required" => false
		),
		"db_front"      => array(
			"type"     => BOOL,
			"required" => false
		)
	),
	'uzivatelClass'   => array(
		"db_id"       => array(
			"type"     => NUMBER,
			"required" => false
		),
		"db_jmeno"    => array(
			"type"     => STRING,
			"required" => true
		),
		"db_prijmeni" => array(
			"type"     => STRING,
			"required" => true
		),
		"db_email"    => array(
			"type"     => EMAIL,
			"required" => true
		),
		"db_telefon"  => array(
			"type"     => TEL,
			"required" => true
		),
		"db_fbid"     => array(
			"type"     => STRING255,
			"required" => false
		),
		"db_gmid"     => array(
			"type"     => STRING255,
			"required" => false
		),
		"db_avatar"   => array(
			"type"     => URL_RELATIVE,
			"required" => false
		),
		"db_popis"    => array(
			"type"     => STRING,
			"required" => false
		),
		"db_stav"     => array(
			"type"     => NUMBER,
			"required" => false
		),
		"db_heslo" => array(
			"type" => STRING255,
			"required" => false
		)
	),
	'objednavkaClass' => array(
		'db_id'         => array(
			'type'     => NUMBER,
			'required' => false
		),
		'db_inzerat_id' => array(
			'type'     => FOREIGN_KEY,
			'required' => true
		),
		'db_cena'       => array(
			'type'     => PRICE,
			'required' => true
		),
		'db_mnozstvi'   => array(
			'type'     => NUMBER,
			'required' => true
		),
		'db_stav' => array(
			'type' => NUMBER,
			'required' => true
		),
		'db_hash' => array(
			'type' => STRING255,
			'required' => false
		)
	),
	"inzeratClass"    => array(
		'db_id'               => array(
			'type'     => NUMBER,
			'required' => false
		),
		'db_titulek'          => array(
			"required" => true,
			"type"     => STRING255
		),
		'db_popis'            => array(
			"required" => true,
			"type"     => STRING
		),
		'db_typ_nemovitosti'  => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_typ_stavby'       => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_typ_inzeratu'     => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_pocet_mistnosti'  => array(
			"required" => true,
			"type"     => STRING255
		),
		'db_patro'            => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_parkovaci_misto'  => array(
			"required" => true,
			"type"     => BOOL
		),
		'db_garaz'            => array(
			"required" => true,
			"type"     => BOOL
		),
		'db_balkon'           => array(
			"required" => true,
			"type"     => BOOL
		),
		'db_vytah'           => array(
			"required" => true,
			"type"     => BOOL
		),
		'db_terasa'           => array(
			"required" => true,
			"type"     => BOOL
		),
		'db_stav_objektu'     => array(
			'required' => true,
			'type'     => NUMBER
		),
		'db_stav_inzeratu'    => array(
			'required' => true,
			'type'     => NUMBER
		),
		'db_penb'           => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_vybavenost'           => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_material'           => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_typ_vlastnictvi'           => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_podlahova_plocha' => array(
			'required' => true,
			'type'     => NUMBER
		),
		'db_pozemkova_plocha' => array(
			'required' => true,
			'type'     => NUMBER
		),
		'db_lat'              => array(
			'required' => true,
			'type'     => FLOAT
		),
		'db_lng'              => array(
			'required' => true,
			'type'     => FLOAT
		),
		'db_ulice'            => array(
			'required' => true,
			'type'     => STRING255
		),
		'db_mesto'            => array(
			'required' => true,
			'type'     => STRING255
		),
		'db_mestska_cast'           => array(
			"required" => true,
			"type"     => STRING255
		),
		'db_psc'              => array(
			'required' => true,
			'type'     => STRING63
		),
		'db_cp'               => array(
			'required' => true,
			'type'     => STRING63
		),
		'db_uzivatel_id'      => array(
			'required' => false,
			'type'     => FOREIGN_KEY
		),
		'db_top'              => array(
			'required' => true,
			'type'     => NUMBER
		),
		'db_cena'             => array(
			'required' => true,
			'type'     => PRICE
		),
		'db_cena_poznamka'    => array(
			'required' => false,
			'type'     => STRING511
		)
	),
	"ciselnikClass"   => array(
		'db_id'          => array(
			'type'     => NUMBER,
			'required' => false
		),
		'db_domain'      => array(
			'type'     => STRING255,
			'required' => true
		),
		'db_property'    => array(
			'type'     => STRING255,
			'required' => true
		),
		'db_value'       => array(
			'type'     => STRING511,
			'required' => true
		),
		'db_translation' => array(
			'type'     => STRING511,
			'required' => true
		),
	)
);


$frontend_general_rules = array(

	"db_heslo" => array(
		"required" => true,
		"minlength" => 6
	),
	"db_heslo2" => array(
		"required" => true,
        "minlength" => 6,
        "equalTo" => "#heslo"
	),
	"db_jmeno" => array(
		"required" => true,
        "minlength" => 3
	),
	"db_prijmeni" =>array(
		"required" => true,
        "minlength" => 3
	),
	"db_telefon" => array(
		"required" => true,
        "phoneCZ" => true
	),
	"db_email" => array(
		"required" => true,
		"remote" => AJAXURL . "?action=checkUserExists"
	),
	"db_email_nocheck" => array(
		"required" => true,
		"email" => true
	),
	"db_ulice" => array(
		"required" => true,
		"minlength" => 2
	),
	"db_cp" => array(
		"required" => true,
		"minlength" => 2
	),
	"db_mesto" => array(
		"required" => true,
		"minlength" => 2
	),
	"db_psc" => array(
		"required" => true,
		"zip" => true
	),
	"db_mestska_cast" => array(
		"required" => true,
		"minlength" => 2
	),
	"db_podlahova_plocha" => array(
		"required" => true,
		"number" => true
	),
	"db_pozemkova_plocha" => array(
		"required" => true,
		"number" => true
	),
	"db_titulek" => array(
		"required" => true
	),
	"db_pocet_mistnosti" => array(
		"required" => true,
		"minlength" => 2
	),
	"db_popis" => array(
		"required" => false,
	),
	"db_cena" => array(
		"required" => true,
		"number" => true
	),
	'db_typ_stavby' => array(
		"required" => true,
		"number" => true
	),
	'db_typ_inzeratu' => array(
		"required" => true,
		"number" => true
	)
);


$frontend_general_messages = array(
	"db_heslo" => array(
		"required" => __("Heslo musí být vyplněno")
	),
	"db_heslo2" => array(
		"required" => __("Prosím potvrďte heslo")
	),
	"db_email" => array(
		"remote" => __("Uživatel s touto emailovou adresou již existuje")
	)
);

$frontend_common_messages = array(
		"required" => __("Toto pole je povinné."),
        "email" => __("Zadejte platnou emailovou adresu."),
        "url" => __("Zadejte platné URL."),
        "date" => __("Zadejte platné datum."),
        "dateISO" => __("Zadejte platné datum."),
        "number" => __("Zadejte platné číslo."),
        "digits" => __("Zadejte platné číslice."),
        "creditcard" => __("Zadejte platné číslo kreditní karty."),
        "maxlength" => __('Zadejte maximálně {0} znaků.'),
        "minlength" => __('Zadejte minimálně {0} znaků.'),
        "range" => __('Zadejte hodnotu mezi {0} a {1}.')
);


// VŠEOBECNÝ SLOVNÍK PRO PŘEKLADY FIELDŮ
$dictionary = array(
	'db_nazev_pob'       => 'Název pobočky',
	'db_nazev_kat'       => 'Název kategorie',
	'db_nazev'           => 'Název',
	'db_nazev_suroviny'  => 'Název suroviny',
	'db_mnozstvi'        => 'Množství',
	'db_jednotka'        => 'Jednotka',
	'db_email'           => 'Email',
	'db_telefon'         => 'Telefon',
	'db_ulice'           => 'Ulice',
	'db_cp'              => 'Č.P.',
	'db_mesto'           => 'Město',
	'db_psc'             => 'PSČ',
	'db_obrazek'         => 'Obrázek',
	'db_vaha'            => 'Váha',
	'db_cena'            => 'Cena',
	'db_kategorieid'     => 'Kategorie',
	'db_popisek'         => 'Popisek',
	'db_kod'             => 'Kód produktu',
	'db_inzerat_id'      => 'ID Inzerátu',
	'db_id'              => 'ID',
	'db_titulek'         => 'Titulek',
	'db_url'             => 'Obrázek',
	'db_typ_nemovitosti' => 'Typ nemovitosti',
	'db_stav_objektu'    => 'Stav objektu',
	'db_jmeno'           => "Jméno",
	'db_prijmeni'        => "Příjmení",
	'db_datum_vytvoreni' => "Datum vytvoření",
	'db_typ_stavby'      => "Typ stavby",
	'db_typ_inzeratu'    => "Typ inzerátu",
	'db_parkovaci_misto' => "Parkovací místo",
	'db_top'             => "Top",
	'db_domain'          => "Doména",
	'db_property'        => "Vlastnost",
	'db_value'           => "Hodnota",
	'db_translation'     => "Překlad",
	'db_front'           => "Náhledový obrázek",
	'db_penb'            => 'PENB',
	'db_vybavenost'      => 'Vybavenost',
	'db_typ_vlastnictvi' => 'Typ vlastnictví',
	'db_material'        => 'Materiál',
	'db_vytah'           => 'Výtah',
	'db_terasa'          => 'Terasa',
	'db_mestska_cast'    => 'Městská část',
	'db_stav_inzeratu'   => 'Stav inzerátu',
	'db_stav'            => 'Stav objednávky',
	'db_hash'            => 'Hash platební brány'
);


// EPAYMENT KONSTANTY
define( "TEST_MODE", true );
define( "GOPAY_INLINE", false);
define ("GOPAY_STANDARD_CALLBACK", home_url() . "/gopay/?action=confirmPayment");

// MODEL / CONTROLLER  napojení
$models = array(
	"obrazekClass"    => array(
		"frontendController" => "obrazekController",
		"backendController"  => "obrazek"
	),
	"inzeratClass"    => array(
		"backendController" => "inzeraty"
	),
	"uzivatelClass"   => array(
		"backendController" => "uzivatel"
	),
	"objednavkaClass" => array(
		"backendController" => "objednavka"
	),
	"ciselnikClass"   => array(
		"backendController" => "stav"
	),
	"grafy"           => array(
		"backendController" => "graf"
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
	'inzeratClass'  => array(
		'db_typ_nemovitosti',
		'db_typ_stavby',
		'db_typ_inzeratu',
		'db_stav_objektu',
		'db_stav_inzeratu',
		'db_vybavenost',
		'db_penb',
		'db_typ_vlastnictvi',
		'db_material'
	),
	'uzivatelClass' => array(
		'db_stav'
	),
	'objednavkaClass' => array(
		'db_stav'
	)

);

$localDials = array(
	'obrazekClass' => array(
		'db_front' => array(
			0 => "Ne",
			1 => "ANO"
		)
	)
);


// clasess

$classes = array(
	'inzeratClass'  => "Inzerát",
	'obrazekClass'  => "Obrázek",
	'uzivatelClass' => "Uživatel",
	'objednavkaClass' => "Objednávka"
);


$ajax_localization = array(
	"ajaxUrl" => AJAXURL,
	"rules" => $frontend_general_rules,
	"messages" => $frontend_general_messages,
	"common_messages" => $frontend_common_messages
);

require_once __DIR__ . "/configuration_images.php";


define( "FRONTEND_IMAGES_PATH", get_template_directory_uri() . "/assets/images/images_frontend/" );

// předvolby telefonní

define( "PHONE", "(+420)" );

// RADIUS PRO PODOBNÉ INZERÁTY

define( "RADIUS", "0.5" );

// DATE FORMAT
define("DATE_FORMAT", "d.m.Y");


// DEFAULT WATERMARK
define("WATERMARK", __DIR__ . "/../../../assets/images/images_backend/watermark.png");
define("WATERMARK_RESIZE_FACTOR", 1);


// FILTER PARAMETERS
$filter_parameters = array(
	'db_typ_nemovitosti' => array(
		'name' => 'Typ nemovitosti',
		'values' => array()
	),
	'db_typ_vlastnictvi' => array(
		'name' => 'Typ vlastnictví',
		'values' => array()
	),
	'db_typ_stavby' => array(
		'name' => 'Typ stavby',
		'values' => array()
	),
	'db_stav_objektu' => array(
		'name' => 'Stav objektu',
		'values' => array()
	),
	'db_penb' => array(
		'name' => 'PENB',
		'values' => array()
	),
);

// FILTER HP PARAMETERS
$filter_hp_parameters = array(
	'db_typ_nemovitosti',
	'db_typ_vlastnictvi',
	'db_typ_stavby',
	'db_stav_objektu'
);


// CENIK TOPOVANI
$cenik = array(
	20 => 100,
	50 => 200,
	100 => 500,
	500 => 800
);