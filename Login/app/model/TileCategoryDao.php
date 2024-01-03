<?php
namespace model;
require_once('model\TileCategory.php');
use _utils\Database as Db;

class TileCategoryDao {

    public function getAllTileCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM tile_category ORDER BY tileCategoryID");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save(){
        $tileCategoryName = $_POST['tileCategory']['tileCategoryName'];
        $tileCategoryObj = new TileCategory($tileCategoryName);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        
        try {
            $sql = "INSERT INTO tile_category(`tileCategoryName`) VALUES (:tileCategoryName);";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':tileCategoryName'=>$tileCategoryObj->getTileCategoryName(),
            ]);
        } catch (\Throwable $th) {
            echo "Hiba történt!!!";
            //logolható, naplózhat
        }
    }

    public function getTileCategoryById(int $tileCategoryID) {
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM tile_category WHERE tileCategoryID = :tileCategoryID;");
        $statement -> setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
           ':tileCategoryID'=>$tileCategoryID,
        ]);
        return $statement->fetch();
      }
     
      public function delete(int $tileCategoryID){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "DELETE FROM tile_category WHERE tileCategoryID  =:tileCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':tileCategoryID'=>$tileCategoryID,
        ]);
     }

     public function update(int $tileCategoryID){
        $tileCategoryName = $_POST['tileCategory']['tileCategoryName'];
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE tile_category SET `tileCategoryName` =:tileCategoryName WHERE `tileCategoryID` =:tileCategoryID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':tileCategoryName'=>$tileCategoryName,
            ':tileCategoryID'=>$tileCategoryID,
            
        ]);
      
     }
}
?>