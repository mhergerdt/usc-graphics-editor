<?php

namespace App\Export;

use App\Drawable\Document;
use App\Drawable\DrawableFactory;
use App\Drawable\Styles\Style;
use App\Geometry\Shape\Shape;

class CalculationsExporter implements Exporter
{
    /**
     * @var DrawableFactory
     */
    private $drawableFactory;

    public function __construct(DrawableFactory $drawableFactory)
    {
        $this->drawableFactory = $drawableFactory;
    }

    public function export(Document $document)
    {
        $results = [];

        foreach ($document->getDrawables() as $drawable) {
            if ($drawable instanceof Style) {
                $drawable = $drawable->getRootDrawable();
            }

            if (!$drawable instanceof Shape) {
                continue;
            }

            $results[] = [
                'type'      => $this->drawableFactory->getType($drawable),
                'area'      => $drawable->calcArea(),
                'perimeter' => $drawable->calcPerimeter()
            ];
        }

        print_r($results);
    }
}
