<!--
	https://www.youtube.com/watch?v=X6xY4Ouydas&list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh&index=4

	Object-Oriented Programming PHP
	1. properties, somewhat silimar to variables
	2. methods, somewhat silimar to functions

	Instantiate a class: create objects contain all the information
 -->

<?php

class NewClass {
	public $info = "This is some info";
}

$object = new NewClass;
var_dump($object);
?>


<!--
	Visibilitity and Inheritance
	1. public
	2. private: use it outside the class or not
	3. protected: $this

	? global & static
 -->

<?php

	class Person {
		protected $first = "Jing";
		private $last = "Tian";
		private $age = "30";

		public function owner(){
			$a = $this->first;
			return $a;
		}
	}

	class Pet extends Person {
		public function owner() {
			$a = $this->first;
			return $a;
		}
	}
?>


<!-- class.inc.php -->

<?php

	class Person {
		//Properties
		public $name;
		public $eyeColor;
		public $age;

		//Methods
		public function setName() {
			$this->name = $name;
			$this->age = $newAge;
		}
	}
?>

<!-- index.php -->
<?php
	include 'includes/person.inc.php';
?>

<html>

	<?php
	$person1 = new Person();
	$person1->setName("Daniel");
	echo $person1->name;

	$person2 = new Person();
	$person2->setName("Selvi");
	echo $person2->name;
	?>

</html>


<!-- constructors and destructors -->
<!--  static properties and methods-->


<!-- class.inc.php -->
<?php

	class Person {
		//Properties
		public $name;
		public $eyeColor;
		public $age = "undefined";

		//Static property
		public static $drinkingAge = 21;

		//Codes inside the constructor will get run in the beginning when we actually create the class
		public function __construct($name, $eyeColor, $age) {
			$this->name = $name;
			$this->eyeColor = $eyeColor;
			$this->age = $age;
		}

		//Methods
		public function setName() {
			$this->name = $name;
			$this->age = $newAge;
		}

		public function getName() {
			return $this->name;
		}

		public function getDA() {
			return $this->name;

		}

		//Static method
		public static function newDrinkingAge($newDA) {
			Self::$drinkingAge = $newDA;
		}

		//Codes inside the destructor will get run in the end of the class
		public function __destruct() {

		}
	}
?>

<!-- index.php -->
<html>

	<?php
		$person1 = new Person("Jing", "Brown", 30);
		echo $person1->name;
		echo $person1->eyeColor;
		$person1->setName("Selvi");
		echo $person1->getDA();

		echo Person::$drinkingAge;
		// ?
		Person::newDrinkingAge(18);
		$person1->newDrinkingAge = 18;
	?>

</html>


<!-- load classes automatically -->