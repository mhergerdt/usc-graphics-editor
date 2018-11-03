<?php

use App\Drawable\DrawableFactory;
use App\Drawable\Shape\ShapeFactory;
use App\Drawable\Styles\StyleFactory;
use App\Export\ExporterFactory;
use App\Graphics\NiceGraphics;
use App\Import\ArrayImporter;
use App\Import\ImporterFactory;

require __DIR__ . '/vendor/autoload.php';

$shapes = [
    [
        'type'   => 'circle',
        'params' => [
            'position'   => ['x' => 23, 'y' => 20],
            'dimensions' => [
                'radius' => '20'
            ]
        ]
    ],
    [
        'type'   => 'circle',
        'params' => [
            'position'   => ['x' => 2, 'y' => 5],
            'dimensions' => [
                'radius' => '10'
            ],
            'styles'     => [
                'border' => ['color' => '#000000', 'width' => '2'],
                'fill'   => ['color' => '#FF0000']
            ]
        ]
    ],
    [
        'type'   => 'square',
        'params' => [
            'position'   => ['x' => 1, 'y' => 58],
            'dimensions' => [
                'width' => '50'
            ],
            'styles'     => [
                'fill'    => ['color' => '#FF0000'],
                'invalid' => []
            ]
        ]
    ],
    [
        'type'   => 'rectangle',
        'params' => [
            'position'   => ['x' => 33, 'y' => 69],
            'dimensions' => [
                'width'  => '60',
                'height' => '30'
            ],
            'styles'     => [
                'border' => ['color' => '#000000', 'width' => '1'],
                'fill'   => ['color' => '#FF0000']
            ]
        ]
    ]
];

$drawableFactory = new DrawableFactory(new ShapeFactory(), new StyleFactory());
$importerFactory = new ImporterFactory($drawableFactory);
$exporterFactory = new ExporterFactory(new NiceGraphics(), $drawableFactory);

$importer = $importerFactory->create(ImporterFactory::TYPE_ARRAY);

$exporter = $exporterFactory->create($_SERVER['argv'][1] ?: '');

if ($importer instanceof ArrayImporter) {
    $importer->setInput($shapes);
}

$graphicsEditor = new \App\GraphicsEditor();
$graphicsEditor->setExporter($exporter);
$graphicsEditor->setImporter($importer);

$graphicsEditor->import();
$graphicsEditor->export();
