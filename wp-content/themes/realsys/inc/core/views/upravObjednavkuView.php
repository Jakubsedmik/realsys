<div class="container">
	<!-- Material form register -->
	<div class="card p-0 mw-100">

		<h5 class="card-header blue-gradient white-text text-center py-4">
			<strong>Editace objednávky</strong>
			<p class="mb-0 text-white">Zde můžete upravit objednávku</p>
            <a class="position-absolute admin-nav" href="<?php echo Tools::getRoute("objednavkaClass"); ?>"><i class="fas fa-bars"></i> Zpět na výpis</a>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5 pt-0">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" action="<?php Tools::getCurrentUrl(); ?>" method="POST">
				<input type="hidden" name="db_id" value="<?php echo $this->viewData['objednavka']->getId(); ?>">

				<!-- Cena-->
				<div class="md-form">
					<input type="number" id="db_cena" name="db_cena" class="form-control" value="<?php echo $this->viewData['objednavka']->dejData('db_cena'); ?>">
					<label for="db_cena">Cena</label>
				</div>
				<!-- Množství -->
				<div class="md-form">
					<input type="number" id="db_mnozstvi" name="db_mnozstvi" class="form-control" value="<?php echo $this->viewData['objednavka']->dejData('db_mnozstvi'); ?>">
					<label for="db_mnozstvi">Množství</label>
				</div>
				<!-- Připojený inzerát -->
				<?php echo Tools::getSelectBoxForEntities("inzeratClass", $this->viewData['objednavka']->db_inzerat_id, array('db_id', 'db_titulek'),'Inzerát','db_inzerat_id'); ?>

				<div class="form-row">
					<div class="col">
						<div class="md-form">
							<?php
							$datumUpravy =  $this->viewData['objednavka']->db_datum_upravy;
							$datumUpravy = date("d.m.Y H:i:s", $datumUpravy);
							?>
							<input placeholder="Vyberte datum" type="text" id="db_datum_upravy" name="db_datum_upravy" class="form-control" disabled value="<?php echo $datumUpravy; ?>">
							<label for="db_datum_upravy">Datum a čas úpravy</label>
						</div>

					</div>
					<div class="col">
						<div class="md-form">
							<?php
							$mdbTime = Tools::getMdbNotationDate($this->viewData['objednavka']->db_datum_zalozeni);
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw"
        async defer></script>