<?php

class Fighter {
	private $_name;
	public function __construct($type) {
		if($type) {
			$this->name = $type;
		}
	}
	public function __toString() {
		if($this->name) {
			return $this->name;
		}
	}
}
?>