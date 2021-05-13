<?php 

namespace DAO;

use DAO\Connection as Connection;
use DAO\Iproduct as Iproduct;
use Models\Product as Product;
use DAO\DescriptionProductDAO as DescriptionProductDAO;
use DAO\BrandDAO as BrandDAO;

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
            $product->setBrand(BrandDAO::MapearBrand($p['idbrand']))
            $product->setDescriptionP(DescriptionProductDAO::MapearDescriptionProduct($p['iddescriptionP']));
            $product->setDataSheet($p['dataSheet']);
            $product->setQuantity($p['quantity']);
            $product->setPrice($p['price']);

            return $product;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public static function MapearProduct($id_product) {

        $ProductDAO = ProductDAO::GetInstance();
 
        return $ProductDAO->GetProductForId($id_power);
     }


     public function addProduct(Product $product){

        $query = " INSERT INTO " . $this->nameTable . " (code , idbrand , iddescriptionP , dataSheet , quantity , price ) value (:code,:idbrand,:iddescriptionP,:dataSheet , :quantity , :price)";

        $parameters['code'] = $product->getCode();
        $parameters['idbrand'] = $product->getBrand()->getId_brand();
        $parameters['iddescriptionP'] = $product->getDescriptionP()->getId_dp();
        $parameters['dataSheet'] = $product->getDataSheet();
        $parameters['quantity'] = $product->getQuantity();
        $parameters['price'] = $product->getPrice();

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

        $query = " DELETE FROM " . $this->nameTable . " where id_product = (:id_product) ";

        $parameters['id_product'] = $id_product;


        try {

           $result =  $this->connection->ExecuteNonQuery($query,$parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

     
}


?>