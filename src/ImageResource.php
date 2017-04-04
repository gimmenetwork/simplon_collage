<?php

namespace Simplon\Collage;

/**
 * @package Simplon\Collage
 */
class ImageResource extends Resource
{
    /**
     * @param mixed $source
     */
    public function __construct($source)
    {
        $this->resource = imagecreatefromstring(
            file_get_contents($source)
        );
    }
}