<?php

namespace App\Drawable\Styles;

use App\Drawable\Drawable;

class StyleFactory
{
    const TYPE_BORDER = 'border';
    const TYPE_FILL   = 'fill';

    /**
     * @param string   $type
     * @param Drawable $drawable
     * @param array    $params
     *
     * @return Style
     */
    public function create($type, Drawable $drawable, array $params)
    {
        switch ($type) {
            case self::TYPE_BORDER:
                return new Border($drawable, $params['color'], $params['width']);

            case self::TYPE_FILL:
                return new Fill($drawable, $params['color']);
        }

        throw new \RuntimeException("Could not create style! Invalid type \"{$type}\"!");
    }

    /**
     * @param Drawable $drawable
     *
     * @return null|string
     */
    public function getType(Drawable $drawable)
    {
        switch (get_class($drawable)) {
            case Border::class:
                return self::TYPE_BORDER;

            case Fill::class:
                return self::TYPE_FILL;
        }

        return null;
    }
}
