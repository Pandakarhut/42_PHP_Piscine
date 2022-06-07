<?php

class NightsWatch implements IFighter{
	protected $fighters;
	function isABastard(){
		return False;
	}
	function makeHisFatherProud(){
		return True;
	}
	function recruit($person){
		if ($person instanceof IFighter)
			$this->fighters[] = $person;
	}
	function fight(){
		foreach($this->fighters as $key=>$value)
			print ($value->fight());
	}
}

?>