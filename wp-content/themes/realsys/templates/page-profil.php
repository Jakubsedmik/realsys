<section class="profil">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-main-info text-center rounded-b shadow-sm p-20">
					<div class="profile-img-wrap" style="background-image: url(<?php echo FRONTEND_IMAGES_PATH; ?>/avatar.png)"></div>
					<h2 class="sz-tit mb-2">Filip Šeršík</h2>
					<p class="prof-kvalita"><?php echo _e("Kvalita profilu ", "realsys"); ?><span class="prof-kvalit-value">100%</span></p>

				</div>
				<div class="profile-menu-wrap">
					<nav class="profile-menu">
						<ul>
							<li><a href="#" class="profile-menu-link active"><?php echo _e("Môj profil", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Upozornenia", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Obľúbené inzeráty", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Moja peňaženka", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Moje inzeráty", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Moje služby", "realsys"); ?></a></li>
							<li><a href="#" class="profile-menu-link"><?php echo _e("Odhlásiť sa", "realsys"); ?></a></li>
						</ul>
					</nav>
				</div>

			</div>
			<div class="col-lg-9">
				<div class="content-wrap rounded-b shadow-sm p-20">
					<h1 class="sz-tit text-center mb-3 mt-3"><?php echo _e("Môj profil ", "realsys"); ?></h1>

					<div class="profil-form profil-main-content">
						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc sz-tip-desc"><?php echo _e("Szukamdom Tip:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<p class="sz-tip-txt"><?php echo _e("Čím viac informácii o sebe vyplníte, tým väčšia zaujímavejší je Váš profil pre tých, s ktorými ste v kontakte.", "realsys"); ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Základné údaje:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Jméno", "realsys"); ?>"></div>
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Příjmení", "realsys"); ?>"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Základné údaje:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="email" placeholder="<?php echo _e("Email", "realsys"); ?>"></div>
									<div class="col-sm-6 correct"><input class="input-outline" type="tel" placeholder="<?php echo _e("Telefon", "realsys"); ?>"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Rok narodenia:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="number" placeholder="<?php echo _e("Rok narodenia", "realsys"); ?>"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Povolanie/škola:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Povolanie/škola", "realsys"); ?>"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Krátke bio:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col correct"><textarea class="input-outline" placeholder="<?php echo _e("Krátke bio", "realsys"); ?>"> </textarea> </div>
								</div>
							</div>
						</div>
						<div class="line-separator"></div>

						<div class="row adress">
							<div class="col-sm-3 profil-form-desc">
								<span class="input-desc"><?php echo _e("Adresa:", "realsys"); ?></span>
							</div>
							<div class="col-sm-9 profil-form-content">
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Ulice", "realsys"); ?>"></div>
									<div class="col-sm-6 false"><input class="input-outline" type="text" placeholder="<?php echo _e("Adresa 2", "realsys"); ?>"></div>
								</div>
								<div class="row">
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Město", "realsys"); ?>"></div>
									<div class="col-sm-6 correct"><input class="input-outline" type="text" placeholder="<?php echo _e("Adresa 2", "realsys"); ?>"></div>
								</div>
								<div class="row">
									<div class="col map"></div>
								</div>
							</div>
						</div>

						<div class="line-separator"></div>
						<div class="d-flex justify-content-center mb-5">
							<a href="#" class="btn"><?php echo _e("Uložiť", "realsys"); ?></a>
						</div>


					</div>

				</div>

				<div class="content-wrap rounded-b shadow-sm p-20">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php echo _e("Upozornenia", "realsys"); ?></h1>

					<div class="profil-main-content">


						<div class="upozorneni-box blue-bg rounded-b p-20">
							<div class="row">
								<div class="col-md-2 col-3">
									<div class="profile-img-wrap" style="background-image: url(<?php echo FRONTEND_IMAGES_PATH; ?>/avatar.png)"></div>
								</div>
								<div class="col-md-10 col-9">
									<h3><span class="upoz-name">Filip Šeršík</span> | <span class="upoz-adress">Prenájom bytu 3KK, Praha</span> | <span class="upoz-date">02.03.2020</span> </h3>
									<p>Dobrý deň, zaujímalo by ma koľko … bla bla bla … piča maková … lorem ipsum serus nazdar mám rád korytnačky. Už. Je. Veľa. Hodín.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="content-wrap rounded-b shadow-sm p-20">
					<h1 class="sz-tit text-center mb-4 mt-3"><?php echo _e("Moja peňaženka", "realsys"); ?></h1>
					<p class="text-center mb-sm-5"><span class="sz-tip-desc"><?php echo _e("Szukamdom Tip:", "realsys"); ?> </span><?php echo _e("Kredity môžete používať ako platitdlo za služby. Nevyužité kredity Vám vrátime naspäť.", "realsys"); ?> </p>



					<div class="kredity-box light-blue-bg rounded-b p-20">
						<div class="kred-wrap">
							<h3 class="kred-big"><span class="kred-value">182</span> <?php echo _e("Kreditov", "realsys"); ?></h3>
							<div class="kred-btns">
								<a href="#" class="btn btn-big mb-2"><?php echo _e("Dobiť kredity", "realsys"); ?></a>
								<a href="#" class="u-link"><?php echo _e("Získať kredity zdarma", "realsys"); ?></a>
							</div>
						</div>
					</div>
					<h2 class="sz-tit text-center mb-4 mt-5"><?php echo _e("História transakcií", "realsys"); ?></h2>
					<div class="table-transakce mb-4 table-wrap">
						<table class="sz-table">
							<thead>
								<tr>
									<th>Dátum</th>
									<th>Položka</th>
									<th>Čiastka</th>
									<th>Poznámka</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>19.03.2020</td>
									<td>Dobitie 182 kreditov</td>
									<td class="price">200 PLN</td>
									<td><a href="#">Doklad</a></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za kontakt - <a href="#">inzerát č. 12345</a></td>
									<td class="kredit">1 Kredit</td>
									<td></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za službu - <a href="#">Lepšia zmluva pohľ. 12345</a></td>
									<td class="price">82 PLN</td>
									<td></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Dobitie 30 kreditov</td>
									<td class="price">30 PLN</td>
									<td><a href="#">Doklad</a></td>
								</tr>
								<tr>
									<td>19.03.2020</td>
									<td>Platba za kontakt - <a href="#">inzerát č. 12345</a></td>
									<td class="kredit">1 Kredit</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>