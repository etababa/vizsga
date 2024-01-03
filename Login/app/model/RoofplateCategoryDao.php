<?php
namespace model;

require_once('model\RoofplateCategory.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

class RoofplateCategoryDao {
 public function getAllRoofplateCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM roofplate_category ORDER BY roofplateCategoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save(){
        $roofplateCategoryName = $_POST['roofplateCategoryName'];

        $roofplateCategory = new RoofplateCategory($roofplateCategoryName);

        $dbObj = new Db();

        $conn = $dbObj->getConnection();

            $sql = "INSERT INTO roofplate_category(`roofplateCategoryName`) VALUES (:roofplateCategoryName);";

            $statement = $conn->prepare($sql);

            $statement->execute([
                ':roofplateCategoryName'=>$roofplateCategoryName,
            ]);
       
    }

    public function getRoofplateCategoryById(int $roofplateCategoryID) {
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM roofplate_category WHERE roofplateCategoryID = :roofplateCategoryID;");
        $statement -> setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
           ':roofplateCategoryID'=>$roofplateCategoryID,
        ]);
        return $statement->fetch();
      }
     
      public function delete(int $roofplateCategoryID){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "DELETE FROM roofplate_category WHERE roofplateCategoryID  =:roofplateCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':roofplateCategoryID'=>$roofplateCategoryID,
        ]);
     }

     public function update(int $roofplateCategoryID){
        $roofplateCategoryName= $_POST['roofplateCategoryName'];
       
        // $roofplateCategory = new RoofplateCategory($roofplateCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE roofplate_category SET `roofplateCategoryName` =:roofplateCategoryName WHERE `roofplateCategoryID` =:roofplateCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':roofplateCategoryName'=>$roofplateCategoryName,
            
            ':roofplateCategoryID'=>$roofplateCategoryID,
            
        ]);
      }
}
?>