<?php

namespace App\Geometry\Shape;

class Circle implements Shape
{
    /**
     * @var float
     */
    private $radius;

    /**
     * @param float $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param float $radius
     *
     * @return $this
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * @return float
     */
    public function calcArea()
    {
        return 0; // I would calculate the area
    }

    /**
     * @return float
     */
    public function calcPerimeter()
    {
        return 0; // I would calculate the perimeter
    }

    /**
     * @return float[]
     */
    public function getPoints()
    {
        return []; // I would return the points
    }
}
