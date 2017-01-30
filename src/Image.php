<?php

namespace Simplon\Collage;

use GDText\Box;

/**
 * @package Simplon\Collage
 */
class Image
{
    /**
     * @var string
     */
    private $source;

    /**
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->source = imagecreatefromstring(
            file_get_contents($source)
        );
    }

    /**
     * @param TextBox $textBox
     *
     * @return Image
     */
    public function addTextBox(TextBox $textBox): self
    {
        $textbox = new Box($this->source);
        $textbox->setFontFace($textBox->getPathFontFace());
        $textbox->setFontSize($textBox->getFontSize());
        $textbox->setFontColor(Colors::hexToRgb($textBox->getFontColorHex()));
        $textbox->setBox($textBox->getPosX(), $textBox->getPosY(), $textBox->getWidth(), $textBox->getHeight());
        $textbox->setTextAlign($textBox->getTextHorizontalAlign(), $textBox->getTextVerticalAlign());
        $textbox->draw($textBox->getText());

        return $this;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->source;
    }
}