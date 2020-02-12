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
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>

<div class="app">
	<VyhledavaniMapa
		assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
		apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
	></VyhledavaniMapa>
</div>


<section>
    <div class="cta neplatte sub">
        <div class="wrapper">
            <div class="row">
                <div class="col-8">
                    <h2>Neplaťte provizi realitce,<br> když nemusíte</h2>
                    <p>S námi je to snadné! Inzerujte zdarma a neplaťte provizi nám, ani realitnímu makléři.</p>
                </div>
                <div class="col-4 cta-btns">
                    <a class="btn bcg-btn" href="#">Přidat inzerát</a>
                    <a class="btn free" href="#">Je to zdarma</a>
                </div>
            </div>
        </div>
    </div>
</section>