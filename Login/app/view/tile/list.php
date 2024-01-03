<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center"> Cserepek</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=tile&action=create" class="btn btn-light text-blue">Új cserép hozzáadása</a> 

    </div>
</div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Cserép ID</th>
            <th>Cserép típusa</th>
            <th>Cserép színe</th>
            <th>Cserép gyártója</th>
            <th>Cserép kategória</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($tiles as $tile) {
               echo "<tr>";
                    echo "<td>" .$tile->tileID . "</td>";
                    echo "<td>" .$tile->tileType . "</td>";
                    echo"<td>" .$tile->tileColor . "</td>";
                    echo"<td>" .$tile->tileManufacturer . "</td>";
                    echo"<td>" .$tile->tileCategoryID . "</td>";
                    echo"<td>" .$tile->materialID . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-warning' href='index.php?controller=tile&action=edit&tileID=$tile->tileID'> Módosít </a> ";
                    echo "<a class='btn btn-danger' href='index.php?controller=tile&action=delete&tileID=$tile->tileID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>