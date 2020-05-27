<?php get_header() ?>

<?php
	get_template_part("templates/page","phaseone");
	//get_template_part("templates/page","slider");
	//get_template_part("templates/page", "modal");
	//get_template_part("templates/page", "cta");
	//get_template_part("templates/page", "elements");
	//get_template_part("templates/page", "profil");
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

?>

<?php get_footer() ?>
