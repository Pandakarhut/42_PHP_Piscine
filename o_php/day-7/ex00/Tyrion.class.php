<?php
class Tyrion extends Lannister 
{
	function __construct(){
		Lannister::__construct();
		print ("My name is Tyrion" . PHP_EOL);
	}
	function getSize(){
		print ("Short");
	}
}
?>