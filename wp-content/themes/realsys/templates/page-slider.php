<section>
	<div class="slider">
		<div class="wrapper">
			<img class="obr-slider pozadi okno" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/okno.png" alt=""/>
			<img class="obr-slider pozadi lednice" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/lednice.png" alt=""/>

			<div class="slider-content">
				<div class="slider-title">
					<h1>
						<?php echo get_theme_mod("slider_text_1");?>
					</h1>
					<div class="subtitle">
						<h2>
							<?php echo get_theme_mod("slider_text_2");?>
						</h2>
						<a class="btn inzeruj" href="<?php echo get_theme_mod("slider_button_url"); ?>">
							<?php echo get_theme_mod("slider_button_text", "Přidat inzerát");?>
						</a>
					</div>

					<img class="obr-slider popredi lampicka" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/lampicka.png" alt=""/>
				</div>

				<div class="home-search">
					<form action="<?php echo Tools::getFERoute("vypis",false,"listing"); ?>" type="get">
						<?php Tools::getFrontendFilters(); ?>
						<button type="submit" class="btn submit-btn"><?php _e("Hledej inzerát", "realsys"); ?></button>
					</form>

					<!-- TODO LINK -->
					<a href="#" class="find-more-btn"><?php _e("Rozšířené hledání", "realsys"); ?></a>
				</div>
			</div>
			<img class="obr-slider popredi skrin" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/skrinka.png" alt=""/>
			<img class="obr-slider popredi lampa" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/lampa.png" alt=""/>
			<img class="obr-slider popredi kreslo" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/kreslo.png" alt=""/>
			<img class="obr-slider popredi vaza" src="<?php echo FRONTEND_IMAGES_PATH; ?>slider/vaza.png" alt=""/>
		</div>
	</div>
</section>