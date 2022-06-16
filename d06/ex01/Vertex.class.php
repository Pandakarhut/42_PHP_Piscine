<?php

require_once "Color.class.php";

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = False;

	public function __construct($arr) {
		if (isset($arr['x']) && isset($arr['y']) && isset($arr['z'])) {
			$this->_x = $arr['x'];
			$this->_y = $arr['y'];
			$this->_z = $arr['z'];
		}

		if (isset($arr['w']))
		$this->_w = $arr['w'];

		if (isset($arr['color']))
		$this->_color = $arr['color'];
		else
		{
			$this->_color = new Color(array(
				'red' => 255,
				'green' => 255,
				'blue' => 255));
		}
		if (Self::$verbose){
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
			$this->_x, $this->_y, $this->z, $this->_w,
			$this->_color->red, $this->_color->green, $this->_color->blue);
		}
}

	public function __destruct(){
		if (Self::$verbose){
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
			$this->_x, $this->_y, $this->_z, $this->_w,
			$this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	static function doc(){
		if (file_exists("Vertex.doc.txt"))
			return file_get_contents("Vertex.doc.txt") . PHP_EOL;
	}

	public function __toString() {
		if (Self::$verbose) {
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
			$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
		}
		else
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function getX()
	{
		return $this->_x;
	}

	public function setX($value)
	{
		$this->x = $value;
	}

	public function getY()
	{
		return $this->_y;
	}

	public function setY($value)
	{
		$this->y = $value;
	}

	public function getZ()
	{
		return $this->_z;
	}

	public function setZ($value)
	{
		$this->z = $value;
	}

	public function getW()
	{
		return $this->_w;
	}

	public function setW($value)
	{
		$this->w = $value;
	}

	public function getColor()
	{
		return $this->_color;
	}

	public function setColor($value)
	{
		$this->color = $value;
	}
}
?>