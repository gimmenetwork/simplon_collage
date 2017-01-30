<?php

namespace Simplon\Collage;

/**
 * @package Simplon\Collage
 */
class TextBox
{
    /**
     * @var string
     */
    private $pathFontFace = __DIR__ . '/Fonts/Lato-Bold.ttf';
    /**
     * @var int
     */
    private $fontSize = 26;
    /**
     * @var string
     */
    private $fontColorHex = '#000000';
    /**
     * @var int
     */
    private $posX = 0;
    /**
     * @var int
     */
    private $posY = 0;
    /**
     * @var int
     */
    private $width = 100;
    /**
     * @var int
     */
    private $height = 50;
    /**
     * @var string
     */
    private $textHorizontalAlign = 'center';
    /**
     * @var string
     */
    private $textVerticalAlign = 'top';
    /**
     * @var string
     */
    private $text;

    /**
     * @param string $text
     */
    function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getPathFontFace(): string
    {
        return $this->pathFontFace;
    }

    /**
     * @param string $pathFontFace
     *
     * @return static
     */
    public function setPathFontFace(string $pathFontFace)
    {
        $this->pathFontFace = $pathFontFace;

        return $this;
    }

    /**
     * @return int
     */
    public function getFontSize(): int
    {
        return $this->fontSize;
    }

    /**
     * @param int $fontSize
     *
     * @return static
     */
    public function setFontSize(int $fontSize)
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * @return string
     */
    public function getFontColorHex(): string
    {
        return $this->fontColorHex;
    }

    /**
     * @param string $fontColorHex
     *
     * @return static
     */
    public function setFontColorHex(string $fontColorHex)
    {
        $this->fontColorHex = $fontColorHex;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosX(): int
    {
        return $this->posX;
    }

    /**
     * @return int
     */
    public function getPosY(): int
    {
        return $this->posY;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return static
     */
    public function setPos(int $x, int $y)
    {
        $this->posX = $x;
        $this->posY = $y;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $width
     * @param int $height
     *
     * @return static
     */
    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getTextHorizontalAlign(): string
    {
        return $this->textHorizontalAlign;
    }

    /**
     * @param string $textHorizontalAlign
     *
     * @return static
     */
    public function setTextHorizontalAlign(string $textHorizontalAlign)
    {
        $this->textHorizontalAlign = $textHorizontalAlign;

        return $this;
    }

    /**
     * @return string
     */
    public function getTextVerticalAlign(): string
    {
        return $this->textVerticalAlign;
    }

    /**
     * @param string $textVerticalAlign
     *
     * @return static
     */
    public function setTextVerticalAlign(string $textVerticalAlign)
    {
        $this->textVerticalAlign = $textVerticalAlign;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}