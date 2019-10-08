<div class="border p-5 mr-3">
	<div class="container-fluid">
		<h1>
			<i class="fas fa-home"></i> Výpis obrázků
		</h1>
		<p class="lead">
			Kompletní výpis obrůzků. Obrázky můžete upravovat,smazat či filtrovat.
		</p>
	</div>
	<div class="app">
		<inzeraty
                api_url="<?php echo AJAXURL ?>"
                base_url="<?php echo ADMIN_BASE_URL ?>" model="obrazekClass"
                sub_params="?action=getElements"
                item_controller="obrazek"
		></inzeraty>
	</div>


    <div class="container-fluid mt-4">
        <div class="js-fileUploader fileUploader" data-api-url="<?php echo AJAXURL ?>">
            <input type="file" name="files">
        </div>

    </div>


	<div class="container-fluid">
		<a href="<?php echo ADMIN_BASE_URL;?>" class="btn btn-amber mt-3"><i class="fas fa-chevron-left mr-1"></i> Zpět na rozcestník</a>
	</div>
</div>