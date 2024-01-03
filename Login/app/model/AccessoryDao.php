<?php
namespace model;
require_once('model\Accessory.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

  class AccessoryDao {
   
     public function getAllAccessory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        // var_dump($conn);
        $statement = $conn->prepare("SELECT * FROM accessory ORDER BY accessoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
         $data = $statement->fetchAll();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        return $data;  // vagy return = $statement->fetchAll();

     }
     
     
     public function save(){
      $accessoryName = $_POST['accessoryName'];
      $materialID = $_POST['materialID'];
      
      $accessory = new Accessory($accessoryName, $materialID);
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      //:lastName :firstName stb. - paraméter indexek
      $sql = "INSERT INTO accessory(`accessoryName`, `materialID`) VALUES (:accessoryName,  :materialID);";
      $statement = $conn->prepare($sql);
      //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
      $statement->execute([
          ':accessoryName'=>$accessoryName,
          ':materialID'=>$materialID,
      ]);
  }

  public function getAccessoryById(int $accessoryID) {
   $dbObj = new Db();
   $conn = $dbObj->getConnection();
   $statement = $conn->prepare("SELECT * FROM accessory WHERE accessoryID = :accessoryID;");
   $statement -> setFetchMode(\PDO::FETCH_OBJ);
   $statement->execute([
      ':accessoryID'=>$accessoryID,
   ]);
   return $statement->fetch();
 }

 public function delete(int $accessoryID){
   $dbObj = new Db();
   $conn = $dbObj->getConnection();
   $sql = "DELETE FROM accessory WHERE accessoryID  =:accessoryID;";
   $statement = $conn->prepare($sql);
   $statement->execute([
       ':accessoryID'=>$accessoryID,
   ]);
}
public function update(int $accessoryID){
   $accessoryName= $_POST['accessoryName'];
  
   $accessory = new Accessory($accessoryName, 1);
   $dbObj = new Db();
   $conn = $dbObj->getConnection();
   $sql = "UPDATE accessory SET `accessoryName` =:accessoryName WHERE `accessoryID` =:accessoryID;";
   $statement = $conn->prepare($sql);
   $statement->execute([
       ':accessoryName'=>$accessoryName,
       
       ':accessoryID'=>$accessoryID,
       
   ]);
}




  }

?>