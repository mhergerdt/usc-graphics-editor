<?php

namespace App\Import;

use App\Drawable\Document;

class JsonFileImporter implements Importer
{
    /**
     * @param Document $document
     *
     * @return Document
     */
    public function import(Document $document)
    {
        // I would import form a json file

        return $document;
    }
}
