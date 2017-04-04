<?php

require __DIR__ . '/../../vendor/autoload.php';

use Simplon\Collage\Collage;
use Simplon\Collage\ImageResource;
use Simplon\Collage\RectangleResource;
use Simplon\Collage\TextBox;

//
// base image
//

$base = new ImageResource(__DIR__ . '/simpsons.jpg');

//
// top banner with text
//

$topBanner = (new RectangleResource(800, 70, '#F91C5A'))
    ->addTextBox(
        (new TextBox('The Simpsons Quiz'))
            ->setPathFontFace(__DIR__ . '/GoodDog.otf')
            ->setFontSize(62)
            ->setFontColorHex('#000')
            ->setPos(0, -10)
    );

//
// banner with text
//

$banner = (new RectangleResource(800, 60, '#4876BF'))
    ->addBorder('#333')
    ->addTextBox(
        (new TextBox('Share on Facebook and challenge your friends!'))
            ->setFontSize(32)
            ->setFontColorHex('#fff')
            ->setPos(30, 10)
    )
;

//
// icon
//

$icon = new ImageResource(__DIR__ . '/fb-logo.png');

//
// create collage
//

$collage = new Collage($base);
$collage->addImage($topBanner, 0, 0);
$collage->addImage($banner, 0, 360);
$collage->addImage($icon, 20, 360);

//
// stream image
//

header('Content-type: image/jpg');
echo $collage->outputStream('jpg');