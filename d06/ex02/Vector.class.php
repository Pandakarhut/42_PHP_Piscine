<?php
	class Vector{
		private		$_x;
		private		$_y;
		private		$_z;
		private		$_w = 0.0;
		public static	$verbose = False;

		public function __construct(array $array)
		{
			if (isset($array['dest']))
			{
				$this->_x = $array['dest']->getX();
				$this->_y = $array['dest']->getY();
				$this->_z = $array['dest']->getZ();
			}
			if (isset($array['orig']))
			{
				$this->_x -= $array['orig']->getX();;
				$this->_y -= $array['orig']->getY();;
				$this->_z -= $array['orig']->getZ();;
			}
            else
            {
                $origVertex = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
            }
			if (Self::$verbose)
			{
				printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n",
						$this->_x, $this->_y, $this->_z, $this->_w);
			}
		}
		public function __destruct()
		{
			if (Self::$verbose)
			{
				printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n",
						$this->_x, $this->_y, $this->_z, $this->_w);
			}
		}
		public function __toString()
		{
			if (Self::$verbose)
			{
				return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
							$this->_x, $this->_y, $this->_z, $this->_w));
			}
			else
				return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
							$this->_x, $this->_y, $this->_z, $this->_w));

		}
		public static function doc()
		{
			if (file_exists("Vector.doc.txt"))
			{
				$file = file_get_contents("Vector.doc.txt");
				return $file;
			}
		}
        public function cos(Vector $rhs) {
			if ($this->magnitude() == "norm" || $rhs->magnitude() == "norm")
				return (0);
            else
            {
				$len = $this->magnitude() * $rhs->magnitude();
				return ($this->dotProduct($rhs) / $len);
			}
		}
        public function crossProduct(Vector $rhs) {
			$cross = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $rhs->_z - $this->_z * $rhs->_y,
				'y' => $this->_z * $rhs->_x - $this->_x * $rhs->_z,
				'z' => $this->_x * $rhs->_y - $this->_y * $rhs->_x
			))));
			return ($cross);
		}
        public function dotProduct(Vector $rhs) {
			$result = (float)(
				$this->_x * $rhs->_x +
				$this->_y * $rhs->_y +
				$this->_z * $rhs->_z
			);
			return ($result);
		}

		public function scalarProduct($k) {
			$scaled = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k
			))));
			return ($scaled);
		}

		public function opposite() {
			$opposite = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * (-1),
				'y' => $this->_y * (-1),
				'z' => $this->_z * (-1)
			))));
			return ($opposite);
		}

		public function add(Vector $rhs) {
			$total = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z
			))));
			return ($total);
		}

		public function sub(Vector $rhs) {
			$sub = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z
			))));
			return ($sub);
		}

		public function magnitude() {
			$magn = (float)sqrt(
				($this->_x ) ** 2 +
				($this->_y ) ** 2 +
				($this->_z ) ** 2
			);
			if ($magn == 1) {
				return ("norm");
			} else {
				return ($magn);
			}
		}

		public function normalize() {
			$len = $this->magnitude();
			if ($len == 1) {
				return clone $this;
			}
			$norm = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x / $len,
				'y' => $this->_y / $len,
				'z' => $this->_z / $len
			))));
			return ($norm);
		}

		public function __get($attr) {
			if ($attr == '_x') {
				return ($this->getX());
			} else if ($attr == '_y') {
				return ($this->getY());
			} else if ($attr == '_z') {
				return ($this->getZ());
			} else if ($attr == '_w') {
				return ($this->getW());
			}
		}

		private function getX() {
			return $this->_x;
		}

		private function getY() {
			return $this->_y;
		}

		private function getZ() {
			return $this->_z;
		}

		private function getW() {
			return $this->_w;
		}
	}
?>
