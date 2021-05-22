<?php

namespace Controllers;

use DAO\DescriptionProductDAO as DescriptionProductDAO;
use Models\DescriptionProduct as DescriptionProduct;
use DAO\PowerDAO as PowerDAO;
use DAO\GasTypeDAO as GasTypeDAO;
use DAO\AplicationDAO as AplicationDAO;
use Controllers\Functions;
use PDOException;

class DescriptionProductController{

    private $DescriptionProductDao;

    public function __construct(){

        $this->DescriptionProductDao = DescriptionProductDAO::GetInstance();
    }

   
    public function addDescriptionProduct($id_gasType,$id_aplication,$id_power){

        require_once(VIEWS_PATH."validate-session.php");

          $descriptionP = null;
         // buscar si existe un producto con la misma description null lo agrega, objeto lo devuelve 
         $descriptionP = $this->DescriptionProductDao->getDescriptionProductEqually($id_power,$id_gasType,$id_aplication);

         if($descriptionP == null){

            $power = PowerDAO::MapearPower($id_power);
            $gasType = GasTypeDAO::MapearGasType($id_gasType);
            $aplication = AplicationDAO::MapearAplication($id_aplication);
    
             
             $descriptionP = new DescriptionProduct();
    
             $descriptionP->setPower($power);
             $descriptionP->setGasType($gasType);
             $descriptionP->setAplication($aplication);

             try {

                $resultDescrip =  $this->DescriptionProductDao->addDescriptionProduct($descriptionP);
                $descriptionP = $this->DescriptionProductDao->getDescriptionProductEqually($id_power,$id_gasType,$id_aplication);
            
            } catch (Exception $ex) {
                echo $ex->errorMessage();

            }
                
            }
            return  $descriptionP;
            
    }


    public function ModifyDescriptionProduct($id_gasType,$id_aplication,$id_power){

        require_once(VIEWS_PATH."validate-session.php");

     $descriptionP = $this->addDescriptionProduct($id_gasType,$id_aplication,$id_power);

     return $descriptionP;

}
}

?>