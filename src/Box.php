<?php

namespace Simplon\Collage;

use GDText\Color;

class Box extends \GDText\Box
{
    /**
     * @var int
     */
    protected $angle = 0;

    /**
     * @return int
     */
    public function getAngle(): int
    {
        return $this->angle;
    }

    /**
     * @param int $angle
     *
     * @return Box
     */
    public function setAngle(int $angle): Box
    {
        $this->angle = $angle;

        return $this;
    }

    /**
     * @param int $x
     * @param int $y
     * @param Color $color
     * @param string $text
     */
    protected function drawInternal($x, $y, Color $color, $text)
    {
        imagefttext(
            $this->im,
            $this->getFontSizeInPoints(),
            $this->getAngle(),
            $x,
            $y,
            $color->getIndex($this->im),
            $this->fontFace,
            $text
        );
    }
}