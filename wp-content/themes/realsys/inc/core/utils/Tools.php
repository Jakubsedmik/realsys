<?php

/*
 * Užitečné funkce, slouží např. ke kontrole dat apod.
 */

/**
 * Description of Tools
 *
 * @author Uzivatel
 */
class Tools {
    
    /*
     * Kontroluje existenci proměné $what v poli $where
     */
    public static function checkPresenceOfParam($what, $where){
        return (isset($where[$what]) && (strlen($where[$what]) > 0 || is_array($where[$what])))? true : false;
    }
    

    /*
     * Metoda převzatá z THMP, je podobná fieldChecker
     * do metody vchází $arr které disponuje daty
     * do metody vchází také rules který má následující strukturu
     * $rules = array( 'neco' => array('type'=>'str', 'required' => false))
     * pokud je nastaveno advanced na true vrací jen zdali je pole v pořádku zdali nikoli
     * pokud je advanced nastaveno na false vrací pole chyb
     */
    public static function postChecker($arr, $rules, $advanced = false){
            $arrOfWrong = array();

            foreach ($rules as $key => $value) {
                $type = $value['type'];
                $required = $value['required'];
                if(isset($arr[$key])){
	                $val = $arr[$key];
                }else{
	                $val = null;
                }

                $type_checker = new typeClass($key, $val, $required, $type);

                if(!$type_checker->getStatus()){
                    $arrOfWrong[$key] = $type_checker->getMessage();
                }else{
                    $value = Tools::transformType($type, $value);
                }
            }

            if($advanced){
                return (count($arrOfWrong) == 0);
            }

            return $arrOfWrong;
    }
    
    
    /*
     * Metoda, která kontroluje zda da daná hodnota $value odpovídá danému typu $type
     * pokud ano vrací true, pokud ne vrací false
     */
    public static function fieldChecker($value, $type){
        switch ($type){
            case "text" :
                if(is_string($value) && strlen($value)){
                    return true;
                }
                return "Hodnota není text";
                break;
            case "number" :
                if(ctype_digit($value)){
                    return true;
                }
                return "Hodnota není číslo";
                break;
            case "url" :
                if(filter_var($value, FILTER_VALIDATE_URL)){
                    return true;
                }
                return "Hodnota není url";
                break;
            case "array" :
                if(is_array($value)){
                    return true;
                }
                return "Nesprávná manipulace";
                break;
            case "link" : 
                if(is_numeric($value)){
                    return true;
                }
                return "Nesprávná manipulace";
                break;
            case "time" : 
                if(preg_match('/^\d{1,2}:\d{1,2}$/m', $value)){
                    return true;
                }
                return "Čas je v nesprávném formátu. Doporučený formát hh:mm.";
                break;
            case "bool" : 
                if(is_bool($value) || $value==1 || $value==0){
                    return true;
                }
                return "Není logická hodnota.";
                break;
                
        }
        
    }
    
    
    
    /*
     * Metoda, která připravuje danou hodnotu na výstup na frontend
     * je použita v mnoha případech (již implementována na mnoha místech) a tím je možné ji použít jako filtr a
     * ošetřit tím nějaké výstupy na frontendu
     */
    public static function fieldPrepare($value){
        if(is_array($value)){
            return maybe_serialize($value);
        }
        if($value == "true"){
            return 1;
        }
        if($value == "false"){
            return 0;
        }
        return $value;
    }
    
    
    /*
     * Připraví json ouput pro zařazení např. do data-neco atributu v HTML značce
     */
    public static function prepareJsonToOutputHtmlAttr($object){
        if($object){
            return str_replace('"',"'",json_encode($object));
        }else {
            return "[]";
        }
        
    }

    public static function getPathTillFolder($folder, $path){
        $path = str_replace("\\", "/", $path);
        $pathobject = explode("/", $path);
        $newpath = array();
        foreach ($pathobject as $key => $value){
            if($value == $folder){
                $newpath[] = $value;
                break;
            }
            $newpath[] = $value;
        }
        return implode("/", $newpath) . "/";

    }

    public static function isValidUrl($url)
    {
        $new_url = $url;
        if(strstr($url,"http")==FALSE){
            $new_url = 'http://example.com' . $url;
        }
        $new_url = str_replace("http://localhost/", "http://example.com/", $new_url);
        if (parse_url($new_url, PHP_URL_SCHEME) != '') {
            return !(filter_var($new_url, FILTER_VALIDATE_URL) === false);
        }
        return false;
    }

    public static function getCurrentUrl(){
        $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        return $actual_link;
    }

    public static function getCleanUrl(){
        $dis_url = $_SERVER['REQUEST_URI'];
        $uri = trim(strtok($dis_url, '?'));
        return $uri;
    }

    public static function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    public static function jsRedirect($url, $delay=2000, $description = "Probíhá přesměrování", $subdescription = ""){
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                setTimeout(function () {
                    document.getElementById("loader").classList.add("loading");
                    document.getElementById("loaderDescription").innerHTML = "<?php echo $description; ?>";
                    document.getElementById("loaderSubdescription").innerHTML = "<?php echo $subdescription; ?>";
                    window.location.href = '<?php echo $url; ?>';
                },<?php echo $delay; ?>);
            })

        </script>
        <?php
    }


    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    /*
     * Metoda slouží k procesování formuláře
     * Nejdříve na základě pole allowed prochází source a vyfiltruje jen povolené data
     * následně zkontroluje zdali data odpovídají rules
     * následně vyfiltruje jen ta data která mají db prefix
     * následně se rozhodně zdali bude editovat či zakládat entitu
     * pokud editovat tak na základě id načte objekt a pak ho zedituje
     * pokud vytvářet tak vytvoří nový objekt a předá mu nová data
     * na konci zavolá buď successCallback nebo failCallback
     */

    public static function formProcessor(
            $allowed,
            $source,
            $className,
            $action,
            $callbackSuccess="",
            $callbackFail="",
	        $format = null){

	    if(!class_exists($className)){
	        trigger_error("formProcessor::Zadaná třída neexistuje nebo není potomkem zakladního kamene");
	        return false;
        }

	    $newsource = array();
	    foreach ($allowed as $val){
	        if(isset($source[$val])){
	            $newsource[$val] = $source[$val];
            }
        }

	    if($format == null) {
	        global $field_rules;
	        if(isset($field_rules[$className])){
	            $format = $field_rules[$className];
            }else{
	            trigger_error("formProcessor:: Formát nebyl poskytnut a v zásobníku fieldRules k dané třídě neexistují pravidla -> není co ověřovat");
	            return false;
            }
        }

        $result = self::postChecker($newsource, $format, true);
        if($result){
            $db_properties = globalUtils::filterOnlyDbProperties($newsource);
            if($action == 'edit'){
                if(Tools::checkPresenceOfParam("db_id", $db_properties)){
                    $id = $db_properties['db_id'];
                    unset($db_properties['db_id']);

                    $entity = assetsFactory::getEntity($id);
                    if($entity){
                        foreach ($db_properties as $key => $value){
                            $entity->set_not_update($key, $value);
                            $entity->aktualizovat();
                        }
                    }
                    if(strlen($callbackSuccess) > 0){
	                    $callbackSuccess($entity, $source);
                    }
                    return true;

                }else{
                    trigger_error("formProcessor::ID není dostupné");
                    frontendError::addMessage("id", "ERROR", "Došlo k chybě!");
	                if(strlen($callbackFail) > 0){
		                $callbackFail($source);
                    }
                    return false;
                }
            }
            if($action == 'create'){
                $entity = assetsFactory::createEntity($className, $db_properties);
                $callbackSuccess($entity, $source);
                return true;

            }
        }

        return false;
    }


    /*
     * tato metoda by měla umět vytvořit normalizovaný formulář na základě zadaných parametrů
     * měla by ho vracet jako html
     * TODO dodělat normalizovaný formulář který umí odychytávat i sám sebe respektive pracuje s metodou processform
     */
    public static function createForm(
            $propsTypesValuesPlaceholders,
            $inputClasses,
            $wrapperClasses,
            $buttonText,
            $hiddenField,
            $className,
            $action
    ){


    }

    /* metoda sloužící k transformaci proměnné dle typu, např. datum, čas a do budoucna jiné */
    public static function transformType($type, $value){
        switch ($type){
            case "date" :
                $timestamp = strtotime($value);
                return $timestamp;
                break;
            case "time" : break;
                return $value;
        }
    }




}
