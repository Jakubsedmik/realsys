<div class="container">
<!-- Material form register -->
<div class="card p-0 mw-100">

	<h5 class="card-header info-color white-text text-center py-4">
		<strong>Editace inzerátu</strong>
		<p class="mb-0 text-white">Zde můžete upravit inzerát</p>
        <a class="position-absolute admin-nav" href="<?php echo Tools::getRoute("inzeratClass"); ?>"><i class="fas fa-bars"></i> Zpět na výpis</a>
	</h5>

	<!--Card content-->
	<div class="card-body px-lg-5 pt-0">

		<!-- Form -->
		<form class="text-center" style="color: #757575;" action="<?php Tools::getCurrentUrl(); ?>" method="POST">
            <input type="hidden" name="db_id" value="<?php echo $this->viewData['inzerat']->getId(); ?>">

			<!-- Titulek -->
			<div class="md-form">
				<input type="text" id="db_titulek" name="db_titulek" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_titulek'); ?>">
				<label for="db_titulek">Titulek</label>
			</div>

			<!--Popisek-->
			<div class="md-form">
				<textarea id="db_popis" name="db_popis" class="md-textarea form-control"><?php echo $this->viewData['inzerat']->dejData('db_popis'); ?></textarea>
				<label for="db_popis">Popisek</label>
			</div>

            <!--Cena-->
            <div class="md-form">
                <input type="number" id="db_cena" name="db_cena" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_cena'); ?>">
                <label for="db_cena">Cena</label>
            </div>

            <!--Cena poznámka-->
            <div class="md-form">
                <input type="text" id="db_cena_poznamka" name="db_cena_poznamka" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_cena_poznamka'); ?>">
                <label for="db_cena_poznamka">Poznámka k ceně</label>
            </div>


			<!-- Typ nemovitosti -->
			<div class="md-form mt-0">
				<?php echo Tools::getSelectBoxForDials('inzeratClass', 'typ_nemovitosti', $this->viewData['inzerat']->db_typ_nemovitosti,'Typ nemovitosti', 'db_typ_nemovitosti'); ?>
			</div>

			<div class="form-row">
				<div class="col">
					<!-- Typ stavby -->
					<div class="md-form">
						<?php echo Tools::getSelectBoxForDials('inzeratClass', 'typ_stavby', $this->viewData['inzerat']->db_typ_stavby,'Typ stavby', 'db_typ_stavby'); ?>
					</div>
				</div>
				<div class="col">
					<!-- Typ inzerátu -->
					<div class="md-form">
						<?php echo Tools::getSelectBoxForDials('inzeratClass', 'typ_inzeratu', $this->viewData['inzerat']->db_typ_inzeratu,'Typ inzerátu', 'db_typ_inzeratu'); ?>
					</div>
				</div>
                <div class="col">
                    <!-- Penb -->
                    <div class="md-form">
						<?php echo Tools::getSelectBoxForDials('inzeratClass', 'penb', $this->viewData['inzerat']->db_penb,'PENB', 'db_penb'); ?>
                    </div>
                </div>
                <div class="col">
                    <!-- Typ vlastnictví -->
                    <div class="md-form">
						<?php echo Tools::getSelectBoxForDials('inzeratClass', 'typ_vlastnictvi', $this->viewData['inzerat']->db_typ_vlastnictvi,'Typ vlastnictví', 'db_typ_vlastnictvi'); ?>
                    </div>
                </div>
			</div>
			<div class="form-row">
				<div class="col">
					<!-- Počet místností -->
					<div class="md-form">
						<input type="text" id="pocet_mistnosti" name="db_pocet_mistnosti" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_pocet_mistnosti'); ?>" min="1">
						<label for="pocet_mistnosti">Počet místností</label>
					</div>
				</div>
				<div class="col">
					<!-- Patro -->
					<div class="md-form">
						<input type="number" id="db_patro" name="db_patro" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_patro'); ?>" min="0">
						<label for="db_patro">Patro</label>
					</div>
				</div>
			</div>

			<!-- Garáž, balkon, terasa, parkovaci misto, vytah -->
			<div class="form-row">
				<div class="col">
					<?php echo Tools::switcher("Ano","Ne", "Garáž", 1, "db_garaz", $this->viewData['inzerat']->db_garaz); ?>
				</div>

                <div class="col">
					<?php echo Tools::switcher("Ano","Ne", "Parkovací místo", 1, "db_parkovaci_misto", $this->viewData['inzerat']->db_parkovaci_misto); ?>
                </div>

				<div class="col">
					<?php echo Tools::switcher("Ano","Ne", "Balkón", 1, "db_balkon", $this->viewData['inzerat']->db_balkon); ?>
				</div>

                <div class="col">
					<?php echo Tools::switcher("Ano","Ne", "Terasa", 1, "db_terasa", $this->viewData['inzerat']->db_terasa); ?>
                </div>

                <div class="col">
					<?php echo Tools::switcher("Ano","Ne", "Výtah", 1, "db_vytah", $this->viewData['inzerat']->db_vytah); ?>
                </div>

			</div>

			<!-- Stav objektu -->
			<div class="md-form mt-2">
				<?php echo Tools::getSelectBoxForDials('inzeratClass', 'stav_objektu', $this->viewData['inzerat']->db_stav_objektu,'Stav objektu','db_stav_objektu'); ?>
			</div>

            <!-- Stav inzerátu -->
            <div class="md-form mt-2">
				<?php echo Tools::getSelectBoxForDials('inzeratClass', 'stav_inzeratu', $this->viewData['inzerat']->db_stav_inzeratu,'Stav inzerátu','db_stav_inzeratu'); ?>
            </div>

            <!-- Vybavenost -->
            <div class="md-form mt-2">
				<?php echo Tools::getSelectBoxForDials('inzeratClass', 'vybavenost', $this->viewData['inzerat']->db_vybavenost,'Vybavenost','db_vybavenost'); ?>
            </div>

            <!-- Materiál -->
            <div class="md-form mt-2">
				<?php echo Tools::getSelectBoxForDials('inzeratClass', 'material', $this->viewData['inzerat']->db_material,'Materiál','db_material'); ?>
            </div>

			<!-- Podlahová plocha -->
			<div class="md-form">
				<input type="number" id="db_podlahova_plocha" name="db_podlahova_plocha" class="form-control" min="10" value="<?php echo $this->viewData['inzerat']->dejData('db_podlahova_plocha'); ?>">
				<label for="db_podlahova_plocha">Podlahová plocha</label>
			</div>

			<!-- Pozemková plocha -->
			<div class="md-form">
				<input type="number" id="db_pozemkova_plocha" name="db_pozemkova_plocha" class="form-control" min="10" value="<?php echo $this->viewData['inzerat']->dejData('db_pozemkova_plocha'); ?>">
				<label for="db_pozemkova_plocha">Pozemková plocha</label>
			</div>

			<div class="form-row">
				<div class="col">
					<div class="md-form">
						<input type="number" id="db_lat" name="db_lat" class="form-control" min="0" max="90" step="0.000001" value="<?php echo $this->viewData['inzerat']->dejData('db_lat'); ?>">
						<label for="db_lat">Zeměpisná šířka</label>
					</div>
				</div>
				<div class="col">
					<div class="md-form">
						<input type="number" id="db_lng" name="db_lng" class="form-control" min="0" max="90" step="0.000001" value="<?php echo $this->viewData['inzerat']->dejData('db_lng'); ?>">
						<label for="db_lng">Zeměpisná výška</label>
					</div>
				</div>
			</div>

			<div class="preview-map" data-lat="<?php echo $this->viewData['inzerat']->dejData('db_lat');?>" data-lng="<?php echo $this->viewData['inzerat']->dejData('db_lng');?>">

            </div>

			<div class="form-row">
				<div class="col">
					<div class="md-form">
						<input type="text" id="db_ulice" name="db_ulice" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_ulice'); ?>">
						<label for="db_ulice">Ulice</label>
					</div>
				</div>
				<div class="col">
					<div class="md-form">
						<input type="text" id="db_mesto" name="db_mesto" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_mesto'); ?>">
						<label for="db_mesto">Město</label>
					</div>
				</div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="db_mestska_cast" name="db_mestska_cast" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_mestska_cast'); ?>">
                        <label for="db_mestska_cast">Městská část</label>
                    </div>
                </div>
				<div class="col">
					<div class="md-form">
						<input type="text" id="db_psc" name="db_psc" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_psc'); ?>">
						<label for="db_psc">PSČ</label>
					</div>
				</div>
				<div class="col">
					<div class="md-form">
						<input type="text" id="db_cp" name="db_cp" class="form-control" value="<?php echo $this->viewData['inzerat']->dejData('db_cp'); ?>">
						<label for="db_cp">ČP</label>
					</div>
				</div>
			</div>

			<div class="form-row">
                <div class="col">
				    <?php echo Tools::switcher("Ano","Ne", "Top", 1, "db_top", $this->viewData['inzerat']->db_top); ?>
                </div>
                <div class="col">
                    <div class="md-form">
						<?php
						$datumUpravy =  $this->viewData['inzerat']->db_datum_upravy;
						$datumUpravy = date("d.m.Y H:i:s", $datumUpravy);
						?>
                        <input placeholder="Vyberte datum" type="text" id="db_datum_upravy" name="db_datum_upravy" class="form-control" disabled value="<?php echo $datumUpravy; ?>">
                        <label for="db_datum_upravy">Datum a čas úpravy</label>
                    </div>

                </div>
                <div class="col">
                    <div class="md-form">
						<?php
						$mdbTime = Tools::getMdbNotationDate($this->viewData['inzerat']->db_datum_zalozeni);
						?>
                        <input placeholder="Vyberte datum" type="text" id="db_datum_zalozeni" name="datum_zalozeni" class="form-control datepicker" data-value="<?php echo $mdbTime; ?>">
                        <label for="db_datum_zalozeni">Datum vytvoření</label>
                    </div>
                </div>
			</div>

			<div class="form-row js-detail-button">
                <div class="col-10">
				    <?php echo Tools::getSelectBoxForEntities("uzivatelClass", $this->viewData['inzerat']->db_uzivatel_id, array('db_id', 'db_jmeno', 'db_prijmeni'),'Založil uživatel','db_uzivatel_id'); ?>
                </div>
                <div class="col-2">
                    <a href="<?php echo Tools::getRoute("uzivatelClass","edit",$this->viewData['inzerat']->db_uzivatel_id)?>" class="btn btn-sm btn-secondary btn-block">Detail</a>
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
<div class="app" id="addImages">
    <Obrazky
            inzerat_id="<?php echo $this->viewData['inzerat']->getId(); ?>"
            api_link="<?php echo AJAXURL; ?>"
            edit_link="<?php echo Tools::getRoute("obrazekClass","edit"); ?>"
    ></Obrazky>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw"
        async defer></script>