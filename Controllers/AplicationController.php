<?php

namespace Controllers;

use DAO\AplicationDAO as AplicationDAO;
use Models\Aplication as Aplication;
use Controllers\Functions;
use PDOException;

class AplicationController{

    private $AplicationDao;

    public function __construct(){

        $this->AplicationDao = AplicationDAO::GetInstance();
    }

    public function showAddAplication($id_Aplication = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listAplication =  $this->AplicationDao->getAllAplication();
        
        if($id_Aplication != null)
        $Aplication = AplicationDAO::MapearAplication($id_Aplication);

        require_once(VIEWS_PATH."add-Aplication.php");
    }

public function ShowModify($id_Aplication){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddAplication($id_Aplication,"Modificar");

    
}
    public function addAplication($name){

        require_once(VIEWS_PATH."validate-session.php");

            $Aplication = new Aplication();

            $Aplication->setName($name);
    

            try {

                $result = $this->AplicationDao->addAplication($Aplication);
               
                if($result == 1)

                $this->showAddAplication($id_Aplication = null,"Tipo de Aplicacion agregada");
                else
                $this->showAddAplication($id_Aplication = null,"ERROR..AL AGREGAR un tipo de aplicacion");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddAplication($id_Aplication = null,"ya existe un tipo de aplicacion con ese NOMBRE");
            }

            
    }

    public function RemoverAplication($id_Aplication)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->AplicationDao->DeleteAplication($id_Aplication);
            
            if($result == 1){

            $this->showAddAplication($id_Aplication = null,"Tipo DE Aplicacion eliminada");
              
        }else{

            $this->showAddAplication($id_Aplication = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddAplication($id_Aplication = null,"Hay datos asociados No se pobra borrar el tipo de aplicacion");
               

            }
        }

    }

    public function ModifyAplication($id_Aplication ,$name){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->AplicationDao->ModifyAplication($id_Aplication,$name);
       
        if($result == 1)
        $this->showAddAplication($id_Aplication = null,"Tipo de Aplicacion Editada");
        else
        $this->showAddAplication($id_Aplication = null,"ERROR..Al MODIFICAR EL TIPO DE APLICACION");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddGasType($id_GasType = null,"ya existe un tipo de APLICACION con ese nombre");
    }

    }

}

?>