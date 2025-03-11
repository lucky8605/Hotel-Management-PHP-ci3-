<div class="container p-3 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Add Category<h3>
        </div>
        <form action="<?=base_url()?>hotel/save_category" method="post">
            <div class="col-md-8 mt-2">
                <lable>Category Name  :-</lable>
                <input class="form-control" type="text" name="category_name" required/>
            </div>
            <div class="col-md-12 mt-4 text-center">
                <button class="btn btn-info">SAVE</button>
            </div>
        </form>
    </div>
</div>
<div class="container p-3 mt-5 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Category List<h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($category as $row){
                ?>
                 <tr>
                    <td><?=$i++;?></td>
                    <td><?=$row['category_name']?></td>
                    <td>
                        <a href="<?=base_url()?>hotel/edit_category/<?=$row['category_tbl_id']?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="<?=base_url()?>hotel/delete_category/<?=$row['category_tbl_id']?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                 </tr>
                <?php
                }
               
                ?> 
            </tbody>
        </table>
    </div>
</div>

