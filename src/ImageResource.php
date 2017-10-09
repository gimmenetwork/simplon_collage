<?php

namespace Simplon\Collage;

/**
 * @package Simplon\Collage
 */
class ImageResource extends Resource
{
    /**
     * @param mixed $source
     *
     * @throws \Exception
     */
    public function __construct($source)
    {
        $this->resource = imagecreatefromstring(
            file_get_contents($source)
        );

        if ($this->resource === false)
        {
            throw new \Exception('Could not fetch "' . $source . '"');
        }
    }
}