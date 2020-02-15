<?php
    $gatewayUrl = $this->requestData['gopayParameters']["gatewayUrl"];
    $embedJs = $this->requestData['gopayParameters']["embedJs"];
?>

<form action="<?php echo $gatewayUrl; ?>" method="post" id="gopay-payment-button">
  <button name="pay" type="submit">Zaplatit kartou - inline varianta</button>
  <script type="text/javascript" src="<?php echo $embedJs; ?>"></script>
</form>
