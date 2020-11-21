<?php //pre($productlist); ?>
<?php if(isset($productlist) && $productlist!=""){
foreach ($productlist as  $value): ?>
<div class="col-lg-4 col-md-4 col-sm-6 kshort" data-title="<?php echo $value['name']; ?>" data-price="<?php echo $value['price']; ?>">
  <div class="product-item">
    <div class="single-product">
      <div class="product-img">
        <a href="<?php echo base_url('product?pid=').$value['id']; ?>">
          <img class="primary-img" src="<?php echo base_url('uploads/product/').$value['profile_pic']; ?>" alt="<?php echo $value['name'] ?> Product Image">
          <img class="secondary-img" src="<?php echo base_url('uploads/product/').$value['profile_pic1']; ?>" alt="<?php echo $value['name'] ?> Product Image">
        </a>
        <div class="add-actions">
          <ul>
            <li class="quick-view-btn" data-id='<?php echo $value['id']; ?>' data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
            </li>
            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
            </li>
            <li class="minicart-wrap"><a href="#miniCart" class="minicart minicart-btn toolbar-btn" data-toggle="tooltip" data-id="<?php echo $value['id']; ?>" data-placement="right" title="Add To cart"> <i class="ion-bag"></i></a>
            </li>


          </ul>
        </div>
      </div>
      <div class="product-content">
        <div class="product-desc_info">
          <h3 class="product-name"><a href="<?php echo base_url('product?pid=').$value['id']; ?>"><?php echo $value['name'] ?></a></h3>
          <div class="price-box">
            <span class="new-price"><?php echo number_format(($value['price'] - $value['discount']), 2) ?></span>
            <span class="old-price"><?php echo number_format($value['price'], 2) ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $output; ?>
<?php endforeach;
}
?>


