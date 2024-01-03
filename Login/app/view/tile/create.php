
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új cserép felvitel</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=tile&action=create" method="POST">
            <div class="form-group">
                <label for="tileType">Cserép típusa*</label>
                <input type="text" class="form-control" name="tile[tileType]" id="tileType" required>
            </div>
            <div class="form-group">
                <label for="tileColor">Cserép színe*</label>
                <input type="text" class="form-control" name="tile[tileColor]" id="tileColor" required>
            </div>  
            <div class="form-group">
                <label for="tileManufacturer">Cserép gyártója*</label>
                <input type="text" class="form-control" name="tile[tileManufacturer]" id="tileManufacturer" required>
            </div> 
            
            <div class="form-group">
                <label for="tile[tileCategoryID]">Cserép kategória*</label>
                <select class="form-select" name="tile[tileCategoryID]" id="tileCategoryID">
                    <?php
                        foreach ($tileCategories as $tileCategory) {
                           echo "<option value=" .$tileCategory->tileCategoryID ."> $tileCategory->tileCategoryName </option>";
                        } 
                    ?>
                </select>
            </div>  

            <div class="form-group">
                <label for="materialID">Építőanyag kategória*</label>
                <input type="hidden" name="materialID" value="2"> <!-- Itt adjuk meg az alapértelmezett értéket -->
    <p class="form-control-static">Cserép</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->
</div>
          
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>