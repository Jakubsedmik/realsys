<section>
    <div class="kredity-con">
        <div class="wrapper">
	        <?php echo frontendError::getBackendErrors(); ?>
            <div class="section-title">
                <h1 class="title"><?php _e("Kredity", "realsys"); ?></h1>
                <p><?php _e("KredityPopis", "realsys"); ?></p>
            </div>

            <div class="section-form">
                <form class="js-validate-form" method="post">
                    <div class="inbox-form">
                        <div class="col-md-6 col-first form-field">
                            <h3>
	                            <?php _e("Kolik chcete zakoupit kreditů?", "realsys"); ?>
                            </h3>
                            <?php
                                global $cenik;
                                $i = 1;
                                foreach ($cenik as $key => $value) :
                            ?>
                            <label>
                                <input type="radio" name="credits" value="<?php echo $key; ?>" required>
                                <div class="credits-div">
                                    <div class="credits-amount">
                                        <img src="<?php echo FRONTEND_IMAGES_PATH; ?>/ikony/kredity_<?php echo $i; $i++; ?>.png">
                                        <strong><?php echo $key; ?></strong> <?php _e("Kreditů", "realsys"); ?>
                                    </div>
                                    <div class="credits-cost">
	                                    <?php echo $value; ?> <?php echo CURRENCY; ?>
                                    </div>
                                </div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-6 col-last form-field">
                            <h3>
	                            <?php _e("Výběr platby", "realsys"); ?>
                            </h3>
                            <label>
                                <input type="radio" name="payment" value="visa" required>
                                <div class="credits-div">
                                    <div class="credits-amount">
                                        <img src="<?php echo FRONTEND_IMAGES_PATH; ?>/ikony/mc.png">
                                        <div class="credits-cost"><?php _e("Visa / mastercard", "realsys"); ?></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="section-btn">
                        <input type="hidden" name="action" value="processPayment">
                        <button type="submit" class="btn">
	                        <?php _e("Potvrdit objednávku", "realsys"); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>