<?php

namespace Controllers;

use DAO\GasTypeDAO as GasTypeDAO;
use Models\GasType as GasType;
use Controllers\Functions;
use PDOException;

class GasTypeController{

    private $GasTypeDao;

    public function __construct(){

        $this->GasTypeDao = GasTypeDAO::GetInstance();
    }

    public function showAddGasType($id_GasType = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listGasType =  $this->GasTypeDao->getAllGasType();
        
        if($id_GasType != null)
        $GasType = GasTypeDAO::MapearGasType($id_GasType);

        require_once(VIEWS_PATH."add-GasType.php");
    }

public function ShowModify($id_GasType){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddGasType($id_GasType,"Modificar");

    
}
    public function addGasType($name){

        require_once(VIEWS_PATH."validate-session.php");

            $GasType = new GasType();

            $GasType->setName($name);
    

            try {

                $result = $this->GasTypeDao->addGasType($GasType);
               
                if($result == 1)

                $this->showAddGasType($id_GasType = null,"Tipo de Gas agregado");
                else
                $this->showAddGasType($id_GasType = null,"ERROR..AL AGREGAR EL TIPO DE GAS");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddGasType($id_GasType = null,"ya existe un TIPO DE GAS con ese NOMBRE");
            }

            
    }

    public function RemoverGasType($id_GasType)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->GasTypeDao->DeleteGasType($id_GasType);
            
            if($result == 1){

            $this->showAddGasType($id_GasType = null,"Tipo de gas eliminado");
              
        }else{

            $this->showAddGasType($id_GasType = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddGasType($id_GasType = null,"Hay datos asociados No se pobra borrar el tipo de gas");
               

            }
        }

    }

    public function ModifyGasType($id_GasType ,$name){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->GasTypeDao->ModifyGasType($id_GasType,$name);
       
        if($result == 1)
        $this->showAddGasType($id_GasType = null,"Tipo de Gas Editado");
        else
        $this->showAddGasType($id_GasType = null,"ERROR..Al MODIFICAR EL TIPO DE GAS");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddGasType($id_GasType = null,"ya existe un tipo de gas con ese nombre");
    }

    }

}

?>