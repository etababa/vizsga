
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Tetőlemezek</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=roofplate&action=create" class="btn btn-light text-blue">Új tetőlemez hozzáadása</a> 

    </div>
</div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Tetőlemez ID</th>
            <th>Tetőlemez típusa</th>
            <th>Tetőlemez színe</th>
            <th>Tetőlemez gyártója</th>
            <th>Tetőlemez kategória</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($roofplates as $roofplate) {
               echo "<tr>";
                    echo "<td>" .$roofplate->roofplateID . "</td>";
                    echo "<td>" .$roofplate->roofplateType . "</td>";
                    echo"<td>" .$roofplate->roofplateColor . "</td>";
                    echo"<td>" .$roofplate->roofplateManufacturer . "</td>";
                    echo"<td>" .$roofplate->roofplateCategoryID . "</td>";
                    echo"<td>" .$roofplate->materialID . "</td>";
                    echo "<td>";
                         echo "<a class='btn btn-warning' href='index.php?controller=roofplate&action=edit&roofplateID=$roofplate->roofplateID'> Módosít </a> ";
                         echo "<a class='btn btn-danger' href='index.php?controller=roofplate&action=delete&roofplateID=$roofplate->roofplateID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>