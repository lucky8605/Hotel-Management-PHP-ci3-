<div class="container shadow p-2">
    <h3 class="text-center m-5">Order Details</h3>
    <div class="row" id="bill-content">
        <div class="col-md-4"><b>Order Date :-</b> <?=$order_info['order_date']?></div>
        <div class="col-md-4"><b>Order Time :-</b> <?=$order_info['order_time']?></div>
        <div class="col-md-4"><b>Order Status -:</b> <span style="color:green;"><?=$order_info['order_status']?></span></div>
        <div class="col-md-12">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $ttl=0;
                    foreach($order_product as $row){
                        $ttl= $ttl + $row['total'];
                    ?>
                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row['product_name']?></td>
                        <td>&#8377; <?=$row['product_price']?></td>
                        <td><?=$row['qty']?></td>
                        <td>&#8377; <?=$row['total']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><h4>Total Bill &#8377;</h4></td>
                        <td class="total"><h4><?=number_format($ttl)?></h4></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="text-end mt-5">
        <button class="btn btn-outline-info" onclick="print_bill()">PRINT</button>
    </div>
</div>

<script>
    function print_bill() {
        const reportContent = document.getElementById('bill-content').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = reportContent;
        setTimeout(() => {
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }, 0);
    }
</script>