<?php


class FurnitureClass extends AttributesClass
{
    private float $height;
    private float $width;
    private float $lenght;

    public function getDisplayAttributes(): string
    {
        return 'Dimensions: ' . $this->height . 'x' . $this->width . 'x' . $this->lenght;
    }

    public function __construct($height, $width, $lenght)
    {
        $this->height = $height;
        $this->width = $width;
        $this->lenght = $lenght;
    }


    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setLenght($lenght)
    {
        $this->lenght = $lenght;
    }


    public function getHeight(): float
    {
        return $this->height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getLenght(): float
    {
        return $this->lenght;
    }

    public function getParams($initialParams): array
    {
        $initialParams[':height'] = $this->height;
        $initialParams[':width'] = $this->width;
        $initialParams[':lenght'] = $this->lenght;

        return $initialParams;
    }
}
