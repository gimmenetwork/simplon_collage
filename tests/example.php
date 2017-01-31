<?php

require __DIR__ . '/../vendor/autoload.php';

use Simplon\Collage\Collage;
use Simplon\Collage\ImageResource;
use Simplon\Collage\TextBox;

//
// base image
//

$baseImage = (new ImageResource(__DIR__ . '/base-image.jpg'))->addTextBox(
    (new TextBox('Foo bar text'))
        ->setSize(400, 200)
        ->setPos(50, 420)
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