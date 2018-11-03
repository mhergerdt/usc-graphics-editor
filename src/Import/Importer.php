<?php

namespace App\Import;

use App\Drawable\Document;

interface Importer
{
    /**
     * @param Document $document
     *
     * @return Document
     */
    public function import(Document $document);
}
