<?php
require_once("Shape.php");
require_once("iResizable.php");

class Circle extends Shape implements iResizable
{
    private $radius;

    public function __construct($in_name, $in_radius)
    {
        parent::__construct($in_name);
        $this->radius = $in_radius;
    }

    public function CalculateArea()
    {
        return $this->radius * $this->radius * 3.1416;
    }

    public function Resize($percent)
    {
        return ($percent/100) * ($this->radius * $this->radius * 3.1416);
    }

}