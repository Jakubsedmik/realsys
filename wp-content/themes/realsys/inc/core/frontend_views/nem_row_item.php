
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
    <div class="col-sm nemovitost nem-row-box <?php echo ($item->db_stav_inzeratu < 1) ? 'non-active' : 'active'?>">

        <div class="edit-icon-wrap">
            <a href="<?php echo Tools::getFERoute("inzeratClass",$item->getId(), "edit"); ?>" class="edit-icon"><i class="fas fa-pen"></i></a>
            <a
                    class="close-icon js-send-request"
                    data-post-action="removeInzerat"
                    data-post-inzerat-id="<?php echo $item->getId(); ?>"
                    data-post-user-id="<?php echo $item->db_uzivatel_id; ?>"
                    data-finish="removeInzerat"
                    data-confirm="1">
                <i class="fas fa-times"></i>
            </a>
        </div>

		<div class="nemovitost-wrapper">
			<div class="row">

				<div class="col-sm-2 nemovitost-image" style="background-image: url(<?php echo home_url() . $front_img; ?>);">
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
                    <?php
                        $activators_style = '';
                        $deactivators_style = '';
                        if($item->db_stav_inzeratu < 1) {
	                        $deactivators_style = 'display: none;';
                        }else{
	                        $activators_style = 'display: none;';
                        }
                    ?>

                    <span class="inzeratActivator" style="<?php echo $activators_style; ?>">
                        <a
                                class="btn js-send-request"
                                data-post-action="changeInzeratStatus"
                                data-post-inzeratstatus="1"
                                data-post-inzerat-id="<?php echo $item->getId(); ?>"
                                data-post-user-id="<?php echo $item->db_uzivatel_id; ?>"
                                data-finish="activeInzerat">
                            <?php echo _e( "Aktivovat", "realsys" ); ?>
                        </a>
                        <span class="activate-txt"><?php echo _e( "Inzerát je neaktivní", "realsys" ); ?></span>
                    </span>

                    <span class="inzeratDeactivator" style="<?php echo $deactivators_style; ?>">
                        <a
                                class="btn js-send-request"
                                data-post-action="changeInzeratStatus"
                                data-post-inzeratstatus="0"
                                data-post-inzerat-id="<?php echo $item->getId(); ?>"
                                data-post-user-id="<?php echo $item->db_uzivatel_id; ?>"
                                data-finish="deactiveInzerat">
                            <?php echo _e( "Deaktivovat", "realsys" ); ?>
                        </a>
                        <span class="activate-txt"><?php echo _e( "Inzerát je aktivní", "realsys" ); ?></span>
					</span>
				</div>

				<div class="col-sm-2 nemovitost-topovani">
                    <Servicebuy
                            design="inzeratTop"
                            login_link="<?php echo Tools::getFERoute("uzivatelClass", false, "login"); ?>"
                            payment_link="<?php echo Tools::getFERoute("objednavkaClass"); ?>"
                            currency="<?php echo CURRENCY; ?>"
                            ajax_url="<?php echo AJAXURL; ?>"
                            assets_path="<?php echo home_url() . ASSETS_PATH?>"
                            entitytype="inzeratClass"
                            :already_bought="<?php echo $item->db_top; ?>"
                            :entityid="<?php echo $item->getId(); ?>"
                            :service="<?php global $cenik_sluzeb; echo Tools::prepareJsonToOutputHtmlAttr($cenik_sluzeb[1]); ?>"
                            :is_user_logged="<?php echo uzivatelClass::getUserLoggedId();?>"


                    ></Servicebuy>
					<a href="#" class="simple-link"><?php echo _e( "Jak to funguje?", "realsys" ); ?></a>
				</div>
			</div>
		</div>
    </div>
</div>
