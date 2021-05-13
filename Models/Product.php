<?php

namespace Models;

class Product
{

    private $id_product;
    private $code;
    private $brand;
    private $descriptionP;
    private $dataSheet;
    private $quantity;
    private $price;  


    /**
     * Get the value of id_product
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */
    public function setIdProduct($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of descriptionP
     */
    public function getDescriptionP()
    {
        return $this->descriptionP;
    }

    /**
     * Set the value of descriptionP
     *
     * @return  self
     */
    public function setDescriptionP($descriptionP)
    {
        $this->descriptionP = $descriptionP;

        return $this;
    }

    /**
     * Get the value of dataSheet
     */
    public function getDataSheet()
    {
        return $this->dataSheet;
    }

    /**
     * Set the value of dataSheet
     *
     * @return  self
     */
    public function setDataSheet($dataSheet)
    {
        $this->dataSheet = $dataSheet;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    

    
    public function getPrice()
    {
        return $this->price;
    }

    
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }
}

?>