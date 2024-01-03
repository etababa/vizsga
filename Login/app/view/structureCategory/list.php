
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Szerkezet kategóriák</h1>
        <a href="index.php" class="btn btn-dark text-white">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=structureCategory&action=create" class="btn btn-light text-blue">Új szerkezet kategória</a>
    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Szerkezet kategória ID</th>
            <th>Szerkezet kategória név</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($structureCategories as $structureCategory) {
               echo "<tr>";
                    echo "<td>" .$structureCategory->structureCategoryID . "</td>";
                    echo "<td>" .$structureCategory->structureCategoryName ."</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=structureCategory&action=edit&structureCategoryID=$structureCategory->structureCategoryID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=structureCategory&action=delete&structureCategoryID=$structureCategory->structureCategoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
  
</div>