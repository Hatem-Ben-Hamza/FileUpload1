<?php

namespace AppBundle\Service;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
* 
*/
class UploaderService 
{

	/*private $targetDirectory;
	function __construct($targetDirectory)
	{
		$this->targetDirectory = $targetDirectory;
	}*/

	public function upload(UploadedFile $file,$targetDirectory){
		$fileName = md5(uniqid()).'.'.$file->guessExtension();
		$file->move(
			$targetDirectory,
			$fileName
		);

		return $fileName;
	}
}