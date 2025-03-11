<div class="container">
    <div class="row">
        <?php
        foreach($table as $row){
            $sql="SELECT * ,
            (SELECT sum(total) FROM order_product_tbl WHERE order_product_tbl.order_tbl_id = order_tbl.order_tbl_id) as ttl
            FROM order_tbl WHERE order_status = 'active' AND table_tbl_id = '".$row['table_tbl_id']."'";
            
            $data=$this->db->query($sql)->result_array();

        
        ?>
        <div class="col-md-3">
            <div class="card shadow p-2">
                <div class="card-head text-center">
                    <h6>
                        <?=$row['table_no'];?>
                    </h6>
                </div>
                <div class="card-body">
                    <h6 class="">Amount -:</h6>
                    <h5 class="card-text text-center" style="color:green;">
                        <?php
                        if(isset($data[0]['ttl'])){
                            echo "₹".$data[0]['ttl'];
                        }
                        else{
                            echo '<p style="color:red; font-size:0.8rem;">NoT Order Active</P>';
                        }
                        ?>
                    </h5>
                    
                </div>
                <?php if(isset($data[0]['ttl'])): ?>
                <div class="card-footer text-center mt-3">
                    <a href="<?=base_url()?>hotel/order_details/<?=$data[0]['order_tbl_id']?>">
                        <button class="btn btn-primary btn-sm">Details</button>
                    </a>
                    <a href="<?=base_url()?>hotel/print_bill/<?=$data[0]['order_tbl_id']?>">
                        <button class="btn btn-dark btn-sm">Print Bill</button>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
        </div>
        <?php
        }
        ?>
    </div>
</div>