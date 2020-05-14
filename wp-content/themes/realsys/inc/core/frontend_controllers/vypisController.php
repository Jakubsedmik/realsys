<?php


class vypisController extends frontendController {

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {

		// FILTER AVAILABLE FILTERS FROM HP
		global $filter_hp_parameters;
		$vue_preset_filters = array();
		foreach ($this->requestData as $key => $value){
			if(in_array($key, $filter_hp_parameters)){
				$vue_preset_filters[$key] = $this->requestData[$key];
			}
		}
		$this->requestData['filterPreset'] = Tools::prepareJsonToOutputHtmlAttr($vue_preset_filters);

		// PREPARE FILTERS FOR VUE
		global $filter_parameters;
		foreach ($filter_parameters as $key => $value){
			$key_new = str_replace("db_","", $key);
			if($value['type'] == "select" || $value['type'] == "customswitcher"){
				$filter_parameters[$key]['values'] = globalUtils::getValuesForFilter("inzeratClass", $key_new, "-- Bez filtru --");
			}
		}

		$this->requestData['filter'] = Tools::prepareJsonToOutputHtmlAttr($filter_parameters);
	}
}
