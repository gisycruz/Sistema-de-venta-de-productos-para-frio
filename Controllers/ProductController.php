<?php

namespace Controllers;


use DAO\BrandDAO as BrandDAO ;
use DAO\PowerDAO as PowerDAO;
use DAO\GasTypeDAO as GasTypeDAO;
use DAO\AplicationDAO as AplicationDAO;
use Models\DescriptionProduct as DescriptionProduct;
use DAO\DescriptionProductDAO as DescriptionProductDAO;
use Models\Product as Product;

class ProductController
{
    private $powerDao;
    private $gasTypeDao;
    private $aplicationDao;
    private $descriptionPDao;
    private $productDao;


    public function __construct(){

        $this->powerDao = PowerDAO::GetInstance();
        $this->gasTypeDao = GasTypeDAO::GetInstance();
        $this->aplicationDao = AplicationDAO::GetInstance();
        $this->descriptionPDao = DescriptionProductDAO::GetInstance();
    }

    public function showAddProduct($id_brand , $message = ""){

        $brand = BrandDAO::MapearBrand($id_brand);

        $listPower = $this->powerDao->GetAllPower();

        $listGasType = $this->gasTypeDao->getAllgasType();

        $listAplication = $this->aplicationDao->getAllAplication();

        require_once(VIEWS_PATH."add-product.php");
    }
 
    public function showListProduc($message = ""){

          $listProduc = $this->
    }
    

    public function addProduct($code ,$id_power, $id_gasType , $id_aplication,$quantity,$price ,$id_brand){


        $product = new Product();
        $product->setCode($code);
         // buscar si existe un producto con la misma description null lo agrega, objeto lo devuelve 
        $descriptionP = $this->descriptionPDao->getDescriptionProductEqually($id_power,$id_gasType,$id_aplication);

        if($descriptionP == null){

            $power = PowerDAO::MapearPower($id_power);
            $gasType = GasTypeDAO::MapearGasType($id_gasType);
            $aplication = AplicationDAO::MapearAplication($id_aplication);
    
             
             $descriptionP = new DescriptionProduct();
    
             $descriptionP->setPower($power);
             $descriptionP->setGasType($gasType);
             $descriptionP->setAplication($aplication);

             try {

                $resultDescrip =  $this->descriptionPDao->addDescriptionProduc($descriptionP);
                 
                if($resultDescrip == 1){

                    $descriptionP = $this->descriptionPDao->getDescriptionProductEqually($id_power,$id_gasType,$id_aplication);

                    $product->setDescriptionP($descriptionP);

                }else{

                    $this->showAddProduct($id_brand ,"Error en Agregar el producto ");
                   }

            } catch (Exception $ex) {
                throw $ex;
            }

        }else{

           $product->setDescriptionP($descriptionP);

        }
        
        $product->set


    }
    
}


?>