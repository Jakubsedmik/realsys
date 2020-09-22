<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="google-signin-client_id" content="<?php echo GOOGLE_ID; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<?php wp_head(); ?>

    <!-- GTM -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164036485-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-164036485-2');
    </script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164036485-3"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-164036485-3');
		</script>		


    <?php Pixel::initiatePixel(); ?>

</head>

<body <?php body_class(); ?>>
<?php get_template_part("chat"); ?>
<?php wp_body_open(); ?>
<div class="body-wrapper">
    <?php get_template_part("templates/header","main"); ?>
