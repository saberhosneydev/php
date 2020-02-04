<?php

namespace SHD;
use Exception;
class palindromeException extends Exception
{
	public function __construct($message, $code, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
	public function showError(){
		$error = $this->message;
		if ($this->code == "4") {
			$error = $this->code .":".$this->message;
		}
		return $error;
	}
}

?>