<?php
namespace controller;

require_once('model\AccessoryDao.php');
require_once('model\MaterialDao.php');

use model\AccessoryDao;
use model\MaterialDao;

  class AccessoryController {
     public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/accessory/{$view}.php");
        return $data;
     }

    public function listAllAccessory(){
        $accessoryDaoObj = new AccessoryDao();
        $accessories = $accessoryDaoObj->getAllAccessory();
        return $this->load('list', [
          'accessories' => $accessories,
        ]);
    }
    public function saveAccessory(){
      //a legördülő menü adatait állítja elő az employee_category tábla alapján
      $materialDaoObj = new MaterialDao();
      $materials = $materialDaoObj->getAllMaterial();

      $accessoryDaoObj = new AccessoryDao();
      //Ha a mentés gombra kattintunk (submit), akkor a save-metódust hívjuk meg
      if (isset($_POST['save'])){
          $accessoryDaoObj->save();
          header('Location: index.php?controller=accessory&action=list');
      }

      //$employeeCategories - legördülő menü adatai
      return $this->load('create', [
          'materials' => $materials,
      ]);
  }

      public function loadAccessoryToDelete(int $accessoryID) {
        $accessoryDaoObj = new AccessoryDao();
        $accessoryData = $accessoryDaoObj->getAccessoryById($accessoryID);
        return $this->load('delete', [
          'accessory' => $accessoryData,
        ]);
      }

      public function deleteAccessoryById(int $accessoryID){
        $accessoryDaoObj = new AccessoryDao();
        if (isset($_POST['delete'])){
            $accessoryDaoObj->delete($accessoryID);
            header('Location: index.php?controller=accessory&action=list');
        }
    }
    public function loadAccessoryToEdit(int $accessoryID){
      $accessoryDaoObj = new AccessoryDao();
      $accessoryData = $accessoryDaoObj->getAccessoryById($accessoryID);
    
      return $this->load('edit', [
          'accessory' => $accessoryData,
      ]);
    }
    
    public function updateAccessoryById(int $accessoryID){
      $accessoryDaoObj = new AccessoryDao();
      //edit.php felületén a Módosít gombra kattintottunk
      if (isset($_POST['update'])){
          $accessoryDaoObj->update($accessoryID);
          header('Location: index.php?controller=accessory&action=list');
      }
    }

}
?>