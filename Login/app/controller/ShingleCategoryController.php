<?php
namespace controller;

require_once('model\ShingleCategoryDao.php');
use model\ShingleCategoryDao;


class ShingleCategoryController {
    public function load($view, $data=[]){
       extract($data);
       ob_start();
       include("view/shingleCategory/{$view}.php");
       return $data;
    }

   public function listAllShingleCategory(){
       $shingleCategoryDaoObj = new ShingleCategoryDao();
       $shingleCategories = $shingleCategoryDaoObj->getAllShingleCategory();
       return $this->load('list', [
         'shingleCategories' => $shingleCategories,
       ]);
   }

   public function saveShingleCategory(){
    $shingleCategoryDaoObj = new ShingleCategoryDao();
  
    //Ha a mentés gombra kattintunk (submit), akkor a save-metódust hívjuk meg
    if (isset($_POST['save'])){
        $shingleCategoryDaoObj->save();
        header('Location: index.php?controller=shingleCategory&action=list');
    }
    return $this->load('create', [
     
    ]);
}

public function loadShingleCategoryToDelete(int $shingleCategoryID) {
    $shingleCategoryDaoObj = new ShingleCategoryDao();
    $shingleCategoryData = $shingleCategoryDaoObj->getShingleCategoryById($shingleCategoryID);
    return $this->load('delete', [
      'shingleCategory' => $shingleCategoryData,
    ]);
  }

  public function deleteShingleCategoryById(int $shingleCategoryID){
    $shingleCategoryDaoObj = new ShingleCategoryDao();
    if (isset($_POST['delete'])){
        $shingleCategoryDaoObj->delete($shingleCategoryID);
        header('Location: index.php?controller=shingleCategory&action=list');
    }
}
public function loadShingleCategoryToEdit(int $shingleCategoryID){
    $shingleCategoryDaoObj = new ShingleCategoryDao();

    $shingleCategoryData = $shingleCategoryDaoObj->getShingleCategoryById($shingleCategoryID);
  
    return $this->load('edit', [
        'shingleCategory' => $shingleCategoryData,
    ]);
  }
  
  public function updateShingleCategory(int $shingleCategoryID){
    $shingleCategoryDaoObj = new ShingleCategoryDao();
    //edit.php felületén a Módosít gombra kattintottunk
    if (isset($_POST['update'])){
        $shingleCategoryDaoObj->update($shingleCategoryID);
        header('Location: index.php?controller=shingleCategory&action=list');
    }
  }
}
?>