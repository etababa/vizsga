<?php
namespace controller;
require_once('model\TerracefloorCategoryDao.php');

use model\TerracefloorCategoryDao;

  class TerracefloorCategoryController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/terracefloorCategory/{$view}.php");
        return $data;
    }

    public function listAllTerracefloorCategory(){
        $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
        $terracefloorCategories = $terracefloorCategoryDaoObj->getAllTerracefloorCategory();
        return $this->load('list', [
            'terracefloorCategories' => $terracefloorCategories,
        ]);
    }

    public function saveTerracefloorCategory(){
        $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
        
        if (isset($_POST['save'])){
            $terracefloorCategoryDaoObj->save();
            header('Location: index.php?controller=terracefloorCategory&action=list');
        }
        return $this->load('create', [

        ]);
    }

     public function loadTerracefloorCategoryToDelete( int $terracefloorCategoryID) {
          $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
          $terracefloorCategoryData = $terracefloorCategoryDaoObj -> getTerracefloorCategoryById($terracefloorCategoryID);

          return $this->load('delete', [
            'terracefloorCategory' => $terracefloorCategoryData,
          ]);
     }

     public function deleteTerracefloorCategoryById ( int $terracefloorCategoryID) {
      $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
      if (isset($_POST['delete'])){
          $terracefloorCategoryDaoObj->delete($terracefloorCategoryID);
          header('Location: index.php?controller=terracefloorCategory&action=list');
      }
    }

      public function loadTerracefloorCategoryToEdit(int $terracefloorCategoryID)
      {
          $terracefloorCategoryDaoObj = new terracefloorCategoryDao();
  
          $terracefloorCategoryData = $terracefloorCategoryDaoObj->getTerracefloorCategoryById($terracefloorCategoryID);
        
          return $this->load('edit', [
              'terracefloorCategory' => $terracefloorCategoryData,
          ]);
        }
        
        public function updateTerracefloorCategoryById(int $terracefloorCategoryID){
          $terracefloorCategoryDaoObj = new terracefloorCategoryDao();
          //edit.php felületén a Módosít gombra kattintottunk
          if (isset($_POST['update'])){
              $terracefloorCategoryDaoObj->update($terracefloorCategoryID);
              header('Location: index.php?controller=terracefloorCategory&action=list');
          }
        }
}
?>