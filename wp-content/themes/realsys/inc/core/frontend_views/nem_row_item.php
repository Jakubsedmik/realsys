
<?php
	$item->loadRelatedObjects("obrazekClass");

	$front_img = "";
	foreach ($item->subobjects['obrazekClass'] as $value) {
		if($value->db_front){
			$front_img = $value->db_url;
		}
	}

?>
<div class="row">
    <div class="col-sm nemovitost nem-row-box non-active">

        <div class="edit-icon-wrap">
            <a href="#" class="edit-icon"><i class="fas fa-pen"></i></a>
            <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
        </div>

		<div class="nemovitost-wrapper">
			<div class="row">

				<div class="col-sm-2 nemovitost-image" style="background-image: url(<?php echo $front_img; ?>);">
					<div class="inzerat-id">ID: <span class="id"><?php echo $item->db_id; ?></span></div>
				</div>

				<div class="col-sm-3 nemovitost-text">
					<h3><a href="<?php echo Tools::getFERoute("inzeratClass", $item->getId()); ?>"><?php echo $item->db_titulek . ', ' . $item->db_pocet_mistnosti . ', ' . $item->db_podlahova_plocha; ?> m<sup>2</sup></a></h3>
					<p><?php echo $item->db_popis; ?></p>
					<h4 class="price"><?php echo Tools::convertCurrency($item->db_cena); ?></h4>
				</div>

				<div class="col-sm-3 nemovitost-ranks">
					<table class="rank-table">
						<tbody>
						<tr>
							<th><?php echo _e( "Město", "realsys" ); ?></th><td><?php echo $item->db_mesto; ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Podlahová plocha", "realsys" ); ?></th><td><?php echo $item->db_podlahova_plocha; ?> m<sup>2</sup></td>
						</tr>
						</tbody>
					</table>
				</div>

				<div class="col-sm-2 nemovitost-activate">
					<a class="btn" href="#"><?php echo _e( "Aktivovat", "realsys" ); ?></a>
					<span class="activate-txt"><?php echo _e( "Inzerát je neaktivní", "realsys" ); ?></span>
				</div>

				<div class="col-sm-2 nemovitost-topovani">
					<a class="btn ico-btn js-preparing" href="#"><i class="fas fa-star"></i><?php echo _e( "Topovat", "realsys" ); ?></a>
					<a href="#" class="simple-link"><?php echo _e( "Jak to funguje?", "realsys" ); ?></a>
				</div>
			</div>
		</div>
    </div>
</div>