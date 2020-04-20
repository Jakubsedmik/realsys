<header>
    <div class="full-menu">
        <div class="main-header">
            <div class="wrapper">
                <div class="logo">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                </div>
                <?php if (has_nav_menu('cms_header_menu')) : ?>
                    <nav class="menu">
                        <?php
                        $menu_args = array(
                            'theme_location' => 'cms_header_menu',
                            'walker' => new Realsys_menu(),
                            'container' => ""
                        );
                        wp_nav_menu($menu_args);
                        ?>
                    </nav>
                <?php endif; ?>




                <?php if (uzivatelClass::getUserLoggedId() !== false) : ?>
                    <?php $uzivatel = assetsFactory::getEntity("uzivatelClass", uzivatelClass::getUserLoggedId()); ?>
                    <div class="user-logged">
                        <a class="logged"><span class="icon-user ico"></span>
                            <div class="mess-counter">2</div>
                        </a>
                        <div class="user-login-block shadow-sm rounded light-blue-bg ">
                            <div class="user-info">
                                <div class="user-info-wrap">
                                    <div class="avatar"><img src="<?php echo FRONTEND_IMAGES_PATH; ?>/avatar.png" alt=""></div>
                                    <div>
                                        <h4 class="user-name"><?php echo $uzivatel->getFullName(); ?></h4>
                                        <span class="user-email">filip.sersik@outlook.com</span>
                                    </div>                                    
                                </div>
                                <div class="user-credits"><span><?php echo _e("Moje kredity:", "realsys"); ?></span><span class="credits-num">182</span></div>
                            </div>
                            <div class="user-menu">
                                <a href="#" class="user-messages"><span class="user-mess-tit"><?php echo _e("Spravy", "realsys"); ?>
                                    <div class="mes-dot"></div></span><span class="mes-num-wrap">(<span class="mes-num">2</span>)</span>
                                </a>
                                <a href="#">Moje služby</a>
                                <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId()) ?>"><?php _e("Můj profil", "realsys"); ?></a>
                                <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "editUser"); ?>"><?php _e("Upravit profil", "realsys"); ?></a>
                                <a href="<?php echo Tools::getFERoute("uzivatelClass", UzivatelClass::getUserLoggedId(), "detail", "logOut"); ?>"><?php _e("Odhlásit se", "realsys"); ?></a>
                            </div>
                        </div>
                    </div>
                <?php else : ?>

                    <div class="user-login">

                        <a href="<?php echo home_url() . "/login/" ?>" class="login">
                            <?php _e("Přihlášení", "realsys"); ?>
                        </a>
                        <a href="<?php echo home_url() . "/login/" ?>" class="signup">
                            <?php _e("Registrace", "realsys"); ?>
                        </a>

                    </div>
                <?php endif; ?>





            </div>
        </div>
        <!--<div class="menu-bar">
            <div class="wrapper">

                <nav class="menu">
                <?php if (has_nav_menu('category_header_menu')) :

                    $menu_args = array(
                        'theme_location' => 'category_header_menu',
                        'container' => ""
                    );
                    wp_nav_menu($menu_args);

                else :

                    $ciselnik = assetsFactory::getAllDials("inzeratClass", "typ_nemovitosti"); ?>
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
        </div>-->
    </div>

    <div class="mobile-menu">
        <div class="logo">
            <?php
            if (function_exists('the_custom_logo')) {
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