<?php

class Targaryen{
	public function resistsFire()
	{
		return false;
	}
	function getBurned()
	{

		if ($this->resistsFire())
			return ("emerges naked but unharmed");
		return ("burns alive");
	}
}

?>