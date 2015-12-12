<?php

class LausiJsonAction extends BaseAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		header('Content-Type: application/json; charset=utf-8');
	}

	protected function failureResponse($errorCode) {
		switch ($errorCode) {
			case 400:
				header('HTTP/1.1 400 Bad Request');
				break;
			case 404:
				header('HTTP/1.1 404 Not Found');
				break;
			case 500:
				header('HTTP/1.1 500 Internal Server Error');
				break;
			default:
				throw new Exception("unsupported error code: $errorCode");
		}
	}
}
