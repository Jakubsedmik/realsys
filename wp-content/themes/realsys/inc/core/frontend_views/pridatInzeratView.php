<section>

    <div class="add-inz-con">
        <div class="wrapper">
            <?php
                echo frontendError::getFrontendErrors();
            ?>
            <div class="section-title">
                <h2>Vytváření inzerátu</h2>
                <h3 class="green-highlight">Do 5 minut</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id
                    accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
            </div>

            <div class="js-form-wrapper">

                <div class="row inz-nav tab-inz js-nav-tabs">
                    <div class="col-sm nav-box tab-inz-btn js-nav-link active">
                        <a href="#first" class="nav-box-wrap btn tablinks">
                            <span class="num">1</span>
                            <h2>Základní informace</h2>
                        </a>
                    </div>

                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#second" class="nav-box-wrap btn tablinks">
                            <span class="num">2</span>
                            <h2>Doplňující informace</h2>
                        </a>
                    </div>


                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#third" class="nav-box-wrap btn tablinks">
                            <span class="num">3</span>
                            <h2>Fotografie</h2>
                        </a>
                    </div>

                    <div class="col-sm nav-box tab-inz-btn js-nav-link">
                        <a href="#fourth" class="nav-box-wrap btn tablinks">
                            <span class="num">4</span>
                            <h2>Sumarizace</h2>
                        </a>
                    </div>

                </div>

				<div class="js-tabs">
	                <section id="first" class="inz-form-sec tabcontent inz-sec-1 active js-inz-tab">
		                <form class="js-partialValidation">
			                <div class="inz-box">
				                <h3><?php echo _e( "Typ inzerátu", "realsys" ); ?></h3>

				                <?php
				                $icons = array(
					                2 => 'flaticon-149-hand-gesture',
					                1 => 'flaticon-043-closing',
					                3 => 'flaticon-support',
				                )

				                ?>

				                <div class="row selects">

					                <?php
					                $dials = assetsFactory::getAllDials("inzeratClass","typ_inzeratu");
					                foreach ($dials as $key => $value) :
						                ?>
						                <div class="col-sm-3">
							                <label class="form-field">
								                <input type="radio" name="db_typ_inzeratu" value="<?php echo $value->db_value?>">
								                <div class="type-inz-div">
									                <div class="type-inz">
										                <i class="<?php echo $icons[$value->db_value]; ?> ico"></i><span class="sel-input-name"><?php echo $value->db_translation?></span>
									                </div>
								                </div>
							                </label>
						                </div>
					                <?php
					                endforeach;
					                ?>

				                </div>
			                </div>

			                <div class="inz-box">
				                <h3><?php echo _e( "Typ Nemovitosti", "realsys" ); ?></h3>

				                <?php
				                $icons = array(
					                0 => 'flaticon-070-real-estate-4',
					                1 => 'flaticon-021-sit-down',
					                2 => 'flaticon-115-picket',
					                3 => 'flaticon-136-book-bag',
					                4 => 'flaticon-046-storehouse'
				                )

				                ?>

				                <div class="row selects ico-smaller">

					                <?php
					                $dials = assetsFactory::getAllDials("inzeratClass","typ_stavby");
					                foreach ($dials as $key => $value) :
						                ?>

						                <div class="col-sm">
							                <label class="form-field">
								                <input type="radio" name="db_typ_stavby" value="<?php echo $value->db_value; ?>">
								                <div class="type-nem-div">
									                <div class="type-nem">
										                <i class="ico <?php echo $icons[$value->db_value]; ?>"></i><span class="sel-input-name"><?php echo $value->db_translation; ?></span>
									                </div>
								                </div>
							                </label>
						                </div>
					                <?php
					                endforeach;
					                ?>

				                </div>
			                </div>


		                    <div class="row">
		                        <div class="col-sm bigger-label">
		                            <div class="inz-box align-left">

		                                <div class="form-row">
			                                <div class="form-field">
		                                        <label>Místnosti</label>
		                                        <input type="text" placeholder="Změnít informaci" name="db_pocet_mistnosti">
			                                </div>
		                                </div>
		                                <div class="form-row">
			                                <div class="form-field">
		                                        <label>Ulice</label>
		                                        <input type="text" placeholder="Např. Jiráskova 15, Chomutov" name="db_ulice">
			                                </div>
		                                </div>
			                            <div class="form-row">
				                            <div class="form-field">
				                                <label>Číslo popisné</label>
				                                <input type="text" placeholder="Např. Jiráskova 15, Chomutov" name="db_cp">
				                            </div>
			                            </div>
			                            <div class="form-row">
				                            <div class="form-field">
				                                <label>Město</label>
				                                <input type="text" placeholder="Např. Jiráskova 15, Chomutov" name="db_mesto">
				                            </div>
			                            </div>
			                            <div class="form-row">
				                            <div class="form-field">
				                                <label>PSČ</label>
				                                <input type="text" placeholder="Např. Jiráskova 15, Chomutov" name="db_psc">
				                            </div>
			                            </div>
		                            </div>
		                        </div>

		                        <div class="col-sm col-spacer">

		                        </div>

		                        <div class="col-sm nazev-popis">
		                            <div class="inz-box align-left">
		                                <h3>Název a popis</h3>

		                                <div class="form-row">
			                                <div class="form-field">
		                                        <label>Název</label>
		                                        <input type="text" placeholder="Velký moderní dům v Jiráskově" name="db_titulek">
			                                </div>
		                                </div>
		                                <div class="form-row form-message">
			                                <div class="form-field">
		                                        <label>Popis</label>
		                                        <textarea placeholder="Prodávám tento krásný dům..." name="db_popis"></textarea>
			                                </div>
		                                </div>
			                            <div class="form-row">
				                            <div class="form-field">
					                            <label>Městská část</label>
					                            <input type="text" placeholder="Např. Jiráskova 15, Chomutov" name="db_mestska_cast">
				                            </div>
			                            </div>
		                            </div>
		                        </div>
		                    </div>

			                <div class="inz-box center-inz-box bigger-label">
				                <div class="form-row price-input">
					                <label><?php echo _e( "Cena nemovitosti", "realsys" ); ?></label>
					                <div class="currency-input">
						                <div class="form-field">
							                <input type="number" placeholder="100 000" step="1000" value="" name="db_cena">
						                </div>
						                <span class="currency"><?php echo CURRENCY; ?></span>
					                </div>
				                </div>
				                <div class="col-sm col-spacer"></div>
				                <div class="form-row">
					                <div class="form-field">
						                <label>Poznámka k ceně</label>
						                <input type="text" placeholder="Např. včetně poplatků" name="db_cena_poznamka">
					                </div>
				                </div>
			                </div>

		                    <div class="buttons-prevnext">
		                        <div class="inz-submit">
		                            <a class="btn js-next-tab">Pokračovat</a>
		                        </div>
		                    </div>
		                </form>
	                </section>

	                <section id="second" class="inz-form-sec tabcontent inz-sec-2 js-inz-tab">
		                <form class="js-partialValidation">
		                    <div class="inz-box">
		                        <h3>Typ stavby</h3>

		                        <div class="row selects">
			                        <?php
			                        $dials = assetsFactory::getAllDials("inzeratClass","material");
			                        foreach ($dials as $key => $value) :
			                        ?>
			                            <div class="col-sm basic-select">
				                            <label class="form-field">
					                            <input type="radio" name="db_material" value="<?php echo $value->db_value; ?>">
				                                <div class="select-box">
				                                    <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
				                                </div>
				                            </label>
			                            </div>
			                        <?php
			                            endforeach;
			                        ?>
		                        </div>
		                    </div>


		                    <div class="inz-box">
		                        <h3>Stav objektu</h3>

		                        <div class="row selects">

			                        <?php
			                        $dials = assetsFactory::getAllDials("inzeratClass","stav_objektu");
			                        foreach ($dials as $key => $value) :
				                        ?>
				                        <div class="col-sm basic-select">
					                        <label class="form-field">
						                        <input type="radio" name="db_stav_objektu" value="<?php echo $value->db_value; ?>">
						                        <div class="select-box">
							                        <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
						                        </div>
					                        </label>
				                        </div>
			                        <?php
			                        endforeach;
			                        ?>

		                        </div>
		                    </div>

			                <div class="inz-box">
				                <h3>Vybavenost</h3>

				                <div class="row selects">

					                <?php
					                $dials = assetsFactory::getAllDials("inzeratClass","vybavenost");
					                foreach ($dials as $key => $value) :
						                ?>
						                <div class="col-sm basic-select">
							                <label class="form-field">
								                <input type="radio" name="db_vybavenost" value="<?php echo $value->db_value; ?>">
								                <div class="select-box">
									                <span class="sel-input-name"><?php echo $value->db_translation; ?></span>
								                </div>
							                </label>
						                </div>
					                <?php
					                endforeach;
					                ?>

				                </div>
			                </div>


		                    <div class="row">
		                        <div class="col-sm bigger-label">
		                            <div class="inz-box align-left">

		                                <div class="form-row area-input">
		                                    <label>Plocha pozemku</label>
		                                    <div class="meters-input form-field">
			                                    <input type="number" name="db_podlahova_plocha" placeholder="100 000"><span class="area">m<sup>2</sup></span>
		                                    </div>
		                                </div>

		                                <div class="form-row area-input">
		                                    <label>Plocha objektu</label>
		                                    <div class="meters-input form-field">
			                                    <input type="number" name="db_pozemkova_plocha" placeholder="100 000"><span class="area">m<sup>2</sup></span>
		                                    </div>
		                                </div>


		                                <div class="form-row checks">
		                                    <h3>Vybavení</h3>
		                                    <label class="check-wrap">
			                                    <input id="zeroValue" type="hidden" value="0" name="db_terasa">
                                                <input type="checkbox" name="db_terasa" value="1">Terasa
		                                    </label>
			                                <label class="check-wrap">
				                                <input id="zeroValue" type="hidden" value="0" name="db_vytah">
				                                <input type="checkbox" name="db_vytah" value="1">Výtah
			                                </label>
		                                    <label class="check-wrap">
			                                    <input id="zeroValue" type="hidden" value="0" name="db_parkovaci_misto">
			                                    <input type="checkbox" name="db_parkovaci_misto" value="1">Parkování
		                                    </label>
		                                    <label class="check-wrap">
			                                    <input id="zeroValue" type="hidden" value="0" name="db_garaz">
			                                    <input type="checkbox" name="db_garaz" value="1">Garáž
		                                    </label>
		                                    <label class="check-wrap">
			                                    <input id="zeroValue" type="hidden" value="0" name="db_balkon">
			                                    <input type="checkbox" name="db_balkon" value="1">Balkon
		                                    </label>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="col-sm col-spacer">

		                        </div>

		                        <div class="col-sm bigger-label">
		                            <div class="inz-box align-left">

		                                <div class="form-row">
		                                    <label>Energetická hodnota</label>
			                                <?php $penb = assetsFactory::getAllDials("inzeratClass","penb"); ?>
		                                    <select name="db_penb">
												<?php foreach ($penb as $key => $value) : ?>
													<option value="<?php echo $value->db_value ?>"><?php echo $value->db_translation; ?></option>
			                                    <?php endforeach;?>
		                                    </select>
		                                </div>
		                                <div class="form-row">
		                                    <label>Vlastnictví</label>
			                                <?php $typ_vlastnictvi = assetsFactory::getAllDials("inzeratClass","typ_vlastnictvi"); ?>
			                                <select name="db_typ_vlastnictvi">
				                                <?php foreach ($typ_vlastnictvi as $key => $value) : ?>
					                                <option value="<?php echo $value->db_value ?>"><?php echo $value->db_translation; ?></option>
				                                <?php endforeach;?>
			                                </select>
		                                </div>

			                            <div class="form-row area-input">
				                            <label>Patro</label>
				                            <div class="meters-input form-field">
					                            <input type="number" name="db_patro" placeholder="2"><span class="area">poschodí</span>
				                            </div>
			                            </div>

		                            </div>
		                        </div>
		                    </div>

		                    <div class="buttons-prevnext">
		                        <div class="inz-submit">
		                            <a class="btn buttons-prevnext-a js-prev-tab">Zpět</a>
		                        </div>
		                        <div class="inz-submit ">
		                            <a class="btn buttons-prevnext-a js-next-tab">Pokračovat</a>
		                        </div>
		                    </div>
		                </form>
	                </section>


	                <section id="third" class="inz-form-sec tabcontent inz-sec-3 js-inz-tab">

		                <form class="js-partialValidation photo-required">
		                    <div class="inz-box">
		                        <h2>Fotografie</h2>
								<input type="hidden" value="<?php echo uzivatelClass::getUserLoggedId(); ?>" name="uzivatelid" id="uzivatel_id">
								<div class="js-add-inzerat-photos">
									<input type="file" name="files">
								</div>

		                    </div>


			                    <div class="inz-box js-loadedImages" style="display: none;">
			                        <h3>Vyberte náhledový obrázek</h3>

			                        <div class="row image-feed js-loadedImages-wrapper">
			                            <div class="col-sm-3 image-choose js-choose-image js-loadedImagePrototype image-prototype">
			                                <div class="image-choose-inside js-loadedImageItself"></div>
			                            </div>
			                        </div>
			                    </div>

				                <select id="inzerat_obrazky" multiple name="db_inzerat_obrazky[]" class="select-hidden"></select>
		                        <input type="number" name="db_obrazek_front" value="" id="obrazek_front" class="select-hidden">


		                    <div class="buttons-prevnext">
		                        <div class="inz-submit">
		                            <a class="btn buttons-prevnext-a js-prev-tab">Zpět</a>
		                        </div>
		                        <div class="inz-submit">
		                            <a class="btn buttons-prevnext-a js-next-tab js-transfer-to-prototype">Pokračovat</a>
		                        </div>
		                    </div>
		                </form>
	                </section>


	                <section id="fourth" class="inz-form-sec tabcontent inz-sec-4 js-inz-tab">

	                    <div class="inz-box align-left inz-show">

	                        <h2>Náhled přidaného inzerátu</h2>

	                        <div class="row">
	                            <div class="col-sm-4 nemovitost js-nem-prototype">

	                                <div class="nemovitost-wrapper">
	                                    <div class="nemovitost-image js-nem-prototype-image" style="background-image: url(img/nemovitosti/nem.jpeg); "></div>
	                                    <div class="nemovitost-text">
	                                        <h3><span class="js-nem-prototype-name">Praha - Nebušice, 6+1 222</span></h3>
	                                        <p class="js-nem-prototype-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem
	                                            consectetur, porta sapien. </p>

	                                        <div class="metaInfo-bar">
	                                            <div class="infoIco location">
	                                                <img src="<?php echo FRONTEND_IMAGES_PATH ?>/ikony/location.png" alt=""/><span class="metaTxt js-nem-prototype-location">Praha - Nebušice</span>
	                                            </div>
	                                            <div class="infoIco size">
	                                                <img src="<?php echo FRONTEND_IMAGES_PATH ?>/ikony/size.png" alt=""/><span class="metaTxt"><span class="js-nem-prototype-area">222</span>m<sup>2</sup></span>
	                                            </div>
	                                        </div>

	                                        <div class="price-bar">
	                                            <h4 class="price"><span class="js-nem-prototype-price">22 850</span> <?php echo CURRENCY; ?></h4>
	                                            <a class="btn more">Více info</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-sm col-spacer"></div>

	                            <div class="col-sm">

	                                <div class="topovani-wrap">
	                                    <h3>Chcete aby váš příspěvek měl větší pozornost?</h3>
	                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu sem et elit
	                                        fringilla auctor sed nec nunc. In urna tellus, malesuada mattis iaculis nec,
	                                        hendrerit euismod felis. Phasellus vitae lectus velit. Ut feugiat, turpis nec
	                                        laoreet aliquet, enim nisi mollis urna, in efficitur turpis orci quis odio.</p>

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
	                            <button type="button" class="btn nav-box-wrap js-finish">Dokončit</button>
	                        </div>
	                    </div>

	                </section>
				</div>
            </div>

        </div>
    </div>
</section>