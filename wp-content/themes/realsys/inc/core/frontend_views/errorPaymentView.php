<section>
	<div class="payment-con">
		<div class="wrapper">
			<?php echo frontendError::getFrontendErrors(); ?>
			<h2>FAIL - objednávka nezaplacena</h2>
			<p>Objednávka nebyla zaplacena.</p>
			<a href="<?php echo Tools::getFERoute("gopay", $this->requestData['orderid'], 'payment') ?>" class="btn">Znovu k platbě</a>
		</div>
	</div>
</section>