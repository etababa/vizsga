<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Tetőlemez kategória törlése</h1>
    </div>
</div>
<div class="row">
    <div class="container d-flex align-item-center justify-content-center">
        <form action="index.php?controller=roofplateCategory&action=del&roofplateCategoryID=<?php echo $roofplateCategory->roofplateCategoryID;?> " method="POST">
            <div class="d-flex pt-5">
                <a href="javascript:history.go(-1)" class="btn btn-warning"> Vissza </a>
                &nbsp;<h3> Azonosító: <?php echo $roofplateCategory->roofplateCategoryID; ?></h3>&nbsp;
                <button class="btn btn-danger" name="delete" type="submit"> Töröl </button>
            </div>
        </form>
    </div>
</div>