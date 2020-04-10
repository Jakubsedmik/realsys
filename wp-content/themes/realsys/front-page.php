<?php get_header() ?>

<?php
	get_template_part("templates/page","slider");
	get_template_part("templates/page", "topnemovitosti");
	get_template_part("templates/page", "cta");
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
		//
		// Post Content here
		//
	} // end while
} // end if

$hlidacipes = assetsFactory::createEntity("hlidacipesClass",array(
	'jmeno_psa' => "Muj pes",
	'posledni_inzeraty' => array(),
	'nastaveni_filtru' => array(
		new filterClass("podlahova_plocha",">",60)
	),
	'uzivatel_id' => 4,
	'premium' => 0
));

//$hlidacipes = assetsFactory::getEntity("hlidacipesClass",3);

$hlidacipes->cron_zkontrolujInzeraty();

//echo $hlidacipes->zobrazInzeraty();

//$hlidacipes->obnovInzeraty();


?>

<?php get_footer() ?>