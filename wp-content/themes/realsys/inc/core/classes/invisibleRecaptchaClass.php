<?php


class invisibleRecaptchaClass
{
    protected $secret;
    protected $remoteip;
    protected $url;

    public function __construct()
    {
        $this->url = "https://www.google.com/recaptcha/api/siteverify";
        $this->remoteip = $_SERVER['REMOTE_ADDR'];
        $this->secret = RECAPTCHA;
    }

    public function verifyRecaptcha($recaptcha_hash){

		// Curl Request
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(
			'secret' => $this->secret,
			'response' => $recaptcha_hash,
			'remoteip' => $this->remoteip
			));
		$curlData = curl_exec($curl);
		curl_close($curl);

		// Parse data
		$recaptcha = json_decode($curlData, true);

		if($recaptcha !== NULL){
            if ($recaptcha["success"]){
                return true;
            }else{
                return false;
            }
        }else{
		    trigger_error("Failed to get recaptcha response");
		    return false;
        }
    }

    public function generateRecaptchaSubmitButton($text, $classes, $form_to_submit, $name="", $value=""){
    	?>
		    <script src="https://www.google.com/recaptcha/api.js?onload=onLoad&render=explicit" async defer></script>

		<?php
    }
}