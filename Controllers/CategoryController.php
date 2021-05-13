<?php

namespace Controllers;

use DAO\CategoryDAO as CategoryDAO;
use Models\Category as Category;
use Controllers\Functions;
use PDOException;

class CategoryController{

    private $categoryDao;

    public function __construct(){

        $this->categoryDao = CategoryDAO::GetInstance();
    }

    public function showAddCategory($id_category = null,$message = ""){

        require_once(VIEWS_PATH."validate-session.php");

        $listCategory =  $this->categoryDao->getAllcategory();
        
        if($id_category != null)
        $category = CategoryDAO::MapearCategory($id_category);

        require_once(VIEWS_PATH."add-category.php");
    }

public function ShowModify($id_category){

    require_once(VIEWS_PATH."validate-session.php");

    $this->showAddCategory($id_category,"Modificar");

    
}
    public function addCategory($name){

        require_once(VIEWS_PATH."validate-session.php");

            $category = new Category();

            $category->setName($name);
    

            try {

                $result = $this->categoryDao->addCategory($category);
               
                if($result == 1)

                $this->showAddCategory($id_category = null,"Categoria agregada");
                else
                $this->showAddCategory($id_category = null,"ERROR..AL AGREGAR LA CATEGORIA");

            
                
            }catch (PDOException $ex){

                if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))
                 $this->showAddCategory($id_category = null,"ya existe una categoria con ese nombre");
            }

            
    }

    public function RemoveCategory($id_category)
        {
            require_once(VIEWS_PATH."validate-session.php");

            try{

            $result = $this->categoryDao->DeleteCategory($id_category);
            
            if($result == 1){

            $this->showAddCategory($id_category = null,"Categoria eliminada");
              
        }else{

            $this->showAddCategory($id_category = null,"ERROR: System error, reintente");
            
           }
           
        } catch(PDOException $ex){

            $message = $ex->getMessage();

            if(Functions::contains_substr($message, "Result consisted of more than one row")) {

               
                $this->showAddCategory($id_category = null,"Hay datos asociados No se pobra borrar la categoria");
               

            }
        }

    }

    public function ModifyCategory($id_category ,$name){

        require_once(VIEWS_PATH."validate-session.php");

        try{

        $result = $this->categoryDao->ModifyCategory($id_category,$name);
        echo $result;
        if($result == 1)
        $this->showAddCategory($id_category = null,"Categoria Editada");
        else
        $this->showAddCategory($id_category = null,"ERROR..AL AGREGAR LA CATEGORIA");

    } catch (PDOException $ex){

        if(Functions::contains_substr($ex->getMessage(),"Duplicate entry"))

         $this->showAddCategory($id_category = null,"ya existe una categoria con ese nombre");
    }

    }

}

?>