<?php

namespace Controllers;

use DAO\BrandDAO as BrandDAO;
use DAO\CategoryDAO as CategoryDAO;
use Models\Brand as Brand;
use Controllers\Functions;
use PDOException;

class BrandController{

    private $brandDao;
    private $categoryDao;

    public function __construct(){

        $this->brandDao = BrandDAO::GetInstance();
        $this->categoryDao = CategoryDAO::GetInstance();
    }

    public function showAddBrand($message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listCategory =  $this->categoryDao->getAllcategory();

        require_once(VIEWS_PATH."add-brand.php");
    }

    public function showListBrand($id_category , $message = ""){
           
        require_once(VIEWS_PATH."validate-session.php");

        $category = CategoryDAO::MapearCategory($id_category);

        $listBrand = $this->brandDao->getListBrandFromCategory($id_category);

        
        require_once(VIEWS_PATH."add-brand.php");

    }

    public function addBrand($id_category,$name){

           $brand = new Brand();

           $brand->setName($name);

           $category = CategoryDAO::MapearCategory($id_category);

           $brand->setCategory($category);

           try {
               
           $result = $this->brandDao->addBrand($brand);

           if( $result == 1)
             $this->showAddBrand("se agrego una marca para la categoria " . $category->getName()."<br>");
           else
           $this->showAddBrand(" ERROR..AL INGRESAR LA MARCA !!! ");

            }catch (PDOException $ex){

            if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
            $this->showAddBrand($id_category," ya esta ingresada la marca para la categoria  " . $category->getName() ."<br>");
        }


    }
}

?>