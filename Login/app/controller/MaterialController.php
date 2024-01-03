<?php
namespace controller;
require_once('model\MaterialDao.php');
use model\MaterialDao;

  class MaterialController {
     public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("view/material/{$view}.php");
        return $data;
     }

    public function listAllMaterial(){
        $materialDaoObj = new MaterialDao();
        $materials = $materialDaoObj->getAllMaterial();
        return $this->load('list', [
          'materials' => $materials,
        ]);

    }

    public function saveMaterial(){
      $materialDaoObj = new MaterialDao();
    
      //Ha a mentés gombra kattintunk (submit), akkor a save-metódust hívjuk meg
      if (isset($_POST['save'])){
          $materialDaoObj->save();
          header('Location: index.php');
      }
      return $this->load('create', [
       
      ]);
  }

  public function loadMaterialToDelete(int $materialID) {
    $materialDaoObj = new MaterialDao();
    $materialData = $materialDaoObj->getMaterialById($materialID);
    return $this->load('delete', [
      'material' => $materialData,
    ]);
  }
  
  public function deleteMaterialById(int $materialID){
    $materialDaoObj = new MaterialDao();
    if (isset($_POST['delete'])){
        $materialDaoObj->delete($materialID);
        header('Location: index.php');
    }
}

public function loadMaterialToEdit(int $materialID){
  $materialDaoObj = new MaterialDao();
  $materialData = $materialDaoObj->getMaterialById($materialID);

  return $this->load('edit', [
      'material' => $materialData,
  ]);
}

public function updateMaterialById(int $materialID){
  $materialDaoObj = new MaterialDao();
  //edit.php felületén a Módosít gombra kattintottunk
  if (isset($_POST['update'])){
      $materialDaoObj->update($materialID);
      header('Location: index.php');
  }
}


  }




?>