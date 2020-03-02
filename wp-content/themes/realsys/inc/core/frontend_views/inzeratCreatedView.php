<?php
	$inzerat = $this->requestData['inzerat'];
	$link = Tools::getFERoute("inzeratClass",$inzerat->getId(),"detail");
	Tools::jsRedirect($link, 1500, "Přesměrovní", "Probíhá přesměrování na nový inzerát");
?>
<section>
	<div class="add-inz-con">
		<div class="wrapper">
			<h2>Inzerát byl vytvořen</h2>
			<p>Děkujeme za vytvoření inzerátu. Na inzerát budete přesměrováni. Nebo klikněte na tlačítko níže.</p>
			<a href="<?php echo $link; ?>" class="btn">Detail inzerátu</a>
		</div>
	</div>
</section>