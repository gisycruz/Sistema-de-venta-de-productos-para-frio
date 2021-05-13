<?php 

namespace DAO;

use Models\DescriptionProduct as DescriptionProduct;
use DAO\Connection as Connection;
use DAO\GasTypeDAO as GasTypeDAO;
use DAO\AplicationDAO as AplicationDAO;
use DAO\PowerDAO as PowerDAO;
use DAO\IdescriptionProduct as IdescriptionProduct;

class DescriptionProductDAO implements IdescriptionProduct{

    private $connection;
    private $nameTable;
    private $listDescripP;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable ="descriptionProduct";
        $this->listDescripP = [];
    }

    public static function GetInstance(){

        if(self::$instance == null)
            self::$instance = new DescriptionProductDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){
           
            $descriptionP = new DescriptionProduct();

            $descriptionP->setId_dp($p['id_dp']);
            $descriptionP->setGasType(GasTypeDAO::MapearGasType($p['idgasType']));
            $descriptionP->setAplication(AplicationDAO::MapearAplication($p['idaplication']));
            $descriptionP->setPower(PowerDAO::MapearPower($p['idpower']));
        
            return $descriptionP;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];


    }
    public static function MapearDescriptionProduct($id_dp) {

       $descripPDAO = DescriptionProductDAO::GetInstance();

       return $descripPDAO->GetDescriptionProductForId($id_dp);
    }

   public function addDescriptionProduc(DescriptionProduct $descriptionProduct){

       $query = " INSERT INTO ".$this->nameTable . " (idgasType , idaplication ,idpower )  value (:idgasType , :idaplication , :idpower )";

       $parameters['idgasType'] = $descriptionProduct->getGasType()->getId_gasType();
       $parameters['idaplication'] = $descriptionProduct->getAplication()->getId_aplication();
       $parameters['idpower'] = $descriptionProduct->getPower()->getId_power();


       try {
           $result = $this->connection->ExecuteNonQuery($query , $parameters);


       } catch (Exception $ex) {
           throw $ex;
       }

       return $result;

   }
    private function getAllDescriptionProducBD(){

    $query = " SELECT * FROM " . $this->nameTable ;

    try {
         
        $result = $this->connection->Execute($query);

    } catch (Exception $ex) {
        throw $ex;
    }

    return $result;

    }

    public function getAllDescriptionProduc(){
        
        $this->listDescripP = [];

        $arrayDescripP = $this->getAllDescriptionProducBD();

        if(!empty($arrayDescripP)){

            $result = $this->Mapear($arrayDescripP);

            if(is_array($result)){

                $this->listDescripP = $result;

            }else{

                $arrayResult[0] = $result;
            $this->listDescripP = $arrayResult;
            }
        }

       return $this->listDescripP ; 
    }

    function deleteDescriptionProduct($id_descriptionProduct){

        $query = " DELETE FROM " .$this->nameTable . " where id_dp = (:id_dp) ";

        $parameters['id_dp'] = $id_descriptionProduct;

        try {
            $result = $this->connection->ExecuteNonQuery($query,$parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public  function GetDescriptionProductForId($id_dp){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_dp = (:id_dp) ";

        $parameters['id_dp'] = $id_dp;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $descriptionP = null;

        if(!empty($result)){

           $descriptionP = $this->Mapear($result);
        }
       
        return $descriptionP;

    }

    public function getDescriptionProductEqually($id_power,$id_gasType,$id_aplication){

        $query = " SELECT * FROM " . $this->nameTable . " where  idpower =(:idpower) && idgasType =(:idgasType) && idaplication =(:idaplication)";

        $parameters['idpower'] = $id_power;
        $parameters['idgasType'] = $id_gasType;
        $parameters['idaplication'] =$id_aplication;

        try {
           $result = $this->connection->Execute($query,$parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        $descriptionP = null;

        if(!empty($result)){

            $descriptionP = $this->Mapear($result);
        
        }

        return $descriptionP;
    }

}

?>