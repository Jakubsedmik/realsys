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
	// Theme stylesheet.
	wp_enqueue_style( 's7-basic-style', get_stylesheet_uri() );
	wp_enqueue_style("mainFont","https://fonts.googleapis.com/css?family=Barlow+Condensed:700|Barlow:400,700|Poppins:400,500,600,700,800&display=swap&subset=latin-ext", array(), VERSION_LINKS);
	wp_enqueue_style("mainCss",get_template_directory_uri() . "/assets/styles/styles.css", array("mainFont", "icomoon", "bootstrapStyle"), VERSION_LINKS);
	wp_enqueue_style("icomoon", get_template_directory_uri() . "/assets/fonts/icomoon/style.css", array(), VERSION_LINKS);
	wp_enqueue_style("bootstrapStyle", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", array(), VERSION_LINKS);
    wp_enqueue_style("uploaderStyle", get_template_directory_uri() . "/assets/scripts/uploader/dist/css/jquery.dm-uploader.min.css", array("mainCss"), VERSION_LINKS);
    wp_enqueue_style("prettyCheckbox", get_template_directory_uri() . "/assets/styles/pretty-checkbox.min.css", array("mainCss"), VERSION_LINKS);
    wp_enqueue_style("popupStyles", get_template_directory_uri() . "/assets/styles/popups.css", array("mainCss"), VERSION_LINKS);
    wp_enqueue_style("lightboxStyles", get_template_directory_uri() . "/assets/scripts/simpleLightbox-master/simpleLightbox.min.css", array(), VERSION_LINKS);

    wp_deregister_script('jquery');
	wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.2.1.min.js", array(), VERSION_LINKS, true);
	wp_enqueue_script("popper", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array("jquery"), VERSION_LINKS, true);
	wp_enqueue_script("bootstrapScript", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array("popper"), VERSION_LINKS, true);

    wp_enqueue_script("uploader", get_template_directory_uri() . "/assets/scripts/uploader/src/js/jquery.dm-uploader.js", array("jquery"), VERSION_LINKS, true);
    wp_register_script("main", get_template_directory_uri() . "/assets/scripts/main.js", array("jquery", "sticky_menu"), VERSION_LINKS, true);
    wp_localize_script("main","serverData", array(
        "ajaxUrl"=>admin_url('admin-ajax.php'),
        "upload_size" => UPLOAD_SIZE,
        'ajax_nonce' => wp_create_nonce(GLOBAL_AJAX_NONCE)
        )
    );
    wp_enqueue_script("main");
    wp_enqueue_script("browser_image_compression", "https://cdn.jsdelivr.net/npm/browser-image-compression@1.0.5/dist/browser-image-compression.js", array("jquery"),VERSION_LINKS, true);
    wp_enqueue_script("jquery_form_validation", get_template_directory_uri() . "/assets/scripts/node_modules/jquery-validation/dist/jquery.validate.js", array("jquery", "main"),VERSION_LINKS, true);
    wp_enqueue_script("sticky_menu", get_template_directory_uri() . "/assets/scripts/stickymenu/jquery.sticky.js", array("jquery"),VERSION_LINKS, true);
    wp_enqueue_script("lightboxJs", get_template_directory_uri() . "/assets/scripts/simpleLightbox-master/simpleLightbox.min.js", array("jquery"),VERSION_LINKS, true);
    wp_enqueue_script("recaptcha", "https://www.google.com/recaptcha/api.js", array(), VERSION_LINKS, false);
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
 * Theme Supports
 */

add_theme_support("title_tag");
add_theme_support('custom-logo', array(
    'height'      => 57,
    'width'       => 215,
    'flex-height' => false,
));
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 700, 500,true);
add_theme_support( 'title-tag' );



/*
 * Nastavení mailu aby byl HTML
 */
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );



