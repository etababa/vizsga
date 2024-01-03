
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Építőanyag kategóriák</h1>

        <a href="index.php?controller=material&action=create" class="btn btn-light text-blue">Új építőanyag kategória hozzáadása</a>
        <a href="../dashboard/index.php" class="btn btn-primary">Vissza a Dashboardra</a>


    </div>
</div>
  <a href="index.php?controller=accessory&action=list" class="btn btn-secondary text-blue">Kiegészítők</a> 
  <a href="index.php?controller=roofplateCategory&action=list" class="btn btn-secondary text-blue">Tetőlemez kategóriák</a> 
  <a href="index.php?controller=roofplate&action=list" class="btn btn-secondary text-blue">Tetőlemezek</a>  
  <a href="index.php?controller=shingleCategory&action=list" class="btn btn-secondary text-blue">Zsindely kategóriák</a> 
  <a href="index.php?controller=shingle&action=list" class="btn btn-secondary text-blue">Zsindelyek</a> 
  <a href="index.php?controller=tileCategory&action=list" class="btn btn-secondary text-blue">Cserép kategóriák</a>
  <a href="index.php?controller=tile&action=list" class="btn btn-secondary text-blue">Cserepek</a>
  <a href="index.php?controller=terracefloorCategory&action=list" class="btn btn-secondary text-blue">Teraszburkolat kategóriák</a> 
  <a href="index.php?controller=terracefloor&action=list" class="btn btn-secondary text-blue">Teraszburkolatok</a> 
  <a href="index.php?controller=structureCategory&action=list" class="btn btn-secondary text-blue">Szerkezet kategóriák</a> 
  <a href="index.php?controller=structure&action=list" class="btn btn-secondary text-blue">Szerkezetek</a> 

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Építőanyag ID</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($materials as $material) {
               echo "<tr>";
                    echo "<td>" .$material->materialID. "</td>";
                    echo "<td>" .$material->materialName . "</td>";
                    
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=material&action=edit&materialID=$material->materialID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=material&action=delete&materialID=$material->materialID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>