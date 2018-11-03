<?php

namespace App\Import;

use App\Drawable\Document;
use App\Drawable\Drawable;
use App\Drawable\DrawableFactory;

class ArrayImporter implements Importer
{
    /**
     * @var DrawableFactory
     */
    private $drawableFactory;
    /**
     * @var array
     */
    private $input;

    public function __construct(DrawableFactory $drawableFactory)
    {
        $this->drawableFactory = $drawableFactory;
    }

    /**
     * @param array $input
     *
     * @return $this
     */
    public function setInput(array $input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @param Document $document
     *
     * @return Document
     */
    public function import(Document $document)
    {
        foreach ($this->input as $shapeItem) {
            $drawable = $this->createShape($shapeItem);

            if (null === $drawable) {
                continue;
            }

            $drawable = $this->styleDrawable($drawable, $shapeItem);

            $document->addDrawable($drawable);
        }

        return $document;
    }

    /**
     * @param array $shapeItem
     *
     * @return Drawable|null
     */
    private function createShape(array $shapeItem)
    {
        try {
            return $this->drawableFactory->createShape($shapeItem['type'], $shapeItem['params']);
        } catch (\Exception $exception) {
            $this->writeLine($exception->getMessage());
        }

        return null;
    }

    /**
     * @param Drawable $drawable
     * @param array    $shapeItem
     *
     * @return Drawable|null
     */
    private function styleDrawable(Drawable $drawable, array $shapeItem)
    {
        if (!isset($shapeItem['params']['styles'])) {
            return $drawable;
        }

        foreach ($shapeItem['params']['styles'] as $type => $styleParams) {
            $styledDrawable = $this->createStyle($drawable, $type, $styleParams);

            if (null !== $styledDrawable) {
                $drawable = $styledDrawable;
            }
        }

        return $drawable;
    }

    /**
     * @param Drawable $drawable
     * @param string   $type
     * @param array    $styleParams
     *
     * @return Drawable|null
     */
    private function createStyle($drawable, $type, $styleParams)
    {
        try {
            return $this->drawableFactory->createStyle($type, $drawable, $styleParams);
        } catch (\Exception $exception) {
            $this->writeLine($exception->getMessage());
        }

        return null;
    }

    /**
     * @param string $message
     */
    private function writeLine($message)
    {
        echo $message . PHP_EOL;
    }
}
