<?php


$pluginPath = __DIR__;
require_once __DIR__ . '/configuration/configuration.php';
require_once (__DIR__ . "/routingTable.php");


function autoloader($className){
    if(file_exists(__DIR__ . "/classes/" . $className . ".php")){
        require __DIR__ . "/classes/" . $className . '.php';
        return true;
    }elseif(file_exists(__DIR__ . "/utils/" . $className . ".php")) {
        require __DIR__ . "/utils/" . $className . '.php';
        return true;
    }
    return false;
}

spl_autoload_register("autoloader");


function loadActions(){
    global $actionsStack;
    require_once __DIR__ . '/frontend_controllers/frontendController.php';
    $controllerPaths = __DIR__ . "/frontend_controllers/*.php";

    $allfiles = glob($controllerPaths);
    $allfiles = array_filter($allfiles, function($value, $index){
        if(strpos($value, "frontendController.php") != false){ return false;}
        return true;
    }, ARRAY_FILTER_USE_BOTH);



    foreach ($allfiles as $key => $value) {
        require_once($value);
        $exploded = explode("/", $value);
        $classname = trim(str_replace(".php", " ",end($exploded)));
        $actioname = str_replace("Controller", "", $classname);
        if(class_exists($classname)){
            $actionsStack[] = new $classname($actioname);
        }

    }

}
add_action("template_redirect", "loadActions");




require_once ("crons.php");
require_once ("backend.php");
require_once ("api.php")



?>