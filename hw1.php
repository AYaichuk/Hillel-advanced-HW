<?php

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    private function setRed(int $red)
    {
        if ($red < 0 || $red > 255) {
            throw new Exception('Значение должно быть в диапазоне от 0 до 255');
        }
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    private function setGreen(int $green)
    {
        if ($green < 0 || $green > 255) {
            throw new Exception('Значение должно быть в диапазоне от 0 до 255');
        }
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setBlue(int $blue)
    {
        if ($blue < 0 || $blue > 255) {
            throw new Exception('Значение должно быть в диапазоне от 0 до 255');
        }
        $this->blue = $blue;
    }

    public function equals(Color $color): bool
    {
        return $this->getRed() == $color->getRed() &&
               $this->getGreen() == $color->getGreen() &&
               $this->getBlue() == $color->getBlue();
    }

    public static function random(): self
    {
        return new self (rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(Color $color): Color
    {

        return new Color(
            (int)(($this->red + $color->getRed()) / 2),
            (int)(($this->green + $color->getGreen()) / 2),
            (int)(($this->blue + $color->getBlue()) / 2)
        );
    }
}

$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));
echo '<pre>';
echo $mixedColor->getRed();
echo '</pre>';

echo '<pre>';
echo $mixedColor->getGreen();
echo '</pre>';

echo '<pre>';
echo $mixedColor->getBlue();
echo '</pre>';

$color1 = Color:: random();
$color2 = Color:: random();
$mixedColor1 = $color1->mix($color2);
echo '<pre>';
var_dump($mixedColor1);
echo '</pre>';

echo '<pre>';
var_dump($color->equals($mixedColor));
echo '</pre>';
