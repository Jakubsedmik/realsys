<?php
    $inzerat = $this->requestData['inzerat'];
    $uzivatel = $this->requestData['uzivatel'];
?>

<section>

    <div class="add-inz-con">
        <div class="wrapper">

            <?php echo frontendError::getFrontendErrors(); ?>

            <div class="section-title">
                <h2><?php echo _e( "Editace inzerátu", "realsys" ); ?></h2>
            </div>

            <form method="post" class="js-validate-form">
                <section id="First" class="inz-form-sec inz-sec-1">
                    <div class="inz-box">
                        <h3><?php echo _e( "Typ inzerátu", "realsys" ); ?></h3>

                        <?php
                            $icons = array(
                                2 => 'flaticon-149-hand-gesture',
                                1 => 'flaticon-043-closing',
                                3 => 'flaticon-support',
                            )

                        ?>

                        <div class="row selects">

                            <?php
                                $dials = assetsFactory::getAllDials("inzeratClass","typ_inzeratu");
                                foreach ($dials as $key => $value) :
                            ?>
                            <div class="col-sm-3">
                                <label>
                                    <input type="radio" name="db_typ_inzeratu" value="<?php echo $value->db_value?>" <?php echo ($value->db_value == $inzerat->db_typ_inzeratu ? 'checked' : '' ); ?>>
                                    <div class="type-inz-div">
                                        <div class="type-inz">
                                            <i class="<?php echo $icons[$value->db_value]; ?> ico"></i><span class="sel-input-name"><?php echo $value->db_translation?></span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <?php
                                endforeach;
                            ?>

                        </div>
                    </div>

                    <div class="inz-box">
                        <h3><?php echo _e( "Typ Nemovitosti", "realsys" ); ?></h3>

	                    <?php
	                    $icons = array(
		                    0 => 'flaticon-070-real-estate-4',
		                    1 => 'flaticon-021-sit-down',
		                    2 => 'flaticon-115-picket',
		                    3 => 'flaticon-136-book-bag',
                            4 => 'flaticon-046-storehouse'
	                    )

	                    ?>

                        <div class="row selects ico-smaller">

	                        <?php
	                            $dials = assetsFactory::getAllDials("inzeratClass","typ_stavby");
	                            foreach ($dials as $key => $value) :
	                        ?>

                            <div class="col-sm">
                                <label>
                                    <input type="radio" name="db_typ_stavby" value="<?php echo $value->db_value; ?>" <?php echo ($value->db_value == $inzerat->db_typ_stavby ? 'checked' : '' ); ?>>
                                    <div class="type-nem-div">
                                        <div class="type-nem">
                                            <i class="ico <?php echo $icons[$value->db_value]; ?>"></i><span class="sel-input-name"><?php echo $value->db_translation; ?></span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <?php
                                endforeach;
                            ?>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm bigger-label">
                            <div class="inz-box align-left">

                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Ulice", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. Jiráskova","realsys"); ?>" name="db_ulice" value="<?php echo $inzerat->dejData("db_ulice"); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Číslo popisné", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. 15/225","realsys"); ?>" name="db_cp" value="<?php echo $inzerat->dejData("db_cp"); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Město", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. Chomutov","realsys"); ?>" name="db_mesto" value="<?php echo $inzerat->dejData("db_mesto"); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "PSČ", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. 225 14","realsys"); ?>" name="db_psc" value="<?php echo $inzerat->dejData("db_psc"); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Městská část", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. Chomutov - sever","realsys"); ?>" name="db_mestska_cast" value="<?php echo $inzerat->dejData("db_mestska_cast"); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm col-spacer"></div>

                        <div class="col-sm nazev-popis">
                            <div class="inz-box align-left">
                                <h3><?php _e( "Název a popis", "realsys" ); ?></h3>

                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Podlahová plocha (v m2)", "realsys" ); ?></label>
                                        <input type="number" placeholder="<?php _e("Např. 225","realsys"); ?>" value="<?php echo $inzerat->dejData("db_podlahova_plocha"); ?>" name="db_podlahova_plocha">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Pozemková plocha (v m2)", "realsys" ); ?></label>
                                        <input type="number" placeholder="<?php _e("Např. 225","realsys"); ?>" value="<?php echo $inzerat->dejData("db_pozemkova_plocha"); ?>" name="db_pozemkova_plocha">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Titulek", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. Velký moderní dům v Jiráskově","realsys"); ?>" value="<?php echo $inzerat->dejData("db_titulek"); ?>" name="db_titulek">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><?php _e( "Dispozice", "realsys" ); ?></label>
                                        <input type="text" placeholder="<?php _e("Např. 2+kk","realsys"); ?>" value="<?php echo $inzerat->dejData("db_pocet_mistnosti"); ?>" name="db_pocet_mistnosti">
                                    </div>
                                </div>
                                <div class="form-row form-message">
                                    <div class="form-field">
                                        <label><?php _e( "Popis", "realsys" ); ?></label>
                                        <textarea placeholder="<?php _e("Např. Prodávám tento krásný dům...","realsys"); ?>" name="db_popis"><?php echo $inzerat->dejData("db_popis"); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inz-box center-inz-box bigger-label">
                        <div class="form-row price-input">
                            <label><?php _e( "Cena nemovitosti", "realsys" ); ?></label>
                            <div class="currency-input">
                                <div class="form-field">
                                    <input type="number" placeholder="100 000" step="1000" value="<?php echo $inzerat->dejData("db_cena"); ?>" name="db_cena">
                                </div>
                                <span class="currency"><?php echo CURRENCY; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 btn-input">
                        <div class="inz-submit">
                            <button type="submit" class="btn" name="action" value="saveInzerat">
	                            <?php _e( "Upravit", "realsys" ); ?>
                            </button>
                        </div>
                    </div>
                </section>
            </form>
            <a href="<?php echo Tools::getFERoute("inzeratClass",$inzerat->getId(), "detail"); ?>" class="btn btn-outline-primary"><?php _e("Zobrazit inzerát","realsys"); ?></a>
        </div>
    </div>
</section>