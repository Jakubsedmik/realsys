<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="google-signin-client_id" content="<?php echo GOOGLE_ID; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="/realsys/wp-content/themes/realsys/assets/js/frontend_js/ico.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="body-wrapper">
    <?php get_template_part("templates/header","main"); ?>
