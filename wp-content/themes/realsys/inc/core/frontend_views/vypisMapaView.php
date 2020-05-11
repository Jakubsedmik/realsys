<section>
	<div class="slider_sub">
		<div class="wrapper">
			<div class="slider-content">
				<div class="slider-title-second">
					<h1><strong><?php _e("Výpis nemovitostí na mapě", "realsys"); ?></strong></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>

<div class="app">
	<VyhledavaniMapa
		assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
		apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
        home_url="<?php echo home_url(); ?>"
	></VyhledavaniMapa>
</div>


<section>
    <div class="cta neplatte sub">
        <div class="wrapper">
            <div class="row">
                <div class="col-8">
                    <h2><?php _e("Neplaťte provizi realitce,", "realsys"); ?><br> <?php _e("když nemusíte.", "realsys"); ?></h2>
                    <p><?php _e("S námi je to snadné! Inzerujte zdarma a neplaťte provizi nám, ani realitnímu makléři.", "realsys"); ?></p>
                </div>
                <div class="col-4 cta-btns">
                    <a class="btn bcg-btn" href="#"><?php _e("Přidat inzerát", "realsys"); ?></a>
                    <a class="btn free" href="#"><?php _e("Je to zdarma", "realsys"); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>