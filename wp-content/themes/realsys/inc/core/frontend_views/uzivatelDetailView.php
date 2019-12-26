<?php

$uzivatel = $this->workData['uzivatel'];
$inzeraty  = $uzivatel->subobjects['inzeratClass'];
if(!is_array($inzeraty)) $inzeraty = array();


?>

<section>
	<div class="profileInfo-con">
		<div class="wrapper">
			<div class="row top-info">
				<div class="col-sm-2">
					<div class="profile-img" style="background-image: url(<?php echo $uzivatel->db_avatar; ?>)">

					</div>
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
							<i class="fas fa-bullhorn"></i> <span class="inzeraty"><strong><?php echo count($inzeraty); ?></strong> Aktivních inzerátů</span>
						</div>

					</div>

				</div>
				<div class="col-sm-6">
					<div class="short-description">
						<h3><?php echo _e( "Popis", "realsys" ); ?></h3>
						<p><?php echo $uzivatel->db_popis; ?></p>
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
<section>
	<div class="top-nemovitosti">
		<div class="wrapper">
			<div class="section-title">
				<h2><?php echo _e( "Nemovitosti uživatele", "realsys" ); ?></h2>
			</div>

			<div class="row">
				<div class="col-sm nemovitost">
					<div class="nemovitost-wrapper">
						<div class="nemovitost-image" style="background-image: url(<?php echo FRONTEND_IMAGES_PATH ?>nemovitosti/nem.jpeg); "></div>
						<div class="nemovitost-text">
							<h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

							<div class="metaInfo-bar">
								<div class="infoIco location">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
								</div>
								<div class="infoIco size">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
								</div>
							</div>

							<div class="price-bar">
								<h4 class="price">22 850 Kč</h4>
								<a class="btn more">Více info</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm nemovitost">
					<div class="nemovitost-wrapper">
						<div class="nemovitost-image" style="background-image: url(<?php echo FRONTEND_IMAGES_PATH ?>nemovitosti/nem.jpeg); "></div>
						<div class="nemovitost-text">
							<h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

							<div class="metaInfo-bar">
								<div class="infoIco location">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
								</div>
								<div class="infoIco size">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
								</div>
							</div>

							<div class="price-bar">
								<h4 class="price">22 850 Kč</h4>
								<a class="btn more">Více info</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm nemovitost">
					<div class="nemovitost-wrapper">
						<div class="nemovitost-image" style="background-image: url(<?php echo FRONTEND_IMAGES_PATH ?>nemovitosti/nem.jpeg); "></div>
						<div class="nemovitost-text">
							<h3>Praha - Nebušice, 6+1 222m<sup>2</sup></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non sem consectetur, porta sapien. </p>

							<div class="metaInfo-bar">
								<div class="infoIco location">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/location.png" alt=""/><span class="metaTxt">Praha - Nebušice</span>
								</div>
								<div class="infoIco size">
									<img src="<?php echo FRONTEND_IMAGES_PATH ?>ikony/size.png" alt=""/><span class="metaTxt">222m<sup>2</sup></span>
								</div>
							</div>

							<div class="price-bar">
								<h4 class="price">22 850 Kč</h4>
								<a class="btn more">Více info</a>
							</div>
						</div>
					</div>
				</div>


			</div>

			<div class="section-btn">
				<a class="btn" href="#">Další inzeráty</a>
			</div>
		</div>
	</div>
</section>

<section class="mb-4">

	<div class="wrapper">
		<div class="contact-con">
			<h2>Kontaktní formulář</h2>

			<form>
				<div class="row">
					<div class="col-sm">

						<div class="form-cols">
							<div class="form-col">
								<label><?php echo _e( "Jméno", "realsys" ); ?></label>
								<input type="text" placeholder="Karel">
							</div>
							<div class="form-col">
								<label><?php echo _e( "Příjmení", "realsys" ); ?></label>
								<input type="text" placeholder="Karel">
							</div>
							<div class="form-col">
								<label><?php echo _e( "Telefon", "realsys" ); ?></label>
								<input type="tel" placeholder="+420 777 888 999">
							</div>
							<div class="form-col">
								<label><?php echo _e( "Email", "realsys" ); ?></label>
								<input type="email" placeholder="novak@email.cz">
							</div>
						</div>

					</div>

					<div class="col-sm form-message">
						<label><?php echo _e( "Zpráva", "realsys" ); ?></label>
						<textarea placeholder="Vaše zpráva"></textarea>
					</div>

				</div>

				<div class="form-btns">
					<button type="submit" class="btn submit-btn"><?php echo _e( "Odeslat zprávu", "realsys" ); ?></button>
					<a href="#" class="lost-pass underline-link"><?php echo _e( "Nepodařilo se odeslat?", "realsys" ); ?></a>
				</div>
			</form>

		</div>
	</div>


</section>