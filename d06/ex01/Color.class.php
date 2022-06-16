<?php

class Color {
	public $red;
	public $green;
	public $blue;
	public static $verbose = False;

	public function __construct($arr) {
		if (isset($arr['red']) && isset($arr['green']) && isset($arr['blue'])) {
			$this->red = intval($arr['red']);
			$this->green = intval($arr['green']);
			$this->blue = intval($arr['blue']);
		}
		else if (isset($arr['rgb'])) {
			$rgb = intval($arr['rgb']);
			$this->red = intval($rgb) >> 16 & 255;
			$this->green = intval($rgb) >> 8 & 255;
			$this->blue = intval($rgb) & 255;
		}
		if (Self::$verbose) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}
	}

	public function __destruct() {
		if (Self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __toString() {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue);
	}

	public function doc() {
		if (file_exists("Color.doc.txt"))
			return file_get_contents("Color.doc.txt") . PHP_EOL;
	}

	public function add($rhs) {
		return new Color(array(
		'red' => $this->red + $rhs->red,
		'green' => $this->green + $rhs->green,
		'blue' => $this->blue + $rhs->blue));
	}

	public function sub($rhs) {
		return new Color(array(
		'red' => $this->red - $rhs->red,
		'green' => $this->green - $rhs->green,
		'blue' => $this->blue - $rhs->blue));

	}

	public function mult($rhs) {
		return new Color(array(
		'red' => $this->red * $rhs,
		'green' => $this->green * $rhs,
		'blue' => $this->blue * $rhs));
	}
}
?>