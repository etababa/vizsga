

<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új teraszburkolat felvitel</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=terracefloor&action=create" method="POST">
        <div class="form-group">
                <label for="terracefloor[terracefloorCategoryID]">Teraszburkolat kategória*</label>
                <select class="form-select" name="terracefloor[terracefloorCategoryID]" id="terracefloor[terracefloorCategoryID]">
                    <?php
                        foreach ($terracefloorCategories as $terracefloorCategory) {
                           echo "<option value=" .$terracefloorCategory->terracefloorCategoryID ."> $terracefloorCategory->terracefloorCategoryName </option>";
                        } 
                    ?>
                </select>
            <div class="form-group">
                <label for="thickness">Teraszburkolat vastagság mm*</label>
                <input type="text" class="form-control" name="terracefloor[thickness]" id="thickness" required>
            </div>
            <div class="form-group">
                <label for="width">Teraszburkolat szélesség mm*</label>
                <input type="text" class="form-control" name="terracefloor[width]" id="width" required>
            </div>  
            <div class="form-group">
                <label for="length">Teraszburkolat hosszúság mm*</label>
                <input type="text" class="form-control" name="terracefloor[length]" id="length" required>
            </div>
            <div class="form-group">
                <label for="terracefloorColor">Teraszburkolat szín*</label>
                <input type="text" class="form-control" name="terracefloor[terracefloorColor]" id="terracefloorColor" required>
            </div>
            <div class="form-group">
            <label for="materialID">Építőanyag kategória*</label>
            <input type="hidden" name="materialID" value="6"> <!-- Itt adjuk meg az alapértelmezett értéket -->
    <p class="form-control-static">Teraszburkolat</p> <!-- Itt jelenítjük meg az alapértelmezett kategória nevét -->
</div>
            </div>  
            </div>  
            
           
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-2)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>