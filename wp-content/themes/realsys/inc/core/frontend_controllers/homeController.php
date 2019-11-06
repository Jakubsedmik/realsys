<?php


class homeController extends frontendController {

	public function action() {
		print_r($this->workData);
	}

	public function beforeHeadersAction() {
		$this->workData['es'] = 'present';
	}
}