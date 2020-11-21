<section class="slider-area">
    <?php if (isset($slider)) : ?>
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <?php foreach ($slider as $value) : ?>
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="<?php echo base_url($value['source']); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title"><?php echo $value['heading'] ?></h2>
                                        <h4 class="slide-desc"><?php echo $value['details'] ?></h4>
                                        <a href="<?php echo base_url($value['buttonUrl']); ?>" class="btn btn-hero">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->

            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1">
                                    <h2 class="slide-title">Our favourite <span>Collection</span></h2>
                                    <h4 class="slide-desc">Georgettes for Spring</h4>
                                    <a href="shop.html" class="btn btn-hero">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>
</section>

<br><br><br>

<!-- banner statistics area start -->
<div class="banner-statistics-area">
    <div class="container">
        <div class="row row-20 mtn-20">
            <?php foreach ($category as $value) : ?>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="<?php echo base_url($value['source']) ?>" style="height:350px;width:100%" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h5 class="banner-text1"><?php echo $value['name'] ?></h5>
                            <a href="<?php echo base_url('web/shop/shop_by_category/') . $value['id'] ?>" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- banner statistics area end -->

<!-- product area start -->
<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">New Arrivals</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            <?php foreach ($category as $key => $value) : ?>
                                <?php if ($key < 1) : ?>
                                    <li><a href="#<?php echo strtolower($value['name']) ?>" class="active" data-toggle="tab"><?php echo $value['name'] ?></a></li>
                                <?php else : ?>
                                    <li><a href="#<?php echo strtolower($value['name']) ?>" data-toggle="tab"><?php echo $value['name'] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- product tab menu end -->

                    <!-- product tab content start -->
                    <div class="tab-content data_body">
                        <?php foreach ($category as $key => $catdata) : ?>
                            <?php if ($key < 1) : ?>
                                <div class="tab-pane fade show active" id="<?php echo strtolower($catdata['name']) ?>">
                                <?php else : ?>
                                    <div class="tab-pane fade show" id="<?php echo strtolower($catdata['name']) ?>">
                                    <?php endif; ?>
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        <?php foreach ($product as $value) : ?>
                                            <?php if ($catdata['name'] == $value['category_name']) : ?>
                                                <div class="product-item">
                                                    <figure class="product-thumb">
                                                        <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                                            <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                                            <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                                        </a>
                                                        <div class="product-badge">
                                                            <div class="product-label new">
                                                                <span>new</span>
                                                            </div>
                                                            <div class="product-label discount">
                                                                <span><?php echo $value['discount'] ?>%</span>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" class="wishlist" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                                            <a id="<?php echo $value['id'] ?>" class="wishlist"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <div class="cart-hover">
                                                            <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left"> Add To Cart</a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-caption text-center">
                                                        <div class="product-identity">

                                                        </div>

                                                        <h6 class="product-name">
                                                            <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                                        </h6>
                                                        <div class="price-box">
                                                            <?php
                                                            $total = $value['price'];
                                                            $dis = $value['discount'];
                                                            $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                                            $regular = $total - $dis_pri;
                                                            ?>
                                                            <span class="price-regular">₹<?php echo $regular ?></span>
                                                            <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <!-- product item end -->
                                        <?php endforeach; ?>
                                    </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- product area end -->

<!-- featured product area start -->
<section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Our products</h2>
                    <p class="sub-title">Add featured products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    <!-- product item start -->
                    <?php foreach ($product as $value) : ?>
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                    <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                    <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span><?php echo $value['discount'] ?>%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                    <a id="<?php echo $value['id'] ?>" data-toggle="modal" class="wishlist" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <!-- <button class="btn btn-cart">add to cart</button> -->
                                    <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left">Add To Cart</a>

                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">

                                </div>

                                <h6 class="product-name">
                                    <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                    $total = $value['price'];
                                    $dis = $value['discount'];
                                    $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                    $regular = $total - $dis_pri;
                                    ?>
                                    <span class="price-regular">₹<?php echo $regular ?></span>
                                    <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured product area end -->
<!-- related products area start -->
<section class="related-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Sarees</h2>

                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                    <?php foreach ($carousel_saree as  $value) {
                        # code...
                    ?>
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                    <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                    <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span><?php echo $value['discount'] ?>%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                    <a id="<?php echo $value['id'] ?>" data-toggle="modal" class="wishlist" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <!-- <button class="btn btn-cart">add to cart</button> -->
                                    <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left">Add To Cart</a>

                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">

                                </div>

                                <h6 class="product-name">
                                    <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                    $total = $value['price'];
                                    $dis = $value['discount'];
                                    $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                    $regular = $total - $dis_pri;
                                    ?>
                                    <span class="price-regular">₹<?php echo $regular ?></span>
                                    <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php } ?>

                </div>
            </div>
            <div class="container text-center">
                <a href="<?php echo base_url('web/shop/shop_by_category/10') ?>" class="btn btn-hero">View More </a>

            </div>
        </div>
    </div>

</section>
<section class="related-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Suit</h2>

                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                    <?php foreach ($carousel_suit as  $value) {
                        # code...
                    ?>
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                    <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                    <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span><?php echo $value['discount'] ?>%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                    <a id="<?php echo $value['id'] ?>" data-toggle="modal" class="wishlist" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <!-- <button class="btn btn-cart">add to cart</button> -->
                                    <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left">Add To Cart</a>

                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">

                                </div>

                                <h6 class="product-name">
                                    <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                    $total = $value['price'];
                                    $dis = $value['discount'];
                                    $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                    $regular = $total - $dis_pri;
                                    ?>
                                    <span class="price-regular">₹<?php echo $regular ?></span>
                                    <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php } ?>

                </div>
            </div>
            <div class="container text-center">
                <a href="<?php echo base_url('web/shop/shop_by_category/7') ?>" class="btn btn-hero">View More </a>

            </div>
        </div>
    </div>

</section>
<section class="related-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Dupatta</h2>

                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                    <?php foreach ($carousel_dupatta as  $value) {
                        # code...
                    ?>
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                    <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                    <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span><?php echo $value['discount'] ?>%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                    <a id="<?php echo $value['id'] ?>" data-toggle="modal" class="wishlist" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <!-- <button class="btn btn-cart">add to cart</button> -->
                                    <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left">Add To Cart</a>

                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">

                                </div>

                                <h6 class="product-name">
                                    <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                    $total = $value['price'];
                                    $dis = $value['discount'];
                                    $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                    $regular = $total - $dis_pri;
                                    ?>
                                    <span class="price-regular">₹<?php echo $regular ?></span>
                                    <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php } ?>

                </div>
            </div>
            <div class="container text-center">
                <a href="<?php echo base_url('web/shop/shop_by_category/8') ?>" class="btn btn-hero">View More </a>

            </div>
        </div>
    </div>

</section>
<section class="related-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Lehenga</h2>

                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                    <?php foreach ($carousel_lehenga as  $value) {
                        # code...
                    ?>
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                    <img class="pri-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                    <img class="sec-img" src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span><?php echo $value['discount'] ?>%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="<?php echo base_url('web/Collection/wishlist/') . $value['id'] ?>" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like wish"></i></a>

                                    <a id="<?php echo $value['id'] ?>" data-toggle="modal" class="wishlist" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <!-- <button class="btn btn-cart">add to cart</button> -->
                                    <a href="<?php echo base_url('web/Collection/addtocard/') . $value['id'] ?>" class="btn btn-cart" data-toggle="tooltip" data-placement="left">Add To Cart</a>

                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">

                                </div>

                                <h6 class="product-name">
                                    <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php
                                    $total = $value['price'];
                                    $dis = $value['discount'];
                                    $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                    $regular = $total - $dis_pri;
                                    ?>
                                    <span class="price-regular">₹<?php echo $regular ?></span>
                                    <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php } ?>

                </div>
            </div>
            <div class="container text-center">
                <a href="<?php echo base_url('web/shop/shop_by_category/9') ?>" class="btn btn-hero">View More </a>

            </div>
        </div>
    </div>

</section>
<!-- related products area end -->
<!-- testimonial area start -->
<section class="testimonial-area section-padding bg-img" data-bg="<?php echo base_url() ?>/assets/img/testimonial/testimonials-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">testimonials</h2>
                    <p class="sub-title">What they say</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-thumb-wrapper">
                    <div class="testimonial-thumb-carousel">
                        <?php foreach ($testimonial as $value) : ?>
                            <div class="testimonial-thumb">
                                <img src="<?php echo base_url('uploads/testimonial/') . $value['image'] ?>" alt="testimonial-thumb">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="testimonial-content-wrapper">
                    <div class="testimonial-content-carousel">
                        <?php foreach ($testimonial as $value) : ?>
                            <div class="testimonial-content">
                                <p><?php echo $value['discription'] ?></p>
                                <div class="ratings">

                                    <?php for ($i = 1; $i <= $value['ratting']; $i++) { ?>
                                        <span><i class="fa fa-star checked"></i></span>
                                        <?php }
                                    if ($value['ratting'] < 5) {
                                        $rat = 5 - $value['ratting'];
                                        for ($i = 1; $i <= $rat; $i++) { ?>
                                            <span><i class="fa fa-star-o"></i></span>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <h5 class="testimonial-author"><?php echo $value['name'] ?></h5>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->

<!-- group product start -->
<section class="group-product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php foreach ($category_data as $value) : ?>
                    <div class="group-product-banner">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="<?php echo base_url($value['source']) ?>" alt="product banner" height="530px;">
                            </a>
                            <div class="banner-content banner-content_style3 text-center">
                                <h6 class="banner-text1 text-center">BEAUTIFUL</h6>
                                <h2 class="banner-text2 text-center"><?php echo $value['name'] ?></h2>
                                <a href="<?php echo base_url('web/shop/shop_by_category/') . $value['id'] ?>" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-3">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append">
                        <h4>best seller product</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            <!-- group list item start -->
                            <?php foreach ($Best_Sell_product as $value) : ?>
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                                <img src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a></h5>
                                            <div class="price-box">
                                                <?php
                                                $total = $value['price'];
                                                $dis = $value['discount'];
                                                $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                                $regular = $total - $dis_pri;
                                                ?>
                                                <span class="price-regular">₹<?php echo $regular ?></span>
                                                <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- group list item end -->


                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append">
                        <h4>on-sale product</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            <!-- group list item start -->
                            <?php foreach ($on_Sell_product as $value) : ?>
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>">
                                                <img src="<?php echo base_url('/uploads/product/') . $value['profile_pic'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="<?php echo base_url('web/shop/product_details/') . $value['id'] ?>"><?php echo $value['name'] ?></a></h5>
                                            <div class="price-box">
                                                <?php
                                                $total = $value['price'];
                                                $dis = $value['discount'];
                                                $dis_pri =  $value['price'] * ($value['discount'] / 100);
                                                $regular = $total - $dis_pri;
                                                ?>
                                                <span class="price-regular">₹<?php echo $regular ?></span>
                                                <span class="price-old"><del>₹<?php echo $value['price'] ?></del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- group list item end -->

                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- group product end -->

<!-- latest blog area start -->
<section class="latest-blog-area section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">latest blogs</h2>
                    <p class="sub-title">There are latest blog posts</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                    <!-- blog post item start -->
                    <?php foreach ($article_data as $value) : ?>
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="<?php echo base_url() . $value['image'] ?>" alt="blog image" class="img-circle" style="width:250px;height:250px;">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p><?php echo my_date_show($value['created_at']) ?> | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html"><?php echo $value['content'] ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- blog post item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('home_js.php') ?>
