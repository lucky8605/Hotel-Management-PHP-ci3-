<div class="container p-3 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Add Table<h3>
        </div>
        <form action="<?=base_url()?>hotel/update_table" method="post">
            <div class="col-md-8 mt-2">
                <lable>Table No  :-</lable>
                <input class="form-control" type="hidden" name="table_tbl_id" value="<?=$table['table_tbl_id'];?>"required/>
                <input class="form-control" type="text" name="table_no" value="<?=$table['table_no'];?>"required/>
            </div>
            <div class="col-md-12 mt-4 text-center">
                <button class="btn btn-info">SAVE</button>
            </div>
        </form>
    </div>
</div>