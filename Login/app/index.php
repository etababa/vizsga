<?php
include 'controller\MaterialController.php';
include 'controller\AccessoryController.php';
include 'controller\RoofplateController.php';
include 'controller\RoofplateCategoryController.php';
include 'controller\ShingleCategoryController.php';
include 'controller\ShingleController.php';
include 'controller\TileCategoryController.php';
include 'controller\TileController.php';
include 'controller\TerracefloorCategoryController.php';
include 'controller\TerracefloorController.php';
include 'controller\StructureCategoryController.php';
include 'controller\StructureController.php';

use controller\MaterialController;
use controller\AccessoryController;
use controller\RoofplateController;
use controller\RoofplateCategoryController;
use controller\ShingleCategoryController;
use controller\ShingleController;
use controller\TileCategoryController;
use controller\TileController;
use controller\TerracefloorCategoryController;
use controller\TerracefloorController;
use controller\StructureCategoryController;
use controller\StructureController;


$controllerName = (isset($_GET['controller'])) ? $_GET['controller'] : 'material';

$actionName = (isset($_GET['action'])) ? $_GET['action'] : 'list';

switch ($controllerName) {
    case 'material':
        $controller = new MaterialController();
        switch ($actionName) {
            case 'list':
                $content = $controller -> listAllMaterial();
                break;
            case 'create':
                $content = $controller -> saveMaterial();
                break;
            case 'delete' :
                $content = $controller ->loadMaterialToDelete($_GET['materialID']);
                break;
            case 'del' :
                $content = $controller ->deleteMaterialByID($_GET['materialID']);
                break;
            case 'edit':
                    $content = $controller -> loadMaterialToEdit($_GET['materialID']);
                    break;
            case 'update':
                    $content = $controller -> updateMaterialById($_GET['materialID']);
                    break;
            }
            break;

    case 'accessory' :
        $controller = new AccessoryController();
            switch ($actionName) {
                case 'list':
                      $content = $controller -> listAllAccessory();
                    break;
                case 'create' :
                    $content = $controller -> saveAccessory();
                    break;
                case 'delete' :
                    $content = $controller ->loadAccessoryToDelete($_GET['accessoryID']);
                    break;
                case 'del' :
                    $content = $controller ->deleteAccessoryByID($_GET['accessoryID']);
                    break;
                case 'edit':
                        $content = $controller -> loadAccessoryToEdit($_GET['accessoryID']);
                        break;
                case 'update':
                        $content = $controller -> updateAccessoryById($_GET['accessoryID']);
                        break;    
            }
            break;
    
    case 'roofplate':
        $controller = new RoofplateController();
          switch ($actionName) {
            case 'list':
                $content = $controller -> listAllRoofplate();
                break;
            case 'create' :
                    $content = $controller -> saveRoofplate();
                    break;
            case 'delete' :
                $content = $controller ->loadRoofplateToDelete($_GET['roofplateID']);
                    break;
            case 'del' :
                $content = $controller ->deleteRoofplateByID($_GET['roofplateID']);
                    break;
            case 'edit':
                        $content = $controller -> loadRoofplateToEdit($_GET['roofplateID']);
                        break;
             case 'update':
                        $content = $controller -> updateRoofplateById($_GET['roofplateID']);
                        break;  
            
          }
        break;
        
        case 'roofplateCategory' :
            $controller = new RoofplateCategoryController();
              switch ($actionName) {
                case 'list':
                    $content = $controller -> listAllRoofplateCategory();
                    break;
                case 'create':
                    $sontent = $controller -> saveRoofplateCategory();
                    break;
                    case 'delete' :
                        $content = $controller ->loadRoofplateCategoryToDelete($_GET['roofplateCategoryID']);
                            break;
                    case 'del' :
                        $content = $controller ->deleteRoofplateCategoryById($_GET['roofplateCategoryID']);
                            break;
                    case 'edit':
                            $content = $controller -> loadRoofplateCategoryToEdit($_GET['roofplateCategoryID']);
                                break;
                     case 'update':
                            $content = $controller -> updateRoofplateCategoryById($_GET['roofplateCategoryID']);
                                break;  
                    
                }
            break;

        case 'shingleCategory' :
            $controller = new ShingleCategoryController();
              switch ($actionName) {
                case 'list':
                    $content = $controller ->listAllShingleCategory();
                    break;
                case 'create':
                    $content = $controller -> saveShingleCategory();
                        break;
                case 'delete' :
                    $content = $controller ->loadShingleCategoryToDelete($_GET['shingleCategoryID']);
                                break;
                case 'del' :
                    $content = $controller ->deleteShingleCategoryByID($_GET['shingleCategoryID']);
                                break;
                 case 'edit':
                    $content = $controller -> loadShingleCategoryToEdit($_GET['shingleCategoryID']);
                                        break;
                case 'update':
                    $content = $controller -> updateShingleCategory($_GET['shingleCategoryID']);
                                        break;  
              }
              break;

        case 'shingle' :
            $controller = new ShingleController();
            switch ($actionName) {
              case 'list':
                  $content = $controller ->listAllShingle();
                  break;
              case 'create':
                    $content = $controller -> saveShingle();
                        break;
              case 'delete' :
                    $content = $controller ->loadShingleToDelete($_GET['shingleID']);
                    break;
               case 'del' :
                    $content = $controller ->deleteShingleById($_GET['shingleID']);
                    break;
                case 'edit':
                     $content = $controller -> loadShingleToEdit($_GET['shingleID']);
                     break;
                case 'update':
                      $content = $controller -> updateShingleById($_GET['shingleID']);
                     break;  
        }  
        break;
        case 'tileCategory' :
            $controller = new TileCategoryController();
            switch ($actionName) {
              case 'list':
                  $content = $controller ->listAllTileCategory();
                  break;
              case 'create':
                    $content = $controller -> saveTileCategory();
                        break;
            case 'delete' :
                $content = $controller ->loadTileCategoryToDelete($_GET['tileCategoryID']);
                    break;
            case 'del' :
                $content = $controller ->deleteTileCategoryById($_GET['tileCategoryID']);
                    break;
            case 'edit':
                $content = $controller -> loadTileCategoryToEdit($_GET['tileCategoryID']);
                break;
            case 'update':
                $content = $controller -> updateTileCategoryById ($_GET['tileCategoryID']);
                break;

        }  
        break;

        case 'tile' :
            $controller = new TileController();
            switch ($actionName) {
              case 'list':
                $content = $controller ->listAllTile();
                break;
              case 'create':
                $content = $controller -> saveTile();
                break;
              case 'delete':
                $content = $controller ->loadTileToDelete($_GET['tileID']);
                break;
              case 'del':
                $content = $controller ->deleteTileById($_GET['tileID']);
                break;
              case 'edit' :
                $content = $controller ->loadTileToEdit($_GET['tileID']);
                break;
              case 'update' :
                $content = $controller ->updateTileById($_GET['tileID']);
                break;
        }  
        break;

        case 'terracefloorCategory' :
            $controller = new TerracefloorCategoryController();
            switch ($actionName) {
              case 'list':
                  $content = $controller ->listAllTerracefloorCategory();
                  break;
               case 'create':
                $content = $controller -> saveTerracefloorCategory();
                 break;
               case 'delete' :
                  $content = $controller -> loadTerracefloorCategoryToDelete($_GET['terracefloorCategoryID']);
                  break;
               case 'del' :
                   $content = $controller ->deleteTerracefloorCategoryById($_GET['terracefloorCategoryID']);
                   break;
               case 'edit' :
                   $content = $controller -> loadTerracefloorCategoryToEdit($_GET['terracefloorCategoryID']);
                   break;
               case 'update' :
                   $content = $controller ->updateTerracefloorCategoryById($_GET['terracefloorCategoryID']);
                   break;
            
        }  
        break;

    case 'terracefloor' :
         $controller = new TerracefloorController();
            switch ($actionName) {
                case 'list':
                    $content = $controller ->listAllTerracefloor();
                    break;
                case 'create':
                    $content = $controller -> saveTerracefloor();
                    break;
                case 'delete' :
                    $content = $controller -> loadTerracefloorToDelete($_GET['terracefloorID']);
                    break;
                case 'del':
                    $content = $controller ->deleteTerracefloorById($_GET['terracefloorID']);
                    break; 
                case 'edit' :
                    $content = $controller -> loadTerracefloorToEdit($_GET['terracefloorID']);
                    break;
                case 'update':
                    $content = $controller -> updateTerracefloorById($_GET['terracefloorID']);
                    break;      
    }  
    break;
    case 'structureCategory' :
        $controller = new StructureCategoryController();
           switch ($actionName) {
             case 'list':
                 $content = $controller ->listAllStructureCategory();
                 break;
             case 'create':
                $content = $controller -> saveStructureCategory();
                break;
            case 'delete' :
                    $content = $controller -> loadStructureCategoryToDelete($_GET['structureCategoryID']);
                    break;
            case 'del':
                    $content = $controller ->deleteStructureCategoryById($_GET['structureCategoryID']);
                    break; 
            case 'edit' :
                    $content = $controller -> loadStructureCategoryToEdit($_GET['structureCategoryID']);
                    break;
            case 'update':
                    $content = $controller -> updateStructureCategoryById($_GET['structureCategoryID']);
                    break;      
    }  
   break;

   case 'structure' :
    $controller = new StructureController();
       switch ($actionName) {
         case 'list':
             $content = $controller ->listAllStructure();
             break;
         case 'create' :
            $content = $controller -> saveStructure();
            break;  
         case 'delete' :
                $content = $controller -> loadStructureToDelete($_GET['structureID']);
                break;
        case 'del':
                $content = $controller ->deleteStructureById($_GET['structureID']);
                break;
        case 'edit' :
            $content = $controller ->loadStructureToEdit($_GET['structureID']);
            break;
        case 'update' :
            $content = $controller -> updateStructureCategoryById($_GET['structureID']);
            break;
        }  
        break;

  
                   

    }
?>
<!DOCTYPE html>
<html lang="hu">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DZ Tetőfedő KFT. Raktárkészlet</title>
</head>
<body>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>