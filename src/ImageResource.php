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
        $resoure = file_get_contents($source);

        if ($resoure === false)
        {
            throw new \Exception('Could not fetch "' . $source . '"');
        }

        $this->resource = imagecreatefromstring($resoure);
    }
}