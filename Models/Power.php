<?php
 
 namespace Models;

 class Power{

     private $id_power;
     private $description;

     /**
      * Get the value of id_power
      */ 
     public function getId_power()
     {
          return $this->id_power;
     }

     /**
      * Set the value of id_power
      *
      * @return  self
      */ 
     public function setId_power($id_power)
     {
          $this->id_power = $id_power;

          return $this;
     }

     /**
      * Get the value of description
      */ 
     public function getDescription()
     {
          return $this->description;
     }

     /**
      * Set the value of description
      *
      * @return  self
      */ 
     public function setDescription($description)
     {
          $this->description = $description;

          return $this;
     }
 }

?>