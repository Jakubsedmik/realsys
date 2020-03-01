<?php invisibleRecaptchaClass::generateRecaptchaListeners(); ?>
<section>
	<div class="login-con">
		<div class="wrapper">
            <?php
                if(Tools::checkPresenceOfParam("create",$this->requestData)) :
            ?>
                <h2>Před vytvořením inzerátu se nejprve přihlašte</h2>
                <p>Pro vytvoření inzerátu je třeba být přihlášen nebo registrován. Následně Vás přesuneme hned na vytváření inzerátu.</p>
            <?php endif; ?>
			<div class="login-tabs">
				<div class="tab-header">
					<a href="#login-tab" class="login js-tab <?php if($this->requestData['action']!="registerUser") { echo "active";}?>"><img src="<?php echo FRONTEND_IMAGES_PATH; ?>/header/prihlaseni.png" alt=""/>
						<?php echo _e( "Přihlášení", "realsys" ); ?>
					</a>
					<a href="#signup-tab" class="signup js-tab <?php if($this->requestData['action']=="registerUser") { echo "active";}?>"><img src="<?php echo FRONTEND_IMAGES_PATH; ?>/header/registrace.png" alt=""/>
						<?php echo _e( "Registrace", "realsys" ); ?>
					</a>
				</div>

				<div class="tab-content <?php if($this->requestData['action']!="registerUser") { echo "hidden";}?>" id="signup-tab">
					<?php echo frontendError::getBackendErrors(); ?>

					<div class="row">
						<div class="col-sm">

							<form method="post" id="regForm" class="js-recaptchaForm js-validate-form">
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Jméno", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input required name="db_jmeno" type="text" placeholder="<?php echo _e( "Karel", "realsys" ); ?>" value="<?php echo $this->getPostData("db_jmeno"); ?>">
                                        </div>
									</div>
									<div class="form-col">
										<label><?php echo _e( "Příjmení", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input required name="db_prijmeni" type="text" placeholder="<?php echo _e( "Novák", "realsys" ); ?>" value="<?php echo $this->getPostData("db_prijmeni"); ?>">
                                        </div>
									</div>
									<div class="form-col">
										<label><?php echo _e( "Telefon", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input required name="db_telefon" type="tel" placeholder="<?php echo _e( "Telefon-syntax", "realsys" ); ?>" value="<?php echo $this->getPostData("db_telefon"); ?>">
                                        </div>
									</div>
									<div class="form-col">
										<label><?php echo _e( "Email", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input required name="db_email" type="email" placeholder="<?php echo _e( "Email-syntax", "realsys" ); ?>" value="<?php echo $this->getPostData("db_email"); ?>">
                                        </div>
									</div>
								</div>
								<div class="jakyUziv">
									<label><?php echo _e( "Jste:", "realsys" ); ?></label>
									<div class="radios">
										<div class="form-radio"><input type="radio" name="uzivatel" value="Uzivatel" checked> <?php echo _e( "Uživatel", "realsys" ); ?></div>
										<div class="form-radio"><input type="radio" name="uzivatel" value="Pravnicka osoba"> <?php echo _e( "Právnická osoba", "realsys" ); ?></div>
									</div>
								</div>

								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Heslo", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input required id="heslo" name="db_heslo" type="password" placeholder="********">
                                        </div>
									</div>
									<div class="form-col">
										<label><?php echo _e( "Zopakovat heslo", "realsys" ); ?></label>
                                        <div class="form-field">
										    <input name="db_heslo2" required type="password" placeholder="********">
                                        </div>
									</div>
								</div>

								<div class="form-btns">
                                    <input type="hidden" name="action" value="registerUser">
                                    <button type="submit" class="btn submit-btn g-recaptcha" id="captcha1">ZALOŽIT ÚČET</button>
                                    <a href="#" class="lost-pass underline-link"><?php echo _e( "Potřebujete poradit?", "realsys" ); ?></a>
								</div>
                                <div class="g-signin2" data-onsuccess="onSignIn"></div>
							</form>
						</div>

						<div class="col-sm registration-info">
							<h3><?php echo _e( "Informace k založení účtu", "realsys" ); ?></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel. Aliquam sollicitudin, purus et maximus fermentum, mauris ligula tristique mi, quis accumsan mauris velit ac nunc. Nulla porta enim ligula, quis viverra sapien sagittis id. Fusce malesuada viverra ullamcorper. Cras non orci condimentum, lobortis sapien vel, porta eros. Mauris eleifend cursus lacus, eu lobortis elit laoreet sed. Pellentesque lobortis nunc dictum, pulvinar augue in, pellentesque lectus.</p>
						</div>

					</div>
				</div>
				<div class="tab-content <?php if($this->requestData['action']=="registerUser") { echo "hidden";}?>" id="login-tab">
					<?php echo frontendError::getBackendErrors(); ?>
					<div class="row">
						<div class="col-sm">

							<form method="post">
								<input type="hidden" name="action" value="logIn">
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Přihlašovací email", "realsys" ); ?></label>
										<input required name="email" type="email" placeholder="<?php echo _e( "Email-syntax", "realsys" ); ?>">
									</div>
								</div>
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Heslo", "realsys" ); ?></label>
										<input required name="password" type="password" placeholder="********">
									</div>
								</div>

								<div class="stay-logged">
									<input type="checkbox" id="logged" name="login" checked> <?php echo _e( "Zůstat přihlášen", "realsys" ); ?>
								</div>

								<div class="form-btns">
									<button type="submit" class="btn submit-btn"><?php echo _e( "Přihlásit se", "realsys" ); ?></button>
									<a href="#" class="lost-pass underline-link"><?php echo _e( "Zapomenuté heslo?", "realsys" ); ?></a>

                                    <div class="g-signin2" data-onsuccess="onSignIn"></div>
								</div>
							</form>
						</div>

						<div class="col-sm login-info">
							<img src="<?php echo FRONTEND_IMAGES_PATH; ?>/slider/okno.png" alt=""/>
							<h3><?php echo _e( "Vítejte", "realsys" ); ?></h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.
							</p>
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
        <h2>Doplnění údajů</h2>
        <div class="line-separator"></div>
        <p class="fullscreen-popup--paragraph">Děkujeme za registraci prostřednictvím Google. Dokončete registraci doplněním zbylých údajů. Děkujeme</p>

        <form method="post" class="js-googleRegForm">
            <input type="hidden" name="jmeno" value="">
            <input type="hidden" name="prijmeni" value="">
            <input type="hidden" name="email" value="">
            <input type="hidden" name="token" value="">
            <input type="hidden" name="gid" value="">
            <input type="hidden" name="image" value="">
            <input type="hidden" name="action" value="googleRegistration">

            <div class="form-cols">
                <div class="form-col">
                    <label><?php echo _e( "Telefon", "realsys" ); ?></label>
                    <input name="telefon" required type="tel" placeholder="<?php echo _e( "Telefon-syntax", "realsys" ); ?>">
                </div>
                <div class="jakyUziv form-col">
                    <label><?php echo _e( "Jste:", "realsys" ); ?></label>
                    <div class="radios">
                        <div class="form-radio">
                            <input type="radio" name="typ" value="Uzivatel" checked> <?php echo _e( "Uživatel", "realsys" ); ?>
                        </div>
                        <div class="form-radio">
                            <input type="radio" name="typ" value="Pravnicka osoba"> <?php echo _e( "Právnická osoba", "realsys" ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-btns">
                <button type="submit" class="btn submit-btn"><?php echo _e( "Potvrdit", "realsys" ); ?></button>
            </div>

        </form>

    </div>
</div>