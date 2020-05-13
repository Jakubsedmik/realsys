
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

                    <div class="newsletter-block">
                      <div class="nswltr">
                      <h2 class="footer-primary-title">Newsletter</h2>
                        <div id="mc_embed_signup">
                            <form action="https://szukajdom.us4.list-manage.com/subscribe/post?u=7c84b0e17307b80cd4efcb0c2&amp;id=bf8e3d70f3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                            <div id="mc_embed_signup_scroll">
                              <div class="form-flex rounded shadow-sm">
                                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Twój email" required>
                                <input type="submit" value="Potwierdź" name="subscribe" id="mc-embedded-subscribe" class="button">
                            </div>
                            <p class="gdpr-notice">Przesyłając formularz, wyrażasz zgodę na <a href="">warunki prywatności.</a></p>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form
                            bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                            name="b_7c84b0e17307b80cd4efcb0c2_bf8e3d70f3" tabindex="-1" value=""></div>

                            <div class="clear"></div>

                            </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
            </footer>
        </div>

        <script>
        /* TODO TOGGLE PATIČKY */
        jQuery(document).ready(function($){
        $('footer div.col-sm:nth-child(2) h3').click(function(){
            $('footer div.col-sm:nth-child(2) ul').toggle();
        })
        $('footer .rn_widget_2').click(function(){
            $('footer .rn_widget_menu_2').toggle();
        })
        $('footer .rn_widget_3').click(function(){
            $('footer .rn_widget_menu_3').toggle();
        });
        /*$('.rozsirene-button').click(function(){
            $('.rozsirene-hledani').toggle();
        })*/
        $('.show-user-edit').click(function(){
            $('.profil-form').toggle();
            $('.profil-view').toggle();
        })
        /*end jquery*/
        })
        </script>
        <script>
        /* TODO TABY SLUŽEB */
        $(document).ready(function() {

        $('#tabs li:not(:first)').addClass('inactive');
        $('.tab-sl-content').hide();
        $('.tab-sl-content:first').show();

        $('#tabs li').click(function(){
            var t = $(this).attr('id');
          if($(this).hasClass('inactive')){ //this is the start of our condition
            $('#tabs li').addClass('inactive');
            $(this).removeClass('inactive');

            $('.tab-sl-content').hide();
            $('#'+ t + 'C').fadeIn('slow');
         }
        });

        });
        </script>
        <!-- TODO RANGE INPUTY -->
        <script type="text/javascript" src="/realsys/wp-content/themes/realsys/assets/js/js_frontend/src/jcf/jcf.range.js"></script>

        <script>
        /* TODO TABY V PROFILU */
        $(document).ready(function() {

        $('.profil li a:not(:first)').addClass('inactive');
        $('.tab-sl-content').hide();
        $('.tab-sl-content:first').show();

        $('.profil li a').click(function(){
            var t = $(this).attr('id');
          if($(this).hasClass('inactive')){ //this is the start of our condition
            $('.profil li a').addClass('inactive');
            $(this).removeClass('inactive');

            $('.tab-sl-content').hide();
            $('#'+ t + 'C').fadeIn('slow');
         }
        });

        });
        </script>


        <div class="prihlaseni-wrapper">
            <button type="button" class="btn btn-primary mb-md-5" id="myInput" data-toggle="modal" data-target="#prihlaseni">
                Launch demo modal
            </button>

            <?php
                get_template_part("templates/page", "login");
            ?>
        </div>

            <?php wp_footer(); ?>
            <?php
            if(!DEPLOYMENT){
                echo globalUtils::renderDebug();
            }
            ?>
    </body>
</html>
