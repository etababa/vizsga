
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Kiegészítők</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=accessory&action=create" class="btn btn-light text-blue">Új kiegészítő hozzáadása</a> 

    </div>
</div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Kiegészítő ID</th>
            <th>Kiegészítő neve</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($accessories as $accessory) {
               echo "<tr>";
                    echo "<td>" .$accessory->accessoryID . "</td>";
                    echo "<td>" .$accessory->accessoryName . "</td>";
                    echo"<td>" .$accessory->materialID . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-warning' href='index.php?controller=accessory&action=edit&accessoryID=$accessory->accessoryID'> Módosít </a> ";
                    echo "<a class='btn btn-danger' href='index.php?controller=accessory&action=delete&accessoryID=$accessory->accessoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>