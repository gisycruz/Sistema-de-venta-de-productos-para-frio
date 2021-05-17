<?php

namespace Controllers;

use DAO\ProviderDAO as ProviderDAO;
use Models\Provider as Provider;
use Controllers\Functions;
use PDOException;

class ProviderController{

    private $ProviderDao;

    public function __construct(){

        $this->ProviderDao = ProviderDAO::GetInstance();
    }

    public function showAddProvider($id_Provider = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listProvider =  $this->ProviderDao->getAllProvider();
        
        if($id_Provider != null)
        $Provider = ProviderDAO::MapearProvider($id_Provider);

        require_once(VIEWS_PATH."add-Provider.php");
    }

public function ShowModify($id_Provider){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddProvider($id_Provider,"Modificar");

    
}
    public function addProvider($dni,$name,$lastName , $address , $phone , $email , $wed){

        require_once(VIEWS_PATH."validate-session.php");

            $Provider = new Provider();
           
            $Provider->setDni($dni);
            $Provider->setName($name);
            $Provider->setLastName($lastName);
            $Provider->setPhone($phone);
            $Provider->setEmail($email);
            $Provider->setAddress($address);
            $Provider->setWed($wed);
          
            try {

                $result = $this->ProviderDao->addProvider($Provider);
              
                if($result == 1)
                $this->showAddProvider($id_Provider = null,"Provedor agregado");
                else
                $this->showAddProvider($id_Provider = null,"ERROR..AL AGREGAR AL PROVEEDOR");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddProvider($id_Provider = null,"ya existe un Proveedor con ese DNI");
            }

            
    }

    public function RemoverProvider($id_Provider)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->ProviderDao->DeleteProvider($id_Provider);
            
            if($result == 1){

            $this->showAddProvider($id_Provider = null,"Proveedor eliminado");
              
        }else{

            $this->showAddProvider($id_Provider = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddProvider($id_Provider = null,"Hay datos asociados No se pobra borrar el Proveedor");
               

            }
        }

    }

    public function ModifyProvider($id_Provider ,$dni,$name,$lastName , $address , $phone , $email , $wed){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->ProviderDao->ModifyProvider($id_Provider,$dni,$name,$lastName , $address , $phone , $email , $wed);
       
        if($result == 1)
        $this->showAddProvider($id_Provider = null,"Proveedor Editado");
        else
        $this->showAddProvider($id_Provider = null,"ERROR..Al MODIFICAR EL PROVEEDOR");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddProvider($id_Provider = null,"ya existe un tipo DE PROOVEDOR con ese DNI");
    }

    }

}

?>