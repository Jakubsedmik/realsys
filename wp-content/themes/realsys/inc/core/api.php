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
	),
	'changeUserAvatar' => array(
		'callback' => 'changeUserAvatar',
		'private' => false
	),
	'removeInzerat' => array(
		'callback' => 'removeInzerat',
		'private' => false
	),
	'changeInzeratStatus' => array(
		'callback' => 'changeInzeratStatus',
		'private' => false
	),
	'createInzeratImages' => array(
		'callback' => 'createInzeratImages',
		'private' => false
	),
	'removeWatchdog' => array(
		'callback' => 'removePes',
		'private' => false
	),
	'createWatchdog' => array(
		'callback' => 'createWatchdog',
		'private' => false
	),
	'checkUserCredits' => array(
		'callback' => 'checkUserCredits',
		'private' => false
	),
	'payForService' => array(
		'callback' => 'payForService',
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

	if(Tools::checkPresenceOfParam("sortBy", $_GET) && Tools::checkPresenceOfParam("getAll", $_GET)){

		$sortBy = $_GET['sortBy'];
		$sortBy = str_replace("db_", "", $sortBy);

		$inzeraty = assetsFactory::getAllEntity(
			"inzeratClass",
			array(
				new filterClass("stav_inzeratu", "=", 1)
			),
			false,
			false,
			false,
			"ORDER BY $sortBy ASC"
		);

		$i = 0;
		$ordered_list = array();
		foreach ($inzeraty as $key => $val){
			$val->ignoreInterface();
			$val->writeDials();
			$val->getSubobject("obrazek");
			$val->setForceNotUpdate();
			$val->link = Tools::getFERoute("inzeratClass", $val->getId());
			$val->order = $i;
			$ordered_list[] = $val;
			$i++;
		}

		$response->status = 1;
		$response->appData = new stdClass();
		$response->appData->inzeraty = $inzeraty;
		$response->appData->currency = CURRENCY;
	}elseif (Tools::checkPresenceOfParam("countPage",$_GET) && Tools::checkPresenceOfParam("page", $_GET) && Tools::checkPresenceOfParam("sortBy", $_GET)){

		$sortBy = $_GET['sortBy'];
		$sortBy = str_replace("db_", "", $sortBy);
		$bufferSize = $_GET['countPage'];
		$page = $_GET['page'];

		$offset = $bufferSize * ($page-1);

		global $filter_parameters;
		$filter_arr = array();
		foreach ($filter_parameters as $key => $value){
			if(Tools::checkPresenceOfParam($key, $_GET)){
				$wanted_value = $_GET[$key];
				if($wanted_value != -1){
					$column = str_replace("db_","",$key);
					$filter = new filterClass($column, "=", "'" . $wanted_value . "'");
					$filter_arr[] = $filter;
				}
			}
		}

		$filter_arr[] = new filterClass("stav_inzeratu","=",1);


		$inzeraty = assetsFactory::getAllEntity(
			"inzeratClass",
			$filter_arr,
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
			$val->setForceNotUpdate();
			$val->link = Tools::getFERoute("inzeratClass", $val->getId());
			$val->order = $i;
			$ordered_list[] = $val;
			$i++;
		}


		$response->status = 1;
		$response->appData = new stdClass();
		$response->appData->inzeraty = $inzeraty;
		$response->appData->currency = CURRENCY;
		$response->appData->totalRecordsCount = assetsFactory::getAllEntityCount("inzeratClass", $filter_arr);

	}else{
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}


function changeUserAvatar() {
	$result = Tools::postChecker($_POST,array(
		'id' => array(
			'required' => true,
			'type' => NUMBER
		)
	),true);
	if($result){

		$response = Tools::uploadImage();

		if(is_object($response)){
			$universal_name = $response->universal_name;
			$default_url = $response->default_url;


			$obrazek = assetsFactory::createEntity("obrazekClass", array(
				'url' => $default_url,
				'kod' => $universal_name
			));

			$id = $_POST['id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel && $uzivatel->isUserLoggedIn()){
				$url = home_url() . $obrazek->getImageDimensions()['gallery'];
				$response->gallery_url = $url;
				$uzivatel->db_avatar = $url;
				$response->db_id = $obrazek->getId();
			}else{
				$response = new stdClass();
				$response->status = 0;
				$response->message = "Uživatel neexistuje nebo není zalogován";
			}
		}else{
			$response = new stdClass();
			$response->status = 0;
			$response->message = "Nastala chyba!";
		}


	}else{
		$response = new stdClass();
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}


function removeInzerat(){
	$response = new stdClass();

	$result = Tools::postChecker($_POST, array(
		"inzeratid" => array(
			'required' => true,
			'type' => NUMBER
		),
		"userid" => array(
			'required' => true,
			'type' => NUMBER
		)
	), true);

	if($result){
		$uzivatel_id = $_POST['userid'];
		$inzerat_id = $_POST['inzeratid'];
		$uzivatel = assetsFactory::getEntity('uzivatelClass', $uzivatel_id);
		if($uzivatel->isUserLoggedIn()){
			$inzerat = assetsFactory::getEntity("inzeratClass", $inzerat_id);
			if($inzerat && $inzerat->db_uzivatel_id == $uzivatel_id){
				$result = assetsFactory::removeEntity("inzeratClass", $inzerat_id);
				if($result){
					$response->status = 1;
					$response->message = "Úspěšně smazáno";
				}else{
					$response->status = 0;
					$response->message = "Smazání se nevydařilo";
				}
			}else{
				$response->status = 0;
				$response->message = "Inzerát není ve vlastnictví uživatele.";
			}
		}else{
			$response->status = 0;
			$response->message = "Uživatel není přihlášen";
		}
	}else{
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}


function changeInzeratStatus(){
	$response = new stdClass();

	$result = Tools::postChecker($_POST, array(
		"inzeratid" => array(
			'required' => true,
			'type' => NUMBER
		),
		"userid" => array(
			'required' => true,
			'type' => NUMBER
		),
		"inzeratstatus" => array(
			'required' => true,
			'type' => NUMBER
		)
	), true);

	if($result){
		$uzivatel_id = $_POST['userid'];
		$inzerat_id = $_POST['inzeratid'];
		$inzerat_status = $_POST['inzeratstatus'];

		$uzivatel = assetsFactory::getEntity('uzivatelClass', $uzivatel_id);
		if($uzivatel->isUserLoggedIn()){
			$inzerat = assetsFactory::getEntity("inzeratClass", $inzerat_id);
			if($inzerat && $inzerat->db_uzivatel_id == $uzivatel_id){
				if($inzerat_status == 0 || $inzerat_status == 1){
					$inzerat->db_stav_inzeratu = $inzerat_status;
					$response->status = 1;
					$response->message = "Úspěšná změna stavu inzerátu";
				}else{
					$response->status = 0;
					$response->message = "Nepřípustné hodnoty stavu inzerátu";
				}

			}else{
				$response->status = 0;
				$response->message = "Inzerát není ve vlastnictví uživatele";
			}
		}else{
			$response->status = 0;
			$response->message = "Uživatel není přihlášen";
		}
	}else{
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}


function createInzeratImages(){
	$result = Tools::postChecker($_POST,array(
		'id' => array(
			'required' => true,
			'type' => NUMBER
		)
	),true);
	if($result){

		$response = Tools::uploadImage();

		if(is_object($response)){
			$universal_name = $response->universal_name;
			$default_url = $response->default_url;


			$obrazek = assetsFactory::createEntity("obrazekClass", array(
				'url' => $default_url,
				'kod' => $universal_name
			));

			$id = $_POST['id'];
			$uzivatel = assetsFactory::getEntity("uzivatelClass", $id);

			if($uzivatel && $uzivatel->isUserLoggedIn()){
				$url = home_url() . $obrazek->getImageDimensions()['listing'];
				$response->gallery_url = $url;
				$response->db_id = $obrazek->getId();
			}else{
				$response = new stdClass();
				$response->status = 0;
				$response->message = "Uživatel neexistuje nebo není zalogován";
			}
		}else{
			$response = new stdClass();
			$response->status = 0;
			$response->message = "Nastala chyba!";
		}


	}else{
		$response = new stdClass();
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}


function removePes(){
	$response = new stdClass();

	$result = Tools::postChecker($_POST, array(
		"id" => array(
			'required' => true,
			'type' => NUMBER
		),
		"userid" => array(
			'required' => true,
			'type' => NUMBER
		)
	), true);

	if($result){
		$uzivatel_id = $_POST['userid'];
		$pes_id = $_POST['id'];
		$uzivatel = assetsFactory::getEntity('uzivatelClass', $uzivatel_id);
		if($uzivatel->isUserLoggedIn()){
			$pes = assetsFactory::getEntity("hlidacipesClass", $pes_id);
			if($pes && $pes->db_uzivatel_id == $uzivatel_id){
				$result = assetsFactory::removeEntity("hlidacipesClass", $pes_id);
				if($result){
					$response->status = 1;
					$response->message = "Úspěšně smazáno";
				}else{
					$response->status = 0;
					$response->message = "Smazání se nevydařilo";
				}
			}else{
				$response->status = 0;
				$response->message = "Inzerát není ve vlastnictví uživatele.";
			}
		}else{
			$response->status = 0;
			$response->message = "Uživatel není přihlášen";
		}
	}else{
		$response->status = 0;
		$response->message = "Některé parametry nebyli specifikovány";
	}

	wp_send_json($response);
	die();
}

function createWatchdog(){

	// now shut down error reporting for a while
	error_reporting(0);
	ini_set('display_errors', 'Off');

	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body, true);
	$response = new stdClass();
	$result = Tools::postChecker($data, array(
		"filters" => array(
			"type" => PHPARRAY,
			"required" => true
		),
		"name" => array(
			"type" => STRING255,
			"required" => true
		),
		"type" => array(
			"type" => NUMBER,
			"required" => true
		)
	), true);


	if($result){
		$user = uzivatelClass::getUserLoggedId();
		if($user !== false){
			$user = assetsFactory::getEntity("uzivatelClass",$user);
			$type = $data['type'];

			if($type == 1 || $type == 2){
				// TODO KREDITS CHECK
				$user_kredits = 5;
				if($user_kredits >= 5){

				}

				$response->status = 0;
				$response->message = "Hlídací pes nebyl vytvořen, protože platba kredity ještě není povolená.";

			}else{
				$jmeno_psa = $data['name'];
				$filters = $data['filters'];
				$hlidacipes = assetsFactory::createEntity("hlidacipesClass",array(
					'jmeno_psa' => $jmeno_psa,
					'posledni_inzeraty' => array(),
					'nastaveni_filtru' => array(),
					'uzivatel_id' => $user->getId(),
					'premium' => $type
				));
				$hlidacipes->nastavFiltr($filters);
				$hlidacipes->cron_zkontrolujInzeraty();
				
				if($hlidacipes){
					$response->status = 1;
					$response->message = "Hlídací pes úspěšně vytvořen";
				}else{
					$response->status = 0;
					$response->message = "Hlídací pes se nepodařil vytvořit";
				}
			}
		}else{
			$response->status = 0;
			$response->message = "Hlídací pes se nevytvořil. Nejste přihlášen.";
		}
	}else{
		$response->status = 0;
		$response->message = "Nebyli zadány všechny parametry";
	}

	wp_send_json($response);
	die();
}


function checkUserCredits(){

	$result = Tools::postChecker($_GET, array(
		'serviceid' => array(
			'type' => NUMBER,
			'required' => true
		)
	), true);

	$response = new stdClass();

	if($result){
		$user_id = uzivatelClass::getUserLoggedId();
		if($user_id !== false){
			$user = assetsFactory::getEntity("uzivatelClass",$user_id);
			if($user){
				$billance = $user->getUserBillance();
				$serviceid = $_GET['serviceid'];
				global $cenik_sluzeb;
				if(isset($cenik_sluzeb[$serviceid])){

					$price = $cenik_sluzeb[$serviceid]['price'];

					if($price <= $billance){
						$response->status = 1;
						$response->message = "Uživatel má dostatek kreditů";
					}else{
						$response->status = 0;
						$response->message = "Uživatel nemá dostatek kreditů - stav kreditů: " . $billance . ", Požadované množství: " . $price;
					}
				}else{
					$response->status = -1;
					$response->message = "Tato služba neexistuje";
				}
			}else{
				$response->status = -2;
				$response->message = "Neexistující uživatel";
			}
		}else{
			$response->status = -3;
			$response->message = "Uživatel není přihlášen";
		}
	}else{
		$response->status = -4;
		$response->message = "Povinná pole nebyla vyplněna.";
	}

	wp_send_json($response);
	die();
}


function payForService(){

	$result = Tools::postChecker($_GET, array(
		'serviceid' => array(
			'type' => NUMBER,
			'required' => true
		)
	), true);

	$response = new stdClass();

	if($result){
		$user_id = uzivatelClass::getUserLoggedId();
		if($user_id !== false){
			$user = assetsFactory::getEntity("uzivatelClass",$user_id);
			if($user){

				$serviceid = $_GET['serviceid'];
				global $cenik_sluzeb;

				$service = $cenik_sluzeb[$serviceid];
				if(isset($service['requireEntity'])){

					$result = Tools::postChecker($_GET, array(
						'entitytype' => array(
							"type" => STRING255,
							"required" => true
						),
						'entityid' => array(
							"type" => NUMBER,
							"required" => true
						)
						)
					);

					if($result){

						$entitytype = $_GET['entitytype'];
						$entityid = $_GET['entityid'];
						$entity = assetsFactory::getEntity($entitytype, $entityid);

						$factory = new transactionFactory($user, $entity);
						$result = $factory->requestService($serviceid);

					}else{
						$response->status = -1;
						$response->message = "Při objednání služby tohoto typu je třeba poskytnou informace o entitě a její ID";
					}
				}else{
					$factory = new transactionFactory($user);
					$result = $factory->requestService($serviceid);
					if($result->status == 1){
						$response->status = 1;
						$response->message = "Ok";
						$response->behavior = 'finish';
					}else{
						$response->status = 0;
						$response->message = "Platba neproběhla";
					}
				}

			}else{
				$response->status = -2;
				$response->message = "Neexistující uživatel";
			}
		}else{
			$response->status = -3;
			$response->message = "Uživatel není přihlášen";
		}
	}else{
		$response->status = -4;
		$response->message = "Povinná pole nebyla vyplněna.";
	}

		wp_send_json($response);
	die();
}