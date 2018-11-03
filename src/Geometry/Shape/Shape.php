<?php

namespace App\Geometry\Shape;

interface Shape
{
    /**
     * @return float
     */
    public function calcArea();

    /**
     * @return float
     */
    public function calcPerimeter();

    /**
     * @return float[]
     */
    public function getPoints();
}
