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
					<form action="" type="get">
						<div class="customSel-wrapper typ-nemovitosti">
							<select name="typ-nemovitosti" class="select-hidden">
								<option value="byt">Byt</option>
								<option value="dum">Dům</option>
								<option value="pozemek">Pozemek</option>
								<option value="garaz">Garáž</option>
								<option value="kancelar">Kancelář</option>
								<option value="nebytovy-prostor">Nebytový prostor</option>
							</select>

							<div class="customSelect">
								<label><?php _e("Typ nemovitosti", "realsys"); ?></label>
								<div class="selectInput"><span class="inputVal">Rodinné domy</span><a class="small-arrow down"><span class="arrow-ico"></span></a></div>
								<div class="selectMenu">
									<span class="selectOption">Byt</span>
									<span class="selectOption">Dům</span>
									<span class="selectOption">Pozemek</span>
									<span class="selectOption">Garáž</span>
									<span class="selectOption">Kancelář</span>
									<span class="selectOption">Nebytový prostor</span>
								</div>
							</div>
						</div>
						<div class="customSel-wrapper typ-inzerátu">
							<select name="typ-nemovitosti" class="select-hidden">
								<option value="byt">Byt</option>
								<option value="dum">Dům</option>
								<option value="pozemek">Pozemek</option>
								<option value="garaz">Garáž</option>
								<option value="kancelar">Kancelář</option>
								<option value="nebytovy-prostor">Nebytový prostor</option>
							</select>

							<div class="customSelect">
								<label><?php _e("Typ inzerátu", "realsys"); ?></label>
								<div class="selectInput"><span class="inputVal">Rodinné domy</span><a class="small-arrow down"><span class="arrow-ico"></span></a></div>
								<div class="selectMenu">
									<span class="selectOption">Byt</span>
									<span class="selectOption">Dům</span>
									<span class="selectOption">Pozemek</span>
									<span class="selectOption">Garáž</span>
									<span class="selectOption">Kancelář</span>
									<span class="selectOption">Nebytový prostor</span>
								</div>
							</div>
						</div>

						<label><?php _e("Lokalita", "realsys"); ?></label>
						<input type="text" placeholder="<?php _e("Zadej svoje místo", "realsys"); ?>">

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