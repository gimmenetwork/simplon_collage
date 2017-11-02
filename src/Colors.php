<?php

namespace Simplon\Collage;

use GDText\Color;

class Colors
{
    /**
     * @param string $color
     *
     * @return Color
     */
    public static function hexToRgb(string $color): Color
    {
        $color = str_replace('#', '', $color);

        if (strlen($color) === 3)
        {
            $color =
                str_repeat(substr($color, 0, 1), 2)
                . str_repeat(substr($color, 1, 1), 2)
                . str_repeat(substr($color, 2, 1), 2);
        }

        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));

        return new Color($r, $g, $b);
    }
}