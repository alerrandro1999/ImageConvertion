<?php

namespace App\File;

class ImageToText
{
    const CHAR = [
        '#',
        '=',
        '%',
        '*',
        ' '
    ];

    private $image;

    private $width;

    private $height;

    public function __construct($file)
    {
        $this->image = imagecreatefromstring(file_get_contents($file));
        list($this->width, $this->height) = getimagesize($file);
        $this->setGrayScale();
    }

    private function setGrayScale()
    {
        imagefilter($this->image, IMG_FILTER_GRAYSCALE);
        imagefilter($this->image, IMG_FILTER_CONTRAST, -10);
    }

    private function getResizedImage($newWidth, &$newHeight)
    {
        $ratio = $this->width / $this->height;

        $newHeight = round(($newWidth / $ratio) / 2);

        return imagescale($this->image, $newWidth, $newHeight);
    }

    public function getText($newWidth)
    {
        $image = $this->getResizedImage($newWidth, $newHeight);

        $text = '';

        for ($y = 0; $y < $newHeight; $y++) {
            for ($x = 0; $x < $newWidth; $x++) {
                $text .= $this->getChar($image, $x, $y);
            }

            $text .= PHP_EOL;
        }

        return trim($text, PHP_EOL);
    }

    private function getPixelColor($image, $x, $y)
    {

        $index = imagecolorat($image, $x, $y);

        $color = imagecolorsforindex($image, $index);

        return $color['red'] ?? 0;
    }

    private function getChar($image, $x, $y)
    {
        $color = $this->getPixelColor($image, $x, $y);

        $range = (255 / count(self::CHAR));

        $index = floor($color / $range);

        return self::CHAR[$index] ?? ' ';
    }
}
