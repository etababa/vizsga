<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Szerkezetek</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=structure&action=create" class="btn btn-light text-blue">Új szerkezet hozzáadása</a>

    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Szerkezet ID</th>
            <th>Szerkezet kategória</th>
            <th>Fa fajta</th>
            <th>Vastagság</th>
            <th>Szélesség</th>
            <th>Hosszúság</th>
            <th>Kezelés</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($structures as $structure) {
               echo "<tr>";
                    echo "<td>" .$structure->structureID . "</td>";
                    echo "<td>" .$structure-> structureCategoryID . "</td>";
                    echo "<td>" .$structure->wood . "</td>";
                    echo "<td>" .$structure->thickness . "</td>";
                    echo "<td>" .$structure->width . "</td>";
                    echo "<td>" .$structure->length . "</td>";                    echo "<td>";
                    $structure->treatment ? print "Kezelt" : print "Kezeletlen";
                    echo  "</td>";
                    echo "<td>" .$structure->materialID . "</td>";

                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=structure&action=edit&structureID=$structure->structureID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=structure&action=delete&structureID=$structure->structureID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
   
   
</div>
