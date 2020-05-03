<!--section>
	<div class="cta neplatte">
		<div class="wrapper">
			<div class="row">
				<div class="col-8">
					<h2>
						tohle bude titulek //TODO
						<?php echo get_theme_mod("cta_hp_title"); ?>
					</h2>
					<p>
						<?php echo get_theme_mod("cta_hp_subtitle"); ?>
					</p>
				</div>
				<div class="col-4 cta-btns">
					<a class="btn bcg-btn" href="<?php echo get_theme_mod("cta_hp_button1_url"); ?>">
						<?php echo get_theme_mod("cta_hp_button1_text"); ?>
					</a>
					<a class="btn free" href="<?php echo get_theme_mod("cta_hp_button2_url"); ?>">
						<?php echo get_theme_mod("cta_hp_button2_text"); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section-->


<section>
	<div class="sluzby-sec">
		<div class="wrapper">
			<div class="sec-title text-center">
				<h2>Szukam Dom</h2>
			</div>

			<div class="row">
				<div class="col-md-4 sluzby-box">
					<div class="sluzby-cont shadow-sm bg-white rounded text-center">
						<img src="<?php echo FRONTEND_IMAGES_PATH; ?>/ikony/bulb.png" alt="">
						<h3><?php echo _e("Ako to funguje", "realsys"); ?></h3>
						<p><?php echo _e("Kto je Szukam Dom a prečo tento projekt vznikol.", "realsys"); ?></p>
						<a href="#" class="btn"><?php echo _e("O nás", "realsys"); ?></a>
					</div>
				</div>

				<div class="col-md-4 sluzby-box">
					<div class="sluzby-cont shadow-sm bg-white rounded text-center">
						<img src="<?php echo FRONTEND_IMAGES_PATH; ?>/ikony/sluzby.png" alt="">
						<h3><?php echo _e("Naše služby", "realsys"); ?></h3>
						<p><?php echo _e("Všetko, čo dokáže realitný maklér dokážete aj vy - a za zlomok ceny. My Vám s tým vieme pomôcť.", "realsys"); ?></p>
						<a href="#" class="btn"><?php echo _e("Naše služby", "realsys"); ?></a>
					</div>
				</div>

				<div class="col-md-4 sluzby-box">
					<div class="sluzby-cont shadow-sm bg-white rounded text-center">
						<img src="<?php echo FRONTEND_IMAGES_PATH; ?>/ikony/blog.png" alt="">
						<h3><?php echo _e("Blog", "realsys"); ?></h3>
						<p><?php echo _e("Zameriavame sa na long-form obsah pre Vás, aby ste našli všetky užitočné informácie.", "realsys"); ?></p>
						<a href="#" class="btn"><?php echo _e("Blog", "realsys"); ?></a>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
