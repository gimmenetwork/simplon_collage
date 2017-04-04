<?php

namespace Simplon\Collage;

use Intervention\Image\Image;

/**
 * @package Simplon\Collage
 */
interface ResourceInterface
{
    /**
     * @return resource
     */
    public function getResource();

    /**
     * @return Image
     */
    public function getImage(): Image;

    /**
     * @param TextBox $textBox
     *
     * @return static
     */
    public function addTextBox(TextBox $textBox);
}