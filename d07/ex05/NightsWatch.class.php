<?php

class NightsWatch {
	protected $names;
	public function recruit($people) {
		if($people instanceof IFighter)
			$this->names[] = $people;
	}
	public function fight() {
		foreach($this->names as $key => $value)
			print($value->fight());
	}
}
?>