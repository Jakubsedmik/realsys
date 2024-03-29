<?php

$dev_branch = true;


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

// SMS MANAGER API KEY
define("SMS_API_KEY", "ebf1c47065b933d486f76f27abb4cd997c4c4c7f");


// ajax konstanty
define( "AJAXURL", admin_url( "admin-ajax.php" ) );

// Google auth id
define("GOOGLE_ID", "169419171066-51n84mk31m3sdi47rtkj84tprnrppker.apps.googleusercontent.com");
define("GOOGLE_API_KEY", "AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw");
define("GOOGLE_SERVER_API_KEY", "AIzaSyDLb5HxunZlhEtXHmELaNbd9XMajfkoQvc");

// FAKTUROID Credentials
define("FAKTUROID_SLUG", "okpraha");
define("FAKTUROID_MAIL", "jakub.kana@szukamdom.pl");
define("FAKTUROID_API_KEY", "a0d1e36fa4b9ad2fb026d00bbc57aeecaf0adda9");
define("FAKTUROID_AGENT", "PHPlib <jakub.kana@szukamdom.pl>");

// CURRENCY
define("CURRENCY", "PLN");
define("CURRENCY_CODE", "PLN");
define("LANG_CODE", "pl-PL");


// regex check konstanty
define( "REGEX_EMAIL", "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD" );
define( "REGEX_TELEPHONE", "/^(\+49)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$/" );
define( "REGEX_ZIP", "/\d{2}-\d{3}/");
define( "REGEX_TIME", '/^\d{1,2}:\d{1,2}$/m' );
define( "REGEX_URL_ABSOLUTE", '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu' );
define( "REGEX_URL_RELATIVE", "");

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
define( "PRICE_ZERO", "price_zero" ); // price only positive till 2 147 483 647, including zero
define( "TIMESTAMP", "timestamp" ); // valid timestamp OK
define( "PHPARRAY", "array" ); // valid PHP array
define( "PDF_URL", "pdf_url"); // valid PDF URL

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
		'db_uzivatel_id' => array(
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
		),
		'db_invoice_id' => array(
			"type" => NUMBER,
			'required' => false
		),
		'db_invoice_link' => array(
			"type" => PDF_URL,
			"required" => false
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
			"required" => false,
			"type"     => STRING255
		),
		'db_patro'            => array(
			"required" => true,
			"type"     => NUMBER
		),
		'db_celkem_podlazi' => array(
			"required" => false,
			"type" => NUMBER
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
			"required" => false,
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
			'required' => false,
			'type'     => NUMBER
		),
		'db_pozemkova_plocha' => array(
			'required' => false,
			'type'     => NUMBER
		),
		'db_uzitkova_plocha' => array(
			'required' => false,
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
			"required" => false,
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
			'required' => false,
			'type'     => PRICE_ZERO
		),
		'db_cena_poznamka'    => array(
			'required' => false,
			'type'     => STRING511
		),
		'db_cena_najem' => array(
			'required' => false,
			'type' => PRICE_ZERO
		),
		'db_poplatky' => array(
			'required' => false,
			'type' => PRICE_ZERO
		),
		'db_kauce' => array(
			'required' => false,
			'type' => PRICE_ZERO
		),
		'db_vhodny_pro' => array(
			'required' => false,
			'type' => STRING255
		),
		'db_k_dispozici_od' => array(
			'required' => false,
			'type' => DATE
		),
		'db_dalsi_vybaveni' => array(
			'required' => false,
			'type' => STRING
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
	),
	"transakceClass" => array(
		"db_id" => array(
			"type" => NUMBER,
			"required" => false
		),
		'db_nazev_sluzby'      => array(
			'type'     => STRING255,
			'required' => true
		),
		'db_id_odesilatel' => array(
			'type' => FOREIGN_KEY,
			'required' => true
		),
		'db_id_prijemce' => array(
			'type' => NUMBER,
			'required' => true
		),
		'db_mnozstvi' => array(
			'type' => NUMBER,
			'required' => true
		),
		'db_accept' => array(
			'type' => BOOL,
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
	'db_typ_inzeratu' => array(
		"required" => true,
		"number" => true
	),
	'db_typ_stavby' => array(
		"required" => true,
		"number" => true
	),
	'db_stav_objektu' => array(
		"required" => true,
		"number" => true
	),
	'db_vybavenost' => array(
		"required" => true,
		"number" => true
	),
	'db_penb' => array(
		"required" => true,
		"number" => true
	),
	'db_typ_vlastnictvi' => array(
		"required" => true,
		"number" => true
	),
	'db_patro' => array(
		"required" => false,
		"number" => true
	),
	'db_celkem_podlazi' => array(
		"required" => false,
		"number" => true
	),
	'db_inzerat_obrazky[]' => array(
		"required" => true
	),
	'credits' => array(
		"required" => true
	),
	'payment' => array(
		'required' => true
	)
);

$frontend_add_rules = array(
	'db_patro' => array(
		'type' => NUMBER,
		'required' => array(
			array('db_typ_nemovitosti'=> 4, 'db_typ_stavby' => 5 ),
		),
		'appear' => array(

		)
	)
);


$frontend_general_messages = array(
	"db_heslo" => array(
		"required" => __("Heslo musí být vyplněno", "realsys")
	),
	"db_heslo2" => array(
		"required" => __("Prosím potvrďte heslo","realsys")
	),
	"db_email" => array(
		"remote" => __("Uživatel s touto emailovou adresou již existuje","realsys")
	)
);

$frontend_common_messages = array(
		"required" => __("Toto pole je povinné.","realsys"),
        "email" => __("Zadejte platnou emailovou adresu.", "realsys"),
        "url" => __("Zadejte platné URL.", "realsys"),
        "date" => __("Zadejte platné datum.", "realsys"),
        "dateISO" => __("Zadejte platné datum.", "realsys"),
        "number" => __("Zadejte platné číslo.", "realsys"),
        "digits" => __("Zadejte platné číslice.", "realsys"),
        "creditcard" => __("Zadejte platné číslo kreditní karty.", "realsys"),
        "maxlength" => __('Zadejte maximálně {0} znaků.', "realsys"),
        "minlength" => __('Zadejte minimálně {0} znaků.', "realsys"),
        "range" => __('Zadejte hodnotu mezi {0} a {1}.', "realsys"),
		"zip" =>  __("Toto PSČ je nevalidní. Zadávejte ve formátu 12-345", "realsys")
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
	'db_hash'            => 'Hash platební brány',
	'db_uzivatel_id'     => 'Id uživatele',
	'db_nazev_sluzby' => "Název služby",
	'db_accept' => "Zaúčtováno",
	'db_invoice_link' => "Faktura",
	'db_invoice_id' => "Fakturoid ID"
);


// EPAYMENT KONSTANTY
define( "TEST_MODE", true );
define( "GOPAY_INLINE", false);
define ("GOPAY_STANDARD_CALLBACK", home_url() . "/gopay/?action=confirmPayment");
define ("GOPAY_QUICK_CALLBACK", home_url() . "/gopay/?action=confirmQuickPayment");

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
	),
	"transakceClass" => array(
		"backendController" => "transakce"
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
	),
	"hlidacipesClass" => array(
		'db_uzivatel_id' => array(
			'class' => 'uzivatelClass'
		)
	),
	"objednavkaClass" => array(
		'db_uzivatel_id' => array(
			'class' => 'uzivatelClass'
		)
	),
	"transakceClass" => array(
		'db_id_odesilatel' => array(
			'class' => 'uzivatelClass'
		),
		'db_id_prijemce' => array(
			'class' => 'uzivatelClass'
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
	'objednavkaClass' => "Objednávka",
	'transakceClass' => "Transakce"
);


$ajax_localization = array(
	"ajaxUrl" => AJAXURL,
	"rules" => $frontend_general_rules,
	"messages" => $frontend_general_messages,
	"common_messages" => $frontend_common_messages,
	"localizations" => array(
		"totoCisloNeniValidni" => __("Toto číslo není validní.","realsys"),
		"totoPscNeniValidni" => __("Toto PSČ není validní. Formát 123 45.","realsys"),
		"nahrajteSvujObrazek" => __("Nahrajte svůj obrázek","realsys"),
		"nacitani" => __("Načítání","realsys"),
		"uploadovani" => __("Uploadování","realsys"),
		"uspesneNahranoNaServer" => __("Úspěšně nahráno na server","realsys"),
		"zruseno" => __("Zrušeno","realsys"),
		"klepneteProZruseni" => __("Klepněte pro zrušení", "realsys"),
		"klepneteProOpakovani" => __("Klepněte pro opakování", "realsys")
	),
	"regexes" => array(
		'zip' => trim( REGEX_ZIP, "/" ),
		'tel' => trim( REGEX_TELEPHONE, "/" )
	)
);

require_once __DIR__ . "/configuration_images.php";

define("INVOICES_PATH","uploads/invoices/");
define("INVOICES_URL", home_url() . "/wp-content/uploads/invoices/");


define( "FRONTEND_IMAGES_PATH", get_template_directory_uri() . "/assets/images/images_frontend/" );

// předvolby telefonní

define( "PHONE", "(+48)" );

// RADIUS PRO PODOBNÉ INZERÁTY

define( "RADIUS", "0.73" );

// DATE FORMAT
define("DATE_FORMAT", "d.m.Y");


// DEFAULT WATERMARK
define("WATERMARK", __DIR__ . "/../../../assets/images/images_backend/watermark.png");
define("WATERMARK_RESIZE_FACTOR", 1);

$dispozice_options = array(
	__("1+KK", "realsys") => __("1+KK", "realsys"),
	__("1+1", "realsys") => __("1+1", "realsys"),
	__("2+1", "realsys") => __("2+1", "realsys"),
	__("3+1", "realsys") => __("3+1", "realsys"),
	__("4+1", "realsys") => __("4+1", "realsys"),
	__("5+1", "realsys") => __("5+1", "realsys"),
	__("Více než 6", "realsys") => __("Více než 6", "realsys"),
);


// FILTER PARAMETERS

$before24 = time() - 24*60*60;
$before_month = time() - 30*24*60*60;
$before_three_month = time() - 3*30*24*60*60;
$dispozice_filter_options = $dispozice_options;
$dispozice_filter_options[-1] = __("--Bez filtru--","realsys");

$filter_parameters = array(
	'db_typ_inzeratu' => array(
		'name' => __('Typ inzerátu',"realsys"),
		'type' => 'customswitcher',
		'values' => array()
	),
	'db_typ_stavby' => array(
		'name' => __("Typ stavby","realsys"),
		'type' => 'select',
		'values' => array()
	),
	'db_vybavenost' => array(
		'name' => __('Vybavenost',"realsys"),
		'type' => 'option',
		'values' => array()
	),
	'db_lokalita' => array(
		'name' => __('Lokalita',"realsys"),
		'type' => 'map-search',
		'values' => false,
		'class' => "js-autocomplete"
	),
	'db_cena' => array(
		'name' => __('Cena',"realsys"),
		'type' => 'slider',
		'values' => array(0,3000000)
	),
	'db_pocet_mistnosti' => array(
		'name' => __('Dispozice',"realsys"),
		'type' => 'select',
		'values' => $dispozice_filter_options
	),
	'db_podlahova_plocha' => array(
		'name' => __('Velikost',"realsys"),
		'type' => 'slider',
		'values' => array(0,255)
	),
	'db_datum_zalozeni' => array(
		'name' => __("Datum přidání inzerátu","realsys"),
		'type' => 'select-special',
		'values' => array(
			$before24 => array(
				'label' => __('Méně jak 24h',"realsys"),
				'operator' => '>'
			),
			$before_month => array(
				'label' => __('Méně jak 1 měsíc',"realsys"),
				'operator' => '>'
			),
			$before_three_month => array(
				'label' => __('Méně jak 3 měsíce',"realsys"),
				'operator' => '>'
			),
			-1 => array(
				'label' => __('--Bez filtru--',"realsys"),
				'operator' => '='
			)
		)
	),
	'db_balkon' => array(
		'name' => __("Balkón","realsys"),
		'type' => "checkbox",
		'values' => false
	),
	'db_garaz' => array(
		'name' => __("Garáž","realsys"),
		'type' => "checkbox",
		'values' => false
	),
	'db_vytah' => array(
		'name' => __("Výtah","realsys"),
		'type' => "checkbox",
		'values' => false
	),
	'db_terasa' => array(
		'name' => __("Terasa","realsys"),
		'type' => "checkbox",
		'values' => false
	),
	'db_parkovaci_misto' => array(
		'name' => __("Parkování","realsys"),
		'type' => "checkbox",
		'values' => false
	)
);

// FILTER HP PARAMETERS - filtery pro HP
$filter_hp_parameters = array(
	'db_typ_inzeratu',
	'db_pocet_mistnosti',
	'db_typ_stavby',
	'db_lokalita'
);


// CENIK TOPOVANI
$cenik = array(
	15 => 15,
	100 => 100,
	300 => 300,
	500 => 500,
	1000 => 1000
);

define("ALONE_CREDIT_PRICE", 1);


// Ceníky služeb
define("SLUZBA_HLIDACI_PES", 0);
define("SLUZBA_TOPOVANI_INZERATU", 1);

$cenik_sluzeb = array(
	0 => array(
		'id' => 0,
		'name' => __('Hlídací pes',"realsys"),
		'price' => 5
	),
	1 => array(
		'id' => 1,
		'name' => __('Topování inzerátu.',"realsys"),
		'logName' => __('Top inzerátu ID: %d',"realsys"),
		'price' => 6,
		'requireEntity' => true,
		'handleFunction' => "handleTopInzerat"
	),
	2 => array(
		'id' => 2,
		'name' => __('Zobrazení kontaktu',"realsys"),
		'logName' => __('Zobrazení kontaktu ID: %d',"realsys"),
		'price' => 1,
		'requireEntity' => true
	)
);

$patra_options = array(
	1 => __("1. patro", "realsys"),
	2 => __("2. patro", "realsys"),
	3 => __("3. patro", "realsys"),
	4 => __("4. patro", "realsys"),
	5 => __("5. patro", "realsys"),
	6 => __("6. patro", "realsys"),
	7 => __("7. patro", "realsys"),
	8 => __("8. patro", "realsys"),
	9 => __("9. patro", "realsys"),
	10 => __("10. patro", "realsys"),
	11 => __("11. patro", "realsys"),
	12 => __("12. patro", "realsys"),
	13 => __("13. patro", "realsys"),
	14 => __("14. patro", "realsys"),
	15 => __("15. patro", "realsys"),
);


$celkem_podlazi_options = array(
	1 => __("jednoho", "realsys"),
	2 => __("dvou", "realsys"),
	3 => __("tří", "realsys"),
	4 => __("čtyř", "realsys"),
	5 => __("pěti", "realsys"),
	6 => __("šesti", "realsys"),
	7 => __("sedmi", "realsys"),
	8 => __("osmi", "realsys"),
	9 => __("devíti", "realsys"),
	10 => __("deseti", "realsys"),
	11 => __("jedenácti", "realsys"),
	12 => __("dvanácti", "realsys"),
	13 => __("třinácti", "realsys"),
	14 => __("čtrnácti", "realsys"),
	15 => __("patnácti", "realsys"),
);


define("EXPORT_PATH", __DIR__ . "/../../../../../uploads/exports/");