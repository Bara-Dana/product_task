<?php

class BookClass extends AttributesClass
{
    private float $weight;


    public function getDisplayAttributes(): string
    {
        return 'Weight: ' . $this->weight . 'kg';
    }

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getParams($initialParams): array
    {
        $initialParams[':weight'] = $this->weight;
        return $initialParams;

    }
}
