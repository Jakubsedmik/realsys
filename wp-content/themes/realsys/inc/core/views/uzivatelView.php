<div class="border p-5 mr-3">
	<div class="container-fluid">
		<h1>
			<i class="fas fa-home"></i> Výpis uživatelů
		</h1>
		<p class="lead">
			Kompletní výpis uživatelů. Uživatele můžete upravovat,smazat či filtrovat.
		</p>
	</div>
	<div class="app">
        <inzeraty
                api_url="<?php echo AJAXURL; ?>"
                base_url="<?php echo ADMIN_BASE_URL; ?>" model="uzivatelClass"
                item_controller="uzivatel"
                sub_params="?action=getElements"
                home_url="<?php echo home_url() ?>"
        ></inzeraty>
	</div>
	<div class="container-fluid">
		<a href="<?php echo ADMIN_BASE_URL;?>" class="btn btn-amber mt-3"><i class="fas fa-chevron-left mr-1"></i> Zpět na rozcestník</a>
        <a href="<?php echo Tools::getRoute("uzivatelClass","create"); ?>" class="btn btn-success mt-3"><i class="fas fa-plus-circle"></i> Vytvořit uživatele</a>
		<?php if(Tools::checkPresenceOfParam("export_link", $this->viewData)) : ?>
			<a href="<?php echo $this->viewData['export_link'] ?>" target="_blank" download class="btn btn-cyan mt-3"><i class="fas fa-file-export"></i> Stáhnout exportované uživatele</a>
		<?php else : ?>
			<a href="<?php echo Tools::getRoute('uzivatelClass','export'); ?>" class="btn btn-brown mt-3"><i class="fas fa-file-export"></i> Exportovat uživatele</a>
		<?php endif; ?>
	</div>
</div>