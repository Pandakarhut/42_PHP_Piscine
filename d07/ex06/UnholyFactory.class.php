<?php

class UnholyFactory
{
	private $_type = [];
	public function absorb($people)
	{
		if ($people instanceof Fighter) {
			if (!(in_array($people, $this->_type))) {
				$this->_type[] = $people;
				print("(Factory absorbed a fighter of type " . $people . ")" . PHP_EOL);
			}
			else
				print("(Factory already absorbed a fighter of type " . $people . ")" . PHP_EOL);
		}
		else
			print("(Factory can't absorb this, it's not a fighter)\n");
	}
	public function fabricate($soldier)
	{
		foreach ($this->_type as $product) {
			if ($soldier == $product) {
				print("(Factory fabricates a fighter of type " . $soldier . ")" . PHP_EOL);
				return $product;
			}
		}
		print("(Factory hasn't absorbed any fighter of type " . $soldier . ")" . PHP_EOL);
		return NULL;
	}
}
?>