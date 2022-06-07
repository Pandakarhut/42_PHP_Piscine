<?php
class UnholyFactory
{
	private $fighters = array();
    public function absorb($newFighter){
		if ($newFighter instanceof Fighter){
			if (array_key_exists($newFighter->name, $this->fighters))
                echo "(Factory already absorbed a fighter of type $newFighter->name)\n";
			else{
                echo "(Factory absorbed a fighter of type $newFighter->name)\n";
				$this->fighters[$newFighter->name] = $newFighter;
			}
		}
		else
            echo "(Factory can't absorb this, it's not a fighter)\n";
	}
    public function fabricate($name){
		if (array_key_exists($name, $this->fighters)){
            echo "(Factory fabricates a fighter of type $name)\n";
			return (clone $this->fighters[$name]);
		}
		else{
            echo "(Factory hasn't absorbed any fighter of type $name)\n";
			return (NULL);
		}
	}
}
?>