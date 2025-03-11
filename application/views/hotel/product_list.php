<div class="container p-3 mt-5 bg-white">
    <div class="row">
        <form action="<?=base_url()?>hotel/product_list" method="get">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h3>Product List<h3>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Type To Search" name="search"/>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-outline-success">Search</button>
                </div>
            </div>
        <form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($product as $row){
                ?>
                 <tr>
                    <td><?=$i++;?></td>
                    <td>
                        <img src="<?=base_url()?>uploads/<?=$row['product_img']?>" style="height: 50px; width: 50px;"
                        />
                    </td>
                    <td><?=$row['product_name']?></td>
                    <td><?=$row['category_name']?></td>
                    <td><?=$row['product_price']?></td>
                    <td>
                        <a href="<?=base_url()?>hotel/edit_product/<?=$row['product_tbl_id']?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="<?=base_url()?>hotel/delete_product/<?=$row['product_tbl_id']?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                 </tr>
                <?php
                }
               
                ?> 
            </tbody>
        </table>
    </div>
</div>