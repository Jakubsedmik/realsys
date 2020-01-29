<?php

$api_actions = array(
	'removeElement' => array(
		'callback' => 'removeElement',
		'private' => true
	),
	'getElements' => array(
		'callback' => 'getElements',
		'private' => true
	),
	'getElement' => array(
		'callback' => 'getElement',
		'private' => true
	),
	'upload' => array(
		'callback' => 'uploadFile',
		'private' => true
	),
	'getInzeratObrazky' => array(
		'callback' => 'getInzeratObrazky',
		'private' => true
	),
	'setParam' => array(
		'callback' => 'setObrazkyParam',
		'private' => true
	),
	'removePic' => array(
		'callback' => 'removeObrazek',
		'private' => true
	),
	'googleVerification' => array(
		'callback' => 'googleVerification',
		'private' => false
	),
	'checkUserExists' => array(
		'callback' => 'checkUserExists',
		'private' => false
	),
	'getInzeraty' => array(
		'callback' => 'getInzeraty',
		'private' => false
	)
);



// registering apis
foreach ($api_actions as $key => $value){
	if(is_array($value)){
		if(function_exists($value['callback'])){
			if($value['private']){
				add_action("wp_ajax_" . $key, $value['callback']);
			}else{
				add_action("wp_ajax_" . $key, $value['callback']);
				add_action("wp_ajax_nopriv_" . $key, $value['callback']);
			}
		}else{
			trigger_error("Api.php :: zadaný callback neexistuje");
		}
	}else{
		if(function_exists($value)){
			add_action("wp_ajax_" . $key, $value);
			add_action("wp_ajax_nopriv_" . $key, $value);
		}else{
			trigger_error("Api.php :: zadaný callback neexistuje");
		}
	}
}






// API FUNCTIONS DECLARATIONS


function removeElement (){
	$response = new stdClass();
	if(Tools::checkPresenceOfParam("model", $_GET) && Tools::checkPresenceOfParam("id", $_GET)){
		$model = $_GET['model'];
		$id = $_GET['id'];
		$result = assetsFactory::removeEntity($model, $id);
		if($result){
			$response->status = 1;
			$response->message = "Objekt byl odebrán";
		}else{
			$response->status = 0;
			$response->message = "Nepodařilo se odebrat";
		}
	}else{
		$response->status = 0;
		$response->message = "Chybějící vstupní data";
	}


	wp_send_json($response);
	die();
}

function getElement (){

}


function uploadFile(){

	$response = Tools::uploadImage();
	if(Tools::checkPresenceOfParam("onlyupload",$_POST)){
		wp_send_json($response);
		die();
		return true;
	}

	if(is_object($response)){
		$universal_name = $response->universal_name;
		$default_url = $response->default_url;

		if(Tools::checkPresenceOfParam("id",$_POST)){
			$obrazek = assetsFactory::createEntity("obrazekClass", array(
				'url' => $default_url,
				'kod' => $universal_name,
				'inzerat_id' => $_POST['id']
			));
		}else{
			$obrazek = assetsFactory::createEntity("obrazekClass", array(
				'url' => $default_url,
				'kod' => $universal_name
			));
		}

		$response->db_id = $obrazek->getId();
	}
	wp_send_json($response);
	die();
}

function getElements (){
	global $dictionary;
	$allrequest = array_merge($_POST, $_GET);
	$result = Tools::postChecker(
		$allrequest,
		array(
			"model" => array(
				"type" => STRING,
				"required" => true
			),
			"page" => array(
				"type" => NUMBER,
				"required" => true
			),
			"countPage" => array(
				"type" => NUMBER,
				"required" =>true
			),
			"search" => array(
				"type" => STRING,
				"required" => false
			)
		)
	);

	if(is_array($result) && count($result) > 0){
		$response = new stdClass();
		$response->status = 0;
		$response->message = "Některé parametry nebyli vyplněny";
		$response->description = $result;
		wp_send_json($response);
		die();
	}elseif (!is_array($result)){
		$response = new stdClass();
		$response->status = 0;
		$response->message = "Nastala interní chyba";
		wp_send_json($response);
		die();
	}

	$model = $allrequest['model'];
	$page = $allrequest['page'];
	$count_page = $allrequest['countPage'];

	// todo mělo by to umět akceptovat i filtery
	$filters = array();
	foreach ($allrequest as $key => $value){
		if(property_exists($model, $key)){
			$new_key = str_replace("db_","", $key);
			$filters[$new_key] = $value;
		}
	}

	$dbFilters = array();
	foreach ($filters as $key => $value){
		$dbFilters[] = new filterClass($key, "=", $value);
	}



	if(class_exists($model)){

		$page = $page-1;
		$offset = $count_page * $page;

		if(Tools::checkPresenceOfParam("search", $allrequest)){
			$search = $allrequest['search'];
			$items = assetsFactory::getAllEntity($model, $dbFilters);

			$items = array_filter($items, function($obj, $index) use ($search){
				return $obj->findMe($search);
			},ARRAY_FILTER_USE_BOTH);
			$count = count($items);

			$items = array_slice($items, $offset, $count_page);

		}else{

			$items = assetsFactory::getAllEntity($model, $dbFilters, $offset, $count_page);
			$count = assetsFactory::getAllEntityCount($model, $dbFilters);

		}

		$newItems = array();
		foreach ($items as $val){
			$val->writeDials();
			$newItems[] = $val;
		}

		$response = new stdClass();
		$response->radky = $newItems;
		$response->prekladHlavicek = $dictionary;
		$response->totalRecords = $count;
		$response->status = 1;
		$response->message = "Výsledky byli vráceny";
		wp_send_json($response);
		die();


	}else{
		$response = new stdClass();
		$response->status = 0;
		$response->message = "Tento model v systému neexistuje";
		wp_send_json($response);
		die();
	}


}

function getInzeratObrazky(){
	$response = new stdClass();
	if(Tools::checkPresenceOfParam("id", $_GET)){
		$id = $_GET['id'];
		$filter = array();
		$filter[] = new filterClass("inzerat_id","=", $id);
		$obrazky = assetsFactory::getAllEntity("obrazekClass",$filter);
		$response->status = 1;
		$response->obrazky = $obrazky;
	}else{
		$response->status = 0;
	}

	wp_send_json($response);
	die();
}

function setObrazkyParam(){
	$response = new stdClass();
	if(Tools::checkPresenceOfParam("id", $_POST) && Tools::checkPresenceOfParam("param", $_POST) && Tools::checkPresenceOfParam("new_value",$_POST)){
		$id = $_POST['id'];
		$param = $_POST['param'];
		$new_value = $_POST['new_value'];

		$obrazek = assetsFactory::getEntity("obrazekClass",$id);
		if($param == "db_front"){
			$filter = array();
			$inzerat_id = $obrazek->db_inzerat_id;
			$filter[] = new filterClass("inzerat_id", "=", $inzerat_id);
			$obrazky = assetsFactory::getAllEntity("obrazekClass",$filter);
			foreach ($obrazky as $key => $value){
				$value->db_front = 0;
			}
		}
		$obrazek->$param = $new_value;

		$response->status = 1;
		$response->message = "Uloženo";
	}else{
		$response->status = 0;
		$response->message = "Chybějící parametry";
	}
	wp_send_json($response);
	die();
}


function removeObrazek(){
	$response = new stdClass();
	if(Tools::checkPresenceOfParam("id", $_POST)){
		$id = $_POST['id'];
		$result = assetsFactory::removeEntity("obrazekClass",$id);
		if($result){
			$response->status = 1;
			$response->message = "Smazáno";
		}else{
			$response->status = 0;
			$response->message = "Došlo k chybě při mazání";
		}
	}else{
		$response->status = 0;
		$response->message = "Chybějící parametry";
	}
	wp_send_json($response);
	die();
}


function googleVerification(){
	$response = new stdClass();
	$result = Tools::postChecker(
		$_POST,
		array(
			"email" => array(
				"type" => EMAIL,
				"required" => true
			),
			"gid" => array(
				"type" => STRING,
				"required" => true
			),
			"token" => array(
				"type" => STRING,
				"required" => true
			)
		),
		true
	);
	if($result){

		$email = $_POST['email'];
		$gid = $_POST['gid'];
		$token = $_POST['token'];

		$uzivatel = assetsFactory::getAllEntity(
			"uzivatelClass",
			array(
				new filterClass("email","=","'" . $email . "'"),
				new filterClass("gmid", "=","'" . $gid . "'")
			),
			false,
			false,
			true
		);
		if(is_array($uzivatel) && count($uzivatel) == 0){
			$response->status = 1;
			$response->message = "Uživatel neexistuje";
		}else{


			$verificationArray = array(
				"email" => $_POST['email'],
				"sub" => $_POST['gid']
			);

			$payload = Tools::googleTokenVerification($token, $verificationArray);
			if($payload){

				$response->status = 0;
				$response->message = "Tento uživatel již existuje";
				$uzivatel = array_shift($uzivatel);
				$uzivatel->logIn();

				ob_start();
				Tools::jsRedirect(Tools::getFERoute("uzivatelClass", $uzivatel->getId()),500);
				$ob = ob_get_clean();

				$response->actionHtml = $ob;
			}else{
				$response->status = -2;
				$response->message = "Systém - chyba, pokoušíte se o něco nekalého";
			}

		}
	}else{
		$response->status = -1;
		$response->message = "Došlo k technické chybě - chybějící parametry";
	}
	wp_send_json($response);
	die();
}



function checkUserExists(){

	if(Tools::checkPresenceOfParam("db_email", $_GET)){
		$email = $_GET['db_email'];
		$user_exists = assetsFactory::getAllEntity("uzivatelClass",array(new filterClass("email", "=", "'" . $email . "'")));
		if($user_exists && is_array($user_exists) && count($user_exists) > 0){
			wp_send_json(false);
			die();
		}
	}
	wp_send_json(true);
	die();
}


function getInzeraty(){

	// now shut down error reporting for a while
	error_reporting(0);
	ini_set('display_errors', 'Off');

	$response = new stdClass();
	if(Tools::checkPresenceOfParam("countPage",$_GET) && Tools::checkPresenceOfParam("page", $_GET) && Tools::checkPresenceOfParam("sortBy", $_GET)){

		$sortBy = $_GET['sortBy'];
		$sortBy = str_replace("db_", "", $sortBy);
		$bufferSize = $_GET['countPage'];
		$page = $_GET['page'];

		$offset = $bufferSize * ($page-1);

		$inzeraty = assetsFactory::getAllEntity(
			"inzeratClass",
			array(),
			$offset,
			$bufferSize,
			false,
			"ORDER BY $sortBy ASC"
		);




		$i = 0;
		$ordered_list = array();
		foreach ($inzeraty as $key => $val){
			$val->ignoreInterface();
			$val->writeDials();
			$val->getSubobject("obrazek");
			$val->link = Tools::getFERoute("inzeratClass", $val->getId());
			$val->order = $i;
			$ordered_list[] = $val;
			$i++;
		}


		$response->status = 1;
		$response->appData = new stdClass();
		$response->appData->inzeraty = $inzeraty;
		$response->appData->currency = CURRENCY;
		$response->appData->totalRecordsCount = assetsFactory::getAllEntityCount("inzeratClass");

	}else{
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}