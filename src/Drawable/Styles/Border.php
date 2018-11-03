<?php

namespace App\Drawable\Styles;

use App\Drawable\Drawable;
use App\Graphics\Graphics;

class Border extends Style
{
    /**
     * @var string
     */
    private $color;
    /**
     * @var float
     */
    private $width;

    /**
     * @param Drawable $drawable
     * @param string   $color
     * @param float    $width
     */
    public function __construct(Drawable $drawable, $color, $width)
    {
        parent::__construct($drawable);

        $this->color = $color;
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    public function draw(Graphics $graphics)
    {
        // I use graphics to draw a border around a drawable
    }
}
