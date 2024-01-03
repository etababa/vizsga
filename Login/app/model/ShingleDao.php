<?php
namespace model;
require_once('model\Shingle.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

  class ShingleDao {
     public function getAllShingle(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        // var_dump($conn);
        $statement = $conn->prepare("SELECT s.shingleID, s.shingleType, s.shingleColor, s.shingleManufacturer, sc.shingleCategoryID, m.materialID FROM shingle as s  INNER JOIN shingle_category as sc ON s.shingleCategoryID = sc.shingleCategoryID INNER JOIN material as m ON s.materialID = m.materialID ORDER BY shingleID ASC");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
         $data = $statement->fetchAll();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        return $data;  // vagy return = $statement->fetchAll();

     }

     public function save(){
      $shingleType = $_POST['shingle']['shingleType'];
      $shingleColor = $_POST['shingle']['shingleColor'];
      $shingleManufacturer = $_POST['shingle']['shingleManufacturer'];
       $shingleCategoryID = $_POST['shingle']['shingleCategoryID'];
      $materialID = 3;
  
      $shingleDaoObj = new Shingle($shingleType, $shingleColor, $shingleManufacturer, $shingleCategoryID ,$materialID );
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      
          //:lastName :firstName stb. - paraméter indexek
      $sql = "INSERT INTO shingle(`shingleType`, `shingleColor`, `shingleManufacturer`, `shingleCategoryID`, `materialID`) VALUES (:shingleType, :shingleColor, :shingleManufacturer, :shingleCategoryID, :materialID);";
      $statement = $conn->prepare($sql);
      //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
      $statement->execute([
          ':shingleType'=>$shingleType,
          ':shingleColor'=>$shingleColor,
          ':shingleManufacturer'=>$shingleManufacturer,
          ':shingleCategoryID'=>$shingleCategoryID,
          ':materialID' => $materialID,
      ]);
  
    
  }

  public function getShingleById(int $shingleID) {
    $dbObj = new Db();
    $conn = $dbObj->getConnection();
    $statement = $conn->prepare("SELECT * FROM shingle WHERE shingleID = :shingleID;");
    $statement -> setFetchMode(\PDO::FETCH_OBJ);
    $statement->execute([
       ':shingleID'=>$shingleID,
    ]);
    return $statement->fetch();
  }
 
  public function delete(int $shingleID){
    $dbObj = new Db();
    $conn = $dbObj->getConnection();
    $sql = "DELETE FROM shingle WHERE shingleID  =:shingleID;";
    $statement = $conn->prepare($sql);
    $statement->execute([
        ':shingleID'=>$shingleID,
    ]);
 }

 public function update(int $shingleID){
  $shingleType = $_POST['shingle']['shingleType'];
  $shingleColor = $_POST['shingle']['shingleColor'];
  $shingleManufacturer = $_POST['shingle']['shingleManufacturer'];
  $shingleCategoryID = $_POST['shingle']['shingleCategoryID'];
  $materialID = 3;
 
  $shingle = new Shingle($shingleType, $shingleColor, $shingleManufacturer, $shingleCategoryID, 3);
  $dbObj = new Db();
  $conn = $dbObj->getConnection();
  $sql = "UPDATE shingle SET `shingleType` =:shingleType, `shingleColor` =:shingleColor, `shingleManufacturer` =:shingleManufacturer, `shingleCategoryID` =:shingleCategoryID, `materialID` =:materialID WHERE `shingleID` =:shingleID;";
  $statement = $conn->prepare($sql);
  $statement->execute([
     ':shingleType'=>$shingleType,
     ':shingleColor'=>$shingleColor,
     ':shingleManufacturer'=>$shingleManufacturer,
     ':shingleCategoryID'=>$shingleCategoryID, 
     ':materialID' =>$materialID,
      ':shingleID'=>$shingleID,
      
  ]);
}

    }
    ?>