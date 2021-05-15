<?php

namespace Controllers;

use DAO\BrandDAO as BrandDAO;
use Models\Brand as Brand;
use Controllers\Functions;
use PDOException;

class BrandController{

    private $brandDao;

    public function __construct(){

        $this->brandDao = BrandDAO::GetInstance();
    }

    public function showAddBrand($id_brand = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listBrand =  $this->brandDao->getAllbrand();
        
        if($id_brand != null)
        $brand = BrandDAO::MapearBrand($id_brand);

        require_once(VIEWS_PATH."add-Brand.php");
    }

public function ShowModify($id_brand){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddBrand($id_brand,"Modificar");

    
}
    public function addBrand($name){

        require_once(VIEWS_PATH."validate-session.php");

            $Brand = new Brand();

            $Brand->setName($name);
    

            try {

                $result = $this->brandDao->addBrand($Brand);
               
                if($result == 1)

                $this->showAddBrand($id_brand = null,"Marca agregada");
                else
                $this->showAddBrand($id_brand = null,"ERROR..AL AGREGAR LA MARCA");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddBrand($id_brand = null,"ya existe una marca con ese nombre");
            }

            
    }

    public function RemoveBrand($id_brand)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->brandDao->DeleteBrand($id_brand);
            
            if($result == 1){

            $this->showAddBrand($id_brand = null,"Marca eliminada");
              
        }else{

            $this->showAddBrand($id_brand = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddBrand($id_brand = null,"Hay datos asociados No se pobra borrar la Marca");
               

            }
        }

    }

    public function ModifyBrand($id_brand ,$name){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->brandDao->ModifyBrand($id_brand,$name);
       
        if($result == 1)
        $this->showAddBrand($id_brand = null,"Marca Editada");
        else
        $this->showAddBrand($id_brand = null,"ERROR..AL AGREGAR LA MARCA");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddBrand($id_brand = null,"ya existe una marca con ese nombre");
    }

    }

}

?>