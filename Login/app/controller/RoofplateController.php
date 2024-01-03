<?php
namespace controller;

require_once('model\RoofplateDao.php');
require_once('model\MaterialDao.php');
require_once('model\RoofplateCategoryDao.php');

use model\RoofplateDao;
use model\MaterialDao;
use model\RoofplateCategoryDao;

  class RoofplateController {
     public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/roofplate/{$view}.php");
        return $data;
     }

    public function listAllRoofplate(){
        $roofplateDaoObj = new RoofplateDao();
        $roofplates = $roofplateDaoObj->getAllRoofplate();
        return $this->load('list', [
          'roofplates' => $roofplates,
        ]);
    }
    
    
    public function saveRoofplate(){
        //a legördülő menü adatait állítja elő az employee_category tábla alapján
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        $roofplateCategories = $roofplateCategoryDaoObj->getAllRoofplateCategory();

        $roofplateDaoObj = new RoofplateDao();
        //Ha a mentés gombra kattintunk (submit), akkor a save-metódust hívjuk meg
        if (isset($_POST['save'])){
            $roofplateDaoObj->save();
            header('Location: index.php?controller=roofplate&action=list');
        }

        //$employeeCategories - legördülő menü adatai
        return $this->load('create', [
            'roofplateCategories' => $roofplateCategories,
        ]);
    }
    public function loadRoofplateToDelete(int $roofplateID) {
        $roofplateDaoObj = new RoofplateDao();
        $roofplateData = $roofplateDaoObj->getRoofplateById($roofplateID);
        return $this->load('delete', [
          'roofplate' => $roofplateData,
        ]);
      }
      
      public function deleteRoofplateByID(int $roofplateID){
        $roofplateDaoObj = new RoofplateDao();
        if (isset($_POST['delete'])){
            $roofplateDaoObj->delete($roofplateID);
            header('Location: index.php?controller=roofplate&action=list');
        }
    }

    public function loadRoofplateToEdit(int $roofplateID){
      $roofplateDaoObj = new RoofplateDao();
      $roofplateData = $roofplateDaoObj->getRoofplateById($roofplateID);

      $roofplateCategoryDaoObj = new roofplateCategoryDao();
      $roofplateCategories = $roofplateCategoryDaoObj->getAllRoofplateCategory();
    
      return $this->load('edit', [
          'roofplate' => $roofplateData,
          'roofplateCategories' => $roofplateCategories,
      ]);
    }
    
    public function updateRoofplateById(int $roofplateID){
      $roofplateDaoObj = new RoofplateDao();
      //edit.php felületén a Módosít gombra kattintottunk
      if (isset($_POST['update'])){
          $roofplateDaoObj->update($roofplateID);
          header('Location: index.php?controller=roofplate&action=list');
      }
    }

  }



?>