<?php
namespace controller;
require_once('model\TileDao.php');
require_once('model\TileCategoryDao.php');

use model\TileDao;
use model\TileCategoryDao;

class TileController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/tile/{$view}.php");
        return $data;
    }

    public function listAllTile(){
        $tileDaoObj = new TileDao();
        $tiles = $tileDaoObj->getAllTile();
        return $this->load('list', [
            'tiles' => $tiles,
        ]);
    }

    public function saveTile(){
        $tileCategoryDaoObj = new TileCategoryDao();
        $tileCategories = $tileCategoryDaoObj->getAllTileCategory();
        $tileDaoObj = new TileDao();
            if (isset($_POST['save'])){
            $tileDaoObj->save();
            header('Location: index.php?controller=tile&action=list');
        }
        return $this->load('create', [
            'tileCategories' => $tileCategories,
        ]);
    }

    public function loadTileToDelete(int $tileID) {
        $tileDaoObj = new TileDao();
        $tileData = $tileDaoObj->getTileById($tileID);
        return $this->load('delete', [
          'tile' => $tileData,
        ]);
    }

    public function deleteTileById(int $tileID){
        $tileDaoObj = new TileDao();
        if (isset ($_POST['delete'])){
            $tileDaoObj->delete($tileID);
            header('Location: index.php?controller=tile&action=list');
        }

    }

    public function loadTileToEdit(int $tileID){
        $tileDaoObj = new TileDao();
        $tileData = $tileDaoObj->getTileById($tileID);
  
        $tileCategoryDaoObj = new tileCategoryDao();$tileCategories = $tileCategoryDaoObj->getAllTileCategory();
      
        return $this->load('edit', [
            'tile' => $tileData,
            'tileCategories' => $tileCategories,
        ]);
      }
      
      public function updateTileById(int $tileID){
        $tileDaoObj = new TileDao();
        if (isset($_POST['update'])){
            $tileDaoObj->update($tileID);
            header('Location: index.php?controller=tile&action=list');
        }
      }
}
?>