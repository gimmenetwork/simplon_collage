<?php

namespace Simplon\Collage;

class RectangleResource extends Resource
{
    /**
     * @param int $width
     * @param int $height
     * @param null|string $backgroundColor
     */
    public function __construct(int $width, int $height, ?string $backgroundColor = null)
    {
        $this->resource = imagecreatetruecolor($width, $height);
        $color = null;

        if ($backgroundColor)
        {
            $params = Colors::hexToRgb($backgroundColor)->toArray();
            array_unshift($params, $this->resource);
            $color = call_user_func_array('imagecolorallocate', $params);
        };

        imagefilledrectangle($this->resource, 0, 0, $width, $height, $color);
    }
}