<?php

namespace Models;

class Product
{

    private $id_product;
    private $code;
    private $category;
    private $brand;
    private $descriptionP;
    private $provider;
    private $dataSheet;
    
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
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

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
     * Get the value of provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set the value of provider
     *
     * @return  self
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

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

}