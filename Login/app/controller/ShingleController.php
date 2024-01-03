<?php
namespace controller;

require_once('model\ShingleDao.php');
require_once('model\ShingleCategoryDao.php');
require_once('model\MaterialDao.php');

use model\ShingleDao;
use model\ShingleCategoryDao;
use model\MaterialDao;


class ShingleController {
    public function load($view, $data=[]){
       extract($data);
       ob_start();
       include("view/shingle/{$view}.php");
       return $data;
    }

   public function listAllShingle(){
       $shingleDaoObj = new ShingleDao();
       $shingles = $shingleDaoObj->getAllShingle();
       return $this->load('list', [
         'shingles' => $shingles,
       ]);
   }

   public function saveShingle(){
    //a legördülő menü adatait állítja elő az employee_category tábla alapján
    $shingleCategoryDaoObj = new ShingleCategoryDao();
    $shingleCategories = $shingleCategoryDaoObj->getAllShingleCategory();

    $shingleDaoObj = new ShingleDao();
    //Ha a mentés gombra kattintunk (submit), akkor a save-metódust hívjuk meg
    if (isset($_POST['save'])){
        $shingleDaoObj->save();
        header('Location: index.php?controller=shingle&action=list');
    }

    //$employeeCategories - legördülő menü adatai
    return $this->load('create', [
        'shingleCategories' => $shingleCategories,
    ]);
}

public function loadShingleToDelete(int $shingleID) {
    $shingleDaoObj = new ShingleDao();
    $shingleData = $shingleDaoObj->getShingleById($shingleID);
    return $this->load('delete', [
      'shingle' => $shingleData,
    ]);
  }

  public function deleteShingleById(int $shingleID){
    $shingleDaoObj = new ShingleDao();
    if (isset($_POST['delete'])){
        $shingleDaoObj->delete($shingleID);
        header('Location: index.php?controller=shingle&action=list');
    }
}

public function loadShingleToEdit(int $shingleID){
    $shingleDaoObj = new ShingleDao();
    $shingleData = $shingleDaoObj->getShingleById($shingleID);

    $shingleCategoryDaoObj = new ShingleCategoryDao();
    $shingleCategories = $shingleCategoryDaoObj->getAllShingleCategory();
  
    return $this->load('edit', [
        'shingle' => $shingleData,
        'shingleCategories' => $shingleCategories,
    ]);
  }
  
  public function updateShingleById(int $shingleID){
    $shingleDaoObj = new ShingleDao();
    //edit.php felületén a Módosít gombra kattintottunk
    if (isset($_POST['update'])){
        $shingleDaoObj->update($shingleID);
        header('Location: index.php?controller=shingle&action=list');
    }
  }
}
?>