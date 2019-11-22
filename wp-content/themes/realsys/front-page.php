<?php get_header() ?>

<?php
	get_template_part("templates/page","slider");
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
?>

<?php get_footer() ?>