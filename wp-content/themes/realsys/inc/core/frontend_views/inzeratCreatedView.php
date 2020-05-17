<?php
	$inzerat = $this->requestData['inzerat'];
	$link = Tools::getFERoute("inzeratClass",$inzerat->getId(),"detail");

	Tools::jsRedirect($link, 1500, "Přesměrovní", "Probíhá přesměrování na nový inzerát");
?>
<section>
	<div class="add-inz-con">
		<div class="wrapper">
			<h2><?php echo __("Inzerát byl vytvořen", "realsys"); ?></h2>
            <p><?php echo __("Děkujeme za vytvoření inzerátu.", "realsys"); ?></p>
            <!--
            TODO prozatímní redirect na přidání inzerátu, po spuštění musí být na profil-->
			<p>Děkujeme za vytvoření inzerátu. Na inzerát budete přesměrováni. Nebo klikněte na tlačítko níže.</p>
			<a href="<?php echo $link; ?>" class="btn">Detail inzerátu</a>

		</div>
	</div>
</section>
