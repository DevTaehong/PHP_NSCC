<?php
require_once("Shape.php");
require_once("iResizable.php");

class Triangle extends Shape implements iResizable
{
    private $base;
    private $height;

    public function __construct($in_name, $in_base, $in_height)
    {
        parent::__construct($in_name);
        $this->base = $in_base;
        $this->height = $in_height;
    }

    public function CalculateArea()
    {
       return ($this->height * $this->base) / 2;
    }

    public function Resize($percent)
    {
        $resizedHeight = $this->height * ($percent/100);
        return ($resizedHeight * $this->base) / 2;
    }
}