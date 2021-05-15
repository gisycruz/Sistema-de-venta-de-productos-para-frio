<?php

namespace Controllers;

use DAO\PowerDAO as PowerDAO;
use Models\Power as Power;
use Controllers\Functions;
use PDOException;

class PowerController{

    private $PowerDao;

    public function __construct(){

        $this->PowerDao = PowerDAO::GetInstance();
    }

    public function showAddPower($id_Power = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listPower =  $this->PowerDao->getAllPower();
        
        if($id_Power != null)
        $Power = PowerDAO::MapearPower($id_Power);

        require_once(VIEWS_PATH."add-Power.php");
    }

public function ShowModify($id_Power){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddPower($id_Power,"Modificar");

    
}
    public function addPower($description){

        require_once(VIEWS_PATH."validate-session.php");

            $Power = new Power();

            $Power->setDescription($description);
    

            try {

                $result = $this->PowerDao->addPower($Power);
               
                if($result == 1)

                $this->showAddPower($id_Power = null,"Tipo de Potencia agregada");
                else
                $this->showAddPower($id_Power = null,"ERROR..AL AGREGAR EL TIPO DE POTENCIA");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddPower($id_Power = null,"ya existe un TIPO DE POTENCIA con ese NOMBRE");
            }

            
    }

    public function RemoverPower($id_Power)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->PowerDao->DeletePower($id_Power);
            
            if($result == 1){

            $this->showAddPower($id_Power = null,"Tipo de POTENCIA eliminada");
              
        }else{

            $this->showAddPower($id_Power = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddPower($id_Power = null,"Hay datos asociados No se pobra borrar el tipo de Potencia");
               

            }
        }

    }

    public function ModifyPower($id_Power ,$description){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->PowerDao->ModifyPower($id_Power,$description);
       
        if($result == 1)
        $this->showAddPower($id_Power = null,"Tipo de Potencia Editada");
        else
        $this->showAddPower($id_Power = null,"ERROR..Al MODIFICAR EL TIPO DE POTENCIA");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddPower($id_Power = null,"ya existe un tipo de POTENCIA con ese nombre");
    }

    }

}

?>