<?php
namespace controller;
require_once('model\StructureCategoryDao.php');

use model\StructureCategoryDao;

class StructureCategoryController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/structureCategory/{$view}.php");
        return $data;
    }

    public function listAllStructureCategory(){
        $structureCategoryDaoObj = new StructureCategoryDao();
        $structureCategories = $structureCategoryDaoObj->getAllStructureCategory();
        return $this->load('list', [
            'structureCategories' => $structureCategories,
        ]);
    }

    public function saveStructureCategory(){
        $structureCategoryDaoObj = new StructureCategoryDao();
        if (isset($_POST['save'])){
            $structureCategoryDaoObj->save();
            header('Location: index.php?controller=structureCategory&action=list');
        }
        return $this->load('create', [

        ]);

    }

    public function loadStructureCategoryToDelete(int $structureCategoryID) {
        $structureCategoryDaoObj = new StructureCategoryDao();
        $structureCategoryData = $structureCategoryDaoObj->getStructureCategoryById($structureCategoryID);
        return $this->load('delete', [
          'structureCategory' => $structureCategoryData,
        ]);
      }

      public function deleteStructureCategoryById(int $structureCategoryID){
        $structureCategoryDaoObj = new StructureCategoryDao();
        if (isset($_POST['delete'])){
            $structureCategoryDaoObj->delete($structureCategoryID);
            header('Location: index.php?controller=structureCategory&action=list');
        }
    }

    public function loadStructureCategoryToEdit(int $structureCategoryID)
    {
        $structureCategoryDaoObj = new StructureCategoryDao();

        $structureCategoryData = $structureCategoryDaoObj->getStructureCategoryById($structureCategoryID);
      
        return $this->load('edit', [
            'structureCategory' => $structureCategoryData,
        ]);
      }
      
      public function updateStructureCategoryById(int $structureCategoryID){
        $structureCategoryDaoObj = new StructureCategoryDao();
        //edit.php felületén a Módosít gombra kattintottunk
        if (isset($_POST['update'])){
            $structureCategoryDaoObj->update($structureCategoryID);
            header('Location: index.php?controller=structureCategory&action=list');
          }
}
}
?>