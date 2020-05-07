<section>

	<?php
        $options = new stdClass();

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

        ?>

    <div class="app">
        <Pridatinzerat
                :options="<?php echo Tools::prepareJsonToOutputHtmlAttr($options); ?>"
                :uzivatelid="<?php echo uzivatelClass::getUserLoggedId(); ?>"
                ajax_url="<?php echo AJAXURL; ?>"
                frontend_images_path="<?php echo FRONTEND_IMAGES_PATH; ?>"
                currency_code="<?php echo CURRENCY_CODE; ?>"
                lang_code="<?php echo LANG_CODE; ?>"
        ></Pridatinzerat>
    </div>

    <div class="add-inz-con" style="display: none;">
        <div class="wrapper">
			<?php
			echo frontendError::getFrontendErrors();
			?>
            <div class="section-title">
                <h1 class="sz-tit sm-h1">Vloženie inzerátu</h1>
            </div>

            <div class="js-form-wrapper">

                <div class="row inz-nav tab-inz js-nav-tabs">
                    <div class="col-sm nav-box tab-inz-btn js-nav-link active">
                        <a href="#first" class="nav-box-wrap btn tablinks">
                            <h2><?php echo _e( "1. Základní informace", "realsys" ); ?></h2>
                        </a>
                    </div>

                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#second" class="nav-box-wrap btn tablinks">
                            <h2><?php echo _e( "2. Doplňující informace", "realsys" ); ?></h2>
                        </a>
                    </div>


                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#third" class="nav-box-wrap btn tablinks">
                            <h2><?php echo _e( "3. Fotografie", "realsys" ); ?></h2>
                        </a>
                    </div>

                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#fourth" class="nav-box-wrap btn tablinks">
                            <h2><?php echo _e( "4. Sumarizace", "realsys" ); ?></h2>
                        </a>
                    </div>

                </div>

                <div class="js-tabs">
                    <section id="first"
                             class="inz-form-sec rounded-b shadow-big tabcontent inz-sec-1 active js-inz-tab">
                        <form class="js-partialValidation">
                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Typ inzerátu", "realsys" ); ?></h3>
                                    <div class="input-content">

                                        <div class="row selects">
											<?php
											$dials = assetsFactory::getAllDials( "inzeratClass", "typ_inzeratu" );
											foreach ( $dials as $key => $value ) :
												?>
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name"><?php echo $value->db_translation ?></span>
                                                        <input type="radio" name="db_typ_inzeratu"
                                                               value="<?php echo $value->db_value ?>">
                                                    </label>
                                                </div>
											<?php
											endforeach;
											?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Typ nemovitosti", "realsys" ); ?></h3>
                                    <div class="input-content">

                                        <div class="row selects ico-smaller">

											<?php
											$dials = assetsFactory::getAllDials( "inzeratClass", "typ_stavby" );
											foreach ( $dials as $key => $value ) :
												?>

                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
                                                        <input type="radio" name="db_typ_stavby"
                                                               value="<?php echo $value->db_value; ?>">
                                                    </label>
                                                </div>
											<?php
											endforeach;
											?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Dispozice", "realsys" ); ?></h3>
                                    <div class="single-val-form">
                                        <label class="form-field">
                                            <select name="db_dispozice">
                                                <option value="1+KK">1+KK</option>
                                                <option value="1+1">1+1</option>
                                                <option value="2+1">2+1</option>
                                                <option value="3+1">3+1</option>
                                                <option value="4+1">4+1</option>
                                                <option value="5+1">5+1</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Rozloha", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <input type="text" name="db_pozemkova_plocha" value="" class="input-outline"
                                                   placeholder="Užitková plocha" required>
                                        </label>
                                        <label class="form-field">
                                            <input type="text" name="db_podlahova_plocha" value="" class="input-outline"
                                                   placeholder="Podlahová plocha" required>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Poloha", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <input type="text" name="db_mesto" value="" class="input-outline"
                                                   placeholder="Město" required>
                                        </label>
                                        <label class="form-field">
                                            <input type="text" name="db_ulice" value="" class="input-outline"
                                                   placeholder="Ulice" required>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box center-inz-box bigger-label">
                                <div class="form-row price-input">
                                    <h3><?php echo _e( "Cena", "realsys" ); ?></h3>
                                    <div class="currency-input">
                                        <div class="form-field price-field">
                                            <input type="number" placeholder="Cena nájmu" step="1000" value=""
                                                   name="db_cena_najmu" class="input-outline" required>
                                            <span class="currency"><?php echo CURRENCY; ?> / měsíc</span>
                                        </div>

                                        <div class="form-field price-field">
                                            <input type="number" placeholder="Poplatky" step="1000" value=""
                                                   name="db_poplatky" class="input-outline" required>
                                            <span class="currency"><?php echo CURRENCY; ?> / měsíc</span>
                                        </div>

                                        <div class="form-field price-field">
                                            <input type="number" placeholder="Vratná záloha" step="1000" value=""
                                                   name="db_kauce" class="input-outline" required>
                                            <span class="currency"><?php echo CURRENCY; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="buttons-prevnext">
                                <div class="inz-submit">
                                    <a class="btn js-next-tab"><?php echo _e( "Pokračovat", "realsys" ); ?></a>
                                </div>
                            </div>
                        </form>
                    </section>

                    <section id="second" class="inz-form-sec tabcontent inz-sec-2 js-inz-tab">
                        <form class="js-partialValidation">

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "K dispozici od", "realsys" ); ?></h3>
                                    <div class="single-val-form">
                                        <label class="form-field">
                                            <input type="date" id="start" name="db_volny_od" class="input-outline"
                                                   value="2020-05-20" min="2020-05-14" max="2025-12-31">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box no-border v2">
                                <h3><?php echo _e( "Vybavenost", "realsys" ); ?></h3>

                                <div class="row selects">

									<?php
									$dials = assetsFactory::getAllDials( "inzeratClass", "vybavenost" );
									foreach ( $dials as $key => $value ) :
										?>
                                        <div class="col-sm basic-select">
                                            <label class="form-field">
                                                <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
                                                <input type="radio" name="db_vybavenost"
                                                       value="<?php echo $value->db_value; ?>">
                                            </label>
                                        </div>
									<?php
									endforeach;
									?>

                                </div>
                            </div>
                            <div class="inz-box no-border v2">
                                <h3><?php echo _e( "Vybavení", "realsys" ); ?></h3>
                                <div class="form-row checks">
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_terasa">
                                        <input type="checkbox" name="db_terasa" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Terasa", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_vytah">
                                        <input type="checkbox" name="db_vytah" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Výtah", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_parkovaci_misto">
                                        <input type="checkbox" name="db_parkovaci_misto" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Parkování", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_garaz">
                                        <input type="checkbox" name="db_garaz" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Garáž", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_balkon">
                                        <input type="checkbox" name="db_balkon" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Balkon", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_pivnice">
                                        <input type="checkbox" name="db_pivnice" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Pivnice", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_lednicka">
                                        <input type="checkbox" name="db_lednicka" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Lednička", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_pracka">
                                        <input type="checkbox" name="db_pracka" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Pračka", "realsys" ); ?></span>
                                    </label>
                                    <label class="check-wrap">
                                        <input id="zeroValue" type="hidden" value="0" name="db_mycka">

                                        <input type="checkbox" name="db_mycka" value="1">
                                        <span class="sel-input-name"><?php echo _e( "Myčka", "realsys" ); ?></span>
                                    </label>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Další vybavení", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <input type="text" name="db_dalsi_vybaveni" value="" class="input-outline"
                                                   placeholder="Další vybavení">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Poschodí", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <select name="db_poschodi">
                                                <option value="1. patro">1. patro</option>
                                                <option value="2. patro">2. patro</option>
                                                <option value="3. patro">3. patro</option>
                                                <option value="4. patro">4. patro</option>
                                                <option value="5. patro">5. patro</option>
                                                <option value="6. patro">6. patro</option>
                                                <option value="7. patro">7. patro</option>
                                                <option value="8. patro">8. patro</option>
                                                <option value="9. patro">9. patro</option>
                                                <option value="10. patro">10. patro</option>
                                                <option value="11. patro">11. patro</option>
                                                <option value="12. patro">12. patro</option>
                                                <option value="13. patro">13. patro</option>
                                                <option value="14. patro">14. patro</option>
                                                <option value="15. patro">15. patro</option>
                                            </select>
                                        </label>
                                        <span class="form-comment">z</span>
                                        <label class="form-field">
                                            <select name="db_poschodi_celkem">
                                                <option value="jednoho">jednoho</option>
                                                <option value="dvou">dvou</option>
                                                <option value="tří">tří</option>
                                                <option value="čtyř">čtyř</option>
                                                <option value="pěti">pěti</option>
                                                <option value="šesti">šesti</option>
                                                <option value="sedmi">sedmi</option>
                                                <option value="osmi">osmi</option>
                                                <option value="devíti">devíti</option>
                                                <option value="deseti">deseti</option>
                                                <option value="jedenácti">jedenácti</option>
                                                <option value="dvanácti">dvanácti</option>
                                                <option value="třinácti">třinácti</option>
                                                <option value="čtrnácti">čtrnácti</option>
                                                <option value="patnácti">patnácti</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <h3><?php echo _e( "Stav objektu", "realsys" ); ?></h3>
                                <div class="row selects">
									<?php
									$dials = assetsFactory::getAllDials( "inzeratClass", "stav_objektu" );
									foreach ( $dials as $key => $value ) :
										?>
                                        <div class="col-sm basic-select">
                                            <label class="form-field">
                                                <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
                                                <input type="radio" name="db_stav_objektu"
                                                       value="<?php echo $value->db_value; ?>">
                                            </label>
                                        </div>
									<?php
									endforeach;
									?>

                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Vlastnictví", "realsys" ); ?></h3>
                                    <div class="input-content">
										<?php $typ_vlastnictvi = assetsFactory::getAllDials( "inzeratClass", "typ_vlastnictvi" ); ?>
                                        <select name="db_typ_vlastnictvi">
											<?php foreach ( $typ_vlastnictvi as $key => $value ) : ?>
                                                <option value="<?php echo $value->db_value ?>"><?php echo $value->db_translation; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Typ stavby", "realsys" ); ?></h3>
                                    <div class="input-content">
										<?php $dials = assetsFactory::getAllDials( "inzeratClass", "material" ); ?>
                                        <select name="db_material">
											<?php foreach ( $dials as $key => $value ) : ?>
                                                <option value="<?php echo $value->db_value ?>"><?php echo $value->db_translation; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box align-left">
                                <div class="form-content">
                                    <h3><?php echo _e( "Energetická hodnota", "realsys" ); ?></h3>
                                    <div class="input-content">
										<?php $penb = assetsFactory::getAllDials( "inzeratClass", "penb" ); ?>
                                        <select name="db_penb">
											<?php foreach ( $penb as $key => $value ) : ?>
                                                <option value="<?php echo $value->db_value ?>"><?php echo $value->db_translation; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Byt je vhodný pro", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <input type="text" name="db_vhodny_pro" value="" class="input-outline"
                                                   placeholder="Např Mladý pár">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box">
                                <div class="form-content">
                                    <h3><?php echo _e( "Okolí nemovitosti", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <textarea name="db_okoli"
                                                      class="input-outline"><?php echo _e( "Popište, co se nachází v okolí nemovitosti...", "realsys" ); ?></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="inz-box no-border">
                                <div class="form-content">
                                    <h3><?php echo _e( "Doplňující popis", "realsys" ); ?></h3>
                                    <div class="input-content">
                                        <label class="form-field">
                                            <textarea name="db_popis"
                                                      class="input-outline"><?php echo _e( "Je ještě něco, co byste chtěli doplnit k inzerátu?", "realsys" ); ?></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="buttons-prevnext">
                                <div class="inz-submit">
                                    <a class="btn buttons-prevnext-a js-prev-tab"><?php echo _e( "Zpět", "realsys" ); ?></a>
                                </div>
                                <div class="inz-submit ">
                                    <a class="btn buttons-prevnext-a js-next-tab"><?php echo _e( "Pokračovat", "realsys" ); ?></a>
                                </div>
                            </div>
                        </form>
                    </section>


                    <section id="third" class="inz-form-sec tabcontent inz-sec-3 js-inz-tab">

                        <form class="js-partialValidation photo-required">
                            <div class="inz-box">
                                <h2><?php echo _e( "Fotografie", "realsys" ); ?></h2>
                                <input type="hidden" value="<?php echo uzivatelClass::getUserLoggedId(); ?>"
                                       name="uzivatelid" id="uzivatel_id">
                                <div class="js-add-inzerat-photos">
                                    <input type="file" name="files">
                                </div>

                            </div>


                            <div class="inz-box js-loadedImages" style="display: none;">
                                <h3><?php echo _e( "Vyberte náhledový obrázek", "realsys" ); ?></h3>

                                <div class="row image-feed js-loadedImages-wrapper">
                                    <div class="col-sm-3 image-choose js-choose-image js-loadedImagePrototype image-prototype">
                                        <div class="image-choose-inside js-loadedImageItself"></div>
                                    </div>
                                </div>
                            </div>

                            <select id="inzerat_obrazky" multiple name="db_inzerat_obrazky[]"
                                    class="select-hidden"></select>
                            <input type="number" name="db_obrazek_front" value="" id="obrazek_front"
                                   class="select-hidden">


                            <div class="buttons-prevnext">
                                <div class="inz-submit">
                                    <a class="btn buttons-prevnext-a js-prev-tab"><?php echo _e( "Zpět", "realsys" ); ?></a>
                                </div>
                                <div class="inz-submit">
                                    <a class="btn buttons-prevnext-a js-next-tab js-transfer-to-prototype"><?php echo _e( "Pokračovat", "realsys" ); ?></a>
                                </div>
                            </div>
                        </form>
                    </section>


                    <section id="fourth" class="inz-form-sec tabcontent inz-sec-4 js-inz-tab">

                        <div class="inz-box align-left inz-show">

                            <h2><?php echo _e( "Náhled přidaného inzerátu", "realsys" ); ?></h2>

                            <div class="row">
                                <div class="col-sm-4 nemovitost js-nem-prototype">

                                    <div class="nemovitost-wrapper">
                                        <div class="nemovitost-image js-nem-prototype-image"
                                             style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
                                        <div class="nemovitost-text">
                                            <h3><span class="js-nem-prototype-name">Praha - Nebušice, 6+1 222</span>
                                            </h3>
                                            <p class="js-nem-prototype-description">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Maecenas non sem
                                                consectetur, porta sapien. </p>

                                            <div class="metaInfo-bar">
                                                <div class="infoIco location">
                                                    <img src="<?php echo FRONTEND_IMAGES_PATH ?>/ikony/location.png"
                                                         alt=""/><span class="metaTxt js-nem-prototype-location">Praha - Nebušice</span>
                                                </div>
                                                <div class="infoIco size">
                                                    <img src="<?php echo FRONTEND_IMAGES_PATH ?>/ikony/size.png"
                                                         alt=""/><span class="metaTxt"><span
                                                                class="js-nem-prototype-area">222</span>m<sup>2</sup></span>
                                                </div>
                                            </div>

                                            <div class="price-bar">
                                                <h4 class="price"><span
                                                            class="js-nem-prototype-price">22 850</span> <?php echo CURRENCY; ?>
                                                </h4>
                                                <a class="btn more">Více info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm col-spacer"></div>

                                <div class="col-sm">

                                    <div class="topovani-wrap">
                                        <h3>Chcete aby váš příspěvek měl větší pozornost?</h3>
                                        <p></p>

                                        <div class="nemovitost-topovani">
                                            <h4>Vyzkoušejte topování</h4>
                                            <a class="btn ico-btn" href="#"><i class="fas fa-star"></i>Topovat</a>
                                            <a href="#" class="simple-link">Jak to funguje?</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="buttons-prevnext">
                            <div class="inz-submit">
                                <a class="btn buttons-prevnext-a js-prev-tab">Zpět</a>
                            </div>
                            <div class="inz-submit">
                                <input type="hidden" name="action" value="createInzerat">
                                <button type="button" class="btn js-finish">Dokončit</button>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

        </div>
    </div>
</section>