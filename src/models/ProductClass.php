<?php

class ProductClass
{

    private int $id;
    private string $sku;
    private string $name;
    private float $price;
    private AttributesClass $attribute;


    public function __construct($id ,$sku = '', $name = '', $price = '')
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAttribute(): AttributesClass
    {
        return $this->attribute;
    }
    public function getParams(): array {
        $initialParams = array(':sku' => $this->sku, ':name' => $this->name, ':price' => $this->price, ':size'=>null, ':weight'=>null,':height'=>null, ':width'=>null, ':lenght'=>null);
        return $this->attribute->getParams($initialParams);
        

    }
    
}
