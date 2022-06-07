<?php

    require_once "Color.class.php";

    class Vertex{
        public $x;
        public $y;
        public $z;
        public $w = 1.0;
        public $color;
        static $verbose = false;
        
        public function __construct($arr){
            if (isset($arr['w']))
                $this->w = $arr['w'];
            if (isset($arr['color']))
                $this->color = $arr['color'];
            else
            {
                 $this->color = new Color(array(
                    'red' => 255,
                    'green' => 255,
                    'blue' => 255));
            }
            if (isset($arr['x']) && isset($arr['y']) && isset($arr['z'])){
                $this->x = $arr['x'];
                $this->y = $arr['y'];
                $this->z = $arr['z'];
            }
            if (Self::$verbose){
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", 
                $this->x, $this->y, $this->z, $this->w,
                $this->color->red, $this->color->green, $this->color->blue);
            }
        }

        public function __destruct(){
            if (Self::$verbose){
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", 
                $this->x, $this->y, $this->z, $this->w,
                $this->color->red, $this->color->green, $this->color->blue);
            }
        }
        
        static function doc(){
            if (file_exists("Vertex.doc.txt"))
                return file_get_contents("Vertex.doc.txt") . PHP_EOL;
        }

        function __toString()
        {
            if (Self::$verbose)
                return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", 
                $this->x, $this->y, $this->z, $this->w, $this->color->red, $this->color->green, $this->color->blue));
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->x, $this->y, $this->z, $this->w));
        }

        public function getX()
        {
            return $this->x;
        }

        public function setX($x)
        {
            $this->x = $x;
        }

        public function getY()
        {
            return $this->y;
        }

        public function setY($y)
        {
            $this->y = $y;
        }

        public function getZ()
        {
            return $this->z;
        }

        public function setZ($z)
        {
            $this->z = $z;
        }

        public function getW()
        {
            return $this->w;
        }

        public function setW($w)
        {
            $this->w = $w;
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setColor($color)
        {
            $this->color = $color;
        }
    }
?>