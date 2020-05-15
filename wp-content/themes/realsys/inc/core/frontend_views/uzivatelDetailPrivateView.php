<?php

	$uzivatel = $this->workData['uzivatel'];
	$inzeraty  = $uzivatel->subobjects['inzeratClass'];
	$hlidaci_psi = $uzivatel->subobjects['hlidacipesClass'];
	$aktivniInzeraty = array_filter($inzeraty, function ($element, $index){
	    return $element->db_stav_inzeratu;
    }, ARRAY_FILTER_USE_BOTH);
	if(!is_array($inzeraty)) $inzeraty = array();

?>








<section class="profil">
<?php echo frontendError::getBackendErrors(); ?>
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-main-info text-center rounded-b shadow-sm p-20">
					<div class="profile-img-wrap" style="background-image: url(<?php echo $uzivatel->db_avatar; ?>)"></div>
					<h2 class="sz-tit mb-2"><?php echo $uzivatel->getFullName(); ?></h2>
					<p class="prof-kvalita"><?php echo __("Kvalita profilu ", "realsys"); ?><span class="prof-kvalit-value">100%</span></p>

				</div>
				<div class="profile-menu-wrap">
					<nav class="profile-menu">
						<ul>
							<li><a id="tab1" class="profile-menu-link active"><?php echo __("Můj profil", "realsys"); ?></a></li>
							<li><a id="tab2" class="profile-menu-link"><?php echo __("Moje peněženka", "realsys"); ?></a></li>
							<li><a id="tab3" class="profile-menu-link"><?php echo __("Moje inzeráty", "realsys"); ?></a></li>
							<li><a id="tab4" class="profile-menu-link"><?php echo __("Hlídací psi", "realsys"); ?></a></li>
							<li><a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "logOut"); ?>" class="profile-menu-link"><?php echo __("Odhlásit se", "realsys"); ?></a></li>
						</ul>
					</nav>
				</div>

			</div>
			<div class="col-lg-9">
				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab1C">
					<h1 class="sz-tit text-center mb-3 mt-3"><?php echo _e("Můj profil ", "realsys"); ?></h1>

					<!-- start profil view -->
					<div class="profil-view profil-main-content">
						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc sz-tip-desc"><?php echo _e("Szukamdom Tip:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<p class="sz-tip-txt"><?php echo _e("Čím viac informácii o sebe vyplníte, tým väčšia zaujímavejší je Váš profil pre tých, s ktorými ste v kontakte.", "realsys"); ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Základní údaje:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><?php echo _e("Jméno:", "realsys"); ?> <span class="profil-val"><?php echo $uzivatel->getFullName(); ?></span></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Další informace:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><?php echo __("E-mail:", "realsys"); ?> <span class="profil-val"><?php echo $uzivatel->db_email; ?></span></div>
									<div class="col-sm-6 correct"><?php echo __("Telefon:", "realsys"); ?> <span class="profil-val"><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></span></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Krátke bio:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col correct"><?php echo $uzivatel->db_popis; ?> </div>
								</div>
							</div>
						</div>

						<div class="line-separator"></div>
						<div class="d-flex justify-content-center mb-5">
							<a class="btn show-user-edit"><?php echo _e("Upravit profil", "realsys"); ?></a>
						</div>

					</div>
					<!-- end profil view -->

					<!-- start profil form -->
					<div class="profil-form profil-main-content">
						<form class="js-validate-form" method="post">
							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc sz-tip-desc"><?php echo _e("Szukamdom Tip:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<p class="sz-tip-txt"><?php echo _e("Čím viac informácii o sebe vyplníte, tým väčšia zaujímavejší je Váš profil pre tých, s ktorými ste v kontakte.", "realsys"); ?></p>
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
									<span class="input-desc"><?php echo _e("Základné údaje:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_jmeno'); ?>" name="db_jmeno" type="text" placeholder="<?php echo _e("Jméno", "realsys"); ?>"></div>
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_prijmeni'); ?>" name="db_prijmeni" type="text" placeholder="<?php echo _e("Příjmení", "realsys"); ?>"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc"><?php echo _e("Základné údaje:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_email'); ?>" name="db_email_nocheck" placeholder="<?php echo _e("Email", "realsys"); ?>"></div>
										<div class="col-sm-6 correct"><input class="input-outline" value="<?php echo $uzivatel->dejData('db_telefon'); ?>" name="db_telefon" type="tel" placeholder="<?php echo _e("Telefon", "realsys"); ?>"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3 profil-form-desc">
									<span class="input-desc"><?php echo _e("Krátke bio:", "realsys"); ?></span>
								</div>
								<div class="col-sm-9 profil-form-content">
									<div class="row">
										<div class="col correct"><textarea class="input-outline" name="db_popis" placeholder="<?php echo _e("Krátke bio", "realsys"); ?>"><?php echo $uzivatel->dejData('db_popis'); ?></textarea> </div>
									</div>
								</div>
							</div>

							<button type="submit" class="btn submit-btn auto-w" name="action" value="changeUserDetails"><?php _e( "Potvrdit změny", "realsys" ); ?></button>
						</form>



						<div class="security-hint-box">
							<div class="security-hint-box-wrap">

								<div class="row">
									<div class="col-sm">
										<h3><?php _e( "Zabezpečení účtu", "realsys" );?></h3>
										<p><?php _e( "Nastavte si dostatečně silné heslo k vašemu účtu.", "realsys" );?></p>
									</div>

									<div class="col-sm">
										<div class="change-pass-form">
											<form class="js-validate-form" method="post">
												<div class="row">
													<div class="col-sm">
														<label><?php _e( "Nové heslo", "realsys" );?></label>
														<div class="form-field">
															<input type="password" placeholder="*****" name="db_heslo" id="heslo">
														</div>
													</div>
													<div class="col-sm">
														<label><?php _e( "Potvrďte heslo", "realsys" );?></label>
														<div class="form-field">
															<input type="password" placeholder="*****" name="db_heslo2">
														</div>
													</div>
												</div>
												<button type="submit" class="btn submit-btn" name="action" value="changePassword"><?php _e( "Změnit heslo", "realsys" );?></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>




					</div>
					<!-- end profil form -->

				</div>

				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab2C">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php echo _e("Moje peněženka", "realsys"); ?></h1>
					<p class="text-center mb-sm-5"><span class="sz-tip-desc"><?php echo _e("Szukamdom Tip:", "realsys"); ?> </span><?php echo _e("Kredity môžete používať ako platitdlo za služby. Nevyužité kredity Vám vrátime naspäť.", "realsys"); ?> </p>



					<div class="kredity-box light-blue-bg rounded-b p-20">
						<div class="kred-wrap">
							<h3 class="kred-big"><span class="kred-value"><?php echo $uzivatel->getUserBillance(); ?></span> <?php echo _e("Kreditů", "realsys"); ?></h3>
							<div class="kred-btns">
								<a href="<?php echo Tools::getFERoute("objednavkaClass",false, "detail"); ?>" class="btn btn-big mb-2"><?php echo _e("Dobít kredity", "realsys"); ?></a>
								<a style="display:none;" href="#" class="u-link"><?php echo _e("Získat kredity zdarma", "realsys"); ?></a>
							</div>
						</div>
					</div>
					<h2 class="sz-tit text-center mb-4 mt-5"><?php echo _e("Historie transakcí", "realsys"); ?></h2>
					<div class="table-transakce mb-4 table-wrap">
						<table class="sz-table">
							<thead>
								<tr>
									<th>Dátum</th>
									<th>Položka</th>
									<th>Čiastka</th>
									<th>Poznámka</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>19.03.2020</td>
									<td>Dobitie 182 kreditov</td>
									<td class="price">200 PLN</td>
									<td><a href="#">Doklad</a></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za kontakt - <a href="#">inzerát č. 12345</a></td>
									<td class="kredit">1 Kredit</td>
									<td></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za službu - <a href="#">Lepšia zmluva pohľ. 12345</a></td>
									<td class="price">82 PLN</td>
									<td></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Dobitie 30 kreditov</td>
									<td class="price">30 PLN</td>
									<td><a href="#">Doklad</a></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za kontakt - <a href="#">inzerát č. 12345</a></td>
									<td class="kredit">1 Kredit</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>

				<div class="content-wrap rounded-b shadow-sm p-20 tab-sl-content" id="tab3C">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php echo _e("Moje inzeráty", "realsys"); ?></h1>
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
					<h1 class="sz-tit text-center mb-4 mt-3"><?php echo _e("Moji hlídací psi", "realsys"); ?></h1>

					<?php if(count($hlidaci_psi) > 0) : ?>
					    <section class="js-watchdogwrapper">
					        <div class="hlidaci_psi">
					            <div class="wrapper">
					                <?php foreach ($hlidaci_psi as $key => $value) : ?>
					                    <div class="hlidaciPes js-watchdog rounded-b shadow-sm p-20">
																<div class="row">
																	<div class="col-lg-6">
						                        <h3><a href="<?php echo Tools::getFERoute("hlidacipesClass",$value->getId(), "detail"); ?>"><?php _e( "Název:", "realsys" );?> <?php echo $value->db_jmeno_psa; ?></a></h3>
						                        <p><?php _e( "Poslední zobrazení:", "realsys" );?> <?php echo Tools::formatTime($value->db_posledni_zobrazeni);?> </p>
						                        <p><?php _e( "Počet nových inzerátů:", "realsys" );?> <strong><?php echo $value->db_nove_inzeraty_pocet; ?></strong> <?php _e( "inzerátů", "realsys" );?></p>
																	</div>
																		<div class="col-lg-6">
						                        <div class="premium-pes"><?php _e( "Je prémium:", "realsys" );?> <strong><?php echo ($value->db_premium ==1) ?  "Ano" : "Ne"; ?></strong> </div>
						                        <a href="#" class="btn js-send-request" data-post-action="removeWatchdog" data-post-id="<?php echo $value->getId(); ?>" data-post-user-id="<?php echo $uzivatel->getId(); ?>" data-finish="removePes" data-confirm="1"><?php _e( "Odstranit psa", "realsys" );?></a>
																	</div>
																</div>
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
