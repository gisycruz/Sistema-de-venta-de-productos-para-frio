<?php 
 namespace DAO;

 use Models\Category as Category;
use DAO\Connection as Connection;
use DAO\Icategory as Icategory;

 class CategoryDAO implements Icategory{
    
    private $connection;
    private $nameTabla;
    private $listCategory;
    private static $instance = null;

    public function __construct(){

        $this->connection = Connection::GetInstance();
        $this->nameTable = "category";
        $this->listCategory = [];

    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new CategoryDAO();

        return self::$instance;
    }

    protected function Mapear($value){

        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){

            $category = new Category();
            $category->setId_category($p["id_category"]);
            $category->setName($p['name']);
            

            return $category;
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];


    }
    public static function MapearCategory($id_category) {

       $categoryDAO = CategoryDAO::GetInstance();

       return $categoryDAO->GetCategoryForId($id_category);
    }

    public function getAllcategoryDb(){
           
        $query = " SELECT * FROM " . $this->nameTable ;

        try {

          $result = $this->connection->Execute($query);

            
        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function getAllCategory() {

        $this->listCategory =[];

        $categoryArray = $this->getAllcategoryDb();
        if(!empty($categoryArray)) {
            
            $result = $this->Mapear($categoryArray);
            if(is_array($result)) {
            $this->listCategory = $result;
            }
            else {
                $arrayResult[0] = $result;
                $this->listCategory = $arrayResult;
            }
            
        }
    
        return $this->listCategory;
    }
    public function addCategory(Category $category){

          $query = " INSERT INTO " . $this->nameTable . " (name)  VALUE (:name)";
          
          $parameters['name'] = $category->getName();


          try {

            $result = $this->connection->ExecuteNonQuery($query,$parameters);
              
          } catch (Exception $ex) {
              throw $ex;
          }

          return $result;
    }
    public function DeleteCategory($id_category){

        $query =" CALL deleteCategory(?) ";

        $parameters['id_category'] = $id_category;

        try {
            
           $result =  $this->connection->ExecuteNonQuery($query ,$parameters,QueryType::StoredProcedure);

        } catch (Exception $ex) {
            throw $ex;
        }

        return $result;
    }

    public function ModifyCategory($id_category,$name) {

        $query = " UPDATE " . $this->nameTable . " SET name = (:name)  WHERE  id_category = (:id_category) ";
      
        $parameters["name"] = $name;
        $parameters["id_category"] =$id_category;
        try {
          
        $result = $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $result;

    }
    public  function GetCategoryForId($id_category){
        
        $query = " SELECT * FROM " . $this->nameTable . " where id_category = (:id_category) ";

        $parameters['id_category'] = $id_category;

        try {
            
           $result = $this->connection->Execute($query, $parameters);
          
        } catch (Exception $ex) {
            throw $ex;
        }

        $category = null;

        if(!empty($result)){

           $category = $this->Mapear($result);
        }
       
        return $category;

    }



}

?>