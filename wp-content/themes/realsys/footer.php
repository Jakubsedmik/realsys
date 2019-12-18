
            <footer>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-sm">

                            <?php if ( is_active_sidebar( 'first_footer_col' ) ) : ?>
                                <?php dynamic_sidebar('first_footer_col'); ?>
	                        <?php endif; ?>

                        </div>

                        <div class="col-sm">
	                        <?php if ( is_active_sidebar( 'second_footer_col' ) ) : ?>
		                        <?php dynamic_sidebar('second_footer_col'); ?>
	                        <?php endif; ?>
                        </div>

                        <div class="col-sm">
	                        <?php if ( is_active_sidebar( 'third_footer_col' ) ) : ?>
		                        <?php dynamic_sidebar('third_footer_col'); ?>
	                        <?php endif; ?>
                        </div>

                        <div class="col-sm">
                            <?php if ( is_active_sidebar( 'fourth_footer_col' ) ) : ?>
                                <?php dynamic_sidebar('fourth_footer_col'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
            <?php wp_footer(); ?>
            <?php
            if(!DEPLOYMENT){
                echo globalUtils::renderDebug();
            }
            ?>
    </body>
</html>
