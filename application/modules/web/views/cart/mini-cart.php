<div class="offcanvas-menu-inner">
  <a class="btn-close"><i class="ion-android-close"></i></a>
  <?php if (isset($cart)) : ?>
    <div class="minicart-content">
      <div class="minicart-heading">
        <h4>Shopping Cart</h4>
      </div>
      <ul class="minicart-list">
        <?php $subtotal = 0; ?>
        <?php foreach ($cart as $key => $value) : ?>

          <li class="minicart-product">
            <a class="product-item_remove card-item-remove" data-id="<?php echo $key; ?>" href="javascript:void(0)"><i class="ion-android-close"></i></a>
            <div class="product-item_img">
              <img src="<?php echo base_url('uploads/product/') . $value['image'] ?>" alt="<?php echo $value['name'] ?> Product Image">
            </div>
            <div class="product-item_content">
              <a class="product-item_title" href="shop-left-sidebar.html"><?php echo $value['name'] ?></a>
              <?php
              $cPrice = $value['qty'] * $value['price'];
              $subtotal += $subtotal + $cPrice;  ?>
              <span class="product-item_quantity"><?php echo $value['qty'] ?>(<?php echo $value['unit'] ?>) x <?php echo $value['price'] ?></span>
              <?php if (isset($value['size'])) { ?>
                <span class="product-item_quantity">Size : <?php echo $value['size'] ?></span>
              <?php } ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="minicart-item_total">
      <span>Subtotal</span>
      <span class="ammount">Rs. <?php echo number_format($subtotal, 2); ?></span>
    </div>

    <div class="minicart-btn_area">
      <a href="<?php echo base_url('checkout') ?>" class="kenne-btn kenne-btn_fullwidth">Checkout</a>
      <a href="<?php echo base_url('') ?>" class="kenne-btn kenne-btn_fullwidth my-2">Continue Shopping</a>

    </div>
    
  <?php else : ?>
    <div class="minicart-item_total">
      <h4>Empty Cart</h4>
    </div>
  <?php endif; ?>
</div>

<script type="text/javascript">
  $('.card-item-remove').on('click', function() {
    var pid = $(this).attr('data-id');
    $.ajax({
      url: "<?php echo base_url('web/collection/removetocard'); ?>",
      method: "POST",
      data: {
        pid: pid
      },
      success: function(data) {
        if (data) {
          location.reload();
        }
      }
    });
  });

  $('.btn-close').on('click', function() {
    $('#miniCart').removeClass("open");
  });
</script>