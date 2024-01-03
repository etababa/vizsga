

<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Tetőlemez módosítása</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=roofplate&action=update&roofplateID=<?php echo $roofplate->roofplateID;?>" method="POST">
            <div class="form-group">
                <label for="roofplateType">Tetőlemez típusa*</label>
                <input type="text" class="form-control" name="roofplate[roofplateType]" id="roofplateType"  value=<?php echo $roofplate->roofplateType;?> required>
            </div>
            <div class="form-group">
                <label for="roofplateColor">Tetőlemez színe*</label>
                <input type="text" class="form-control" name="roofplate[roofplateColor]" id="roofplateColor"
                value=<?php echo $roofplate->roofplateColor; ?> required>
            </div>  
            <div class="form-group">
                <label for="roofplateManufacturer">Tetőlemez gyártója*</label>
                <input type="text" class="form-control" name="roofplate[roofplateManufacturer]" id="roofplateManufacturer" 
                value=<?php echo $roofplate->roofplateManufacturer; ?> required>
            </div>
            <div class="form-group">
                <label for="[roofplate]roofplateCategoryID">Tetőlemez kategória*</label>
                <select class="form-select" name="roofplate[roofplateCategoryID]" id="roofplate[roofplateCategoryID]">
                    <?php
                        $selected = "";
                        foreach ($roofplateCategories as $roofplateCategory) {
                            $roofplate->roofplateCategoryID == $roofplateCategory->roofplateCategoryID ? $selected = "selected" : $selected = "";
                           echo "<option value=" .$roofplateCategory->roofplateCategoryID ." $selected> $roofplateCategory->roofplateCategoryName </option>";
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
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="update"> MÓDOSÍT </button>
            </div>
        </form>
    </div>
</div>