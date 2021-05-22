<?php

namespace Controllers;
use FFI\Exception;
use DAO\PowerDAO as PowerDAO;
use DAO\GasTypeDAO as GasTypeDAO;
use DAO\AplicationDAO as AplicationDAO;
use DAO\BrandDAO as  BrandDAO;
use DAO\CategoryDAO as CategoryDAO;
use DAO\IndustryDAO as IndustryDAO; 
use DAO\ProductDAO as ProductDAO;
use Models\Product as Product;
use Controllers\DescriptionProductController as DescriptionProducController;
use Controllers\Functions;
use PDOException;

class ProductController
{
    private $powerDao;
    private $gasTypeDao;
    private $aplicationDao;
    private $descriptionP;
    private $productDao;
    private $categoryDao;
    private $brandDao;
    private $IndustryDao ;


    public function __construct(){

        $this->powerDao = PowerDAO::GetInstance();
        $this->gasTypeDao = GasTypeDAO::GetInstance();
        $this->aplicationDao = AplicationDAO::GetInstance();
        $this->descriptionPController = new DescriptionProductController();
        $this->categoryDao = CategoryDAO::GetInstance();
        $this->brandDao = BrandDAO::GetInstance();
        $this->IndustryDao = IndustryDAO::GetInstance();
        $this->productDao = ProductDAO::GetInstance();
    }

    public function showAddProduct($id_Product = null , $message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listPower = $this->powerDao->GetAllPower();

        $listGasType = $this->gasTypeDao->getAllgasType();

        $listAplication = $this->aplicationDao->getAllAplication();

        $listCategory = $this->categoryDao->getAllCategory();

        $listBrand = $this->brandDao->getAllBrand();
        
        $listIndustry = $this->IndustryDao->getAllIndustry();

        $listProduct = $this->productDao->getAllProduct();

        $listCategory2 = [];

        foreach ( $listProduct as $product){

            array_push($listCategory2 , $product->getCategory()->getId_category());
        }

        $listCategory2 = array_unique($listCategory2);

        $listNewCategory = [];

        foreach($listCategory2 as $id_category ){

            array_push($listNewCategory,CategoryDAO::MapearCategory($id_category));
        }

        if($id_Product != null){
        $Product = ProductDAO::MapearProduct($id_Product);
        }
         require_once(VIEWS_PATH."add-product.php");
    }

    public function ShowModify($id_Product){

        require_once(VIEWS_PATH."validate-session.php");
    
        $this->showAddProduct($id_Product,"Modificar");
    
        
    }
 
   
    public function addProduct($code,$id_category,$id_brand ,$id_Industry ,$id_gasType,$id_aplication,$id_power,$photo,$dataSheet){
    
       require_once(VIEWS_PATH."validate-session.php");

        $category = CategoryDAO::MapearCategory($id_category);
        $brand = BrandDAO::MapearBrand($id_brand);
        $Industry = IndustryDAO::MapearIndustry($id_Industry);  
        
        $product = new Product();
        $product->setCode($code);
        $product->setCategory($category);
        $product->setBrand($brand);
        $product->setIndustry($Industry);
        $product->setPhoto($photo);
        $product->setDataSheet($dataSheet);

        $descriptionP = $this->descriptionPController->addDescriptionProduct($id_gasType,$id_aplication,$id_power);
        
        $product->setDescriptionP($descriptionP);

        try {
              
            $result = $this->productDao->addProduct($product);
           
            if( $result == 1 )
            $this->showAddProduct($id_Product = null,"Producto Agregado");
            else
            $this->showAddProduct($id_Product = null,"ERROR..AL AGREGAR EL PRODUCTO 8");

            
        }catch (PDOException $ex){

            if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
             $this->showAddProduct($id_Product = null,"ya existe un Producto con ese CODIGO");
        }
    }

        public function RemoverProduct($id_Product)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->productDao->DeleteProduct($id_Product);
           
            if($result == 1){

            $this->showAddProduct($id_Product = null,"Producto eliminado");
              
        }else{

            $this->showAddProduct($id_Product = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddProduct($id_Product = null,"Hay datos asociados No se pobra borrar el Producto");
               

            }
        }

    }

    public function ModifyProduct($id_Product ,$code,$id_category,$id_brand ,$id_Industry ,$id_gasType,$id_aplication,$id_power,$photo,$dataSheet){

        require_once(VIEWS_PATH."validate-session.php");
        
        $descriptionP = $this->descriptionPController->ModifyDescriptionProduct($id_gasType,$id_aplication,$id_power);
         
        var_dump($descriptionP);
        try{

        $result = $this->productDao->ModifyProduct($id_Product,$code,$id_category,$id_brand ,$id_Industry ,$descriptionP->getId_dp(),$photo,$dataSheet);
       
        if($result == 1)
        $this->showAddProduct($id_Product = null,"producto Editado");
        //else
       // $this->showAddProduct($id_Product = null,"ERROR..Al MODIFICAR EL PRODUCTO");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddProduct($id_Product = null,"ya existe un Producto con ese Codigo");
    }

    }

   
    
    
}


?>