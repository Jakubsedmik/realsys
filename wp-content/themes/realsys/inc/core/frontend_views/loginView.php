<?php invisibleRecaptchaClass::generateRecaptchaListeners(); ?>
<section>
	<div class="login-con">
		<div class="wrapper">
			<?php
			if (Tools::checkPresenceOfParam("create", $this->requestData)) :
			?>
				<h2><?php echo __("Před vytvořením inzerátu se nejprve přihlašte", "realsys"); ?></h2>
				<p><?php echo __("Pro vytvoření inzerátu je třeba být přihlášen nebo registrován. Následně Vás přesuneme hned na vytváření inzerátu.", "realsys"); ?></p>
			<?php endif; ?>
			<div class="login-tabs rounded-b light-blue-bg">
				<div class="tab-header">
					<a href="#login-tab" class="login js-tab <?php if ($this->requestData['action'] != "registerUser") {
																	echo "active";
																} ?>">
						<?php echo _e("Přihlášení", "realsys"); ?>
					</a>
					<a href="#signup-tab" class="signup js-tab <?php if ($this->requestData['action'] == "registerUser") {
																	echo "active";
																} ?>">
						<?php echo _e("Registrace", "realsys"); ?>
					</a>
				</div>

				<div class="tab-content <?php if ($this->requestData['action'] != "registerUser") {
											echo "hidden";
										} ?>" id="signup-tab">
					<?php echo frontendError::getBackendErrors(); ?>

					<div class="row">
						<div class="col-sm">

							<form method="post" id="regForm" class="js-recaptchaForm js-validate-form">

								<div class="form-col">
									<label><?php echo _e("Email", "realsys"); ?></label>
									<div class="form-field">
										<input required name="db_email" type="email" placeholder="<?php echo _e("Email-syntax", "realsys"); ?>" value="<?php echo $this->getPostData("db_email"); ?>">
									</div>
								</div>

								<div class="form-col">
									<label><?php echo _e("Telefon", "realsys"); ?></label>
									<input name="db_telefon" required type="tel" placeholder="<?php echo _e("Telefon-syntax", "realsys"); ?>">
								</div>

								<div class="form-col">
									<label><?php echo _e("Jméno", "realsys"); ?></label>
									<input name="db_jmeno" required type="text" placeholder="<?php echo _e("Jméno-syntax", "realsys"); ?>">
								</div>

								<div class="form-col">
									<label><?php echo _e("Příjmení", "realsys"); ?></label>
									<input name="db_prijmeni" required type="text" placeholder="<?php echo _e("Prijmeni-syntax", "realsys"); ?>">
								</div>

								<div class="form-col">
									<label><?php echo _e("Heslo", "realsys"); ?></label>
									<div class="form-field">
										<input required id="heslo" name="db_heslo" type="password" placeholder="********">
									</div>
								</div>
								<div class="form-col">
									<label><?php echo _e("Zopakovat heslo", "realsys"); ?></label>
									<div class="form-field">
										<input name="db_heslo2" required type="password" placeholder="********">
									</div>
								</div>

								<p class="obch-podm"><?php echo __("Stisknutím tlačítka “Registrovat” vyjadřujete souhlas s ", "realsys"); ?> <a href="<?php echo home_url() . "/warunki-biznesowe/" ?>"><?php echo __("Obchodními podmínkami", "realsys"); ?></a> a <a href="<?php echo home_url() . "/gdpr/" ?>"><?php echo __("Zpracováním osobních údajů", "realsys"); ?></a></p>

								<div class="form-btns">
									<input type="hidden" name="action" value="registerUser">
									<button type="submit" class="btn submit-btn g-recaptcha" id="captcha1"><?php echo __("Registrovat", "realsys"); ?></button>
									<div class="g-signin2" data-onsuccess="onSignIn"></div>
								</div>

							</form>
						</div>

					</div>
				</div>
				<div class="tab-content <?php if ($this->requestData['action'] == "registerUser") {
											echo "hidden";
										} ?>" id="login-tab">
					<?php echo frontendError::getBackendErrors(); ?>
					<div class="row">
						<div class="col-sm">

							<form method="post">
								<input type="hidden" name="action" value="logIn">

								<div class="form-col input-wlabel">
									<label><?php echo _e("Přihlašovací email", "realsys"); ?>
										<input required name="email" type="email" placeholder="<?php echo _e("Email-syntax", "realsys"); ?>"></label>
								</div>

								<div class="form-col input-wlabel">
									<label><?php echo _e("Heslo", "realsys"); ?>
										<input required name="password" type="password" placeholder="********"></label>
								</div>
								<a href="#" class="lost-pass u-link"><?php echo _e("Zapomenuté heslo?", "realsys"); ?></a>

								<div class="stay-logged">
									<input type="checkbox" id="logged" name="login" checked> <?php echo _e("Zůstat přihlášen", "realsys"); ?>
								</div>

								<div class="form-btns">
									<button type="submit" class="btn submit-btn"><?php echo _e("Přihlásit se", "realsys"); ?></button>
									<div class="g-signin2" data-onsuccess="onSignIn"></div>
									<p class="ucet-nemam"><?php echo __("Nemáte ešte u nás účet?", "realsys"); ?> <a href="#"><?php echo __("Zaregistrujte sa", "realsys"); ?></a></p>


								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="fullscreen-popup js-popup" id="googleRegDetails">
	<div class="fullscreen-popup--inner">
		<div class="fullscreen-popup--close js-closePopup"><i class="fas fa-times"></i> </div>
		<h2><?php echo __("Doplnění údajů", "realsys"); ?></h2>
		<div class="line-separator"></div>
		<p class="fullscreen-popup--paragraph"><?php echo __("Děkujeme za registraci prostřednictvím Google. Dokončete registraci doplněním zbylých údajů. Děkujeme", "realsys"); ?></p>

		<form method="post" class="js-googleRegForm">
			<input type="hidden" name="jmeno" value="">
			<input type="hidden" name="prijmeni" value="">
			<input type="hidden" name="email" value="">
			<input type="hidden" name="token" value="">
			<input type="hidden" name="gid" value="">
			<input type="hidden" name="image" value="">
			<input type="hidden" name="action" value="googleRegistration">

			<div class="form-cols google-login">
				<div class="form-col">
					<label><?php echo _e("Telefon", "realsys"); ?></label>
					<input name="telefon" required type="tel" placeholder="<?php echo _e("Telefon-syntax", "realsys"); ?>">
				</div>
				<div class="form-col">
					<p class="obch-podm"><?php echo __("Stisknutím tlačítka “Registrovat” vyjadřujete souhlas s ", "realsys"); ?> <a href="<?php echo home_url() . "/warunki-biznesowe/" ?>"><?php echo __("Obchodními podmínkami", "realsys"); ?></a> a <a href="<?php echo home_url() . "/gdpr/" ?>"><?php echo __("Zpracováním osobních údajů", "realsys"); ?></a></p>
				</div>
			</div>
			<div class="form-btns">
				<button type="submit" class="btn submit-btn"><?php echo _e("Potvrdit", "realsys"); ?></button>
			</div>

		</form>

	</div>
</div>
