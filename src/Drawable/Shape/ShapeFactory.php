<?php

namespace App\Drawable\Shape;

use App\Drawable\Drawable;
use App\Geometry\Point;

class ShapeFactory
{
    const TYPE_CIRCLE = 'circle';
    const TYPE_SQUARE = 'square';

    /**
     * @param string $type
     * @param array  $params
     *
     * @return Drawable
     */
    public function create($type, array $params)
    {
        $position = new Point($params['position']['x'], $params['position']['y']);

        switch ($type) {
            case self::TYPE_CIRCLE:
                return new DrawableCircle($params['dimensions']['radius'], $position);

            case self::TYPE_SQUARE:
                return new DrawableSquare($params['dimensions']['side'], $position);
        }

        throw new \RuntimeException("Could not create shape! Invalid type \"{$type}\"!");
    }

    /**
     * @param Drawable $drawable
     *
     * @return null|string
     */
    public function getType(Drawable $drawable)
    {
        switch (get_class($drawable)) {
            case DrawableCircle::class:
                return self::TYPE_CIRCLE;

            case DrawableSquare::class:
                return self::TYPE_SQUARE;
        }

        return null;
    }
}
