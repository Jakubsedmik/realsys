<section>
	<div class="wrapper">
		<h2>Žádost o reset hesla</h2>
		<p>Zde můžete zažádat o resetování hesla</p>
		<?php echo frontendError::getBackendErrors(); ?>
	    <form class="js-validate-form" method="post" action="<?php echo Tools::getFERoute("uzivatelClass",false, "login") ?>">
		    <div class="form-field">
			    <label for="email">Zadejte emailovou adresu</label>
			    <input type="email" name="db_email_nocheck" id="email">
		    </div>
		    <button class="btn" type="submit" name="action" value="resetPassword">Resetovat heslo</button>
	    </form>
	</div>
</section>