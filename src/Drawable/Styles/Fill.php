<?php

namespace App\Drawable\Styles;

use App\Drawable\Drawable;
use App\Graphics\Graphics;

class Fill extends Style
{
    /**
     * @var string
     */
    private $color;

    /**
     * @param Drawable $drawable
     * @param string   $color
     */
    public function __construct(Drawable $drawable, $color)
    {
        parent::__construct($drawable);

        $this->color = $color;
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

    public function draw(Graphics $graphics)
    {
        // I use graphics to fill my drawable
    }
}
