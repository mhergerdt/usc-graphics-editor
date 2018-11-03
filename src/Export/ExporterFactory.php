<?php

namespace App\Export;

use App\Drawable\DrawableFactory;
use App\Graphics\Graphics;

class ExporterFactory
{
    const TYPE_CALCULATIONS = 'calculations';
    const TYPE_POINTS       = 'points';
    const TYPE_PNG          = 'png';
    /**
     * @var Graphics
     */
    private $graphics;
    /**
     * @var DrawableFactory
     */
    private $drawableFactory;

    public function __construct(Graphics $graphics, DrawableFactory $drawableFactory)
    {
        $this->graphics        = $graphics;
        $this->drawableFactory = $drawableFactory;
    }

    /**
     * @param string $type
     *
     * @return Exporter
     */
    public function create($type)
    {
        switch ($type) {
            case self::TYPE_PNG:
                return new PngExporter($this->graphics);

            case self::TYPE_POINTS:
                return new PointsExporter($this->drawableFactory);

            case self::TYPE_CALCULATIONS:
            default:
                return new CalculationsExporter($this->drawableFactory);
        }
    }
}
