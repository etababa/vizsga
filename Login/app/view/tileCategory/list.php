
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Cserép kategóriák</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=tileCategory&action=create" class="btn btn-light text-blue">Új cserép kategória felvétele</a> 

    </div>
</div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Cserép kategória ID</th>
            <th>Cserép kategória neve</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($tileCategories as $tileCategory) {
               echo "<tr>";
                    echo "<td>" .$tileCategory->tileCategoryID . "</td>";
                    echo "<td>" .$tileCategory->tileCategoryName . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-warning' href='index.php?controller=tileCategory&action=edit&tileCategoryID=$tileCategory->tileCategoryID'> Módosít </a> ";
                    echo "<a class='btn btn-danger' href='index.php?controller=tileCategory&action=delete&tileCategoryID=$tileCategory->tileCategoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>