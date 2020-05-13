<?php

	$uzivatel = $this->workData['uzivatel'];
	$inzeraty  = $uzivatel->subobjects['inzeratClass'];
	$inzeraty = array_filter($inzeraty, function ($value, $key){
	    return $value->db_stav_inzeratu == 1;
    },ARRAY_FILTER_USE_BOTH);
	if(!is_array($inzeraty)) $inzeraty = array();

?>













<?php invisibleRecaptchaClass::generateRecaptchaListeners(); ?>
<section>
	<div class="profileInfo-con">
		<div class="wrapper">
			<div class="row top-info">
				<div class="col-sm-2">
					<div class="profile-img" style="background-image: url(<?php echo $uzivatel->db_avatar; ?>)"></div>
				</div>
				<div class="col-sm-4">
					<div class="basic-info">
						<h1 class="profile-name"><?php echo $uzivatel->getFullName(); ?></h1>
						<div class="info-row">
							<i class="fas fa-phone-alt"></i> <span class="phone"><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></span>
						</div>
						<div class="info-row">
							<i class="fas fa-envelope"></i> <span class="email"><?php echo $uzivatel->db_email; ?></span>
						</div>
						<div class="info-row">
							<i class="fas fa-bullhorn"></i> <span class="inzeraty"><strong><?php echo count($inzeraty); ?></strong> <?php _e( "Aktivních inzerátů", "realsys" ); ?></span>
						</div>

					</div>

				</div>
				<div class="col-sm-6">
					<div class="short-description">
						<h3><?php _e( "Popis", "realsys" ); ?></h3>
						<p><?php echo $uzivatel->db_popis; ?></p>
					</div>
				</div>
			</div>

			<div class="row moreInfo-separator">
				<div class="col-sm-2">
					<h3><?php _e( "Stav", "realsys" ); ?></h3>
				</div>
				<div class="col-sm">
					<div class="separator"> <div class="collapse-icon"><i class="fas fa-sort-down"></i></div> </div>
				</div>
			</div>

			<div class="row more-info collapsed">
				<div class="col-sm">
					<table class="info-table">
						<tbody>
						<tr>
							<th><?php _e( "Jméno", "realsys" ); ?></th><td><?php echo $uzivatel->db_jmeno; ?></td>
						</tr>
						<tr>
							<th><?php _e( "Příjmení", "realsys" ); ?></th><td><?php echo $uzivatel->db_prijmeni; ?></td>
						</tr>
						<tr>
							<th><?php _e( "Email", "realsys" ); ?></th><td><?php echo $uzivatel->db_email; ?></td>
						</tr>
						<tr>
							<th><?php _e( "Telefon", "realsys" ); ?></th><td><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm">
					<table class="info-table">
						<tbody>
						<tr>
							<th><?php _e( "Aktivní", "realsys" ); ?></th><td><?php echo Tools::translateBinaryValue($uzivatel->db_stav); ?></td>
						</tr>
						<tr>
							<th><?php _e( "Datum založení", "realsys" ); ?></th><td><?php echo Tools::formatTime($uzivatel->db_datum_zalozeni); ?></td>
						</tr>
						<tr>
							<th><?php _e( "Datum poslední úpravy", "realsys" ); ?></th><td><?php echo Tools::formatTime($uzivatel->db_datum_upravy); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</section>
<?php if(count($inzeraty)>0) : ?>
    <section>
        <div class="top-nemovitosti">
            <div class="wrapper">
                <div class="section-title">
                    <h2><?php _e( "Nemovitosti uživatele", "realsys" ); ?></h2>
                </div>

                <?php
                    $walker = new assetWalkerClass(
                        "inzeratClass",
                        "nem_item.php",
                        1,
                        6,
                        'div',
                        'row',
                        false,
                        'top',
                        "DESC",
                        $inzeraty

                    );
                    $walker->walk(true);
                ?>

                <div class="section-btn">
                    <a class="btn" href="#"><?php _e( "Další inzeráty", "realsys" ); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="mb-4">

	<div class="wrapper">
		<div class="contact-con">
			<h2><?php _e( "Kontaktní formulář", "realsys" ); ?></h2>

			<form method="post" class="js-validate-form js-recaptchaForm">
                <input type="hidden" name="action" value="sendMessage">
				<div class="row">
					<div class="col-sm">

						<div class="form-cols">
							<div class="form-col">
								<label><?php _e( "Jméno", "realsys" ); ?></label>
                                <div class="form-field">
								    <input required name="db_jmeno" type="text" placeholder="<?php _e( "Karel", "realsys" ); ?>">
                                </div>
							</div>
							<div class="form-col">
								<label><?php _e( "Příjmení", "realsys" ); ?></label>
                                <div class="form-field">
								    <input required name="db_prijmeni" type="text" placeholder="<?php _e( "Novák", "realsys" ); ?>">
                                </div>
							</div>
							<div class="form-col">
								<label><?php _e( "Telefon", "realsys" ); ?></label>
                                <div class="form-field">
								    <input required name="db_telefon" type="tel" placeholder="<?php _e( "Telefon-syntax", "realsys" ); ?>">
                                </div>
							</div>
							<div class="form-col">
								<label><?php _e( "Email", "realsys" ); ?></label>
                                <div class="form-field">
								    <input required name="db_email_nocheck" type="email" placeholder="<?php _e( "Email-syntax", "realsys" ); ?>">
                                </div>
							</div>
						</div>

					</div>

					<div class="col-sm form-message">
						<label><?php _e( "Zpráva", "realsys" ); ?></label>
                        <div class="form-field">
						    <textarea name="db_zprava" placeholder="<?php _e( "Vaše zpráva", "realsys" ); ?>"></textarea>
                        </div>
					</div>

				</div>

				<div class="form-btns">
					<button type="submit" class="btn submit-btn"><?php _e( "Odeslat zprávu", "realsys" ); ?></button>
					<a href="#" class="lost-pass underline-link"><?php _e( "Nepodařilo se odeslat?", "realsys" ); ?></a>
				</div>
			</form>

		</div>
	</div>


</section>
