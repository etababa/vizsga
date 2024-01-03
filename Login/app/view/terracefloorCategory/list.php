
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Teraszburkolat kategóriák</h1>
    <a href="index.php" class="btn btn-dark text-white">Vissza az építőanyag kategóriákhoz</a>
    <a href="index.php?controller=terracefloorCategory&action=create" class="btn btn-light text-blue">Új teraszburkolat kategória</a>
    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Teraszburkolat kategória ID</th>
            <th>Teraszburkolat kategória neve</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($terracefloorCategories as $terracefloorCategory) {
               echo "<tr>";
                    echo "<td>" .$terracefloorCategory->terracefloorCategoryID . "</td>";
                    echo "<td>" .$terracefloorCategory->terracefloorCategoryName ."</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=terracefloorCategory&action=edit&terracefloorCategoryID=$terracefloorCategory->terracefloorCategoryID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=terracefloorCategory&action=delete&terracefloorCategoryID=$terracefloorCategory->terracefloorCategoryID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
  
</div>
