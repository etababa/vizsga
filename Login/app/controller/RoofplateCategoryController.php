<?php
namespace controller;

require_once('model\RoofplateCategoryDao.php');

use model\RoofplateCategoryDao;

class RoofplateCategoryController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/roofplateCategory/{$view}.php");
        return $data;
    }

    public function listAllRoofplateCategory(){
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        $roofplateCategories = $roofplateCategoryDaoObj->getAllRoofplateCategory();
        return $this->load('list', [
            'roofplateCategories' => $roofplateCategories,
        ]);
    }
    
    public function saveRoofplateCategory(){
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        if (isset($_POST['save'])){
            $roofplateCategoryDaoObj->save();
            header('Location: index.php?controller=roofplateCategory&action=list');
        }
        return $this->load('create', [
            
        ]);
    }
   
    public function loadRoofplateCategoryToDelete(int $roofplateCategoryID) {
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        $roofplateCategoryData = $roofplateCategoryDaoObj->getRoofplateCategoryById($roofplateCategoryID);
        return $this->load('delete', [
          'roofplateCategory' => $roofplateCategoryData,
        ]);
      }

      public function deleteRoofplateCategoryById(int $roofplateCategoryID){
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        if (isset($_POST['delete'])){
            $roofplateCategoryDaoObj->delete($roofplateCategoryID);
            header('Location: index.php?controller=roofplateCategory&action=list');
        }
    }

    public function loadRoofplateCategoryToEdit(int $roofplateCategoryID)
    {
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();

        $roofplateCategoryData = $roofplateCategoryDaoObj->getRoofplateCategoryById($roofplateCategoryID);
      
        return $this->load('edit', [
            'roofplateCategory' => $roofplateCategoryData,
        ]);
      }
      
      public function updateRoofplateCategoryById(int $roofplateCategoryID){
        $roofplateCategoryDaoObj = new RoofplateCategoryDao();
        if (isset($_POST['update'])){
            $roofplateCategoryDaoObj->update($roofplateCategoryID);
            header('Location: index.php?controller=roofplateCategory&action=list');
        }
      }
}
?>