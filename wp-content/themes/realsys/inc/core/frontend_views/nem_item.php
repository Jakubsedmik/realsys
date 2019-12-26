
<?php
	$item->loadRelatedObjects("obrazekClass");
?>

<div class="col-sm col-sm-12 col-md-3 nemovitost">
	<div class="nemovitost-wrapper">
		<?php
			$front_img = "";
			foreach ($item->subobjects['obrazekClass'] as $value) {
				if($value->db_front){
					$front_img = $value->db_url;
				}
			}
		?>
		<div class="nemovitost-image" style="background-image: url(<?php echo $front_img; ?>); "></div>
		<div class="nemovitost-text">
			<h3><?php echo $item->db_titulek . ', ' . $item->db_pocet_mistnosti . ', ' . $item->db_podlahova_plocha; ?> m<sup>2</sup></h3>
			<p><?php echo $item->db_popis; ?></p>

			<div class="metaInfo-bar">
				<div class="infoIco location">
					<img src="<?php echo FRONTEND_IMAGES_PATH; ?>ikony/location.png" alt=""/><span class="metaTxt"><?php echo $item->db_mesto; ?></span>
				</div>
				<div class="infoIco size">
					<img src="<?php echo FRONTEND_IMAGES_PATH; ?>ikony/size.png" alt=""/><span class="metaTxt"><?php echo $item->db_podlahova_plocha; ?> m<sup>2</sup></span>
				</div>
			</div>

			<div class="price-bar">
				<h4 class="price"><?php echo Tools::convertCurrency($item->db_cena); ?></h4>
				<a href="<?php echo Tools::getFERoute("inzeratClass", $item->getId()); ?>" class="btn more"><?php echo get_theme_mod("top_nemovitosti_nem_button_text"); ?></a>
			</div>
		</div>
	</div>
</div>