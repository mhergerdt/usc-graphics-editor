<?php

namespace App\Geometry\Shape;

class Square implements Shape
{
    /**
     * @var float
     */
    private $length;

    /**
     * @param float $length
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     *
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

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
