<?php
namespace controller;

require_once('model\TerracefloorDao.php');
require_once('model\TerracefloorCategoryDao.php');
require_once('model\MaterialDao.php');

use model\TerracefloorDao;
use model\TerracefloorCategoryDao;
use model\MaterialDao;

class TerracefloorController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/terracefloor/{$view}.php");
        return $data;
    }

    public function listAllTerracefloor(){
        $terracefloorDaoObj = new TerracefloorDao();
        $terracefloors = $terracefloorDaoObj->getAllTerracefloor();
        return $this->load('list', [
            'terracefloors' => $terracefloors,
        ]);
    }

    public function saveTerracefloor(){
        //legördülő menű adatai
        $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
        $terracefloorCategories = $terracefloorCategoryDaoObj -> getAllTerracefloorCategory();
      
        $terracefloorDaoObj = new TerracefloorDao();
        if (isset($_POST['save'])){
         $terracefloorDaoObj -> save();
         header('Location: index.php?controller=terracefloor&action=list');
        }

        return $this -> load('create', [
            'terracefloorCategories' => $terracefloorCategories,
        ]);
    }

       public function loadTerracefloorToDelete(int $terracefloorID){
       $terracefloorDaoObj = new TerracefloorDao();
       $terracefloorData = $terracefloorDaoObj -> getTerracefloorById($terracefloorID);
       return $this->load('delete', [
        'terracefloor' => $terracefloorData,
       ]);
       }

       public function deleteTerracefloorById(int $terracefloorID){
        $terracefloorDaoObj = new TerracefloorDao();
        if (isset($_POST['delete'])){
            $terracefloorDaoObj->delete($terracefloorID);
            header('Location: index.php?controller=terracefloor&action=list');
        }
       }

       public function loadTerracefloorToEdit(int $terracefloorID){
        $terracefloorDaoObj = new TerracefloorDao();
        $terracefloorData = $terracefloorDaoObj->getTerracefloorById($terracefloorID);
      
        $terracefloorCategoryDaoObj = new TerracefloorCategoryDao();
        $terracefloorCategories = $terracefloorCategoryDaoObj -> getAllTerracefloorCategory();

        return $this->load('edit',[
            'terracefloor' => $terracefloorData,
            'terracefloorCategories' => $terracefloorCategories,
        ]);
       }

       public function updateTerracefloorById(int $terracefloorID){
        $terracefloorDaoObj = new TerracefloorDao();
        if (isset($_POST['update'])){
            $terracefloorDaoObj->update($terracefloorID);
            header('Location: index.php?controller=terracefloor&action=list');
        }
       }
 
}
?>