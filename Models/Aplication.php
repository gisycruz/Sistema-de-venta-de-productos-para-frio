<?php

namespace Models;

class Aplication{

    private $id_aplication;
    private $name;

    /**
     * Get the value of id_aplication
     */ 
    public function getId_aplication()
    {
        return $this->id_aplication;
    }

    /**
     * Set the value of id_aplication
     *
     * @return  self
     */ 
    public function setId_aplication($id_aplication)
    {
        $this->id_aplication = $id_aplication;

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