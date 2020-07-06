<?php get_header() ?>

<?php
	$fakturoid = new fakturoidClass();
	$objednavka = assetsFactory::getEntity("objednavkaClass",24);

	//$fakturoid->generateAllInvoices();
	//$fakturoid->generateAllInvoicesPDF();
	//$fakturoid->removeAllInvoices();
	//$fakturoid->createInvoiceForOrder($objednavka, true, true);
	//$fakturoid->removeInvoice($objednavka);
	$fakturoid->clearUnusedPDFFiles();
	//var_dump($fakturoid->removeInvoice($objednavka));

	// TODO co se stane když se smaže objednávka? měla by se smazat asi i faktura ve fakturoidu - toto se musí doimplementovat na úrovni objednávky
	//$fakturoid->generateAllInvoicesPDF();

	//Tools::sendMail("newuser@localhost","Test",false, array("test","test"));
	//$uzivatel = assetsFactory::getEntity("uzivatelClass",2);
	//globalUtils::writeDebug($fakturoid->sendContact($uzivatel));


?>

<?php
	//get_template_part("templates/page","phaseone");
	get_template_part("templates/page","slider");
	//get_template_part("templates/page", "modal");
	get_template_part("templates/page", "cta");
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


