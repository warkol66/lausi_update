<?php

class LausiPhotosGetAction extends BaseAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		if (empty($_GET['id']))
			return $this->failureResponse(400);

		$id = $_GET['id'];
		$photo = PhotoQuery::create()->findOneById($id);
		if (!$photo)
			return $this->failureResponse(404);

		$photoFile = $photo->read();
		header('Content-Type: ' . $photo->getType());
		echo $photoFile;
	}

	function failureResponse($errorCode) {
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
