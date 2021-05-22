<?php

namespace DAO;

use DAO\Connection as Connection;
use Models\Power as Power;
use DAO\Ipower as Ipower;
use FFI\Exception;

class PowerDAO implements Ipower{

    private $nameTable ;
    private $listPower;
    private $connection;
    private static $instance = null;

    public function __construct(){

        $this->nameTable = "power";
        $this->connection = Connection::GetInstance();
        $this->listPower = [];
    }

    public static function GetInstance(){

        if(self::$instance == null)
        self::$instance = new PowerDAO();

    return self::$instance; 
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $Power = new Power();
            $Power->setId_Power($p["id_power"]);
            $Power->setDescription($p['description']);
            

            return $Power;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public static function MapearPower($id_power) {

        $PowerDAO = PowerDAO::GetInstance();
 
        return $PowerDAO->GetPowerForId($id_power);
     }


   public  function addPower(Power $power){

    $query = " INSERT INTO " . $this->nameTable . " (description ) VALUE (:description) ";

    $parameters['description'] = $power->getDescription();

    try {
        
        $result = $this->connection->ExecuteNonQuery($query,$parameters);

    } catch (Exception $ex) {
        throw $ex;
    }

    return $result ;

   }
    public function GetAllPowerBD(){

        $query = " SELECT * FROM " . $this->nameTable ;

        try {

             $result = $this->connection->Execute($query);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;

    }
    public function GetAllPower(){

        $this->listPower = [];

       $arrayPower = $this->GetAllPowerBD();
        
       if(!empty($arrayPower)){

        $result = $this->Mapear($arrayPower);

        if(is_array($result)){

            $this->listPower = $result;

        }else{

            $arrayResult[0] = $result;
            $this->listPower = $arrayResult;
        }
       }

       return $this->listPower;
    }

    function deletePower($id_power){

        $query = " CALL deletePower(?)";

        $parameters['id_power'] = $id_power;

        try {
            
            $result = $this->connection->ExecuteNonQuery($query, $parameters,QueryType::StoredProcedure);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function ModifyPower($id_Power,$description) {

        $query = " UPDATE " . $this->nameTable . " SET description = (:description)  WHERE  id_Power = (:id_Power) ";
      
        $parameters["description"] = $description;
        $parameters["id_Power"] =$id_Power;
        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }

    public  function GetPowerForId($id_power){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_power = (:id_power) ";

        $parameters['id_power'] = $id_power;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $power = null;

        if(!empty($result)){

           $power = $this->Mapear($result);
        }
       
        return $power;

    }
}

?>