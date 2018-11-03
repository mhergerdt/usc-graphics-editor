<?php

namespace App\Import;

use App\Drawable\DrawableFactory;

class ImporterFactory
{
    const TYPE_ARRAY     = 'array';
    const TYPE_JSON_FILE = 'json_file';

    /**
     * @var DrawableFactory
     */
    private $drawableFactory;

    public function __construct(DrawableFactory $drawableFactory)
    {
        $this->drawableFactory = $drawableFactory;
    }

    /**
     * @param string $type
     *
     * @return Importer
     */
    public function create($type)
    {
        switch ($type) {
            case self::TYPE_JSON_FILE:
                return new JsonFileImporter();

            case self::TYPE_ARRAY:
            default:
                return new ArrayImporter($this->drawableFactory);
        }
    }
}
