<?php

namespace Controllers;

use DAO\PowerDAO as PowerDAO;
use DAO\GasTypeDAO as GasTypeDAO;
use DAO\AplicationDAO as AplicationDAO;
use DAO\BrandDAO as  BrandDAO;
use DAO\CategoryDAO as CategoryDAO;
use DAO\ProviderDAO as ProviderDAO; 
use DAO\DescriptionProductDAO as DescriptionProductDAO;
use DAO\ProductDAO as ProductDAO;
use Models\DescriptionProduct as DescriptionProduct;
use Models\Product as Product;
use Controllers\Functions;
use PDOException;

class ProductController
{
    private $powerDao;
    private $gasTypeDao;
    private $aplicationDao;
    private $descriptionPDao;
    private $productDao;
    private $categoryDao;
    private $brandDao;
    private $providerDao ;


    public function __construct(){

        $this->powerDao = PowerDAO::GetInstance();
        $this->gasTypeDao = GasTypeDAO::GetInstance();
        $this->aplicationDao = AplicationDAO::GetInstance();
        $this->descriptionPDao = DescriptionProductDAO::GetInstance();
        $this->categoryDao = CategoryDAO::GetInstance();
        $this->brandDao = BrandDAO::GetInstance();
        $this->providerDao = ProviderDAO::GetInstance();
        $this->productDao = ProductDAO::GetInstance();
    }

    public function showAddProduct($message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listPower = $this->powerDao->GetAllPower();

        $listGasType = $this->gasTypeDao->getAllgasType();

        $listAplication = $this->aplicationDao->getAllAplication();

        $listCategory = $this->categoryDao->getAllCategory();

        $listBrand = $this->brandDao->getAllBrand();
        
        $listProvider = $this->providerDao->getAllProvider();

        require_once(VIEWS_PATH."add-product.php");
    }
 
   
    public function addProduct($code ,$id_category,$id_brand ,$id_provider ,$id_gasType,$id_aplication,$id_power,$dataSheet ){
    
       require_once(VIEWS_PATH."validate-session.php");

        $category = CategoryDAO::MapearCategory($id_category);
        $brand = BrandDAO::MapearBrand($id_brand);
        $provider = ProviderDAO::MapearProvider($id_provider);  


        $product = new Product();
        $product->setCode($code);
        $product->setCategory($category);
        $product->setBrand($brand);
        $product->setProvider($provider);
        $product->setDataSheet($dataSheet);


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

                $resultDescrip =  $this->descriptionPDao->addDescriptionProduct($descriptionP);
                 
                if($resultDescrip == 1){

                    $product->setDescriptionP($descriptionP);

                }else{

                    $this->showAddProduct("Error en Agregar el producto ");
                   }

            } catch (Exception $ex) {
                throw $ex;

               $this->showAddProduct("Error en Agregar el producto ");
            }

        }else{

           $product->setDescriptionP($descriptionP);

        }

        try {
              
            $result = $this->productDao->addProduct($product);
           
            if($result == 1)
            $this->showAddProduct("Producto Agregado");
            else
            $this->showAddProduct("ERROR..AL AGREGAR EL PRODUCTO");

        
            
        }catch (PDOException $ex){

            if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
             $this->showAddProduct("ya existe un Producto con ese CODIGO");
        }
    }
    
}


?>