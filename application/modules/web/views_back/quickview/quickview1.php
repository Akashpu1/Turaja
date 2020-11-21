
<!-- Slick slider css -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/slick.min.css">
<!-- animate css -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/animate.css">
<!-- Quick view modal start -->
<div class="modal" id="quick_view">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <!-- product details inner end -->
                 <div class="product-details-inner">
                     <div class="row">
                         <div class="col-lg-5">
                              <div class="product-large-slider">
                                 <div class="pro-large-img img-zoom">
                                   <img src="<?php echo base_url('/uploads/product/').$product_details['profile_pic'] ?>" alt="product-details" />
                                 </div>
                            </div>

                             </div>
                            <!-- <div class="pro-nav slick-row-10 slick-arrow-style">-->
                            <!--    <?php foreach($pics as $value):?>-->
                            <!--       <div class="pro-nav-thumb">-->
                            <!--          <img src="<?php echo base_url('/uploads/product/').$value['image'] ?>" alt="product-details" />-->
                            <!--       </div>-->
                            <!--    <?php endforeach;?>-->
                            <!--</div>-->
                         <div class="col-lg-7">
                             <div class="product-details-des">
                                 <div class="manufacturer-name">
                                     <a href="<?php echo base_url('web/shop/product_details/').$product_details['id']; ?>">HasTech</a>
                                 </div>
                                 <h3 class="product-name"><?php echo $product_details['name']?></h3>
                                 <div class="ratings d-flex">
                                     <span><i class="fa fa-star-o"></i></span>
                                     <span><i class="fa fa-star-o"></i></span>
                                     <span><i class="fa fa-star-o"></i></span>
                                     <span><i class="fa fa-star-o"></i></span>
                                     <span><i class="fa fa-star-o"></i></span>
                                     <div class="pro-review">
                                         <span>1 Reviews</span>
                                     </div>
                                 </div>
                                 <div class="price-box">
                                   <?php
                                   $total=$product_details['price'];
                                   $dis=$product_details['discount'];
                                   $dis_pri=  $product_details['price']*($product_details['discount']/100);
                                   $regular=$total-$dis_pri;
                                   ?>
                                     <span class="price-regular">₹<?php echo $regular?></span>
                                     <span class="price-old"><del>₹<?php echo $product_details['price']?></del></span>
                                 </div>
                                 <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                 <div class="product-countdown" data-countdown="2022/02/20"></div>
                                 <div class="availability">
                                     <i class="fa fa-check-circle"></i>
                                     <span>200 in stock</span>
                                 </div>
                                 <p class="pro-desc"><?php echo $product_details['description']?></p>
                                 <div class="quantity-cart-box d-flex align-items-center">
                                     <h6 class="option-title">qty:</h6>
                                     <div class="quantity">
                                         <div class="pro-qty"><input type="text" value="<?php echo $product_details['quantity']?>"></div>
                                     </div>
                                     <div class="action_link">
                                        <a  href="<?php echo base_url('web/Collection/addtocard/').$product_details['id']?>"  class="btn btn-cart" data-toggle="tooltip" data-placement="left" >Add To Cart</a>
                                     </div>
                                 </div>
                                 <div class="useful-links">
                                     <a href="#" data-toggle="tooltip" title="Compare"><i class="pe-7s-refresh-2"></i>compare</a>
                                     <a href="#" data-toggle="tooltip" title="Wishlist"><i class="pe-7s-like"></i>wishlist</a>
                                 </div>
                                 <div class="like-icon">
                                     <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                     <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                     <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                     <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> <!-- product details inner end -->
             </div>
         </div>
     </div>
 </div>
  <!-- Quick view modal end -->
