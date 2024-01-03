<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Cserép kategória módosítása</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=tileCategory&action=update&tileCategoryID=<?php echo $tileCategory->tileCategoryID;?>" method="POST">
            <div class="form-group">
                <label for="tileCategoryName">Cserép kategória</label>
                <input type="text" class="form-control" name="tileCategory[tileCategoryName]" id="tileCategoryName" value="<?php echo $tileCategory->tileCategoryName;?>" required>
            </div>
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="update"> MÓDOSÍT</button>
            </div>
        </form>
    </div>
</div>