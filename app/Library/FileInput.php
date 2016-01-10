<?php

namespace App\Library;

use App\Library\LoggerInterface;

class FileInput extends StdinInput{
	


	protected $filePath;

	public function __construct($filePath, LoggerInterface $logger) {

		$this->validatePath($filePath);

		$this->logger = $logger;

		$this->filePath = $filePath;

	}

	/**
	 * Validate input filepath type
	 * @param string $filePath
	 */

	protected function validatePath($filePath) {

		if(!file_exists($filePath)){
			throw new \Exception('Please use a valid file path.');
		}

	}

	public function open($path = null) {

		if(!$path) $path = $this->filePath;

		parent::open($path);

	}

}