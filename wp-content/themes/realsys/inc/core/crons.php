<?php

/* CRON METODA - tato je klasický cron který se pouští na zavolání endpointu http://localhost/realsys/wp-cron.php?start_usual_cron */
function runWatchdogCron(){

	$watchdogs = assetsFactory::getAllEntity("hlidacipesClass",array(new filterClass("premium", "=", 0)));
	foreach ($watchdogs as $key => $value){
		$value->cron_zkontrolujInzeraty(true);
	}

}


function runPremiumWatchdogCron(){
	$watchdogs = assetsFactory::getAllEntity("hlidacipesClass",array(new filterClass("premium", ">", 0)));
	foreach ($watchdogs as $key => $value){
		$value->cron_zkontrolujInzeraty(true);
	}
}
