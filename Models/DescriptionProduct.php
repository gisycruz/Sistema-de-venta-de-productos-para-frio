<?php 

namespace Models;

class DescriptionProduct{

    private $id_dp;
    private $gasType;
    private $aplication;
    private $power;
    

    /**
     * Get the value of id_dp
     */ 
    public function getId_dp()
    {
        return $this->id_dp;
    }

    /**
     * Set the value of id_dp
     *
     * @return  self
     */ 
    public function setId_dp($id_dp)
    {
        $this->id_dp = $id_dp;

        return $this;
    }

    /**
     * Get the value of gasType
     */ 
    public function getGasType()
    {
        return $this->gasType;
    }

    /**
     * Set the value of gasType
     *
     * @return  self
     */ 
    public function setGasType($gasType)
    {
        $this->gasType = $gasType;

        return $this;
    }

    /**
     * Get the value of aplication
     */ 
    public function getAplication()
    {
        return $this->aplication;
    }

    /**
     * Set the value of aplication
     *
     * @return  self
     */ 
    public function setAplication($aplication)
    {
        $this->aplication = $aplication;

        return $this;
    }

    /**
     * Get the value of power
     */ 
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set the value of power
     *
     * @return  self
     */ 
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }
}

?>