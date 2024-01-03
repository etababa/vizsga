<?php
namespace model;
require_once('model\TerracefloorCategory.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

class TerracefloorCategoryDao {

    public function getAllTerracefloorCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM terracefloor_category  ORDER BY terracefloorCategoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save(){
        $terracefloorCategoryName = $_POST['terracefloorCategoryName'];

        $terracefloorCategory = new TerracefloorCategory($terracefloorCategoryName);

        $dbObj = new Db();

        $conn = $dbObj->getConnection();
        
         $sql = "INSERT INTO terracefloor_category(`terracefloorCategoryName`) VALUES (:terracefloorCategoryName);";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':terracefloorCategoryName'=>$terracefloorCategoryName,
            ]);
        
    }


    public function getTerracefloorCategoryById(int $terracefloorCategoryID) {
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM terracefloor_category WHERE terracefloorCategoryID = :terracefloorCategoryID;");
        $statement -> setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
           ':terracefloorCategoryID'=>$terracefloorCategoryID,
        ]);
        return $statement->fetch();
      }
     
      public function delete(int $terracefloorCategoryID){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "DELETE FROM terracefloor_category WHERE terracefloorCategoryID  =:terracefloorCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':terracefloorCategoryID'=>$terracefloorCategoryID,
        ]);
     }
    
    

     public function update(int $terracefloorCategoryID){
        $terracefloorCategoryName= $_POST['terracefloorCategoryName'];
       
        $terracefloorCategory = new TerracefloorCategory($terracefloorCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE terracefloor_category SET `terracefloorCategoryName` =:terracefloorCategoryName WHERE `terracefloorCategoryID` =:terracefloorCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':terracefloorCategoryName'=>$terracefloorCategoryName,
            
            ':terracefloorCategoryID'=>$terracefloorCategoryID,
            
        ]);
      }
}
?>