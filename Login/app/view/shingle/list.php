<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Zsindelyek</h1>
        <a href="index.php" class="btn btn-dark">Vissza az építőanyag kategóriákhoz</a>
        <a href="index.php?controller=shingle&action=create" class="btn btn-light text-blue">Új zsindely hozzáadása</a>

    </div>
<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>Zsindely ID</th>
            <th>Zsindely típusa</th>
            <th>Zsindely színe</th>
            <th>Zsindely gyártója</th>
            <th>Zsindely kategória</th>
            <th>Építőanyag kategória</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($shingles as $shingle) {
               echo "<tr>";
                    echo "<td>" .$shingle->shingleID. "</td>";
                    echo "<td>" .$shingle->shingleType . "</td>";
                    echo "<td>" .$shingle->shingleColor . "</td>";
                    echo "<td>" .$shingle->shingleManufacturer . "</td>";
                    echo "<td>" .$shingle->shingleCategoryID. "</td>";
                    echo "<td>" .$shingle->materialID . "</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=shingle&action=edit&shingleID=$shingle->shingleID'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=shingle&action=delete&shingleID=$shingle->shingleID'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
        </div>