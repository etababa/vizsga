

<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új tetőlemez felvitel</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="" method="POST">
            <div class="form-group">
                <label for="roofplateType">Tetőlemez típusa*</label>
                <input type="text" class="form-control" name="roofplate[roofplateType]" id="roofplateType" required>
            </div>
            <div class="form-group">
                <label for="roofplateColor">Tetőlemez színe*</label>
                <input type="text" class="form-control" name="roofplate[roofplateColor]" id="roofplateColor" required>
            </div>  
            <div class="form-group">
                <label for="roofplateManufacturer">Tetőlemez gyártója*</label>
                <input type="text" class="form-control" name="roofplate[roofplateManufacturer]" id="roofplateManufacturer" required>
            </div>
            
            <div class="form-group">
                <label for="roofplate[roofplateCategoryID]">Tetőlemez kategória*</label>
                <select class="form-select" name="roofplate[roofplateCategoryID]" id="roofplate[roofplateCategoryID]">
                    <?php
                        foreach ($roofplateCategories as $roofplateCategory) {
                           echo "<option value=" .$roofplateCategory->roofplateCategoryID ."> $roofplateCategory->roofplateCategoryName </option>";
                        } 
                    ?>
                </select>
                </div>  
                <div class="form-group">
                <label for="materialID">Építőanyag kategória*</label>
                <input type="hidden" name="materialID" value="4"> <!-- Itt adjuk meg az alapértelmezett értéket -->
    <p class="form-control-static">Tetőlemez</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->
</div>
<div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-2)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>