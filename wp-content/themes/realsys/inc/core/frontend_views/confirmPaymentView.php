<section>
	<div class="payment-con">
		<div class="wrapper">
			<?php echo frontendError::getFrontendErrors(); ?>
			<h2>OK - zaplaceno</h2>
			<p>
				Děkujeme za zaplacení objednávky níže je její rekapitulace
			</p>
			<ul>
				<li>Počet kreditů: <?php echo $this->requestData['objednavka']->db_mnozstvi; ?></li>
				<li>Cena: <?php echo Tools::convertCurrency($this->requestData['objednavka']->db_cena); ?></li>
				<li>Ve prospěch účtu: <?php echo $this->requestData['uzivatel']->getFullName(); ?></li>
			</ul>
			<a href="<?php echo Tools::getFERoute("uzivatelClass",uzivatelClass::getUserLoggedId()); ?>" class="btn">Zpět na svůj účet</a>
		</div>
	</div>
</section>