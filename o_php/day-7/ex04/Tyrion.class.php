<?php

class Tyrion extends Lannister{
    function sleepWith($person){
        if(get_parent_class($person) == "Lannister")
            print("Not even if I'm drunk !" . PHP_EOL);
        else if (get_class($person) == "Sansa")
            print("Let's do this." . PHP_EOL);
    }
}

?>