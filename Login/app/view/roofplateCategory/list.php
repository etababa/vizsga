
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Tetőlemez kategóriák</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=roofplateCategory&action=create" class="btn btn-light text-blue">Új tetőlemez kategória felvétele</a> 

    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Tetőlemez kategória ID</th>
            <th>Tetőlemez kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($roofplateCategories as $roofplateCategory) {
               echo "<tr>";
                    echo "<td>" .$roofplateCategory->roofplateCategoryID . "</td>";
                    echo "<td>" .$roofplateCategory->roofplateCategoryName ."</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=roofplateCategory&action=edit&roofplateCategoryID=$roofplateCategory->roofplateCategoryID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=roofplateCategory&action=delete&roofplateCategoryID=$roofplateCategory->roofplateCategoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
   
</div>
