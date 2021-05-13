<?php

namespace DAO;

use Models\GasType as Gastype;
use DAO\Connection as Connection;

class GasTypeDAO implements IgasType{

    private $connection;
    private $nameTable;
    private $listGasType;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "gasType";
        $this->listGasType = [];
    }

    public static function GetInstance(){

        if(self::$instance == null)
            self::$instance = new GasTypeDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $GasType = new GasType();
            $GasType->setId_gasType($p["id_gasType"]);
            $GasType->setName($p['name']);
            

            return $GasType;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public static function MapearGasType($id_gasType) {

        $gasTypeDAO = GastypeDAO::GetInstance();
 
        return $gasTypeDAO->GetGasTypeForId($id_gasType);
     }


    private function getAllgasTypeBD(){

        $query = " SELECT * FROM " .$this->nameTable ;

        try {
            
        $result = $this->connection->Execute($query);


        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function getAllgasType(){

        $this->listGasType = [];

        $arrayGasType = $this->getAllgasTypeBD();

        if(!empty($arrayGasType)){

            $result = $this->Mapear($arrayGasType);

            if(is_array($result)){

                $this->listGasType = $result;

            }else{

                $arrayResult[0] = $result;
                $this->listGasType = $arrayResult;

            }
        }

        return $this->listGasType;
    }


    public function addGasType(GasType $gasType){

    $query = " INSERT INTO " . $this->nameTable . " (name)  value  (:name) ";

    $parameters['name'] = $gasType->getName();

    try {

      $result = $this->connection->ExecuteNonQuery($query,$parameters);


    } catch (Exception $ex) {
        throw $ex;
    }

     return $result;

    }
    
    public function deleteGasType($id_gasType){

        $query = " DELETE FROM " . $this->nameTable . " where id_gasType = (:id_gasType) ";

        $parameters['id_gasType'] = $id_gasType;

        try {

           $result = $this->connection->ExecuteNonQuery($query,$parameters);


        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;

    }

    public  function GetGasTypeForId($id_gasType){
        
        $query = " SELECT * FROM " . $this->nameTable .  " where id_gasType = (:id_gasType) " ;

        $parameters['id_gasType'] = $id_gasType;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $category = null;

        if(!empty($result)){

           $gasType = $this->Mapear($result);
        }
       
        return $gasType;

    }


}

?>