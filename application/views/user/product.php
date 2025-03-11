  
  <style>
    /* Style for product layout */
    .product-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin: 10px 0;
      background: #f9f9f9;
    }

    .product-box img {
      max-width: 100px; /* Set fixed size for image */
      height: auto;
      margin-right: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .product-details {
      flex: 1;
      margin-right: 20px;
    }

    .product-name {
      font-weight: bold;
      font-size: 1.2rem;
      margin: 0;
    }

    .product-price {
      margin: 5px 0;
      color: #28a745;
      font-size: 2rem;
    }

    .cart-controls {
      display: flex;
      align-items: center;
    }

    .cart-controls button {
      font-size: 1.2rem;
      padding: 5px 10px;
    }

    .cart-controls input {
      width: 50px;
      text-align: center;
      font-size: 1rem;
      margin: 0 10px;
    }

    /* Button active state */
    .btn.active {
      background-color: #28a745 !important;
      color: #fff !important;
    }
  </style>
  <div class="container mt-4">
    <h2 class="text-center mb-4">Our Specials</h2>
    <!-- Category Buttons -->
    <div class="mb-4 text-center">
      <?php foreach ($category as $index => $row) { ?>
        <button
          class="btn btn-outline-success m-1 change <?= $index === 0 ? 'active' : '' ?>"
          onclick="showProducts(<?=$row['category_tbl_id']?>)"
          id="cat-btn-<?=$row['category_tbl_id']?>"
        >
          <?=$row['category_name']?>
        </button>
      <?php } ?>
    </div>
    <!-- Products -->
    <div>
      <?php foreach ($products as $row) { 
        $qty=0;
        if(isset($_SESSION['cart'][$row['product_tbl_id']])){
            $qty=$_SESSION['cart'][$row['product_tbl_id']];
          }  
         else {
          $qty=0;
         }
        ?>
        <div class="product-box box box_cat<?=$row['category_tbl_id']?>" style="display: none;">
          <img src="<?=base_url()?>uploads/<?=$row['product_img']?>" alt="<?=$row['product_name']?>" />
          <div class="product-details">
            <h4 class="product-name"><?=$row['product_name']?></h4>
            <h4 class="product-price">₹ <?=$row['product_price']?></h4>
          </div>
          <div class="cart-controls">
            <button class="btn btn-outline-secondary" onclick="decreaseQuantity(this,<?=$row['product_tbl_id']?>)">-</button>
            <input type="number" value="<?=$qty?>" min="0">
            <button class="btn btn-outline-secondary" onclick="increaseQuantity(this,<?=$row['product_tbl_id']?>)">+</button>
          </div>
        </div>
      <?php } ?>
    </div>
    <a href="<?=base_url()?>user/send_kitchen">
      <button style="width: 90%;z-index: index 9999;bottom:10px;left:5%; height:40px;" class="btn btn-info btn-lg m-5">SEND TO KITCHEN</button>
    </a>
  </div>

  <script>
    // Show products based on category
    function showProducts(categoryId) {
      // Hide all products
      document.querySelectorAll('.box').forEach(box => {
        box.style.display = 'none';
      });

      // Show selected category's products
      document.querySelectorAll('.box_cat' + categoryId).forEach(box => {
        box.style.display = 'flex';
      });

      // Remove active class from all buttons
      document.querySelectorAll('.btn').forEach(btn => {
        btn.classList.remove('active');
      });

      // Add active class to clicked button
      document.getElementById('cat-btn-' + categoryId).classList.add('active');
    }

    // Show products of the first category by default
    document.addEventListener('DOMContentLoaded', () => {
      const firstCategoryButton = document.querySelector('.btn.active');
      if (firstCategoryButton) {
        const firstCategoryId = firstCategoryButton.id.split('-')[2];
        showProducts(firstCategoryId);
      }
    });

    // Increase quantity
    function increaseQuantity(button,product_tbl_id) {
      const input = button.previousElementSibling;
      input.value = parseInt(input.value) + 1;
      
      $.ajax(
        {
          "url":"<?=base_url()?>user/add_product_in_session",
          "data":{"product_tbl_id":product_tbl_id,"qty":input.value}

         }).done(function(res){
          console.log(res);
         });
    }

    // Decrease quantity
    function decreaseQuantity(button,product_tbl_id) {
      const input = button.nextElementSibling;
      if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;

        $.ajax(
        {
          "url":"<?=base_url()?>user/add_product_in_session",
          "data":{"product_tbl_id":product_tbl_id,"qty":input.value}

         }).done(function(res){
          console.log(res);
         });
      }
    }
  </script>

  
