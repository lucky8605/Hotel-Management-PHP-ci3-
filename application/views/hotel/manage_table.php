<div class="container p-3 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h3>Add Table<h3>
        </div>
        <form action="<?=base_url()?>hotel/save_table" method="post">
            <div class="col-md-8 mt-2">
                <lable>Table No  :-</lable>
                <input class="form-control" type="text" name="table_no" required/>
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
            <h3>Table List<h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>QR</th>
                    <th>Table No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($table as $row){
                ?>
                 <tr>
                    <td><?=$i++;?></td>
                    <td>
                        <button type="button" class="btn btn-outline-info" onclick="show_qr(<?=$row['table_tbl_id']?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">QR</button>
                    </td>
                    <td><?=$row['table_no']?></td>
                    <td>
                        <a href="<?=base_url()?>hotel/edit_table/<?=$row['table_tbl_id']?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="<?=base_url()?>hotel/delete_table/<?=$row['table_tbl_id']?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                 </tr>
                <?php
                }
               
                ?> 
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Table No - <span id="modalTableNo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center" id="qr-content">
            <div id="qrcode"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" onclick="printDiv()">PRINT</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
  function show_qr(table_tbl_id) {
    // Update modal title with the table_tbl_id
    document.getElementById('modalTableNo').textContent = table_tbl_id;

    // Clear any existing QR code
    document.getElementById('qrcode').innerHTML = '';
    new QRCode(document.getElementById('qrcode'), "<?=base_url()?>user/index?table_no=" + table_tbl_id);

  }

  // print 
  function printDiv() {
        const reportContent = document.getElementById('qr-content').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = reportContent;
        setTimeout(() => {
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }, 0);
    }
</script>












