<?php

namespace Simplon\Collage;

use GDText\Box;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

abstract class Resource implements ResourceInterface
{
    /**
     * @var resource
     */
    protected $resource;
    /**
     * @var Image
     */
    protected $image;

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
        if (!$this->image)
        {
            $this->image = (new ImageManager())->make($this->resource);
        }

        return $this->image;
    }

    /**
     * @param TextBox $textBox
     *
     * @return static
     */
    public function addTextBox(TextBox $textBox)
    {
        // fallback to resource size

        if ($textBox->getWidth() === null || $textBox->getHeight() === null)
        {
            $textBox->setSize($this->getImage()->getWidth(), $this->getImage()->getHeight());
        }

        $textbox = new Box($this->resource);
        $textbox->setFontFace($textBox->getPathFontFace());
        $textbox->setFontSize($textBox->getFontSize());
        $textbox->setFontColor(Colors::hexToRgb($textBox->getFontColorHex()));
        $textbox->setBox($textBox->getPosX(), $textBox->getPosY(), $textBox->getWidth(), $textBox->getHeight());
        $textbox->setTextAlign($textBox->getTextHorizontalAlign(), $textBox->getTextVerticalAlign());
        $textbox->draw($textBox->getText());

        return $this;
    }

    /**
     * @param string $colorHex
     * @param int $thickness
     *
     * @return static
     */
    public function addBorder(string $colorHex, int $thickness = 1)
    {
        $x1 = 0;
        $y1 = 0;
        $x2 = ImageSX($this->resource) - 1;
        $y2 = ImageSY($this->resource) - 1;

        $colorParams = Colors::hexToRgb($colorHex)->toArray();
        array_unshift($colorParams, $this->resource);
        $color = call_user_func_array('imagecolorallocate', $colorParams);

        for ($i = 0; $i < $thickness; $i++)
        {
            ImageRectangle($this->resource, $x1++, $y1++, $x2--, $y2--, $color);
        }

        return $this;
    }

    /**
     * @param string $source
     *
     * @return string
     * @throws \Exception
     */
    protected function fetchSourceContents(string $source): string
    {
        if ($data = @file_get_contents($source))
        {
            return $data;
        }

        throw new \Exception('Source does not seem to exist: ' . $source);
    }
}