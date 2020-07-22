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

	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '917776338700849');
		fbq('track', 'PageView');
	</script>
	<noscript>
		 <img height="1" width="1"
		src="https://www.facebook.com/tr?id=917776338700849&ev=PageView
		&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>
<?php get_template_part("chat"); ?>
<?php wp_body_open(); ?>
<div class="body-wrapper">
    <?php get_template_part("templates/header","main"); ?>
