<?php

require_once 'LausiJsonAction.php';

class LausiAddressesDoUploadPhotoAction extends LausiJsonAction {

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
}
