<?php
namespace model;
require_once('_utils\Database.php');
require_once('model\Structure.php');
use \_utils\Database as Db;

    class StructureDao {

        // FONTOS!!! Ha táblaösszekapcsolásnál azonosak az oszlopnevek (pld. id-id), akkor
        // nem biztos, hogy a jó helyről fogja szedni
        // Megoldás: behívatkozzuk a mezőket, majdnem teljes elérési úttal (táblanév.oszlopnév)
        public function getAllStructure(){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT s.structureID, s.wood, s.thickness, s.width, s.length, s.treatment, sc.structureCategoryID, m.materialID FROM structure as s INNER JOIN structure_category as sc ON s.structureCategoryID = sc.structureCategoryID INNER JOIN material as m ON s.materialID = m.materialID;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        }

        public function save(){
            $structureCategoryID = $_POST['structure']['structureCategoryID'];
            $wood = $_POST['structure']['wood'];
            $thickness = $_POST['structure']['thickness'];
            $width = $_POST['structure']['width'];
            $length = $_POST['structure']['length'];
            $treatment = isset($_POST['structure']['treatment']) ? 1 : 0;
            $materialID = 5;

            $structureDaoObj = new Structure($structureCategoryID,$wood, $thickness, $width, $length, $treatment, $materialID);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql="INSERT INTO structure(`structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES (:structureCategoryID, :wood, :thickness, :width, :length, :treatment, :materialID);";
            $statement= $conn->prepare($sql);
            $statement-> execute([
                ':structureCategoryID'=>$structureCategoryID,
                ':wood'=>$wood,
                ':thickness'=>$thickness,
                ':width'=>$width,
                ':length'=>$length,
                ':treatment'=>$treatment,
                ':materialID'=>$materialID,
            ]);
        }

        public function getStructureById(int $structureID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT * FROM structure WHERE structureID = :structureID;");
            $statement ->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute([
                ':structureID'=>$structureID,
            ]);
            return $statement->fetch();
        }

        public function delete(int $structureID){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("DELETE FROM structure WHERE structureID = :structureID;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute([
                ':structureID'=>$structureID,
            ]);
        }

        public function update(int $structureID){
            $structureCategoryID = $_POST['structure']['structureCategoryID'];
            $wood = $_POST['structure']['wood'];
            $thickness = $_POST['structure']['thickness'];
            $width = $_POST['structure']['width'];
            $length = $_POST['structure']['length'];
            $treatment = isset($_POST['structure']['treatment']) ? 1 : 0;
            $materialID = 5;

            $structureDaoObj = new Structure($structureCategoryID,$wood, $thickness, $width, $length, $treatment, $materialID);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql="UPDATE structure SET `structureCategoryID` = :structureCategoryID, `wood` =:wood, `thickness` = :thickness, `width` = :width, `length` = :length, `treatment` = :treatment, `materialID` = :materialID WHERE `structureID` = :structureID;";
            $statement= $conn->prepare($sql);
            $statement-> execute([
                ':structureCategoryID'=>$structureCategoryID,
                ':wood'=>$wood,
                ':thickness'=>$thickness,
                ':width'=>$width,
                ':length'=>$length,
                ':treatment'=>$treatment,
                ':materialID'=>$materialID,
                ':structureID'=>$structureID,
            ]);   
        }
    }
    ?>