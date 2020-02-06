<?php


class vypisController extends frontendController {

	public function beforeHeadersAction() {
		// TODO: Implement beforeHeadersAction() method.
	}

	public function action() {
		global $filter_parameters;
		foreach ($filter_parameters as $key => $value){
			$key_new = str_replace("db_","", $key);
			$filter_parameters[$key]['values'] = globalUtils::getValuesForFilter("inzeratClass", $key_new);
		}

		$this->requestData['filter'] = Tools::prepareJsonToOutputHtmlAttr($filter_parameters);
	}
}