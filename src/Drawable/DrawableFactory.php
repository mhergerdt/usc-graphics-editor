<?php

namespace App\Drawable;

use App\Drawable\Shape\ShapeFactory;
use App\Drawable\Styles\Style;
use App\Drawable\Styles\StyleFactory;

class DrawableFactory
{
    /**
     * @var ShapeFactory
     */
    private $shapeFactory;
    /**
     * @var StyleFactory
     */
    private $styleFactory;

    public function __construct(ShapeFactory $shapeFactory, StyleFactory $styleFactory)
    {
        $this->shapeFactory = $shapeFactory;
        $this->styleFactory = $styleFactory;
    }

    /**
     * @param string $type
     * @param array  $params
     *
     * @return Drawable
     */
    public function createShape($type, array $params)
    {
        return $this->shapeFactory->create($type, $params);
    }

    /**
     * @param string   $type
     * @param Drawable $drawable
     * @param array    $params
     *
     * @return Style
     */
    public function createStyle($type, Drawable $drawable, array $params)
    {
        return $this->styleFactory->create($type, $drawable, $params);
    }

    public function getType(Drawable $drawable)
    {
        $type = $this->shapeFactory->getType($drawable);

        if (null === $type) {
            $type = $this->styleFactory->getType($drawable);
        }

        return null === $type ? 'unknown' : $type;
    }
}
