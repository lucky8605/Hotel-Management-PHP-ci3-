<div class="container p-3 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Add Product<h3>
        </div>
        <form action="<?=base_url()?>hotel/save_product" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <lable>Category :-</lable>
                    <select class="form-control" type="text" name="category_tbl_id" required>
                        <option value="" selected disabled>Select Category</option>
                        <?php
                        foreach($category as $row){
                        ?>
                        <option value="<?=$row['category_tbl_id']?>"><?=$row['category_name']?></option>
                        <?php
                         }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mt-2">
                    <lable>Product Name  :-</lable>
                    <input class="form-control" type="text" name="product_name" required/>
                </div>
                <div class="col-md-6 mt-4">
                    <lable>Product Price  :-</lable>
                    <input class="form-control" type="number" name="product_price" required/>
                </div>
                <div class="col-md-6 mt-4">
                    <lable>Product Image  :-</lable>
                    <input class="form-control" type="file" name="product_img" required/>
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <button class="btn btn-info">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>