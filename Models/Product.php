<?php

namespace Models;

class Product
{

    private $id_product;
    private $code;
    private $category;
    private $brand;
    private $descriptionP;
    private $industry;
    private $photo;
    private $dataSheet;
    
    /**
     * Get the value of id_product
     */
    public function getId_Product()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */
    public function setId_Product($id_product)
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
     * Get the value of industry
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set the value of industry
     *
     * @return  self
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;

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
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}