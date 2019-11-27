<?php 
define("VERSION_LINKS", "1.0");
session_start();

/*
 * Core load
 */
require_once (__DIR__ . "/inc/core/main.php");
require_once (__DIR__ . '/Realsys_menu.php');

/*
 * Základní styly a skripty do FE
 */
function s7_scripts_styles() {
	if(!DEPLOYMENT){

		// Pokud jsme na developmentu tak natahujeme všecko zvlášť abychom nemuseli spouštět bundler

		// CSS - kompiluje ho automaticky LESS Watcher (při změně, ale dist nevytváří, nutno sepnout GULP)
		wp_enqueue_style("main_css", site_url() . ASSETS_PATH . "css/css_frontend/src/main.css", array(), VERSION_LINKS);

		// JS
		wp_enqueue_script("main_js", site_url() . ASSETS_PATH . "js/js_frontend/src/main.js", array("jqeury_js"), VERSION_LINKS, true);
		wp_enqueue_script("jquery_js", site_url() . ASSETS_PATH . "js/js_frontend/src/jquery-3.4.1.js", array(), VERSION_LINKS, true);
	}else{

		// Vše se kompiluje skrze GULP - gulp frontend_styles, gulp frontend_scripts - tyto úlohy
		// packují všechno co se nachází v src a vytváří komplet file v dist

		// CSS
		wp_enqueue_style("main_css", site_url() . ASSETS_PATH . "css/css_frontend/dist/main.min.css", array(), VERSION_LINKS);

		// JS
		wp_enqueue_script("main_js", site_url() . ASSETS_PATH . "js/js_frontend/dist/main.min.js", array(), VERSION_LINKS, true);
	}
}

add_action( 'wp_enqueue_scripts', 's7_scripts_styles' );


/**
 * Detekuje provoz javascriptu v klientovi
 */
function s7_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 's7_javascript_detection', 0 );


/*
 * Customizace pomocí theme editoru v adminu
 */
function s7_theme_editor($wp_customize){

	// SEKCE
	$wp_customize->add_section( 'main_setting' , array(
		'title'      => __( 'Vlastní nastavení šablony', 'realsys' ),
		'priority'   => 30,
	) );

	// DATA
	$wp_customize->add_setting( 'slider_text_1' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'slider_text_2' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'slider_button_text' , array(
		'default'   => 'Přidat inzerát',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_title' , array(
		'default'   => 'NEPLAŤTE PROVIZI REALITCE,<br>KDYŽ NEMUSÍTE',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_subtitle' , array(
		'default'   => 'S námi je to snadné! Inzerujte zdarma a neplaťte provizi nám, ani realitnímu makléři.',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_button1_text' , array(
		'default'   => 'Přidat Inzerát',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_button2_text' , array(
		'default'   => 'Je to zdarma',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_button1_url' , array(
		'default'   => '/',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'cta_hp_button2_url' , array(
		'default'   => '/',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'top_nemovitosti_title' , array(
		'default'   => 'Top Nemovitosti',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'top_nemovitosti_nem_button_text' , array(
		'default'   => 'Více info',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'top_nemovitosti_next_ads_url' , array(
		'default'   => '/',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'top_nemovitosti_next_ads' , array(
		'default'   => 'Další inzeráty',
		'transport' => 'refresh',
	) );


	// KONTROLKY
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_text_1_control', array(
		'label'      => __( 'Text slider 1', 'realsys' ),
		'description' => __("Text - typicky najdi si nový domov bez reality a bez provize"),
		'section'    => 'main_setting',
		'settings'   => 'slider_text_1',
		'type' => 'textarea'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_text_2_control', array(
		'label'      => __( 'Text slider 2', 'realsys' ),
		'description' => __("Text - nebo inzeruj..."),
		'section'    => 'main_setting',
		'settings'   => 'slider_text_2',
		'type' => 'textarea'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_button_text_control', array(
		'label'      => __( 'Tlačítko ve slideru', 'realsys' ),
		'description' => __("Tlačítko přidat inzerát text"),
		'section'    => 'main_setting',
		'settings'   => 'slider_button_text'
	)));


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_title_control', array(
		'label'      => __( 'CTA Nadpis', 'realsys' ),
		'description' => __("Nadpis v CTA bloku"),
		'section'    => 'main_setting',
		'settings'   => 'cta_hp_title',
		'type' => 'textarea'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_subtitle_control', array(
		'label'      => __( 'CTA Podnadpis', 'realsys' ),
		'description' => __("Podnadpis v CTA bloku"),
		'section'    => 'cta_hp_subtitle',
		'settings'   => 'slider_button_text',
		'type' => 'textarea'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_button1_text_control', array(
		'label'      => __( 'CTA Tlačítko', 'realsys' ),
		'description' => __("Text CTA tlačítka"),
		'section'    => 'main_setting',
		'settings'   => 'cta_hp_button1_text'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_button2_text_control', array(
		'label'      => __( 'CTA Tlačítko 2', 'realsys' ),
		'description' => __("Text CTA tlačítka 2"),
		'section'    => 'main_setting',
		'settings'   => 'cta_hp_button2_text'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_button1_url_control', array(
		'label'      => __( 'CTA Tlačítko URL', 'realsys' ),
		'description' => __("URL prvního tlačítka"),
		'section'    => 'main_setting',
		'settings'   => 'cta_hp_button1_url'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_hp_button2_url_control', array(
		'label'      => __( 'CTA Tlačítko URL', 'realsys' ),
		'description' => __("URL druhého tlačítka"),
		'section'    => 'main_setting',
		'settings'   => 'cta_hp_button2_url'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_nemovitosti_title_control', array(
		'label'      => __( 'Top Nemovitosti nadpis', 'realsys' ),
		'description' => __("Nadpis sekce top nemovitosti"),
		'section'    => 'main_setting',
		'settings'   => 'top_nemovitosti_title'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_nemovitosti_nem_button_text_control', array(
		'label'      => __( 'Top Nemovitosti tlačítko', 'realsys' ),
		'description' => __("Top Nemovitosti text tlačítka na detail nemovitosti"),
		'section'    => 'main_setting',
		'settings'   => 'top_nemovitosti_nem_button_text'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_nemovitosti_next_ads_url_control', array(
		'label'      => __( 'Načíst další URL', 'realsys' ),
		'description' => __("Top Nemovitosti načíst další URL"),
		'section'    => 'main_setting',
		'settings'   => 'top_nemovitosti_next_ads_url'
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_nemovitosti_next_ads_control', array(
		'label'      => __( 'Načíst další', 'realsys' ),
		'description' => __("Top Nemovitosti - načíst další text"),
		'section'    => 'main_setting',
		'settings'   => 'top_nemovitosti_next_ads'
	)));

}
add_action("customize_register", "s7_theme_editor");



/*
 * Registrace menu do webu
 */
function s7_registrace_menu(){
    register_nav_menu("cms_header_menu","CMS menu v hlavičce webu");
	register_nav_menu("category_header_menu","Menu pro kategorie v hlavičce");
    /*register_nav_menu("paticka","Menu v patičce webu");
    register_nav_menu("doplnkoveMenu","Doplňkové menu - podmínky apod.");*/
}
add_action( 'after_setup_theme', 's7_registrace_menu' );

/*
 * Registrace widgetů
 */
register_sidebar(array(
	'id' => 'first_footer_col',
	'name' => 'Patička první sloupec',
	'description' => 'Footer sloupec 1',
	'class' => 'footer_block',
	'before_widget' => '<div class="footer_block">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'id' => 'second_footer_col',
	'name' => 'Patička druhý sloupec',
	'description' => 'Footer sloupec 2',
	'class' => 'footer_block',
	'before_widget' => '<div class="footer_block">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'id' => 'third_footer_col',
	'name' => 'Patička třetí sloupec',
	'description' => 'Footer sloupec 3',
	'class' => 'footer_block',
	'before_widget' => '<div class="footer_block">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'id' => 'fourth_footer_col',
	'name' => 'Patička čtvrtý sloupec',
	'description' => 'Footer sloupec 4',
	'class' => 'footer_block',
	'before_widget' => '<div class="footer_block">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));



/*
 * Odstranění auto P z widgetů
 */
remove_filter('widget_text_content', 'wpautop');


/*
 * Theme Supports & settings
 */

add_theme_support("title_tag");
add_theme_support('custom-logo', array(
    'width'       => 625,
    'flex-width' => false,
	'flex-height' => true
));
add_theme_support( 'post-thumbnails', array("post", "page"));
add_theme_support( 'html5' );
//add_theme_support( 'automatic-feed-links' );

set_post_thumbnail_size( 700, 500,true);

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

/* REMOVE EMOJIS */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



