<?php
	$pes = $this->requestData['pes'];
?>

<section>
	<div class="hlidacipes">
		<div class="wrapper">
			<h1>Název: <?php echo $pes->db_jmeno_psa; ?></h1>
			<p>Podívejte se jaké Vám hlídací pes pohlídal nové inzeráty.</p>
			<?php
				echo $pes->zobrazInzeraty();
				$pes->obnovInzeraty();
			?>
		</div>
	</div>
</section>
