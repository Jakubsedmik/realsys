<?php

	$uzivatel = $this->workData['uzivatel'];
	$inzeraty  = $uzivatel->subobjects['inzeratClass'];
	$hlidaci_psi = $uzivatel->subobjects['hlidacipesClass'];
	$aktivniInzeraty = array_filter($inzeraty, function ($element, $index){
	    return $element->db_stav_inzeratu;
    }, ARRAY_FILTER_USE_BOTH);
	if(!is_array($inzeraty)) $inzeraty = array();

	$transakce = $uzivatel->subobjects['transakceClass'];
    $objednavky = $uzivatel->subobjects['objednavkaClass'];
?>


<section class="profil">
<?php echo frontendError::getBackendErrors(); ?>
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-main-info text-center rounded-b shadow-sm p-20">
					<div class="profile-img-wrap" style="background-image: url(<?php echo $uzivatel->db_avatar; ?>)"></div>
					<h2 class="sz-tit mb-2"><?php echo $uzivatel->getFullName(); ?></h2>
					<p class="prof-kvalita"><?php _e("Kvalita profilu ", "realsys"); ?><span class="prof-kvalit-value">100%</span></p>

				</div>
				<div class="profile-menu-wrap">
					<nav class="profile-menu">
						<ul>
							<li><a id="tab1" class="profile-menu-link active"><?php echo __("Můj profil", "realsys"); ?></a></li>
							<li><a id="tab2" class="profile-menu-link"><?php echo __("Moje peněženka", "realsys"); ?></a></li>
							<li><a id="tab3" class="profile-menu-link"><?php echo __("Moje inzeráty", "realsys"); ?></a></li>
							<li><a id="tab4" class="profile-menu-link"><?php echo __("Hlídací psi", "realsys"); ?></a></li>
							<li><a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "logOut"); ?>" class="profile-menu-link"><?php _e("Odhlásit se", "realsys"); ?></a></li>
						</ul>
					</nav>
				</div>

			</div>
			<div class="col-lg-9">
				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab1C">
					<h1 class="sz-tit text-center mb-3 mt-3"><?php _e("Můj profil ", "realsys"); ?></h1>

					<!-- start profil view -->
					<div class="profil-view profil-main-content">
						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc sz-tip-desc"><?php _e("Szukamdom Tip:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<p class="sz-tip-txt"><?php _e("Čím více informací o sobě vyplníte, tím získáte lepší skóre.", "realsys"); ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php _e("Základní údaje:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><?php _e("Jméno:", "realsys"); ?> <span class="profil-val"><?php echo $uzivatel->getFullName(); ?></span></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php _e("Další informace:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><?php _e("E-mail:", "realsys"); ?> <span class="profil-val"><?php echo $uzivatel->db_email; ?></span></div>
									<div class="col-sm-6 correct"><?php _e("Telefon:", "realsys"); ?> <span class="profil-val"><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></span></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php _e("Krátke bio:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col correct"><?php echo $uzivatel->db_popis; ?> </div>
								</div>
							</div>
						</div>

						<div class="line-separator"></div>
						<div class="d-flex justify-content-center mb-5">
							<a class="btn show-user-edit"><?php _e("Upravit profil", "realsys"); ?></a>
						</div>

					</div>
					<!-- end profil view -->

					<!-- start profil form -->
					<div class="profil-form profil-main-content">
						<form class="js-validate-form" method="post">
							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc sz-tip-desc"><?php _e("Szukamdom Tip:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<p class="sz-tip-txt"><?php _e("Čím více informací o sobě vyplníte, tím získáte lepší skóre.", "realsys"); ?></p>
								</div>
							</div>

							<div class="row top-info">
								<div class="col-sm-12">
									<a href="#" class="edit-icon js-changeImage"><i class="fas fa-pen"></i></a>

									<div class="profile-img" style="background-image: url(<?php echo $uzivatel->dejData('db_avatar'); ?>)"></div>

								</div>
							</div>

							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc"><?php _e("Základné údaje:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_jmeno'); ?>" name="db_jmeno" type="text" placeholder="<?php _e("Jméno", "realsys"); ?>"></div>
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_prijmeni'); ?>" name="db_prijmeni" type="text" placeholder="<?php _e("Příjmení", "realsys"); ?>"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc"><?php _e("Základné údaje:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_email'); ?>" name="db_email_nocheck" placeholder="<?php _e("Email", "realsys"); ?>"></div>
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_telefon'); ?>" name="db_telefon" type="tel" placeholder="<?php _e("Telefon", "realsys"); ?>"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc"><?php _e("Krátke bio:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col correct"><textarea class="input-outline" name="db_popis" placeholder="<?php _e("Krátke bio", "realsys"); ?>"><?php echo $uzivatel->dejData('db_popis'); ?></textarea> </div>
									</div>
								</div>
							</div>

							<button type="submit" class="btn submit-btn auto-w" name="action" value="changeUserDetails"><?php _e( "Potvrdit změny", "realsys" ); ?></button>
						</form>
					</div>
					<!-- end profil form -->

				</div>

				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab2C">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php _e("Moje peněženka", "realsys"); ?></h1>
					<p class="text-center mb-sm-5"><span class="sz-tip-desc"><?php _e("Szukamdom Tip:", "realsys"); ?> </span><?php _e("Kredity můžete používat jako platidlo za služby. Nevyužité kredity Vám vrátíme zpět.", "realsys"); ?> </p>



					<div class="kredity-box light-blue-bg rounded-b p-20">
						<div class="kred-wrap">
							<h3 class="kred-big"><span class="kred-value"><?php echo $uzivatel->getUserBillance(); ?></span> <?php _e("Kreditov", "realsys"); ?></h3>
							<div class="kred-btns">
								<a href="<?php echo Tools::getFERoute("objednavkaClass",false, "detail"); ?>" class="btn btn-big mb-2"><?php _e("Dobít kredity", "realsys"); ?></a>
								<a style="display:none;" href="#" class="u-link"><?php _e("Získat kredity zdarma", "realsys"); ?></a>
							</div>
						</div>
					</div>
					<h2 class="sz-tit text-center mb-4 mt-5"><?php _e("Historie transakcí", "realsys"); ?></h2>
					<div class="table-transakce mb-4 table-wrap">
						<table class="sz-table">
							<thead>
								<tr>
									<th><?php _e("Datum", "realsys"); ?></th>
									<th><?php _e("Položka", "realsys"); ?></th>
									<th><?php _e("Množství kreditů", "realsys"); ?></th>
									<th><?php _e("Zaúčtováno", "realsys"); ?></th>
								</tr>
							</thead>
							<tbody>
                                <?php foreach ($transakce as $key => $value) :?>
								<tr>
									<td><?php echo Tools::formatTime($value->dejData("db_datum_zalozeni")); ?></td>
									<td><?php echo $value->dejData("db_nazev_sluzby"); ?></td>
									<td class="price"><?php echo $value->dejData("db_mnozstvi"); ?></td>
									<td><?php echo $value->dejData("db_accept") ? __("Ano","realsys") : __("Ne", "realsys"); ?></td>
								</tr>
                                <?php endforeach; ?>

							</tbody>
						</table>
					</div>

                    <h2 class="sz-tit text-center mb-4 mt-5"><?php _e("Historie objednávek", "realsys"); ?></h2>
                    <div class="table-transakce mb-4 table-wrap">
                        <table class="sz-table">
                            <thead>
                            <tr>
                                <th><?php _e("Datum", "realsys"); ?></th>
                                <th><?php _e("Množství", "realsys"); ?></th>
                                <th><?php _e("Cena", "realsys"); ?></th>
                                <th><?php _e("Zaplaceno", "realsys"); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($objednavky as $key => $value) :?>
	                            <tr>
		                            <td><?php echo Tools::formatTime($value->dejData("db_datum_zalozeni")); ?></td>
		                            <td><?php echo $value->dejData("db_mnozstvi"); ?></td>
		                            <td class="price"><?php echo Tools::convertCurrency($value->dejData("db_cena")); ?></td>
		                            <td><?php echo $value->dejData("db_stav") ? __("Ano","realsys") : __("Ne", "realsys"); ?></td>
	                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

				</div>

				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab3C">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php _e("Moje inzeráty", "realsys"); ?></h1>
					<?php if(count($inzeraty)>0) : ?>
						<section>
							<div class="top-nemovitosti">
								<div class="wrapper">
									<div class="nemovitost-rows-wrap app">

										<div class="section-title sides-align">
											<h3><?php _e( "Nemovitosti uživatele", "realsys" ); ?></h3>
											<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "add") ?>"><?php _e( "Vložit inzerát", "realsys" );?></a>
										</div>

										<?php
											$walker = new assetWalkerClass(
												"inzeratClass",
												"nem_row_item.php",
												1,
												6,
												'div',
												'',
												false,
												'top',
												"DESC",
												$inzeraty
											);
											$walker->walk(true);
										?>

										<div class="section-btn sides-align">
											<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "listing") ?>"><?php _e( "Všechny inzeráty", "realsys" );?></a>
											<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "add") ?>"><?php _e( "Vložit inzerát", "realsys" );?></a>
										</div>

									</div>
								</div>
							</div>
						</section>
					<?php endif; ?>
				</div>

				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab4C">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php _e("Moji hlídací psi", "realsys"); ?></h1>

					<?php if(count($hlidaci_psi) > 0) : ?>
					    <section class="js-watchdogwrapper">
					        <div class="hlidaci_psi">
					            <div class="wrapper">
					                <div class="section-title sides-align">
					                    <h2><?php _e( "Hlídací psi", "realsys" );?></h2>
					                </div>
					                <?php foreach ($hlidaci_psi as $key => $value) : ?>
					                    <div class="hlidaciPes js-watchdog">
					                        <h3><a href="<?php echo Tools::getFERoute("hlidacipesClass",$value->getId(), "detail"); ?>"><?php _e( "Název:", "realsys" );?> <?php echo $value->db_jmeno_psa; ?></a></h3>
					                        <p><?php _e( "Poslední zobrazení:", "realsys" );?> <?php echo Tools::formatTime($value->db_posledni_zobrazeni);?> </p>
					                        <div><?php _e( "Počet nových inzerátů:", "realsys" );?> <strong><?php echo $value->db_nove_inzeraty_pocet; ?></strong> <?php _e( "inzerátů", "realsys" );?></div>
					                        <div><?php _e( "Je prémium:", "realsys" );?> <?php echo ($value->db_premium ==1) ?  "Ano" : "Ne"; ?> </div>
					                        <a href="#" class="js-send-request" data-post-action="removeWatchdog" data-post-id="<?php echo $value->getId(); ?>" data-post-user-id="<?php echo $uzivatel->getId(); ?>" data-finish="removePes" data-confirm="1"><?php _e( "Odstranit psa", "realsys" );?></a>
					                    </div>
					                <?php endforeach; ?>
					            </div>
					        </div>
					    </section>
					<?php endif; ?>

				</div>


			</div>
		</div>
	</div>
	</div>
</section>


<div class="fullscreen-popup js-popup" id="addUserImage">
    <div class="fullscreen-popup--inner">
        <div class="fullscreen-popup--close js-closePopup"><i class="fas fa-times"></i> </div>
        <h2><?php _e( "Změna obrázku uživatele", "realsys" );?></h2>
        <div class="line-separator"></div>
        <p class="fullscreen-popup--paragraph"><?php _e( "Pro změnu obrázku nahrajte obrázek nový.", "realsys" );?></p>
        <div>
            <input type="hidden" name="uzivatel_id" id="uzivatel_id" value="<?php echo $uzivatel->getId(); ?>">
            <input type="file" class="my-pond" name="files"/>
        </div>
        <div class="js-uploadImageResult uploadImageResult">

        </div>
    </div>
</div>
