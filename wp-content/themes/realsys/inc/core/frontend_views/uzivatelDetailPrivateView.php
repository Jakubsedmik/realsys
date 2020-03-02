<?php

	$uzivatel = $this->workData['uzivatel'];
	$inzeraty  = $uzivatel->subobjects['inzeratClass'];
	$aktivniInzeraty = array_filter($inzeraty, function ($element, $index){
	    return $element->db_stav_inzeratu;
    }, ARRAY_FILTER_USE_BOTH);
	if(!is_array($inzeraty)) $inzeraty = array();

?>

<section class="my-profile">
	<div class="profileInfo-con">
		<div class="wrapper">
			<div class="row top-info">
				<div class="col-sm-2">
					<a href="<?php echo Tools::getFERoute("uzivatelClass", $uzivatel->getId(), "detail", "editUser"); ?>" class="edit-icon"><i class="fas fa-pen"></i></a>
					<div class="profile-img" style="background-image: url(<?php echo $uzivatel->db_avatar; ?>)"></div>
				</div>
				<div class="col-sm-4">

					<div class="basic-info">
						<h1 class="profile-name"><?php echo $uzivatel->getFullName(); ?></h1>
						<div class="info-row">
							<i class="fas fa-phone-alt"></i> <span class="phone"><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></span>
						</div>
						<div class="info-row">
							<i class="fas fa-envelope"></i> <span class="email"><?php echo $uzivatel->db_email; ?></span>
						</div>
						<div class="info-row">
							<i class="fas fa-bullhorn"></i> <span class="inzeraty"><strong><?php echo count($aktivniInzeraty); ?></strong> <?php echo _e( "Aktivních inzerátů", "realsys" ); ?></span>
						</div>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="short-description">
						<a href="<?php echo Tools::getFERoute("uzivatelClass", $uzivatel->getId(), "detail", "editUser"); ?>" class="edit-icon"><i class="fas fa-pen"></i></a>
						<h3><?php echo _e( "Popis", "realsys" ); ?></h3>
						<p><?php echo $uzivatel->db_popis; ?></p>
					</div>
				</div>
			</div>


			<div class="row hints-con">
				<div class="col-sm-6 edit-profile-box">
					<div class="edit-profile-box-wrap">
						<div class="ico-box">
							<i class="far fa-lightbulb"></i>
						</div>
						<div class="txt-box">
							<h3><?php echo _e( "Přidáním fotografie a vyplněním všech informací, zvyšujete svojí důvěryhodnost", "realsys" ); ?></h3>
							<a class="btn ico-btn" href="<?php echo Tools::getFERoute("uzivatelClass", $uzivatel->getId(), "detail", "editUser"); ?>"><i class="fas fa-pen"></i><?php echo _e( "Upravit profil", "realsys" ); ?></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 security-hint-box">
					<div class="security-hint-box-wrap">
						<h3><?php echo _e( "Zabezpečení účtu", "realsys" ); ?></h3>
						<p><?php echo _e( "Nastavte si dostatečně silné heslo k vašemu účtu.", "realsys" ); ?></p>
						<a class="btn ico-btn" href="<?php echo Tools::getFERoute("uzivatelClass", $uzivatel->getId(), "detail", "editUser"); ?>"><i class="fas fa-lock"></i><?php echo _e( "Změnit heslo", "realsys" ); ?></a>
					</div>
				</div>
			</div>


			<div class="row moreInfo-separator">
				<div class="col-sm-2">
					<h3><?php echo _e( "Stav", "realsys" ); ?></h3>
				</div>
				<div class="col-sm">
					<div class="separator"> <div class="collapse-icon"><i class="fas fa-sort-down"></i></div> </div>
				</div>
			</div>

			<div class="row more-info collapsed">
				<div class="col-sm">
					<table class="info-table">
						<tbody>
						<tr>
							<th><?php echo _e( "Jméno", "realsys" ); ?></th><td><?php echo $uzivatel->db_jmeno; ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Příjmení", "realsys" ); ?></th><td><?php echo $uzivatel->db_prijmeni; ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Email", "realsys" ); ?></th><td><?php echo $uzivatel->db_email; ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Telefon", "realsys" ); ?></th><td><?php echo Tools::formatPhone($uzivatel->db_telefon); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm">
					<table class="info-table">
						<tbody>
						<tr>
							<th><?php echo _e( "Aktivní", "realsys" ); ?></th><td><?php echo Tools::translateBinaryValue($uzivatel->db_stav); ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Datum založení", "realsys" ); ?></th><td><?php echo Tools::formatTime($uzivatel->db_datum_zalozeni); ?></td>
						</tr>
						<tr>
							<th><?php echo _e( "Datum poslední úpravy", "realsys" ); ?></th><td><?php echo Tools::formatTime($uzivatel->db_datum_upravy); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</section>



<?php if(count($inzeraty)>0) : ?>
	<section>
		<div class="top-nemovitosti">
			<div class="wrapper">
				<div class="nemovitost-rows-wrap">

					<div class="section-title sides-align">
						<h2><?php echo _e( "Nemovitosti uživatele", "realsys" ); ?></h2>
						<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "add") ?>">Vložit inzerát</a>
					</div>

					<?php
						$walker = new assetWalkerClass(
							"inzeratClass",
							"nem_row_item.php",
							1,
							6,
							'div',
							'',
							false,
							'top',
							"DESC",
							$inzeraty
						);
						$walker->walk(true);
					?>

					<div class="section-btn sides-align">
						<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "listing") ?>">Všechny inzeráty</a>
						<a class="btn" href="<?php echo Tools::getFERoute("inzeratClass",false, "add") ?>">Vložit inzerát</a>
					</div>

				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
