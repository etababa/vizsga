<?php
namespace model;

require_once('model\StructureCategory.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

class StructureCategoryDao {

    public function getAllStructureCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM structure_category ORDER BY structureCategoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save(){
        $structureCategoryName = $_POST['structureCategoryName'];
        $structureCategory = new StructureCategory($structureCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql="INSERT INTO structure_category (`structureCategoryName`) VALUES (:structureCategoryName);";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':structureCategoryName'=>$structureCategoryName,
        ]);

    }

    public function getStructureCategoryById(int $structureCategoryID) {
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM structure_category WHERE structureCategoryID = :structureCategoryID;");
        $statement -> setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
           ':structureCategoryID'=>$structureCategoryID,
        ]);
        return $statement->fetch();
      }
     
      public function delete(int $structureCategoryID){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "DELETE FROM structure_category WHERE structureCategoryID  =:structureCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':structureCategoryID'=>$structureCategoryID,
        ]);
     }

     public function update(int $structureCategoryID){
        $structureCategoryName= $_POST['structureCategoryName'];
       
        $structureCategory = new StructureCategory($structureCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE structure_category SET `structureCategoryName` =:structureCategoryName WHERE `structureCategoryID` =:structureCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':structureCategoryName'=>$structureCategoryName,
            
            ':structureCategoryID'=>$structureCategoryID,
            
        ]);
      }


}
?>