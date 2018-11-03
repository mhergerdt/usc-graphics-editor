<?php

namespace App\Drawable\Shape;

use App\Drawable\Drawable;
use App\Geometry\Point;
use App\Geometry\Shape\Circle;
use App\Graphics\Graphics;

class DrawableCircle extends Circle implements Drawable
{
    /**
     * @var Point
     */
    private $position;

    /**
     * @param float $radius
     * @param Point $position
     */
    public function __construct($radius, Point $position)
    {
        parent::__construct($radius);

        $this->position = $position;
    }

    /**
     * @return Point
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Point $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function draw(Graphics $graphics)
    {
        // I use graphics to draw a circle
    }
}
