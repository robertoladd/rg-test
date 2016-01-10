<?php

namespace App\Library;

use App\Library\InputStrategy;

class WordFrequency {

	/** @var InputStrategy $inputStrategy */
	protected $inputStrategy;

	/** @var  LoggerInterface $logger */
	protected $logger;


	/** @var  array $frequencyTable */
	protected $frequencyTable;

	/** @var  bool $cleanHTMLTags */
	protected $cleanHTMLTags;


	public function __construct(InputStrategy $inputStrategy, LoggerInterface $logger, $cleanHTMLTags = false) {

		$this->inputStrategy = $inputStrategy;

		$this->logger = $logger;

		$this->cleanHTMLTags = $cleanHTMLTags;

	}


	public function getTable() {

		$this->logger->info("Will print table...");

		while($content = $this->inputStrategy->read()) {
			$content = $this->clean($content);

			$words = preg_split("/[\s,]+/", $content);

			$words = array_filter($words);

			$counts = array_count_values($words);

			foreach($counts as $word => $freq){
				if(!isset($this->frequencyTable[$word])){
					$this->frequencyTable[$word] = $freq;
				} else{
					$this->frequencyTable[$word] += $freq;
				}
			}

		}

		ksort($this->frequencyTable);

		return $this->frequencyTable;

	}

	/**
	 * Removes punctuation and ignores case.
	 *
	 * @param string $content
	 * @return string
	 */

	public function clean($content) {

		if($this->cleanHTMLTags) {

			$content = strip_tags($content);

		}

		return preg_replace('/\p{P}/', '', strtolower($content));

	}
}