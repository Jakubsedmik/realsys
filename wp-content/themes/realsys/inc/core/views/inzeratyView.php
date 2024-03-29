<div class="border p-5 mr-3">
	<div class="container-fluid">
		<h1>
			<i class="fas fa-home"></i> Výpis inzerátů
		</h1>
		<p class="lead">
			Kompletní výpis inzerátů. Inzeráty můžete upravovat,smazat či filtrovat.
		</p>
	</div>
	<div class="app">
		<inzeraty
			api_url="<?php echo AJAXURL; ?>"
			base_url="<?php echo ADMIN_BASE_URL; ?>" model="inzeratClass"
			item_controller="inzeraty"
            sub_params="?action=getElements"
            home_url="<?php echo home_url() ?>"
		></inzeraty>
	</div>
	<div class="container-fluid">
		<a href="<?php echo ADMIN_BASE_URL;?>" class="btn btn-amber mt-3"><i class="fas fa-chevron-left mr-1"></i> Zpět na rozcestník</a>
        <a href="<?php echo Tools::getRoute('inzeratClass','create'); ?>" class="btn btn-success mt-3"><i class="fas fa-plus-circle"></i> Vytvořit inzerát</a>
        <?php if(Tools::checkPresenceOfParam("export_link", $this->viewData)) : ?>
	        <a href="<?php echo $this->viewData['export_link'] ?>" target="_blank" download class="btn btn-cyan mt-3"><i class="fas fa-file-export"></i> Stáhnout exportované inzeráty</a>
		<?php else : ?>
			<a href="<?php echo Tools::getRoute('inzeratClass','export'); ?>" class="btn btn-brown mt-3"><i class="fas fa-file-export"></i> Exportovat inzeráty</a>
		<?php endif; ?>
	</div>
</div>