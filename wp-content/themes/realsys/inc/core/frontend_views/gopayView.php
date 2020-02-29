<?php
    $gatewayUrl = $this->requestData['gopayParameters']["gatewayUrl"];
    $embedJs = $this->requestData['gopayParameters']["embedJs"];
?>

<section>
    <div class="payment-con">
        <div class="wrapper">
            <?php echo frontendError::getFrontendErrors();?>
            <h2>Pokračujte do platební brány</h2>
            <p>Úspěšně jsme pro Vás připravili platební bod - prosím pokračuje do platební brány</p>
            <form action="<?php echo $gatewayUrl; ?>" method="post" id="gopay-payment-button">
              <button name="pay" type="submit" class="btn">Zaplatit platební kartou</button>
              <script type="text/javascript" src="<?php echo $embedJs; ?>"></script>
            </form>

        </div>
    </div>
</section>