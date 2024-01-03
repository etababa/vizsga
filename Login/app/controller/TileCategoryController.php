<?php
namespace controller;
require_once('model\TileCategoryDao.php');

use model\TileCategoryDao;

class TileCategoryController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/tileCategory/{$view}.php");
        return $data;
    }

    public function listAllTileCategory(){
        $tileCategoryDaoObj = new TileCategoryDao();
        $tileCategories = $tileCategoryDaoObj->getAllTileCategory();
        return $this->load('list', [
            'tileCategories' => $tileCategories,
        ]);
    }
    
    public function saveTileCategory(){
        $tileCategoryDaoObj = new TileCategoryDao();
        if (isset($_POST['save'])){
            $tileCategoryDaoObj->save();
            header('Location: index.php?controller=tileCategory&action=list');
        }
        return $this->load('create', [
        ]);
    }

    public function loadTileCategoryToDelete(int $tileCategoryID) {
        $tileCategoryDaoObj = new TileCategoryDao();
        $tileCategoryData = $tileCategoryDaoObj->getTileCategoryById($tileCategoryID);
        return $this->load('delete', [
          'tileCategory' => $tileCategoryData,
        ]);
      }

      public function deleteTileCategoryById(int $tileCategoryID){
        $tileCategoryDaoObj = new TileCategoryDao();
        if (isset($_POST['delete'])){
            $tileCategoryDaoObj->delete($tileCategoryID);
            header('Location: index.php?controller=tileCategory&action=list');
        }
    }

         public function loadTileCategoryToEdit(int $tileCategoryID){
            $tileCategoryDaoObj = new TileCategoryDao();
            $tileCategoryData = $tileCategoryDaoObj->getTileCategoryById($tileCategoryID);
            return $this->load('edit', [
                'tileCategory' =>$tileCategoryData,
            ]);
         }   
         
         public function updateTileCategoryById(int $tileCategoryID){
            $tileCategoryDaoObj = new TileCategoryDao();
            if (isset($_POST['update'])){
                $tileCategoryDaoObj->update($tileCategoryID);
                header('Location: index.php?controller=tileCategory&action=list');
            }
         }
}
?>