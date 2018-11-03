<?php

namespace App\Export;

use App\Drawable\Document;

interface Exporter
{
    public function export(Document $document);
}
