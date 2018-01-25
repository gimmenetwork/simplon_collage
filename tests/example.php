<?php

require __DIR__ . '/../vendor/autoload.php';

use Simplon\Collage\Collage;
use Simplon\Collage\ImageResource;
use Simplon\Collage\TextBox;

//
// base image
//

$baseImage = (new ImageResource(__DIR__ . '/base-image.jpg'))->addTextBox(
    (new TextBox('你能打败我的成绩么？点这里！'))
        ->setPathFontFace(__DIR__ . '/fonts/SourceHanSerifTC-Regular.woff')
        ->setSize(400, 200)
        ->setPos(180, 460)
        ->setAngle(15)
);

//
// profile
//

$profileImage = new ImageResource(__DIR__ . '/profile-image.png');

//
// create collage
//

$collage = new Collage($baseImage);
$collage->addImage($profileImage, 100, 100);

//
// stream image
//

header('Content-type: image/png');
echo $collage->outputStream('png');