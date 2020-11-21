<div class="modal fade modal-wrapper show" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area sp-area row">
                    <div class="col-lg-5">
                        <div class="sp-img_area">
                            <div class="kenne-element-carousel sp-img_slider slick-img-slider" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                <div class="single-slide red">
                                    <img src="<?php echo base_url('uploads/product/') . $product[0]['profile_pic'] ?>" alt="Kenne's Product Image">
                                </div>

                            </div>
                            <div class="kenne-element-carousel sp-img_slider-nav arrow-style-2 arrow-style-3" data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider",
                                   "focusOnSelect": true,
                                   "arrows" : true,
                                   "spaceBetween": 30
                                  }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                <div class="single-slide red">
                                    <img src="<?php echo base_url('uploads/product/') . $product[0]['profile_pic1'] ?>" alt="Kenne's Product Thumnail">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="<?php echo base_url('product?pid=') . $product[0]['id'] ?>"><?php echo substr($product[0]['name'], 0, 18); ?></a></h5>
                            </div>

                            <div class="price-box">
                                <span class="new-price new-price-2">Rs. <?php echo  $product[0]['price'] ?></span>
                            </div>
                            <div class="sp-essential_stuff">
                                <p><?php echo  $product[0]['description'] ?></p>
                            </div>

                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="kenne-group_btn">
                                <ul>
                                    <li><a href="javascript:void(0)" class="minicart" data-id="<?php echo $product[0]['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i>Add To Cart</a></li>
                                </ul>
                            </div>

                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>

                                    <li class="instagram">
                                        <a href="https://instagram.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.close', function() {
        $("#exampleModalCenter").remove();

    });
</script>