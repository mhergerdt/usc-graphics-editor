<?php

namespace App\Export;

use App\Drawable\Document;
use App\Graphics\Graphics;

class PngExporter implements Exporter
{
    /**
     * @var \App\Graphics\Graphics
     */
    private $graphics;

    public function __construct(Graphics $graphics)
    {
        $this->graphics = $graphics;
    }

    public function export(Document $document)
    {
        $document->draw($this->graphics);
        // save as png
        echo 'Saved as png' . PHP_EOL;
    }
}
