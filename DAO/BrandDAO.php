<?php

namespace DAO;

use Models\Brand as Brand;
use DAO\Ibrand as Ibrand;
use DAO\CategoryDAO as CategoryDAO;
use DAO\Connection as Connection;


class BrandDAO implements Ibrand{

    private $connection ;
    private $nameTable;
    private $listBrand;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "brand";
        $this->listBrand = [];

    }

    public static function GetInstance(){

        if(self::$instance == null)
            self::$instance = new BrandDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $brand = new Brand();
            $brand->setId_brand($p["id_brand"]);
            $brand->setName($p['name']);
            $brand->setCategory(CategoryDAO::MapearCategory($p['idcategory']));
            

            return $brand;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];

    }

    public static function MapearBrand($id_brand) {

        $brandDAO = BrandDAO::GetInstance();
 
        return $brandDAO->GetBrandForId($id_brand);
     }

    private function getAllbrandBD(){

        $query = " SELECT * FROM " . $this->nameTable ;

        try {

         $result = $this->connection->Execute($query);
            
        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function getAllbrand(){

        $this->listBrand = [];

          $arrayBrand = $this->getAllbrandBD();

          if(!empty($arrayBrand)){

            $result = $this->Mapear($arrayBrand);

            if(is_array($result)){

                $this->listBrand = $result;

            }else{

                $arrayResult[0] = $result;
                $this->listCategory = $arrayResult;

            }

          }

          return $this->listBrand;

    }



    public function addBrand(Brand $brand){

      $query = " INSERT INTO " . $this->nameTable . " (name , idcategory )  VALUE (:name , :idcategory) ";

      $parameters['name'] = $brand->getName();
      $parameters['idcategory'] = $brand->getCategory()->getId_category();

      try {
          
       $result =  $this->connection->ExecuteNonQuery($query,$parameters);


      } catch (Exception $ex) {
          throw $ex;
      }

      return $result;

    }
    function deleteBrand($id_brand){

        $query = " DELETE FROM " . $this->nameTable . " where id_brand = (:id_brand) ";

        $parameters['id_brand'] = $id_brand;

        try {
            
           $result = $this->connection->ExecuteNonQuery($query , $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public  function GetBrandForId($id_brand){
        
        $query = " SELECT * FROM " . $this->nameTable .  " where id_brand = (:id_brand) " ;

        $parameters['id_brand'] = $id_brand;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $brand = null;

        if(!empty($result)){

           $brand = $this->Mapear($result);
        }
       
        return $brand;

    }

    public function getListBrandFromCategoryBD($id_category){

        $query = " SELECT * FROM " .$this->nameTable . " where  idcategory = (:idcategory)";
  
        $parameters['idcategory'] = $id_category;
  
        try {
            
         $result =  $this->connection->Execute($query,$parameters);
  
  
        } catch (Exception $ex) {
            throw $ex;
        }
  
        return $result;
  
      } 
      public function getListBrandFromCategory($id_category){

        $this->listBrand = [];

          $arrayBrand = $this->getListBrandFromCategoryBD($id_category);

          if(!empty($arrayBrand)){

            $result = $this->Mapear($arrayBrand);

            if(is_array($result)){

                $this->listBrand = $result;

            }else{

                $arrayResult[0] = $result;
                $this->listCategory = $arrayResult;

            }

          }

          return $this->listBrand;

    }

}

?>