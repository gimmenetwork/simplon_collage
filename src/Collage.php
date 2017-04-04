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
     * @param ResourceInterface $baseImage
     */
    public function __construct(ResourceInterface $baseImage)
    {
        $this->baseImage = $baseImage->getImage();
    }

    /**
     * @param ResourceInterface $image
     * @param int $x
     * @param int $y
     *
     * @return Collage
     */
    public function addImage(ResourceInterface $image, int $x = 0, int $y = 0): self
    {
        $this->baseImage->insert($image->getImage(), 'top-left', $x, $y);

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