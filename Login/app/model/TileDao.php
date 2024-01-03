<?php
namespace model;
require_once('_utils\Database.php');
require_once('model\Tile.php');
use _utils\Database as Db;

    class TileDao {

        public function getAllTile(){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT t.tileID, t.tileType, t.tileColor, t.tileManufacturer, tc.tileCategoryID , m.materialID FROM tile as t INNER JOIN tile_category as tc ON t.tileCategoryID = tc.tileCategoryID INNER JOIN material as m ON t.materialID = m.materialID;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        }

        
        public function save(){
            $tileType = $_POST['tile']['tileType'];
            $tileColor = $_POST['tile']['tileColor'];
            $tileManufacturer = $_POST['tile']['tileManufacturer'];
            $tileCategoryID = $_POST['tile']['tileCategoryID'];
            $materialID = 2;
            $tile = new Tile($tileType, $tileColor, $tileManufacturer, $tileCategoryID, $materialID);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "INSERT INTO tile(`tileType`, `tileColor`, `tileManufacturer`, `tileCategoryID`, `materialID`) VALUES (:tileType, :tileColor, :tileManufacturer, :tileCategoryID, :materialID);";
            $statement = $conn->prepare($sql); 
            $statement->execute([
                ':tileType'=>$tileType,
                ':tileColor'=>$tileColor,
                ':tileManufacturer'=>$tileManufacturer,
                ':tileCategoryID'=>$tileCategoryID,
                ':materialID'=>$materialID,
            ]);
        }

        public function getTileById(int $tileID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "SELECT t.tileID, t.tileType, t.tileColor, t.tileManufacturer,tc.tileCategoryID, m.materialID FROM tile as t INNER JOIN tile_category as tc ON t.tileCategoryID = tc.tileCategoryID INNER JOIN material as m ON t.materialID = m.materialID  WHERE t.tileID = :tileID";
            $statement= $conn->prepare($sql);
            $statement ->setFetchMode(\PDO::FETCH_OBJ);
            $statement ->execute([
                ':tileID'=>$tileID,
            ]);
            return $statement->fetch();
        }

        public function delete(int $tileID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "DELETE FROM tile WHERE tileID =:tileID;";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':tileID'=>$tileID,
            ]);
        }

        public function update(int $tileID) {
            $tileType = $_POST['tile']['tileType'];
            $tileColor = $_POST['tile']['tileColor'];
            $tileManufacturer = $_POST['tile']['tileManufacturer'];
            $tileCategoryID = $_POST['tile']['tileCategoryID'];
            $materialID = 2 ;
            $tile = new Tile($tileType, $tileColor, $tileManufacturer, $tileCategoryID, $materialID);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "UPDATE tile SET `tileType` =:tileType, `tileColor` =:tileColor, `tileManufacturer` =:tileManufacturer, `tileCategoryID`=:tileCategoryID, `materialID` =:materialID WHERE `tileID`=:tileID;";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':tileType'=>$tileType,
                ':tileColor'=>$tileColor,
                ':tileManufacturer'=>$tileManufacturer,
                ':tileCategoryID'=>$tileCategoryID,
                ':materialID'=>$materialID,
                ':tileID'=>$tileID,
            ]);
        }
    }
    ?>