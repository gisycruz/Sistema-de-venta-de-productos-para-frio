<?php 
namespace DAO;

use Models\User as User;
use DAO\Connection as Connection;
use DAO\Iuser as Iuser;

class UserDAO implements Iuser{

    private $connection;
    private $nameTable ;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "user";
    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new UserDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $user = new User();
            $user->setId_User($p["id_user"]);
            $user->setDni($p['dni']);
            $user->setName($p['name']);
            $user->setLastName($p['lastName']);
            $user->setPhone($p['phone']);
            $user->setEmail($p['email']);
            $user->setAddress($p['address']);
            $user->setPassword($p['password']);

            return $user;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
       
    }

    public function getUser($email){

        $query =" SELECT * FROM " . $this->nameTable . " where email =(:email)";
        $parameters['email'] = $email;

        try {

            $result = $this->connection->Execute($query, $parameters);
            
        } catch (Exception $ex) {
            throw $ex;
        }
          $user = null;

        if (!empty($result)){

            return $this->Mapear($result);
        }
        else
            return $user;
    }  
    

    
}

?>