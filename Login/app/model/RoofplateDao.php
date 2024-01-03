<?php
namespace model;
require_once('model\Roofplate.php');
require_once('_utils\Database.php');

use _utils\Database as Db;

  class RoofplateDao {
     public function getAllRoofplate(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        // var_dump($conn);
        $statement = $conn->prepare("SELECT r.roofplateID, r.roofplateType, r.roofplateColor, r.roofplateManufacturer, rc.roofplateCategoryID, m.materialID FROM roofplate as r INNER JOIN roofplate_category as rc ON r.roofplateCategoryID = rc.roofplateCategoryID INNER JOIN material as m ON r.materialID = m.materialID ORDER BY roofplateID ASC");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
         $data = $statement->fetchAll();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        return $data;  // vagy return = $statement->fetchAll();

     }

     
     public function save(){
        $roofplateType = $_POST['roofplate']['roofplateType'];
        $roofplateColor = $_POST['roofplate']['roofplateColor'];
        $roofplateManufacturer = $_POST['roofplate']['roofplateManufacturer'];
        $roofplateCategoryID = $_POST['roofplate']['roofplateCategoryID'];
        $materialID = 4;
  
        $roofplate = new Roofplate($roofplateType, $roofplateColor, $roofplateManufacturer, $roofplateCategoryID,$materialID );
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        //:lastName :firstName stb. - paraméter indexek
        $sql = "INSERT INTO roofplate(`roofplateType`, `roofplateColor`, `roofplateManufacturer`, `roofplateCategoryID`, `materialID`) VALUES (:roofplateType, :roofplateColor, :roofplateManufacturer, :roofplateCategoryID, :materialID);";

        $statement = $conn->prepare($sql);
        
        //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
        $statement->execute([
            ':roofplateType'=>$roofplateType,
            ':roofplateColor'=>$roofplateColor,
            ':roofplateManufacturer'=>$roofplateManufacturer,
            ':roofplateCategoryID'=>$roofplateCategoryID,
            ':materialID' => $materialID,
        ]);
    }

     public function getRoofplateById(int $roofplateID) {
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT r.roofplateID, r.roofplateType, r.roofplateColor, r.roofplateManufacturer, rc.roofplateCategoryID, m.materialID FROM roofplate as r INNER JOIN roofplate_category as rc ON r.roofplateCategoryID = rc.roofplateCategoryID INNER JOIN material as m ON r.materialID = m.materialID WHERE r.roofplateID = :roofplateID");
        $statement -> setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
           ':roofplateID'=>$roofplateID,
        ]);
        return $statement->fetch();
      }
      
      public function delete(int $roofplateID){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "DELETE FROM roofplate WHERE roofplateID =:roofplateID;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':roofplateID'=>$roofplateID,
        ]);
    }

    public function update(int $roofplateID){
      $roofplateType = $_POST['roofplate']['roofplateType'];
      $roofplateColor = $_POST['roofplate']['roofplateColor'];
      $roofplateManufacturer = $_POST['roofplate']['roofplateManufacturer'];
      $roofplateCategoryID = $_POST['roofplate']['roofplateCategoryID'];
      $materialID = 4;
     
      $roofplate = new Roofplate($roofplateType, $roofplateColor, $roofplateManufacturer, $roofplateCategoryID, 4);
      $dbObj = new Db();
      $conn = $dbObj->getConnection();
      $sql = "UPDATE roofplate SET `roofplateType` =:roofplateType, `roofplateColor` =:roofplateColor, `roofplateManufacturer` =:roofplateManufacturer, `roofplateCategoryID` =:roofplateCategoryID, `materialID` =:materialID WHERE `roofplateID` =:roofplateID;";
      $statement = $conn->prepare($sql);
      $statement->execute([
         ':roofplateType'=>$roofplateType,
         ':roofplateColor'=>$roofplateColor,
         ':roofplateManufacturer'=>$roofplateManufacturer,
         ':roofplateCategoryID'=>$roofplateCategoryID, 
         ':materialID' =>$materialID,
          ':roofplateID'=>$roofplateID,
          
      ]);
   }

    }
    ?>