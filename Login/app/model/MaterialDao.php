<?php
namespace model;
require_once('model\Material.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

  class MaterialDao {
     public function getAllMaterial(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        // var_dump($conn);
        $statement = $conn->prepare("SELECT * FROM material ORDER BY materialID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
         $data = $statement->fetchAll();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        return $data;  // vagy return = $statement->fetchAll();

     }
     public function save(){
      $materialName= $_POST['material']['materialName'];
   
      $material= new Material($materialName);
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      try {
      //:lastName :firstName stb. - paraméter indexek
      $sql = "INSERT INTO material(`materialName`) VALUES (:materialName);";
      $statement = $conn->prepare($sql);
      //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
      $statement->execute([
          ':materialName'=>$material->getMaterialName(),
      ]);
    } catch (\Throwable $th) {
      echo "Hiba történt!";
    }
  }
    public function getMaterialById(int $materialID) {
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      $statement = $conn->prepare("SELECT * FROM material WHERE materialID = :materialID;");
      $statement -> setFetchMode(\PDO::FETCH_OBJ);
      $statement->execute([
         ':materialID'=>$materialID,
      ]);
      return $statement->fetch();
    }

    public function delete(int $materialID){
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      $sql = "DELETE FROM material WHERE materialID =:materialID;";
      $statement = $conn->prepare($sql);
      $statement->execute([
          ':materialID'=>$materialID,
      ]);
  }

  public function update(int $materialID){
    $materialName= $_POST['material']['materialName'];
    $material = new Material($materialName);
    $dbObj = new Db();
    $conn = $dbObj->getConnection();
    $sql = "UPDATE material SET `materialName` =:materialName WHERE `materialID` =:materialID;";
    $statement = $conn->prepare($sql);
    $statement->execute([
        ':materialName'=>$materialName,
        'materialID'=>$materialID,
        
    ]);
}
  }

?>