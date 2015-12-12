<?php

require_once 'LausiJsonAction.php';

class LausiPhotosDoDeleteAction extends LausiJsonAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		if (empty($_POST['id'])) {
			return $this->failureResponse(400);
		}

		$photo = PhotoQuery::create()->findOneById($_POST['id']);
		if (!$photo) {
			return $this->failureResponse(404);
		}

		try {
			$photo->delete();
			echo $photo->toJSON();
			return;
		} catch (Exception $e) {
			return $this->failureResponse(500);
		}

	}
}
