<?php

namespace App\Library;

class URLInput extends FileInput{
	
	/**
	 * Validate input filepath type
	 * @param string $filePath
	 */

	protected function validatePath($filePath) {

		if(!filter_var($filePath, FILTER_VALIDATE_URL)){
			throw new \Exception('Please use a valid URL. Ej; http://example.com');
		}

	}
}