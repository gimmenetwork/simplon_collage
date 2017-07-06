<?php

namespace Simplon\Collage;

/**
 * @package Simplon\Collage
 */
class TextBox
{
    const HALIGN_LEFT = 'left';
    const HALIGN_CENTER = 'center';
    const HALIGN_RIGHT = 'right';
    const VALIGN_TOP = 'top';
    const VALIGN_CENTER = 'center';
    const VALIGN_BOTTOM = 'bottom';

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
    private $width;
    /**
     * @var int
     */
    private $height;
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
     * @param array $params
     */
    function __construct(string $text, array $params = [])
    {
        $this->text = $this->renderTextWithParams($text, $params);
    }

    /**
     * @param callable $callable
     *
     * @return TextBox
     */
    public function transformText(callable $callable): self
    {
        $this->text = $callable($this->text);

        return $this;
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
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
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

    /**
     * @param string $text
     * @param array $params
     *
     * @return string
     */
    private function renderTextWithParams(string $text, array $params): string
    {
        if (!empty($params))
        {
            foreach ($params as $placeholder => $value)
            {
                $text = str_replace('{' . $placeholder . '}', $value, $text);
            }
        }

        return $text;
    }
}