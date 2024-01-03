<?php
namespace controller;
require_once('model\StructureDao.php');
require_once('model\StructureCategoryDao.php');

use model\StructureDao;
use model\StructureCategoryDao;

class StructureController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/structure/{$view}.php");
        return $data;
    }

    public function listAllStructure(){
        $structureDaoObj = new StructureDao();
        $structures = $structureDaoObj->getAllStructure();
        return $this->load('list', [
            'structures' => $structures,
        ]);
    }

    public function saveStructure(){
        $structureCategoryDaoObj = new StructureCategoryDao();
        $structureCategories = $structureCategoryDaoObj->getAllStructureCategory();

        $structureDaoObj = new StructureDao();
        if (isset($_POST['save'])){
            $structureDaoObj->save();
            header('Location: index.php?controller=structure&action=list');
        }

        return $this->load('create', [
            'structureCategories' => $structureCategories,
        ]);

    }

    public function loadStructureToDelete(int $structureID){
        $structureDaoObj = new StructureDao();
        $structureData = $structureDaoObj->getStructureById($structureID);
        return $this->load('delete', [
         'structure' => $structureData,
        ]);
    }

    public function deleteStructureById(int $structureID){
        $structureDaoObj = new StructureDao();
        if (isset($_POST['delete'])) {
            $structureDaoObj->delete($structureID);
            header ('Location: index.php?controller=structure&action=list');
        }
    }

    public function loadStructureToEdit(int $structureID){
        $structureDaoObj = new StructureDao();
        $structureData = $structureDaoObj->getStructureById($structureID);

        $structureCategoryDaoObj = new StructureCategoryDao();
        $structureCategories = $structureCategoryDaoObj->getAllStructureCategory();
        return $this->load('edit',[
            'structure' =>$structureData,
            'structureCategories' => $structureCategories,
        ]);
    }

    public function updateStructureCategoryById(int $structureID){
        $structureDaoObj = new StructureDao();
        if (isset($_POST['update'])) {
            $structureDaoObj ->update($structureID);
            header('Location: index.php?controller=structure&action=list');
        }
    }
}
?>