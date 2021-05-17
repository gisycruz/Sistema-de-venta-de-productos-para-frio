<?php 
 namespace DAO;

 use Models\Provider as Provider;
use DAO\Connection as Connection;
use DAO\IProvider as IProvider;

 class ProviderDAO implements IProvider{
    
    private $connection;
    private $nameTabla;
    private $listProvider;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "Provider";
        $this->listProvider = [];

    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new ProviderDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $Provider = new Provider();

            $Provider->setIdProvider($p["id_provider"]);
            $Provider->setDni($p['dni']);
            $Provider->setName($p['name']);
            $Provider->setLastName($p['lastName']);
            $Provider->setPhone($p['phone']);
            $Provider->setEmail($p['email']);
            $Provider->setAddress($p['address']);
            $Provider->setWed($p['wed']);

            return $Provider;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];


    }
    public static function MapearProvider($id_Provider) {

       $ProviderDAO = ProviderDAO::GetInstance();

       return $ProviderDAO->GetProviderForId($id_Provider);
    }

    public function getAllProviderDb(){
           
        $query = " SELECT * FROM " . $this->nameTable ;

        try {

          $result = $this->connection->Execute($query);

            
        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function getAllProvider() {

        $this->listProvider =[];

        $ProviderArray = $this->getAllProviderDb();
        if(!empty($ProviderArray)) {
            
            $result = $this->Mapear($ProviderArray);
            if(is_array($result)) {
            $this->listProvider = $result;
            }
            else {
                $arrayResult[0] = $result;
                $this->listProvider = $arrayResult;
            }
            
        }
    
        return $this->listProvider;
    }
    public function addProvider(Provider $Provider){

          $query = " INSERT INTO " . $this->nameTable . " (dni,name,lastname , address , phone , email , wed )  VALUE (:dni , :name , :lastName , :address , :phone , :email , :wed)";
          
          $parameters['dni'] = $Provider->getDni();
          $parameters["name"] = $Provider->getName();
          $parameters['lastName'] = $Provider->getLastName();
          $parameters['address'] = $Provider->getAddress();
          $parameters['phone'] = $Provider->getPhone();
          $parameters['email'] = $Provider->getEmail();
          $parameters['wed'] = $Provider->getWed();
         

          try {

            $result = $this->connection->ExecuteNonQuery($query,$parameters);
              
          } catch (Exception $ex) {
              throw $ex;
          }

          return $result;
    }
    public function DeleteProvider($id_Provider){

        $query =" CALL deleteProvider(?) ";

        $parameters['id_Provider'] = $id_Provider;

        try {
            
           $result =  $this->connection->ExecuteNonQuery($query ,$parameters,QueryType::StoredProcedure);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function ModifyProvider($id_Provider,$dni,$name,$lastName , $address , $phone , $email , $wed) {

        $query = " UPDATE " . $this->nameTable . " SET  dni = (:dni) , name = (:name) , lastName = (:lastName) , address = (:address) , phone = (:phone) , email = (:email) , wed = (:wed)  WHERE  id_Provider = (:id_Provider) ";
      
        $parameters['dni'] = $dni;
        $parameters["name"] = $name;
        $parameters['lastName'] = $lastName;
        $parameters['address'] = $address;
        $parameters['phone'] = $phone;
        $parameters['email'] = $email;
        $parameters['wed'] = $wed;
        $parameters["id_Provider"] =$id_Provider;
        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }
    public  function GetProviderForId($id_Provider){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_Provider = (:id_Provider) ";

        $parameters['id_Provider'] = $id_Provider;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $Provider = null;

        if(!empty($result)){

           $Provider = $this->Mapear($result);
        }
       
        return $Provider;

    }



}

?>