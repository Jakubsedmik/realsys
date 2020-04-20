<section>
	<div class="slider">
		<div class="wrapper">
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
				</div>

				<div class="home-search shadow-sm light-blue-bg rounded-b">
					<form action="<?php echo Tools::getFERoute("vypis",false,"listing"); ?>" type="get">
						<?php Tools::getFrontendFilters(); ?>
						<button type="submit" class="btn btn-big submit-btn"><?php _e("Hledej inzerát", "realsys"); ?></button>
					</form>

					<a href="<?php echo Tools::getFERoute("vypis", false, "map"); ?>" class="find-more-btn"><?php _e("Vyhledávání na mapě", "realsys"); ?></a>

				</div>
			</div>
		</div>
	</div>
</section>
