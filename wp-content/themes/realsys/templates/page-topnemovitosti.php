<section>
	<div class="top-nemovitosti">
		<div class="wrapper">
			<div class="section-title">
				<h2><?php echo get_theme_mod("top_nemovitosti_title"); ?></h2>
			</div>

            <?php
                $walker = new assetWalkerClass(
                        "inzeratClass",
                        "nem_item.php",
                        1,
                        6
                    );
                $walker->listenURL();
                $walker->walk(true);
            ?>

			<div class="section-btn">
				<a class="btn" href="<?php echo get_theme_mod("top_nemovitosti_next_ads_url"); ?>"><?php echo get_theme_mod("top_nemovitosti_next_ads"); ?></a>
			</div>

		</div>
	</div>
</section>