
<section>
	<div class="login-con">
		<div class="wrapper">
			<div class="login-tabs">
				<div class="tab-header">
					<a href="#login-tab" class="login active js-tab"><img src="<?php echo FRONTEND_IMAGES_PATH; ?>/header/prihlaseni.png" alt=""/>
						<?php echo _e( "Přihlášení", "realsys" ); ?>
					</a>
					<a href="#signup-tab" class="signup js-tab"><img src="<?php echo FRONTEND_IMAGES_PATH; ?>/header/registrace.png" alt=""/>
						<?php echo _e( "Registrace", "realsys" ); ?>
					</a>
				</div>

				<div class="tab-content hidden" id="signup-tab">
					<?php echo frontendError::getBackendErrors(); ?>
					<div class="row">
						<div class="col-sm">

							<form>
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Jméno", "realsys" ); ?></label>
										<input type="text" placeholder="<?php echo _e( "Karel", "realsys" ); ?>">
									</div>
									<div class="form-col">
										<label><?php echo _e( "Příjmení", "realsys" ); ?></label>
										<input type="text" placeholder="<?php echo _e( "Novák", "realsys" ); ?>">
									</div>
									<div class="form-col">
										<label><?php echo _e( "Telefon", "realsys" ); ?></label>
										<input type="tel" placeholder="<?php echo _e( "Telefon-syntax", "realsys" ); ?>">
									</div>
									<div class="form-col">
										<label><?php echo _e( "Email", "realsys" ); ?></label>
										<input type="email" placeholder="<?php echo _e( "Email-syntax", "realsys" ); ?>">
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
										<input type="password" placeholder="********">
									</div>
									<div class="form-col">
										<label><?php echo _e( "Zopakovat heslo", "realsys" ); ?></label>
										<input type="password" placeholder="********">
									</div>
								</div>

								<div class="form-btns">
									<input type="submit" class="btn submit-btn" value="ZALOŽIT ÚČET">
									<a href="#" class="lost-pass underline-link"><?php echo _e( "Potřebujete poradit?", "realsys" ); ?></a>
								</div>
							</form>
						</div>

						<div class="col-sm registration-info">
							<h3><?php echo _e( "Informace k založení účtu", "realsys" ); ?></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel. Aliquam sollicitudin, purus et maximus fermentum, mauris ligula tristique mi, quis accumsan mauris velit ac nunc. Nulla porta enim ligula, quis viverra sapien sagittis id. Fusce malesuada viverra ullamcorper. Cras non orci condimentum, lobortis sapien vel, porta eros. Mauris eleifend cursus lacus, eu lobortis elit laoreet sed. Pellentesque lobortis nunc dictum, pulvinar augue in, pellentesque lectus.</p>
						</div>

					</div>
				</div>
				<div class="tab-content" id="login-tab">
					<?php echo frontendError::getBackendErrors(); ?>
					<div class="row">
						<div class="col-sm">

							<form method="post">
								<input type="hidden" name="action" value="logIn">
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Přihlašovací jméno", "realsys" ); ?></label>
										<input name="email" type="text" placeholder="<?php echo _e( "Email-syntax", "realsys" ); ?>">
									</div>
								</div>
								<div class="form-cols">
									<div class="form-col">
										<label><?php echo _e( "Heslo", "realsys" ); ?></label>
										<input name="password" type="password" placeholder="********">
									</div>
								</div>

								<div class="stay-logged">
									<input type="checkbox" id="logged" name="login" checked> <?php echo _e( "Zůstat přihlášen", "realsys" ); ?>
								</div>

								<div class="form-btns">
									<button type="submit" class="btn submit-btn"><?php echo _e( "Přihlásit se", "realsys" ); ?></button>
									<a href="#" class="lost-pass underline-link"><?php echo _e( "Zapomenuté heslo?", "realsys" ); ?></a>
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