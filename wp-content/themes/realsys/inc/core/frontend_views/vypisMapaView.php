<section>
	<div class="slider_sub">
		<div class="wrapper">
			<div class="slider-content">
				<div class="slider-title-second">
					<h1><strong>Výpis nemovitostí dle mapy</strong></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="app">
	<VyhledavaniMapa
		assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
		apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
	></VyhledavaniMapa>
</div>