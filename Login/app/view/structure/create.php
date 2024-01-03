
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új szerkezet hozzáadása</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=structure&action=create" method="POST">
            <div class="form-group">
                <label for="structure[structureCategoryID]">Szerkezet kategória*</label>
                <select class="form-select" name="structure[structureCategoryID]" id="structure[structureCategoryID]">
                 <?php
                    foreach ($structureCategories as $structureCategory) {
                     echo "<option value=" . $structureCategory->structureCategoryID . " > $structureCategory->structureCategoryName </option>";
                     }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="wood">Fa típusa*</label>
                <input type="text" class="form-control" name="structure[wood]" id="wood" required>
            </div>
            <div class="form-group">
                <label for="thickness">Vastagság*</label>
                <input type="text" class="form-control" name="structure[thickness]" id="thickness" required>
            </div>  
            <div class="form-group">
                <label for="width">Szélesség*</label>
                <input type="text" class="form-control" name="structure[width]" id="width" required>
            </div>
            <div class="form-group">
                <label for="length">Hosszúság</label>
                <input type="text" class="form-control" name="structure[length]" id="length" required>
            </div>
            <div class="form-check mt-3">
                <label for="treatment">Kezelt</label>
               <input type="checkbox" name="structure[treatment]" id="treatment" checked>
            </div>
                <div class="form-group">
                <label for="materialID">Építőanyag kategória*</label>
                <input type="hidden" name="materialID" value="5"> <!-- Itt adjuk meg az alapértelmezett értéket -->
                <p class="form-control-static">Szerkezet</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->
                </div>  
             
             <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>