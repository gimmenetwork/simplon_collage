<?php

namespace Simplon\Collage;

use Intervention\Image\ImageManager;
use Psr\Http\Message\StreamInterface;

/**
 * Class Collage
 * @package Simplon\Collage
 */
class Collage
{
    /**
     * @var ImageManager
     */
    private $baseImage;

    /**
     * @param Image $baseImage
     */
    public function __construct(Image $baseImage)
    {
        $this->baseImage = (new ImageManager())->make($baseImage->getResource());
    }

    /**
     * @param Image $image
     * @param int $x
     * @param int $y
     *
     * @return Collage
     */
    public function addImage(Image $image, int $x = 0, int $y = 0): self
    {
        $this->baseImage->insert($image->getResource(), 'top-left', $x, $y);

        return $this;
    }

    /**
     * @param string $format
     * @param int $quality
     *
     * @return StreamInterface
     */
    public function outputStream(string $format = 'jpg', int $quality = 90): StreamInterface
    {
        return $this->baseImage->stream($format, $quality);
    }

    /**
     * @param string $path
     * @param int $quality
     *
     * @return Collage
     */
    public function outputSave(string $path, int $quality = 90): self
    {
        $this->baseImage->save($path, $quality);

        return $this;
    }
}