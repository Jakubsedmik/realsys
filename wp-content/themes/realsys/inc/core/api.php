<?php

$api_actions = array(
	'removeElement' => 'removeElement',
	'getElements' => 'getElements',
	'getElement' => 'getElement',
	'upload' => 'uploadFile'
);



// registering apis
foreach ($api_actions as $key => $value){
	if(is_array($value)){
		if(function_exists($value['callback'])){
			if($value['private']){
				add_action("wp_ajax_" . $key, $value['callback']);
			}else{
				add_action("wp_ajax_nopriv_" . $key, $value);
				add_action("wp_ajax_" . $key, $value['callback']);
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


	if(class_exists($model)){

		$page = $page-1;
		$offset = $count_page * $page;

		if(Tools::checkPresenceOfParam("search", $allrequest)){
			$search = $allrequest['search'];
			$items = assetsFactory::getAllEntity($model, null);

			$items = array_filter($items, function($obj, $index) use ($search){
				return $obj->findMe($search);
			},ARRAY_FILTER_USE_BOTH);
			$count = count($items);

			$items = array_slice($items, $offset, $count_page);

		}else{

			$items = assetsFactory::getAllEntity($model, null, $offset, $count_page);
			$count = assetsFactory::getAllEntityCount($model, null);

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