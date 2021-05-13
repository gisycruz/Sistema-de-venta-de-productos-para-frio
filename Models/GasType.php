<?php

namespace Models;

class GasType{

    private $id_gasType;
    private $name;

    /**
     * Get the value of id_gasType
     */ 
    public function getId_gasType()
    {
        return $this->id_gasType;
    }

    /**
     * Set the value of id_gasType
     *
     * @return  self
     */ 
    public function setId_gasType($id_gasType)
    {
        $this->id_gasType = $id_gasType;

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

?>