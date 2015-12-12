<?php

/**
 * Base de Fotos
 */
class Photo extends BasePhoto {

	static function getPhotosDir() {
		return 'WEB-INF/uploaded-files/photos';
	}

	static function ensureDirIsWritable() {
		$photosDir = self::getPhotosDir();
		if (!file_exists($photosDir))
			mkdir($photosDir, 0755, true);
		if (!file_exists($photosDir))
			throw new Exception("Could not create dir $photosDir. Check permissions");

	}

	static function createFromUploadedFile($file) {
		$photo = new Photo();
		$photo->setName($file['name']);
		$photo->setType($file['type']);

		$fullFilename = $photo->getFullFilename();
		move_uploaded_file($file['tmp_name'], $fullFilename);
		if (!file_exists($fullFilename))
			throw new Exception("Could not write $fullFilename. Check permissions");

		return $photo;
	}

	function __construct() {
		$this->setFilename(uniqid());
	}

	function preDelete() {
		if (!parent::preDelete())
			return false;
		if (file_exists($this->getFullFilename()))
			unlink($this->getFullFilename());
		return true;
	}

	function getUri() {
		return 'Main.php?do=lausiPhotosGet&id=' . $this->getId();
	}

	function getFullFilename() {
		return self::getPhotosDir() . '/' . $this->getFilename();
	}

	function read() {
		return file_get_contents($this->getFullFilename());
	}
}
