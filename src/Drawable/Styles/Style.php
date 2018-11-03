<?php

namespace App\Drawable\Styles;

use App\Drawable\Drawable;

abstract class Style implements Drawable
{
    /**
     * @var Drawable
     */
    private $drawable;

    /**
     * @param Drawable $drawable
     */
    public function __construct(Drawable $drawable)
    {
        $this->drawable = $drawable;
    }

    /**
     * @return Drawable
     */
    public function getDrawable()
    {
        return $this->drawable;
    }

    /**
     * @param Drawable $drawable
     *
     * @return $this
     */
    public function setDrawable($drawable)
    {
        $this->drawable = $drawable;

        return $this;
    }

    /**
     * @return Drawable
     */
    public function getRootDrawable()
    {
        $drawable = $this->drawable;

        while ($drawable instanceof self) {
            $drawable = $drawable->drawable;
        }

        return $drawable;
    }
}
