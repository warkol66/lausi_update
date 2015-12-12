<?php

require_once 'LausiJsonAction.php';

class LausiFastDoEditAction extends LausiJsonAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		$availableEdits = [
			'Address' => ['hasGrille'],
			'Billboard' => ['height']
		];

		if (empty($_POST['id']) || empty($_POST['class'])
				|| empty($_POST['field']) || !isset($_POST['value'])) {
			return $this->failureResponse(400);
		}

		$id = $_POST['id'];
		$class = $_POST['class'];
		$field = $_POST['field'];
		$value = $_POST['value'];

		if (!array_key_exists($class, $availableEdits) || !in_array($field, $availableEdits[$class])) {
			return $this->failureResponse(404);
		}

		$queryClass = $class . 'Query';
		$object = $queryClass::create()->findOneById($id);
		if (!$object) {
			return $this->failureResponse(404);
		}

		$setField = 'set' . ucfirst($field);
		$getField = 'get' . ucfirst($field);
		$object->$setField($value);
		$object->save();

		$responseData = [
			'class' => $class,
			'field' => $field,
			'value' => $object->$getField()
		];
		echo json_encode($responseData);
	}
}
