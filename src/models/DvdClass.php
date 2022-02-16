<?php


class DvdClass extends AttributesClass
{
    private float $size;

    public function getDisplayAttributes(): string
    {
        return 'Size: '.$this->size.'MB';
    }
  

    public function __construct($size )
    {
        $this->size = $size;
    }
   
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize(): float
    {
        return $this->size;
    }
    public function getParams($initialParams): array
    {
        $initialParams[':size'] = $this->size;
        return $initialParams;

    }

}
