<?php

namespace Simplon\Collage;

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
            $this->fetchSourceContents($source)
        );
    }
}