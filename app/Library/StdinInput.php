<?php

namespace App\Library;

use App\Library\LoggerInterface;

class StdinInput implements InputStrategy {
	

	/** @var  LoggerInterface $logger */
	protected $logger;

	protected $resource;

	public function __construct(LoggerInterface $logger) {

		$this->logger = $logger;

	}

	public function read() {

		$this->logger->info("Reading new line.");

		if(!$this->resource) {
			$this->open();
		}

		if(feof($this->resource)){
			$this->close();
			return false;
		}

		$content =  fgets($this->resource);

		return $content;
	}


	public function open($path = 'php://stdin') {

		$this->logger->info("Opening file {$path}...");
		
		$this->resource = fopen($path, 'r');

	}

	public function close() {

		$this->logger->info("Closing resource.");

		fclose($this->resource);
		$this->resource = null;

	}
}