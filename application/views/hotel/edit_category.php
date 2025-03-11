<div class="container p-3 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Update Category<h3>
        </div>
        <form action="<?=base_url()?>hotel/update_category" method="post">
            <div class="col-md-8 mt-2">
                <lable>Category Name  :-</lable>
                <input class="form-control" type="hidden" name="category_tbl_id" value="<?=$category['category_tbl_id']?>" required/>
                <input class="form-control" type="text" name="category_name" value="<?=$category['category_name']?>" required/>
            </div>
            <div class="col-md-12 mt-4 text-center">
                <button class="btn btn-info">SAVE</button>
            </div>
        </form>
    </div>
</div>