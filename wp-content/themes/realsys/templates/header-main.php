<header>
    <div class="top-bar">
        <div class="wrapper">
            <div class="inzerat-pocitadlo">
                <span>
                    <?php _e("Partnerské weby", "realsys"); ?>
                    <strong>
                        <a href="https://www.nejremeslnici.cz/"><?php _e("Řemeslníci", "realsys"); ?></a>
                    </strong> |
                    <strong>
                        <a href="http://autonahlovsky.cz/"><?php _e("Autoservis", "realsys"); ?></a>
                    </strong>
                </span>
            </div>
	        <?php if(uzivatelClass::getUserLoggedId() !== false): ?>
            <?php $uzivatel = assetsFactory::getEntity("uzivatelClass", uzivatelClass::getUserLoggedId()); ?>
            <div class="user-logged">
                <a class="logged"><img src="img/header/uzivatel-prihlasen.png" alt=""/><span><?php echo $uzivatel->getFullName(); ?></span></a>
                <div class="user-login-block">
                    <div class="user-login-content">
                        <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId()) ?>"><?php _e("Můj profil", "realsys"); ?></a>
                        <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "editUser"); ?>"><?php _e("Upravit profil", "realsys"); ?></a>
                        <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "logOut"); ?>"><?php _e("Odhlásit se", "realsys"); ?></a>
                    </div>
                </div>
            </div>
	        <?php else: ?>

            <div class="user-login">

                <a href="<?php echo home_url() . "/login/" ?>" class="login">
                    <img src="<?php echo FRONTEND_IMAGES_PATH; ?>header/prihlaseni.png" alt=""/>
                    <?php _e("Přihlášení", "realsys"); ?>
                </a>
                <a href="<?php echo home_url() . "/login/" ?>" class="signup">
                    <img src="<?php echo FRONTEND_IMAGES_PATH; ?>header/registrace.png" alt=""/>
	                <?php _e("Registrace", "realsys"); ?>
                </a>

            </div>
	        <?php endif; ?>
        </div>

    </div>
    <div class="full-menu">
        <div class="main-header">
            <div class="wrapper">
                <div class="logo">
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                </div>
                <?php if ( has_nav_menu( 'cms_header_menu' ) ) : ?>
                    <nav class="menu">
                        <?php
                        $menu_args = array(
                            'theme_location' => 'cms_header_menu',
                            'walker' => new Realsys_menu(),
                            'container' => ""
                        );
                        wp_nav_menu( $menu_args );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
        <div class="menu-bar">
            <div class="wrapper">

                <nav class="menu">
                <?php if ( has_nav_menu( 'category_header_menu' ) ) :

                    $menu_args = array(
                        'theme_location' => 'category_header_menu',
                        'container' => ""
                    );
                    wp_nav_menu( $menu_args );

                    else:

                        $ciselnik = assetsFactory::getAllDials("inzeratClass", "typ_nemovitosti");?>
                        <ul id="menu-kategorie" class="menu">

                            <?php foreach ($ciselnik as $key => $val) : ?>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                    <a href="#">
                                        <?php echo $val->db_translation; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>

                <?php endif; ?>
                </nav>

            </div>
        </div>
    </div>

    <div class="mobile-menu">
        <div class="logo">
	        <?php
	        if ( function_exists( 'the_custom_logo' ) ) {
		        the_custom_logo();
	        }
	        ?>
        </div>
        <div id="nav-icon3" class="burger-menu-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="menu-wrap">
            <ul>
                <li><span>Kategorie</span></li>
                <li><a href="#">Prodej</a></li>
                <li><a href="#">Pronájem</a></li>
                <li><a href="#">Spolubydlení</a></li>
                <li><a href="#">Komerční nemovitosti</a></li>
                <li><a href="#">Pozemky</a></li>
                <li class="separator"></li>
                <li><span>Nabídka</span></li>
                <li><a href="#">Vyhledat</a></li>
                <li><a href="#">Výpis inzerátů</a></li>
                <li><a href="#">Ceník</a></li>
                <li><a href="#">Jak to funguje</a></li>
                <li><a href="#">Služby</a></li>
                <li><a href="#" class="btn">Přidat inzerát</a></li>
            </ul>
        </div>
    </div>

</header>