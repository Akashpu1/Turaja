<!-- breadcrumb area start -->
       <div class="breadcrumb-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumb-wrap">
                           <nav aria-label="breadcrumb">
                               <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('web/home')?>"><i class="fa fa-home"></i></a></li>
                                    <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('web/shop/product_details/').$product_details['id']?>">shop</a></li> -->
                                   <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- breadcrumb area end -->

       <!-- wishlist main wrapper start -->
       <div class="wishlist-main-wrapper section-padding">
           <div class="container">
               <!-- Wishlist Page Content Start -->
               <div class="section-bg-color">
                   <div class="row">
                       <div class="col-lg-12">
                           <!-- Wishlist Table Area -->
                           <div class="cart-table table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th class="pro-thumbnail">Thumbnail</th>
                                           <th class="pro-title">Product</th>
                                           <th class="pro-price">Price</th>
                                           <th class="pro-price">Tax</th>
                                           <th class="pro-quantity">Quantity</th>
                                           <th class="pro-subtotal">Subtotal</th>
                                           <th class="pro-remove">Remove</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                      <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                              <tr>
                                  <td>
                                      <?php $imageURL = !empty($item["image"])?base_url('uploads/product/'.$item["image"]):base_url('/assets/img/product/product-1.jpg'); ?>
                                      <img src="<?php echo $imageURL; ?>" width="50"/>
                                  </td>
                                  <td><?php echo $item["name"]; ?></td>
                                  <td><?php echo '₹'.$item["price"]; ?></td>
                                  <td><?php echo $item["gst"].'%'; ?></td>
                                  <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                  <td><?php echo '₹'.$item["subtotal"]; ?></td>
                                  <td  class="pro-remove">
                                      <a href="<?php echo base_url('web/collection/wish/'.$item["rowid"]); ?>"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                                  </td>
                              </tr>
                              <?php } }else{ ?>
                            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                            <?php } ?>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- Wishlist Page Content End -->
           </div>
       </div>
       <!-- wishlist main wrapper end -->

       <script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('web/Collection/updateItemQty/'); ?>",
  {rowid:rowid, qty:obj.value},
   function(resp){

		if(resp){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>
