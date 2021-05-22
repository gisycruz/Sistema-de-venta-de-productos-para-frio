<?php
namespace Models;

class Industry{

    private $id_industry;
    private $name;

    

    /**
     * Get the value of id_industry
     */
    public function getId_industry()
    {
        return $this->id_industry;
    }

    /**
     * Set the value of id_industry
     *
     * @return  self
     */
    public function setId_industry($id_industry)
    {
        $this->id_industry = $id_industry;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}