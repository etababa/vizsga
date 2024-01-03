<?php
namespace model;
require_once('model\ShingleCategory.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

  class ShingleCategoryDao {
     public function getAllShingleCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        // var_dump($conn);
        $statement = $conn->prepare("SELECT * FROM shingle_category ORDER BY shingleCategoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
         $data = $statement->fetchAll();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        return $data;  // vagy return = $statement->fetchAll();
     }

     public function save(){
        $shingleCategoryName= $_POST['shingleCategory']['shingleCategoryName'];
     
        $shingleCategory= new ShingleCategory($shingleCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();

          try {
        $sql = "INSERT INTO shingle_category(`shingleCategoryName`) VALUES (:shingleCategoryName);";
        $statement = $conn->prepare($sql);
        //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
        $statement->execute([
            ':shingleCategoryName'=>$shingleCategory->getShingleCategoryName(),
        ]);
     } catch (\Throwable $th) {
            echo "Hiba történt!";
        }
    }

    
  public function getShingleCategoryById(int $shingleCategoryID) {
    $dbObj = new Db();
    $conn = $dbObj->getConnection();
    $statement = $conn->prepare("SELECT * FROM shingle_category WHERE shingleCategoryID = :shingleCategoryID;");
    $statement -> setFetchMode(\PDO::FETCH_OBJ);
    $statement->execute([
       ':shingleCategoryID'=>$shingleCategoryID,
    ]);
    return $statement->fetch();
  }
 
  public function delete(int $shingleCategoryID){
    $dbObj = new Db();
    $conn = $dbObj->getConnection();
    $sql = "DELETE FROM shingle_category WHERE shingleCategoryID  =:shingleCategoryID;";
    $statement = $conn->prepare($sql);
    $statement->execute([
        ':shingleCategoryID'=>$shingleCategoryID,
    ]);
 }

 public function update(int $shingleCategoryID){
  $shingleCategoryName= $_POST['shingleCategoryName'];
 
  $shingleCategory = new ShingleCategory($shingleCategoryName);
  $dbObj = new Db();
  $conn = $dbObj->getConnection();
  $sql = "UPDATE shingle_category SET `shingleCategoryName` =:shingleCategoryName WHERE `shingleCategoryID` =:shingleCategoryID;";
  $statement = $conn->prepare($sql);
  $statement->execute([
      ':shingleCategoryName'=>$shingleCategoryName,
      
      ':shingleCategoryID'=>$shingleCategoryID,
      
  ]);
}
    }


  

?>