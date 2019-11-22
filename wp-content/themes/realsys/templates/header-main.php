<header>
    <div class="top-bar">
        <div class="wrapper">
            <div class="inzerat-pocitadlo">
                <span>
                    <?php _e("Partnerské weby", "realsys"); ?>
                    <strong>
                        <?php _e("Řemeslníci", "realsys"); ?>
                    </strong> |
                    <strong>
                        <?php _e("Autoservis", "realsys"); ?>
                    </strong>
                </span>
            </div>
            <div class="user-login">
                <a href="#" class="login">
                    <img src="<?php echo FRONTEND_IMAGES_PATH; ?>header/prihlaseni.png" alt=""/>
                    <?php _e("Přihlášení", "realsys"); ?>
                </a>
                <a href="#" class="signup">
                    <img src="<?php echo FRONTEND_IMAGES_PATH; ?>header/registrace.png" alt=""/>
	                <?php _e("Registrace", "realsys"); ?>
                </a>

            </div>
        </div>

    </div>
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
	        <?php if ( has_nav_menu( 'category_header_menu' ) ) : ?>
                <nav class="menu">
			        <?php
			        $menu_args = array(
				        'theme_location' => 'category_header_menu',
				        'container' => ""
			        );
			        wp_nav_menu( $menu_args );
			        ?>
                </nav>
	        <?php endif; ?>
        </div>
    </div>
</header>