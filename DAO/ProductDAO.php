<?php 

namespace DAO;

use Models\Product as Product;
use DAO\Connection as Connection;
use DAO\Iproduct as Iproduct;
use DAO\CategoryDAO as CategoryDAO;
use DAO\DescriptionProductDAO as DescriptionProductDAO;
use DAO\BrandDAO as BrandDAO;
use DAO\ProviderDAO as ProviderDAO;

class ProductDAO implements Iproduct{

    private $connection;
    private $nameTable;
    private $listProduct;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "product";
        $this->listProduct = [];
    }

    public static function GetInstance(){

        if(self::$instance == null)
        self::$instance = new ProductDAO();

    return self::$instance; 
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $product = new Product();
            $product->setId_product($p["id_product"]);
            $product->setCode($p['code']);
            $product->setCategory(CategoryDAO::MapearCategory($p['idcategory']));
            $product->setBrand(BrandDAO::MapearBrand($p['idbrand']));
            $product->setDescriptionP(DescriptionProductDAO::MapearDescriptionProduct($p['iddescriptionP']));
            $product->setProvider(ProviderDAO::MapearProvider($p['idproveder']));
            $product->setDataSheet($p['dataSheet']);
           

            return $product;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public static function MapearProduct($id_product) {

        $ProductDAO = ProductDAO::GetInstance();
 
        return $ProductDAO->GetProductForId($id_product);
     }


     public function addProduct(Product $product){

        $query = " INSERT INTO " . $this->nameTable . " (code , idcategory , idbrand ,iddescriptionP ,idprovider ,dataSheet ) value (:code , :idcategory , :idbrand , :iddescriptionP , :idprovider , :dataSheet )";

        $parameters['code'] = $product->getCode();
        $parameters['idcategory'] = $product->getCategory()->getId_category();
        $parameters['idbrand'] = $product->getBrand()->getId_brand();
        $parameters['iddescriptionP'] = $product->getDescriptionP()->getId_dp();
        $parameters['idprovider'] = $product->getProvider()->getId_provider();
        $parameters['dataSheet'] = $product->getDataSheet();
       
        try {

          $result =  $this->connection->ExecuteNonQuery($query , $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

      return $result;

     }
    private function getAllProductBD(){

        $query = " SELECT * FROM " . $this->nameTable ;

        try {

           $result =  $this->connection->Execute($query);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;

    }

    public function getAllProduct(){
    
         $this->listProduct = [];

         $arrayProduct = $this->getAllProductBD();

         if(!empty($arrayProduct)){

            $result = $this->Mapear($arrayProduct);

            if(is_array($result)){

                $this->listProduct = $result;

            }else{

            $arrayResult[0] = $result;
            $this->listPower = $arrayResult;
        }

        return $this->listProduct ;

         }

    }
    public function deleteProduct($id_product){

        $query = "  ";

        $parameters['id_product'] = $id_product;


        try {

           $result =  $this->connection->ExecuteNonQuery($query,$parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }


    public function ModifyProduct($id_product ,$code , $id_category , $id_brand ,$id_descriptionP ,$id_provider ,$dataSheet) {

        $query = " UPDATE " . $this->nameTable . " SET  code = (:code) , idcategory = (:idcategory) , idbrand = (:idbrand) , iddescription = (:iddescription) , idprovider = (:idprovider) , dataSheet = (:dataSheet)   WHERE  id_Product = (:id_Product) ";
      
        $parameters['code'] = $code;
        $parameters["idcategory"] = $id_category;
        $parameters['idbrand'] = $id_brand;
        $parameters['iddescription'] = $id_description;
        $parameters['idprovider'] = $id_provider;
        $parameters['dataSheet'] = $dataSheet;
        $parameters["id_Product"] =$id_Product;

        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }
    public  function GetProductForId($id_Product){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_Product = (:id_Product) ";

        $parameters['id_Product'] = $id_Product;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $Product = null;

        if(!empty($result)){

           $Product = $this->Mapear($result);
        }
       
        return $Product;

    }

     
}


?>