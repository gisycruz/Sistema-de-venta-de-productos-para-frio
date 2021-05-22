<?php 
 namespace DAO;

 use Models\Industry as Industry;
use DAO\Connection as Connection;
use DAO\Iindustry as Iindustry;
use FFI\Exception;

 class IndustryDAO implements Iindustry{
    
    private $connection;
    private $nameTabla;
    private $listIndustry;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "Industry";
        $this->listIndustry = [];

    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new IndustryDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $Industry = new Industry();
            $Industry->setId_industry($p["id_industry"]);
            $Industry->setName($p['name']);
            

            return $Industry;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];


    }
    public static function MapearIndustry($id_Industry) {

       $IndustryDAO = IndustryDAO::GetInstance();

       return $IndustryDAO->GetIndustryForId($id_Industry);
    }

    public function getAllIndustryDb(){
           
        $query = " SELECT * FROM " . $this->nameTable ;

        try {

          $result = $this->connection->Execute($query);

            
        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function getAllIndustry() {

        $this->listIndustry =[];

        $IndustryArray = $this->getAllIndustryDb();
        if(!empty($IndustryArray)) {
            
            $result = $this->Mapear($IndustryArray);
            if(is_array($result)) {
            $this->listIndustry = $result;
            }
            else {
                $arrayResult[0] = $result;
                $this->listIndustry = $arrayResult;
            }
            
        }
    
        return $this->listIndustry;
    }
    public function addIndustry(Industry $Industry){

          $query = " INSERT INTO " . $this->nameTable . " (name)  VALUE (:name)";
          
          $parameters['name'] = $Industry->getName();


          try {

            $result = $this->connection->ExecuteNonQuery($query,$parameters);
              
          } catch (Exception $ex) {
              throw $ex;
          }

          return $result;
    }
    public function DeleteIndustry($id_Industry){
       
        $query =" CALL deleteIndustry(?) ";

        $parameters['id_Industry'] = $id_Industry;

        try {
            
           $result =  $this->connection->ExecuteNonQuery($query ,$parameters,QueryType::StoredProcedure);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function ModifyIndustry($id_Industry,$name) {

        $query = " UPDATE " . $this->nameTable . " SET name = (:name)  WHERE  id_Industry = (:id_Industry) ";
      
        $parameters["name"] = $name;
        $parameters["id_Industry"] =$id_Industry;
        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }
    public  function GetIndustryForId($id_Industry){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_Industry = (:id_Industry) ";

        $parameters['id_Industry'] = $id_Industry;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $Industry = null;

        if(!empty($result)){

           $Industry = $this->Mapear($result);
        }
       
        return $Industry;

    }



}

?>