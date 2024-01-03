
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új zsindely hozzáadása</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=shingle&action=create" method="POST">
            <div class="form-group">
                <label for="shingleType">Zsindely típusa*</label>
                <input type="text" class="form-control" name="shingle[shingleType]" id="shingleType" required>
            </div>
            <div class="form-group">
                <label for="shingleColor">Zsindely színe*</label>
                <input type="text" class="form-control" name="shingle[shingleColor]" id="shingleColor" required>
            </div>  
            <div class="form-group">
                <label for="shingleManufacturer">Zsindely gyártója*</label>
                <input type="text" class="form-control" name="shingle[shingleManufacturer]ind" id="shingleManufacturer" required>
            </div>

            <div class="form-group">
                <label for="shingleCategoryID">Zsindely kategória*</label>
                <select class="form-select" name="shingle[shingleCategoryID]" id="shingleCategoryID">
                 <?php
                    foreach ($shingleCategories as $shingleCategory) {
                     echo "<option value=" . $shingleCategory->shingleCategoryID . " > $shingleCategory->shingleCategoryName </option>";
                     }
                  ?>
                </select>
            </div>
                <div class="form-group">
                <label for="materialID">Építőanyag kategória*</label>
                <input type="hidden" name="materialID" value="3"> <!-- Itt adjuk meg az alapértelmezett értéket -->
    <p class="form-control-static">Zsindely</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->
</div>
            </div>  
            </div>  
            
           
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>