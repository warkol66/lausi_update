<?php

class LausiAddressesDoUploadPhotoAction extends BaseAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		if (empty($_FILES['file']) || empty($_POST['id']))
			return $this->failureResponse(400);

		$file = $_FILES['file'];
		if ($file['error']) {
			switch ($file['error']) {
				case 4:
					return $this->failureResponse(400);
				default:
					return $this->failureResponse(500);
			}
		}

		$address = AddressQuery::create()->findOneById($_POST['id']);
		if (!$address)
			return $this->failureResponse(404);

		Photo::ensureDirIsWritable();
		$photo = Photo::createFromUploadedFile($file);

		$address->addPhoto($photo);
		$address->save();

		$response = [
			'Id' => $photo->getId(),
			'Uri' => $photo->getUri()
		];
		echo json_encode($response);
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
