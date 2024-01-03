
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Zsindely kategóriák</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=shingleCategory&action=create" class="btn btn-light text-blue">Új zsindely kategória felvétele</a> 

    </div>
</div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Zsindely kategória ID</th>
            <th>Zsindely kategória neve</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($shingleCategories as $shingleCategory) {
               echo "<tr>";
                    echo "<td>" .$shingleCategory->shingleCategoryID . "</td>";
                    echo "<td>" .$shingleCategory->shingleCategoryName . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-warning' href='index.php?controller=shingleCategory&action=edit&shingleCategoryID=$shingleCategory->shingleCategoryID'> Módosít </a> ";
                    echo "<a class='btn btn-danger' href='index.php?controller=shingleCategory&action=delete&shingleCategoryID=$shingleCategory->shingleCategoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>