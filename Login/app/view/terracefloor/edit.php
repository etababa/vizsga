<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Teraszburkolat módosítása</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=terracefloor&action=update&terracefloorID=<?php echo $terracefloor->terracefloorID;?>" method="POST">
        <div class="form-group">
                <label for="[terracefloor]terracefloorCategoryID">Teraszburkolat kategória*</label>
                <select class="form-select" name="terracefloor[terracefloorCategoryID]" id="terracefloor[terracefloorCategoryID]">
                    <?php
                        $selected = "";
                        foreach ($terracefloorCategories as $terracefloorCategory) {
                            $terracefloor->terracefloorCategoryID == $terracefloorCategory->terracefloorCategoryID ? $selected = "selected" : $selected = "";
                           echo "<option value=" .$terracefloorCategory->terracefloorCategoryID ." $selected> $terracefloorCategory->terracefloorCategoryName </option>";
                        } 
                    ?>
                </select>
                </div>
            <div class="form-group">
                <label for="thickness">Teraszburkolat vastagság*</label>
                <input type="text" class="form-control" name="terracefloor[thickness]" id="thickness"  value=<?php echo $terracefloor->thickness;?> required>
            </div>
            <div class="form-group">
                <label for="width">Teraszburkolat szélesség*</label>
                <input type="text" class="form-control" name="terracefloor[width]" id="width"
                value=<?php echo $terracefloor->width; ?> required>
            </div>  
            <div class="form-group">
                <label for="length">Teraszburkolat hosszúság *</label>
                <input type="text" class="form-control" name="terracefloor[length]" id="length" 
                value=<?php echo $terracefloor->length; ?> required>
            </div>
            <div class="form-group">
                <label for="terracefloorColor">Teraszburkolat színe *</label>
                <input type="text" class="form-control" name="terracefloor[terracefloorColor]" id="terracefloorColor" 
                value=<?php echo $terracefloor->terracefloorColor; ?> required>
            </div>
                <div class="form-group">
                <label for="materialID">Építőanyag kategória*</label>
                <input type="hidden" name="materialID" value="6"> <!-- Itt adjuk meg az alapértelmezett értéket -->
    <p class="form-control-static">Teraszburkolat</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->

            </div>  
            </div>  
            
           
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="update"> MÓDOSÍT </button>
            </div>
        </form>
    </div>
</div>