<?php 
define("VERSION_LINKS", "1.0");
session_start();

/*
 * Core load
 */
require_once (__DIR__ . "/inc/core/main.php");

/*
 * Základní styly a skripty do FE
 */
function s7_scripts_styles() {
	if(DEPLOYMENT){
		wp_enqueue_style("main_css", site_url() . ASSETS_PATH . "css/css_frontend/src/main.css", array(), VERSION_LINKS);
		wp_enqueue_script("main_js", site_url() . ASSETS_PATH . "js/js_frontend/src/main.js", array(), VERSION_LINKS, true);
	}else{
		wp_enqueue_style("main_css", site_url() . ASSETS_PATH . "css/css_frontend/dist/main.min.css", array(), VERSION_LINKS);
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

}
add_action("customize_register", "s7_theme_editor");



/*
 * Registrace menu do webu
 */
function s7_registrace_menu(){
    /*register_nav_menu("hlavicka","Menu v hlavičce webu");
    register_nav_menu("paticka","Menu v patičce webu");
    register_nav_menu("doplnkoveMenu","Doplňkové menu - podmínky apod.");*/
}
add_action( 'after_setup_theme', 's7_registrace_menu' );




/*
 * Theme Supports & settings
 */

add_theme_support("title_tag");
add_theme_support('custom-logo', array(
    'height'      => 57,
    'width'       => 215,
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



