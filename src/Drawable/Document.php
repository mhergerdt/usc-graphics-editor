<?php

namespace App\Drawable;

use App\Graphics\Graphics;

class Document implements Drawable
{
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $height;
    /**
     * @var Drawable[]
     */
    private $drawables;

    /**
     * @param float $width
     * @param float $height
     */
    public function __construct($width, $height)
    {
        $this->width  = $width;
        $this->height = $height;
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

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return Drawable[]
     */
    public function getDrawables()
    {
        return $this->drawables;
    }

    /**
     * @param Drawable[] $drawables
     *
     * @return $this
     */
    public function setDrawables($drawables)
    {
        $this->drawables = $drawables;

        return $this;
    }

    /**
     * @param Drawable $drawable
     *
     * @return $this
     */
    public function addDrawable(Drawable $drawable)
    {
        $this->drawables[] = $drawable;

        return $this;
    }

    public function draw(Graphics $graphics)
    {
        foreach ($this->drawables as $drawable) {
            $drawable->draw($graphics);
        }
    }
}
