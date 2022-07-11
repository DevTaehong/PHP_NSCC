<?php

abstract class Shape
{
    protected $name;

    abstract public function CalculateArea();

    public function __construct($in_name)
    {
        $this->name = $in_name;
    }

    public function getName()
    {
        return ($this->name);
    }// end getName()

}//end Shape class
