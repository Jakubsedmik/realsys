<div class="container">
	<!-- Material form register -->
	<div class="card p-0 mw-100">

		<h5 class="card-header peach-gradient white-text text-center py-4">
			<strong>Editace uživatele</strong>
			<p class="mb-0 text-white">Zde můžete upravit uživatele</p>
            <a class="position-absolute admin-nav" href="<?php echo Tools::getRoute("uzivatelClass"); ?>"><i class="fas fa-bars"></i> Zpět na výpis</a>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5 pt-0">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" action="<?php Tools::getCurrentUrl(); ?>" method="POST">
				<input type="hidden" name="db_id" value="<?php echo $this->viewData['uzivatel']->getId(); ?>">

				<div class="form-row mt-5">

                    <?php
                     $obr = $this->viewData['uzivatel']->dejData('db_avatar');
                    ?>
                    <div class="col-4 js-change-image-container">
                        <figure class="pr-3">
                            <input type="hidden" name="db_avatar" value="<?php echo $this->viewData['uzivatel']->dejData('db_avatar'); ?>" class="js-change-image-value">
                            <?php if($obr != null): ?>
                                <img src="<?php echo $this->viewData['uzivatel']->dejData('db_avatar'); ?>" class="img-fluid js-change-image-img">
                            <?php else: ?>
                                <img src="<?php echo BASE_URL . ASSETS_PATH . 'images/images_backend/default_profile.jpg'; ?>" class="img-fluid js-change-image-img">
                            <?php endif; ?>
                        </figure>
                        <button type="button" class="btn btn-primary btn-sm js-change-image">Upravit Avatar</button>
                    </div>


					<div class="col-8">
						<!-- Titulek -->
						<div class="md-form">
							<input type="text" id="db_jmeno" name="db_jmeno" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_jmeno'); ?>">
							<label for="db_jmeno">Jméno</label>
						</div>
                        <!--Popisek-->
                        <div class="md-form">
                            <input type="text" id="db_prijmeni" name="db_prijmeni" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_prijmeni'); ?>">
                            <label for="db_prijmeni">Příjmení</label>
                        </div>
                        <!--Email-->
                        <div class="md-form">
                            <input type="text" id="db_email" name="db_email" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_email'); ?>">
                            <label for="db_email">Email</label>
                        </div>
                        <!--Telefon-->
                        <div class="md-form">
                            <input type="text" id="db_telefon" name="db_telefon" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_telefon'); ?>">
                            <label for="db_telefon">Telefon</label>
                        </div>
					</div>


				</div>

				<!--Popisek-->
				<div class="md-form">
					<textarea id="db_popis" name="db_popis" class="md-textarea form-control"><?php echo $this->viewData['uzivatel']->dejData('db_popis'); ?></textarea>
					<label for="db_popis">Popis</label>
				</div>

				<!--Fb id-->
				<div class="md-form">
					<input type="text" id="db_fbid" name="db_fbid" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_fbid'); ?>">
					<label for="db_fbid">FB ID</label>
				</div>

				<!--Google id-->
				<div class="md-form">
					<input type="text" id="db_gmid" name="db_gmid" class="form-control" value="<?php echo $this->viewData['uzivatel']->dejData('db_gmid'); ?>">
					<label for="db_gmid">Google ID</label>
				</div>

				<?php echo Tools::switcher("Ano","Ne", "Stav", 1, "db_stav", $this->viewData['uzivatel']->db_stav); ?>



				<div class="form-row">
					<div class="col">
						<div class="md-form">
							<?php
							$datumUpravy =  $this->viewData['uzivatel']->db_datum_upravy;
							$datumUpravy = date("d.m.Y H:i:s", $datumUpravy);
							?>
							<input placeholder="Vyberte datum" type="text" id="db_datum_upravy" name="db_datum_upravy" class="form-control" disabled value="<?php echo $datumUpravy; ?>">
							<label for="db_datum_upravy">Datum a čas úpravy</label>
						</div>

					</div>
					<div class="col">
						<div class="md-form">
							<?php
                                $mdbTime = Tools::getMdbNotationDate($this->viewData['uzivatel']->db_datum_zalozeni);
							?>
							<input placeholder="Vyberte datum" type="text" id="db_datum_zalozeni" name="datum_zalozeni" class="form-control datepicker" data-value="<?php echo $mdbTime; ?>">
							<label for="db_datum_zalozeni">Datum vytvoření</label>
						</div>
					</div>
				</div>

				<!-- Sign up button -->
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="ulozit" value="1" type="submit">Upravit</button>


			</form>
			<!-- Form -->

		</div>

	</div>
	<!-- Material form register -->

</div>