<?php

namespace Simplon\Collage;

use GDText\Box;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

/**
 * @package Simplon\Collage
 */
class ImageResource
{
    /**
     * @var resource
     */
    private $resource;
    /**
     * @var Image
     */
    private $image;

    /**
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->resource = imagecreatefromstring(
            file_get_contents($source)
        );

        $this->image = (new ImageManager())->make($this->resource);
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param TextBox $textBox
     *
     * @return ImageResource
     */
    public function addTextBox(TextBox $textBox): self
    {
        $textbox = new Box($this->resource);
        $textbox->setFontFace($textBox->getPathFontFace());
        $textbox->setFontSize($textBox->getFontSize());
        $textbox->setFontColor(Colors::hexToRgb($textBox->getFontColorHex()));
        $textbox->setBox($textBox->getPosX(), $textBox->getPosY(), $textBox->getWidth(), $textBox->getHeight());
        $textbox->setTextAlign($textBox->getTextHorizontalAlign(), $textBox->getTextVerticalAlign());
        $textbox->draw($textBox->getText());

        return $this;
    }
}