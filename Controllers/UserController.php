<?php 
namespace Controllers;

use Models\User as User;
use DAO\UserDAO as UserDAO;

class UserController{

    private $userDao;

    public function __construct(){

        $this->userDao = UserDAO::GetInstance();
    }

    public function HomeBelcome($message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        require_once(VIEWS_PATH."homeBelcome.php");
    }

    public function listProduct($message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        require_once(VIEWS_PATH."list-product.php");
    }

    public function validateUser($email,$password){

        $user = $this->userDao->getUser($email);

        if($user != null){
            
              if($user->getPassword() === $password){

                $_SESSION['login'] = $user;

                $this->HomeBelcome("Vienvenido");

              }else
              $this->Home("ingreso la contraseña incorrecto");  

        }else
            $this->Home("ingreso el usurio incorrecto");  
        
    }

    public function logout($message = ""){

        session_destroy();

        $this->Home("seccion cerrada");
    }
}

?>