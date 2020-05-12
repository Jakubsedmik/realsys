<section>

	<?php
        $options = new stdClass();
        global $celkem_podlazi_options, $patra_options, $dispozice_options;

        $inzerat_translations = array(
            "poleJePovinne" => __("Toto pole je povinné", "realsys"),
            "zakladniInformace" => __("1. Základní informace", "realsys"),
            "doplnujiciInformace"=> __("2. Doplňující informace", "realsys"),
            "fotografie" => __("3. Fotografie", "realsys"),
            "sumarizace"=> __("4. Summarizace", "realsys"),
            "vlozeniInzeratu"=> __("Vložení inzerátu", "realsys"),
            "typInzeratu"=> __("Typ inzerátu", "realsys"),
            "typNemovitosti"=> __("Typ nemovitosti", "realsys"),
            "dispozice"=> __("Dispozice", "realsys"),
            "pokracovat"=> __("Pokračovat", "realsys"),
            "rozloha"=> __("Rozloha", "realsys"),
            "podlahovaPlocha"=> __("Podlahová plocha", "realsys"),
            "uzitkovaPlocha"=> __("Užitková plocha", "realsys"),
            "pozemkovaPlocha"=> __("Plocha pozemku", "realsys"),
            "poloha"=> __("Poloha", "realsys"),
            "mesto"=> __("Město", "realsys"),
            "ulice"=> __("Ulice", "realsys"),
            "cp"=> __("Číslo popisné", "realsys"),
            "psc"=> __("PSČ", "realsys"),
            "cena"=> __("Cena", "realsys"),
            "cenaNajmu"=> __("Cena nájmu", "realsys"),
            "poplatky"=> __("Poplatky", "realsys"),
            "kauce"=> __("Kauce", "realsys"),
            "mesic"=> __("měsíc", "realsys"),
            "kDispoziciOd"=> __("K dispozici od", "realsys"),
            "vybavenost"=> __("Vybavenost", "realsys"),
            "vybaveni"=> __("Vybavení", "realsys"),
            "terasa"=> __("Terasa", "realsys"),
            "vytah"=> __("Výtah", "realsys"),
            "parkovani"=> __("Parkování", "realsys"),
            "garaz"=> __("Garáž", "realsys"),
            "balkon"=> __("Balkon", "realsys"),
            "dalsiVybaveni"=> __("Další vybavení", "realsys"),
            "poschodi"=> __("Poschodí", "realsys"),
            "z"=> __("z", "realsys"),
            "stavObjektu"=> __("Stav objektu", "realsys"),
            "vlastnictvi"=> __("Vlastnictví", "realsys"),
            "typStavby"=> __("Typ stavby", "realsys"),
            "energetickaHodnota"=> __("Energetická hodnota", "realsys"),
            "bytVhodnyPro"=> __("Byt je vhodný pro", "realsys"),
            "mladyPar"=> __("Např. mladý pár", "realsys"),
            "okoliNemovitosti"=> __("Okolí nemovitosti", "realsys"),
            "popisteOkoli"=> __("Popište, co se nachází v okolí nemovitosti...", "realsys"),
            "doplnujiciPopis"=> __("Doplňující popis", "realsys"),
            "doplntePopis"=> __("Je ještě něco, co byste chtěli doplnit k inzerátu?", "realsys"),
            "zpet"=> __("Zpět", "realsys"),
            "fotografie2"=> __("Fotografie", "realsys"),
            "vyberteNahledovyObrazek"=> __("Vyberte náhledový obrázek", "realsys"),
            "nahledPridanehoInzeratu"=> __("Náhled přidaného inzerátu", "realsys"),
            "viceInfo"=> __("Více info", "realsys"),
            "chceteAbyVasPrispevek"=> __("Chcete aby váš příspěvek měl větší pozornost?", "realsys"),
            "textPozornost"=> __("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lorem sit amet nulla auctor varius vel at ipsum. Praesent placerat, nisl sit amet interdum ornare, lectus odio vestibulum nibh, sed iaculis nisl dolor pellentesque libero.", "realsys"),
            "vyzkousejteTopovani"=> __("Vyzkoušejte topování", "realsys"),
            "jakToFunguje"=> __("Jak to funguje?", "realsys"),
            "topovat"=> __("Topovat", "realsys"),
            "dokoncit"=> __("Dokončit", "realsys"),
            "processing"=> __("Soubor je zpracováván", "realsys"),
            "processingComplete"=> __("Nahrávání dokončeno", "realsys"),
            "processingAborted"=> __("Nahrávání zrušeno", "realsys"),
            "processingError"=> __("Chyba při nahrávání", "realsys"),
            "tapCancel"=> __("Klikněte pro zrušení", "realsys"),
            "tapRetry"=> __("Klikněte pro opakování", "realsys"),
            "tapUndo"=> __("Klikněte pro vrácení", "realsys"),
            "abortProcessing"=> __("Zrušit", "realsys"),
            "processItem" => __("Nahrát", "realsys"),
            "titulekInzeratu"=> __("Titulek inzerátu", "realsys"),
            "mestskaCast"=> __("Městská část", "realsys"),
            "prochazet" => __(" Procházet", "realsys"),
            "nahrajteNovy" => __("Nahrajte nový obrázek (maximálně 10 v jednu chvíli)","realsys")
        );


        $typ_inzeratu = assetsFactory::getAllDials( "inzeratClass", "typ_inzeratu" );
	    $typ_stavby = assetsFactory::getAllDials( "inzeratClass", "typ_stavby" );
	    $vybavenost = assetsFactory::getAllDials( "inzeratClass", "vybavenost" );
	    $stav_objektu = assetsFactory::getAllDials( "inzeratClass", "stav_objektu" );
	    $typ_vlastnictvi = assetsFactory::getAllDials( "inzeratClass", "typ_vlastnictvi" );
	    $material = assetsFactory::getAllDials( "inzeratClass", "material" );
	    $penb = assetsFactory::getAllDials( "inzeratClass", "penb" );


	    $options->typ_inzeratu = $typ_inzeratu;
        $options->typ_stavby = $typ_stavby;
	    $options->vybavenost = $vybavenost;
	    $options->stav_objektu = $stav_objektu;
	    $options->typ_vlastnictvi = $typ_vlastnictvi;
	    $options->material = $material;
	    $options->penb = $penb;
	    $options->patro = $patra_options;
	    $options->celkem_podlazi = $celkem_podlazi_options;
	    $options->dispozice = $dispozice_options;

        ?>

    <div class="app">
        <Pridatinzerat
                :options="<?php echo Tools::prepareJsonToOutputHtmlAttr($options); ?>"
                :uzivatelid="<?php echo uzivatelClass::getUserLoggedId(); ?>"
                :translations="<?php echo Tools::prepareJsonToOutputHtmlAttr($inzerat_translations); ?>"
                ajax_url="<?php echo AJAXURL; ?>"
                frontend_images_path="<?php echo FRONTEND_IMAGES_PATH; ?>"
                currency_code="<?php echo CURRENCY_CODE; ?>"
                lang_code="<?php echo LANG_CODE; ?>"
                currency="<?php echo CURRENCY; ?>"
                v-cloak
        ></Pridatinzerat>
    </div>

</section>