<div class="border p-5 mr-3">
	<div class="container-fluid">
		<h1>
			<i class="fas fa-home"></i> Grafy a reporty
		</h1>
		<p class="lead">
			Kompletní analýza současných prodejů a nových inzerátů
		</p>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="p-2 bg-secondary">
					<h4 class="text-white text-center">Hodnota objednávek za posledních 30 dní</h4>
				</div>
				<?php
					echo $this->getGraph("zisk_obj", "Hodnota objednávek", "objednavkaClass", time() - 24 * 60 * 60 * 30, time(),"d.m.Y",'db_cena', 'line', 'rgba(170, 102, 204, 0.5)', '#aa66cc', 2);
				?>

			</div>
			<div class="col-sm-6">
				<div class="p-2 bg-primary">
					<h4 class="text-white text-center">Počet objednávek za posledních 30 dní</h4>
				</div>
				<?php
				echo $this->getGraph("pocet_obj", "Počet objednávek", "objednavkaClass", time() - 24 * 60 * 60 * 30, time(),"d.m.Y", false,'line', 'rgba(66, 133, 244, 0.5)', '#4285f4', 2 );
				?>

			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="p-2 bg-success">
					<h4 class="text-white text-center">Vytvořených inzerátů za posledních 30 dní</h4>
				</div>
				<?php
				echo $this->getGraph("pocet_inzr", "Počet inzerátů", "inzeratClass", time() - 24 * 60 * 60 * 30, time(),"d.m.Y", false,'line', 'rgba(0, 200, 81, 0.5)', '#00c851', 2);
				?>

			</div>

			<div class="col-sm-6">
				<div class="p-2 bg-success">
					<h4 class="text-white text-center">Vytvořených obrázků za posledních 30 dní</h4>
				</div>
				<?php
					echo $this->getGraph("pocet_obr", "Počet obrázků", "obrazekClass", time() - 24 * 60 * 60 * 30, time(),"d.m.Y" );
				?>

			</div>

		</div>

	</div>
</div>