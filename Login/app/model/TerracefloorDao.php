<?php
namespace model;
require_once('_utils\Database.php');
require_once('model\Terracefloor.php');
use _utils\Database as Db;

    class TerracefloorDao {

        // FONTOS!!! Ha táblaösszekapcsolásnál azonosak az oszlopnevek (pld. id-id), akkor
        // nem biztos, hogy a jó helyről fogja szedni
        // Megoldás: behívatkozzuk a mezőket, majdnem teljes elérési úttal (táblanév.oszlopnév)
        public function getAllTerracefloor(){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT tf.terracefloorID, tf.thickness, tf.width, tf.length, tf.terracefloorColor , tfc.terracefloorCategoryID, m.materialID FROM terracefloor as tf INNER JOIN terracefloor_category as tfc ON tf.terracefloorCategoryID = tfc.terracefloorCategoryID INNER JOIN material as m ON tf.materialID = m.materialID;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        }

        public function save() {
            $terracefloorCategoryID = $_POST['terracefloor']['terracefloorCategoryID'];
            $thickness = $_POST['terracefloor']['thickness'];
            $width = $_POST['terracefloor']['width'];
            $length = $_POST['terracefloor']['length'];
            $terracefloorColor = $_POST['terracefloor']['terracefloorColor'];
            $materialID = 6;
            
            $terracefloor = new Terracefloor ($terracefloorCategoryID, $thickness, $width, $length, $terracefloorColor, $materialID);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "INSERT INTO terracefloor(`terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES (:terracefloorCategoryID, :thickness, :width, :length, :terracefloorColor, :materialID);";

            $statement=$conn->prepare($sql);
            //bindolás!!
            $statement->execute([
                ':terracefloorCategoryID'=>$terracefloorCategoryID,
                ':thickness' => $thickness,
                ':width' => $width,
                ':length' => $length,
                ':terracefloorColor' => $terracefloorColor,
                ':materialID' => $materialID,
            ]);
        }

        public function getTerracefloorById(int $terracefloorID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT t.terracefloorID, tc.terracefloorCategoryID, t.thickness, t.width, t.length, t.terracefloorColor, m.materialID FROM terracefloor as t INNER JOIN terracefloor_category as tc ON t.terracefloorCategoryID = tc.terracefloorCategoryID INNER JOIN material as m ON t.materialID = m.materialID WHERE t.terracefloorID = :terracefloorID");
            $statement -> setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute([
                ':terracefloorID'=>$terracefloorID,
            ]);
            return $statement->fetch();
        }

        public function delete(int $terracefloorID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "DELETE FROM terracefloor WHERE terracefloorID = :terracefloorID;";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':terracefloorID' =>$terracefloorID,
            ]);
        }

        public function update(int $terracefloorID){
         $terracefloorCategoryID = $_POST['terracefloor']['terracefloorCategoryID'];
         $thickness =$_POST['terracefloor']['thickness'];
         $width =$_POST['terracefloor']['width'];
         $length =$_POST['terracefloor']['length'];
         $terracefloorColor = $_POST['terracefloor']['terracefloorColor'];
         $materialID = 6;

         $terracefloor = new Terracefloor($terracefloorCategoryID, $thickness,$width, $length, $terracefloorColor, 6);
         $dbObj = new Db();
         $conn = $dbObj->getConnection();
         $sql = "UPDATE terracefloor SET `terracefloorCategoryID`=:terracefloorCategoryID, `thickness`=:thickness, `width`=:width, `length`=:length, `terracefloorColor`=:terracefloorColor, `materialID`=:materialID WHERE `terracefloorID`=:terracefloorID;";
         $statement = $conn->prepare($sql);
         $statement->execute([
            ':terracefloorCategoryID'=>$terracefloorCategoryID,
            ':thickness'=>$thickness,
            ':width'=>$width,
            ':length'=>$length,
            ':terracefloorColor'=>$terracefloorColor,
            ':materialID'=>$materialID,
            ':terracefloorID'=>$terracefloorID,
         ]);
        }
    }
    ?>