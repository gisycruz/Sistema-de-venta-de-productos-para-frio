<?php 

namespace DAO;

use DAO\Connection as Connection;
use DAO\Iaplication as Iaplication;
use Models\Aplication as Aplication;
use FFI\Exception;

class AplicationDAO implements Iaplication{

    private $connection ;
    private $listAplication;
    private $nameTable ;
    private static $instance = null;

    public function __construct(){

        $this->nameTable = "aplication";
        $this->listAplication = [];
        $this->connection = Connection::GetInstance();
    }

    public static function GetInstance(){

        if(self::$instance == null)
        self::$instance = new AplicationDAO();

    return self::$instance; 
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $Aplication = new Aplication();
            $Aplication->setId_aplication($p["id_aplication"]);
            $Aplication->setName($p['name']);
            

            return $Aplication;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];

    }

    public static function MapearAplication($id_aplication) {

        $AplicationDAO = AplicationDAO::GetInstance();
 
        return $AplicationDAO->GetAplicationForId($id_aplication);
     }
     

    public function addAplication(Aplication $aplication){

        $query = " INSERT INTO " . $this->nameTable . " (name ) VALUE (:name) ";

        $parameters['name'] = $aplication->getName();

        try {
            
          $result = $this->connection->ExecuteNonQuery($query,$parameters);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

   private function getAllAplicationBD(){

       $query = " SELECT * FROM " .$this->nameTable ;

       try {

           $result = $this->connection->Execute($query);

       } catch (Exception $ex) {
           throw $ex;
       }

       return $result;
        
    }

    public function getAllAplication(){

       $this->listAplication = [];

       $arrayAplication = $this->getAllAplicationBD();

       if(!empty($arrayAplication) ){

        $result = $this->Mapear($arrayAplication);

        if(is_array($result)){

            $this->listAplication = $result;

        }else{
           
                $arrayResult[0] = $result;
                $this->listAplication = $arrayResult;
            
        }
       }

       return $this->listAplication;

    }

    public function deleteAplication($id_aplication){

        $query = " CALL  deleteAplication(?)";

        $parameters['id_aplication'] = $id_aplication;

        try {
             
            $result = $this->connection->ExecuteNonQuery($query,$parameters,QueryType::StoredProcedure);


        } catch (Exception $ex) {

            throw $ex;
        }

        return $result;
    }

    public function ModifyAplication($id_Aplication,$name) {

        $query = " UPDATE " . $this->nameTable . " SET name = (:name)  WHERE  id_Aplication = (:id_Aplication) ";
      
        $parameters["name"] = $name;
        $parameters["id_Aplication"] =$id_Aplication;
        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }

    public  function GetAplicationForId($id_aplication){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_aplication = (:id_aplication) ";

        $parameters['id_aplication'] = $id_aplication;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $aplication = null;

        if(!empty($result)){

           $aplication = $this->Mapear($result);
        }
       
        return $aplication;

    }

}

?>