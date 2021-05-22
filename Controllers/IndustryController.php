<?php

namespace Controllers;

use DAO\IndustryDAO as IndustryDAO;
use Models\Industry as Industry;
use Controllers\Functions;
use PDOException;

class IndustryController{

    private $IndustryDao;

    public function __construct(){

        $this->IndustryDao = IndustryDAO::GetInstance();
    }

    public function showAddIndustry($id_Industry = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listIndustry =  $this->IndustryDao->getAllIndustry();
        
        if($id_Industry != null)
        $Industry = IndustryDAO::MapearIndustry($id_Industry);

        require_once(VIEWS_PATH."add-Industry.php");
    }

public function ShowModify($id_Industry){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddIndustry($id_Industry,"Modificar");

    
}
    public function addIndustry($name){

        require_once(VIEWS_PATH."validate-session.php");

            $Industry = new Industry();

            $Industry->setName($name);
    

            try {

                $result = $this->IndustryDao->addIndustry($Industry);
               
                if($result == 1)

                $this->showAddIndustry($id_Industry = null,"Tipo de Industria Agregada");
                else
                $this->showAddIndustry($id_Industry = null,"ERROR..AL AGREGAR un TIPO DE INDUSTRIA");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddIndustry($id_Industry = null,"ya existe un TIPO DE INDUSTRIA con ese NOMBRE");
            }

            
    }

    public function RemoverIndustry($id_Industry)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->IndustryDao->DeleteIndustry($id_Industry);
            
            if($result == 1){

            $this->showAddIndustry($id_Industry = null,"Tipo de Industria eliminada");
              
        }else{

            $this->showAddIndustry($id_Industry = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddIndustry($id_Industry = null,"Hay datos asociados No se pobra borrar el TIPO DE INDUSTRIA");
               

            }
        }

    }

    public function ModifyIndustry($id_Industry ,$name){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->IndustryDao->ModifyIndustry($id_Industry,$name);
       
        if($result == 1)
        $this->showAddIndustry($id_Industry = null,"Tipo de Industria Editada");
        else
        $this->showAddIndustry($id_Industry = null,"ERROR..Al MODIFICAR EL TIPO DE INDUSTRIA");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddGasType($id_GasType = null,"ya existe un TIPO DE INDUSTRIA con ese NOMBRE");
    }

    }

}

?>