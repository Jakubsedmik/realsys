<section>
	<div class="wrapper">
		<h2>Změna hesla</h2>
		<p>Podařilo se nám Vás autorizovat. Nyní si můžete změnit heslo</p>
		<?php echo frontendError::getBackendErrors(); ?>
		<form class="js-validate-form" method="post">
			<div class="form-field">
				<label for="heslo">Zadejte nové heslo</label>
				<input type="password" name="db_heslo" id="heslo">
			</div>
			<div class="form-field">
				<label for="heslo2">Potvrdťe nové heslo</label>
				<input type="password" name="db_heslo2" id="heslo2">
			</div>
			<button class="btn" type="submit">Resetovat heslo</button>
		</form>
	</div>
</section>