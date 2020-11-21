<!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('web/home')?>"><i class="fa fa-home"></i></a></li>
                                    <!-- <li class="breadcrumb-item"><a href="shop.html">shop</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $page?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">

                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?php echo base_url('/uploads/product/').$product_details['profile_pic'] ?>" alt="product-details" height="550px;" />
                                        </div>

                                    </div>

                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                      <?php foreach($pics as $value):?>
                                        <div class="pro-nav-thumb">
                                          <img src="<?php echo base_url('/uploads/product/').$value['image'] ?>" alt="product-details" height="100px;" />
                                        </div>
                                     <?php endforeach;?>
                                    </div>

                                </div>
                                <div class="col-lg-7">

                                    <div class="product-details-des">

                                        <div class="manufacturer-name">
                                            <a href="<?php echo base_url('web/home')?>">kashika</a>
                                        </div>
                                        <h3 class="product-name"><?php echo $product_details['name'] ?></h3>
                                        <!-- <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>1 Reviews</span>
                                            </div>
                                        </div> -->
                                        <div class="price-box">
                                          <?php
                                          $total=$product_details['price'];
                                          $dis=$product_details['discount'];
                                          $dis_pri=  $product_details['price']*($product_details['discount']/100);
                                          $regular=$total-$dis_pri;
                                          ?>
                                            <span class="price-regular">₹ <?php echo $regular?></span>
                                            <span class="price-old"><del>₹ <?php echo $product_details['price']?></del></span>
                                        </div>

                                        <p class="pro-desc"><?php echo $product_details['description']?></p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                              <a  href="<?php echo base_url('web/Collection/addtocard/').$product_details['id']?>"  class="btn btn-cart" data-toggle="tooltip" data-placement="left" >Add To Cart</a>

                                            </div>
                                        </div>

                                        <div class="color-option">
                                            <h6 class="option-title">color :</h6>
                                            <ul class="color-categories">
                                                <?php foreach($pics as $value):?>
                                                <li>
                                                    <a style="background:<?php echo $value['color']?>" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <?php endforeach;?>

                                            </ul>
                                        </div>
                                        <div class="useful-links">
                                          <a  href="<?php echo base_url('web/Collection/wishlist/').$product_details['id']?>"  class="wishlist" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two">information</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">

                                                    <p> <?php echo $product_details['description'];?> </p>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <?php foreach($attribute as $value):?>
                                                        <tr>
                                                            <td><?php echo $value['name']?></td>
                                                            <td><?php echo $value['value']?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="assets/img/about/avatar.jpg" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Mar, 2019</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach ($related_Product as $value) {?>


                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?php echo base_url('web/shop/product_details/').$value['id'] ?>">

                                        <img class="pri-img" src="<?php echo base_url('/uploads/product/').$value['profile_pic'] ?>" alt="product">
                                        <img class="sec-img" src="<?php echo base_url('/uploads/product/').$value['profile_pic'] ?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span><?php echo $value['discount']?>%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="<?php echo base_url('web/Collection/wishlist/').$value['id']?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>

                                        <a id="<?php echo $value['id']?>" class="wishlist"><i class="pe-7s-search"></i></a>
                                    </div>
                                    <div class="cart-hover">
                                        <a  href="<?php echo base_url('web/Collection/addtocard/').$value['id']?>"  class="btn btn-cart" data-toggle="tooltip" data-placement="left" >Add To Cart</a>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">

                                    </div>

                                    <h6 class="product-name">
                                        <a href="<?php echo base_url('web/shop/product_details')?>"><?php echo $value['name']?></a>
                                    </h6>
                                    <div class="price-box">
                                      <?php
                                      $total=$value['price'];
                                      $dis=$value['discount'];
                                      $dis_pri=  $value['price']*($value['discount']/100);
                                      $regular=$total-$dis_pri;
                                      ?>
                                        <span class="price-regular">₹ <?php echo $regular?></span>
                                        <span class="price-old"><del>₹ <?php echo $value['price']?></del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
