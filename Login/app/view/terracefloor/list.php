
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Teraszburkolatok</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=terracefloor&action=create" class="btn btn-light text-blue">Új teraszburkolat hozzáadása</a>

    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Teraszburkolat ID</th>
            <th>Teraszburkolat kategória</th>
            <th>Vastagság</th>
            <th>Szélesség</th>
            <th>Hosszúság</th>
            <th>Teraszburkolat színe</th>
            <th>Építőanyag kategória</th>

            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($terracefloors as $terracefloor) {
               echo "<tr>";
                    echo "<td>" .$terracefloor->terracefloorID . "</td>";
                    echo "<td>" .$terracefloor->terracefloorCategoryID ."</td>";
                    echo "<td>" .$terracefloor->thickness . "</td>";
                    echo "<td>" .$terracefloor->width . "</td>";
                    echo "<td>" .$terracefloor->length . "</td>";
                    echo "<td>" .$terracefloor->terracefloorColor . "</td>";
                    echo "<td>" .$terracefloor->materialID . "</td>";

                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=terracefloor&action=edit&terracefloorID=$terracefloor->terracefloorID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=terracefloor&action=delete&terracefloorID=$terracefloor->terracefloorID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>