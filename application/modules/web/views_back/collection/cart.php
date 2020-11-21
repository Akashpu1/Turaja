<!-- breadcrumb area start -->
       <div class="breadcrumb-area">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumb-wrap">
                           <nav aria-label="breadcrumb">
                               <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('web/home')?>"><i class="fa fa-home"></i></a></li>

                                   <li class="breadcrumb-item active" aria-current="page"><?php echo $page?></li>
                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- breadcrumb area end -->

       <!-- cart main wrapper start -->
       <div class="cart-main-wrapper section-padding">
           <div class="container">
               <div class="section-bg-color">
                   <div class="row">
                       <div class="col-lg-12">
                           <!-- Cart Table Area -->
                           <div class="cart-table table-responsive " >
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th class="pro-thumbnail">Thumbnail</th>
                                           <th class="pro-title">Product</th>
                                           <th class="pro-price">Price</th>
                                           <th class="pro-quantity">GST</th>
                                           <th class="pro-quantity">Quantity</th>
                                           <th class="pro-subtotal">Total</th>
                                           <th class="pro-remove">Remove</th>
                                       </tr>
                                   </thead>
                                   <tbody id="detail_cart">
                                     <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){    ?>
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
                                           <td class="pro-remove">
                                               <a href="<?php echo base_url('web/collection/removeItem/'.$item["rowid"]); ?>"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                                           </td>
                                       </tr>
                             <?php } }else{ ?>
                           <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                           <?php } ?>

                                   </tbody>
                               </table>
                           </div>
                           <!-- Cart Update Option -->
                           <!-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                               <div class="apply-coupon-wrapper">
                                   <form action="#" method="post" class=" d-block d-md-flex">
                                       <input type="text" placeholder="Enter Your Coupon Code" required />
                                       <button class="btn btn-sqr">Apply Coupon</button>
                                   </form>
                               </div>
                               <div class="cart-update">
                                   <a href="#" class="btn btn-sqr">Update Cart</a>
                               </div>
                           </div> -->
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-5 ml-auto">
                           <!-- Cart Calculation Area -->
                           <div class="cart-calculator-wrapper">
                               <div class="cart-calculate-items">
                                   <h6>Cart Totals</h6>
                                   <div class="table-responsive">
                                       <table class="table">

                                         <?php if($this->cart->total_items() > 0){
                		                        $sub_total=0;
                                            $gst=0;
                													  foreach($cartIvalue as $item){
                                             $data['cartIvalue']=$item;
                														 $sub_total=($sub_total+$item['subtotal']);
                                             $gst = $gst+$item['gst'];
                													 } ?>
                                           <tr>
                                               <td>Sub Total</td>
                                               <td><?php echo '₹'.$sub_total;?></td>
                                           </tr>
                                           <tr>
                                               <td>Tax</td>
                                               <td><?php echo $gst?>%</td>
                                           </tr>
                                           <tr class="total">
                                               <td>Total</td>
                                               <?php $total=0; $total=$sub_total+$gst?>
                                               <td class="total-amount"><?php echo '₹'.$total;?></td>
                                           </tr>
                                         <?php }else{?>
                                             <tr>
                                                 <td>Sub Total</td>
                                                 <td>0</td>
                                             </tr>

                                             <tr>
                                                 <td>Tax </td>
                                                 <td>₹0</td>
                                             </tr>

                                             <tr class="total">
                                                 <td>Total</td>
                                                 <td class="total-amount">0</td>
                                             </tr>


                                        <?php   }
                															 ?>
                                       </table>
                                   </div>
                               </div>
                               <a href="<?php echo base_url('web/Collection/checkout')?>" class="btn btn-sqr d-block">Proceed Checkout</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- cart main wrapper end -->
<!-- <script>
       function updateCartItem(id) {
   					window.location = "<?php echo base_url()?>web/collection/updateItemQty/" + id;
   	    	}
</script> -->
