<?php

namespace App;

use App\Drawable\Document;
use App\Export\Exporter;
use App\Import\Importer;

class GraphicsEditor
{
    /**
     * @var Document
     */
    private $document;
    /**
     * @var Importer
     */
    private $importer;
    /**
     * @var Exporter
     */
    private $exporter;

    public function __construct()
    {
        $this->document = new Document(800, 600);
    }

    /**
     * @return Importer
     */
    public function getImporter()
    {
        return $this->importer;
    }

    /**
     * @param Importer $importer
     *
     * @return GraphicsEditor
     */
    public function setImporter($importer)
    {
        $this->importer = $importer;

        return $this;
    }

    /**
     * @return Exporter
     */
    public function getExporter()
    {
        return $this->exporter;
    }

    /**
     * @param Exporter $exporter
     *
     * @return GraphicsEditor
     */
    public function setExporter($exporter)
    {
        $this->exporter = $exporter;

        return $this;
    }

    /**
     * @param float $width
     * @param float $height
     */
    public function newDocument($width, $height)
    {
        $this->document = new Document($width, $height);
    }

    public function import()
    {
        $this->document = $this->importer->import($this->document);
    }

    public function export()
    {
        $this->exporter->export($this->document);
    }
}
