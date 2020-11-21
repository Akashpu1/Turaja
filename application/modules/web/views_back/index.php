<?php include 'layout/css.php'; ?>
<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <?php foreach ($setting as $value) : ?>
                            <a href="<?php echo base_url('web/home') ?>">
                                <img src="<?php echo base_url('uploads/product/').$value['logo'] ?>" alt="Brand Logo"
                                    height="70px;">
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- start logo area -->
                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="active"><a href="<?php echo base_url('web/home') ?>">Home</a></li>

                                        <li class="position-static"><a href="">Shop <i class="fa fa-angle-down"></i></a>

                                            <ul class="megamenu dropdown new-item-nav">
                                                <li class="mega-title"><span>New Arrival</span>
                                                    <ul><?php foreach ($Menu_shop_text as $row1) { ?>
                                                        <li>
															<a href="<?php echo $row1['url'] ?>"><?php echo $row1['title'] ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><span>Clothing</span>
                                                    <ul><?php foreach ($category as $row) { ?>
                                                        <li>
															<a  href="<?php echo base_url('web/shop/shop_by_category/').$row['id'] ?>"><?php echo $row['name'] ?></a>
                                                        </li>

                                                        <?php } ?>
                                                    </ul>
                                                </li>

                                                <?php foreach ($Menu_shop_image as $row) { ?>
                                                <li class="megamenu-banners">
                                                    <a href="<?php echo $row['url'] ?>">
                                                        <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                         alt="<?php echo $row['image'] ?>">
                                                        <div class='link-item'>
                                                            <?php echo $row['title'] ?>
                                                        </div>
                                                    </a>
                                                </li>

                                                <?php } ?>
                                            </ul>
                                        </li>

                                        <li class="position-static"><a href="">Collection <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown new-item-nav-collect">
                                                <li class="mega-title"><span>New Arrival</span>
                                                    <ul><?php foreach ($Menu_coll_text as $row1) { ?>
                                                        <li><a
                                                                href="<?php echo base_url('/web/') . $row1['url']?>"><?php echo $row1['title'] ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <?php foreach ($Menu_coll_image as $row) { ?>

                                                <li class="megamenu-banners">
                                                    <a href="<?php echo $row['url'] ?>">
                                                        <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                             alt="<?php echo $row['image'] ?>">
                                                        <div class='link-item'>
                                                            <?php echo $row['title'] ?>
                                                        </div>
                                                    </a>
                                                </li>

                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li class="position-static"><a href="">Technique <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown new-item-nav-collect">
                                                <li class="mega-title"><span>New Arrival</span>
                                                    <ul><?php foreach ($Menu_tech_text as $row1) { ?>
                                                        <li><a
                                                                href="<?php echo base_url('/web/') . $row1['url'] ?>"><?php echo $row1['title'] ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <?php foreach ($Menu_tech_image as $row) { ?>

                                                <li class="megamenu-banners">

                                                    <a href="<?php echo $row['url'] ?>">

                                                        <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                            style="width:150px " alt="<?php echo $row['image'] ?>">
                                                        <div class='list-link'>
                                                            <?php echo $row['title'] ?>
                                                        </div>

                                                    </a>
                                                </li>

                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('web/home/about') ?>">About Us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div
                            class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i
                                        class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                    <input type="text" placeholder="Search entire store hire"
                                        class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            
											<?php 
											if (check()) {
												// if ($this->session->userdata('email')) { ?>
											<li><a href="<?php echo base_url('admin/yourorder') ?>">Your Order</a></li>
											<li><a href="<?php echo base_url('Authentication/logout') ?>">Logout</a>
											<?php 
											// }
											}else{?>
											<li><a href="<?php echo base_url('auth') ?>">login</a></li>
                                            <li><a href="<?php echo base_url('join') ?>">Register</a></li>

											<?php } ?>
                                            
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <div class="notification"><?php echo $this->cart->total_items(); ?></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <?php foreach ($setting as $value) : ?>
                            <a href="<?php echo base_url('web/home') ?>">
                                <img src="<?php echo base_url('uploads/product/').$value['logo'] ?>" alt="Brand Logo">
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="<?php echo base_url('web/collection/cart') ?>"><i
                                        class="fa fa-shopping-cart"></i>

                                    <div class="notification"><?php echo $this->cart->total_items(); ?></div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="active"><a href="<?php echo base_url('web/home') ?>">Home</a></li>
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title menu-item-has-children"><span>New Arrival</span>
                                        <ul class="dropdown">
                                            <?php foreach ($Menu_shop_text as $row1) { ?>
                                            <li><a href="<?php echo $row1['url'] ?>"><?php echo $row1['title'] ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <li class="mega-title menu-item-has-children"><span>Clothing</span>
                                        <ul class="dropdown"><?php foreach ($category as $row) { ?>
                                            <li><a
                                                    href="<?php echo base_url('web/shop/shop_by_category/').$row['id'] ?>"><?php echo $row['name'] ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php foreach ($Menu_shop_image as $row) { ?>
                                    <li class="mega-title menu-item-has-children"><span>column </span>
                                        <a href="<?php echo $row['url'] ?>">
                                            <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                style="width:150px " alt="<?php echo $row['image'] ?>">
                                            <div class='link-item'>
                                                <?php echo $row['title'] ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="menu-item-has-children"><a href="#">Collection</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title menu-item-has-children"><span>New Arrival</span>
                                        <ul class="dropdown"><?php foreach ($Menu_coll_text as $row1) { ?>
                                            <li><a
                                                    href="<?php echo base_url('/web/') . $row1['url']?>"><?php echo $row1['title'] ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php foreach ($Menu_coll_image as $row) { ?>
                                    <li class="mega-title menu-item-has-children"><span> column </span>
                                        <a href="<?php echo $row['url'] ?>">

                                            <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                style="width:150px " alt="<?php echo $row['image'] ?>">

                                            <div class='container '>
                                                <?php echo $row['title'] ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Technique</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title menu-item-has-children"><span>New Arrival</span>
                                        <ul class="dropdown"><?php foreach ($Menu_tech_text as $row1) { ?>
                                            <li><a
                                                    href="<?php echo base_url('/web/') . $row1['url'] ?>"><?php echo $row1['title'] ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php foreach ($Menu_tech_image as $row) { ?>
                                    <li class="mega-title menu-item-has-children"><span>column </span>
                                        <a href="<?php echo $row['url'] ?>">
                                            <div class='container'>
                                                <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>"
                                                    style="width:150px " alt="<?php echo $row['image'] ?>">
                                            </div>
                                            <div class='container '>
                                                <?php echo $row['title'] ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('web/home/about') ?>">About Us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">

                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="<?php echo base_url('auth') ?>">login</a>
                                    <a class="dropdown-item" href="<?php echo base_url('join') ?>">Register</a>
                                    <?php if (check()) {
												 	if ($this->session->userdata('email')) { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/yourorder') ?>">Your
                                        Order</a>
                                    <?php }
												 } ?>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('Authentication/logout') ?>">Logout</a>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>


                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <?php foreach ($setting as $value) : ?>
                            <li><i class="pe-7s-home"></i><?php echo $value['address'] ?></li>
                            <li><i class="pe-7s-mail"></i> <a
                                    href="<?php echo $value['email'] ?>"><?php echo $value['email'] ?> </a></li>
                            <li><i class="pe-7s-call"></i> <a
                                    href="<?php echo $value['phone'] ?>"><?php echo $value['phone'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <?php if (is_array($social)) : ?>
                        <div class="widget-body social-link">
                            <?php foreach ($social as $value) : ?>
                            <a href="<?php echo $value['link']; ?>"><i class="<?php echo $value['icon'];?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                        <?php else : ?>
                        <div class="widget-body social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                        <?php endif; ?>

                    </div>

                    <!-- offcanvas widget area end -->
                </div>
            </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>
<!-- end Header Area -->


<main>
    <!-- Main Page container Start here -->
    <?php echo $main_content; ?>
    <!-- End page containt -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<!-- footer area start -->
<footer class="footer-widget-area">
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <?php foreach ($setting as $value) : ?>


                        <div class="widget-title">
                            <div class="widget-logo">
                                <a href="<?php echo base_url('web/home') ?>">
                                    <img src="<?php echo base_url('uploads/product/').$value['logo'] ?>"
                                        alt="brand logo" height="80px">
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <p><?php echo $value['about'] ?> </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Contact Us</h6>
                        <div class="widget-body">
                            <address class="contact-block">
                                <ul>
                                    <?php foreach ($setting as $value) : ?>
                                    <li><i class="pe-7s-home"></i><?php echo $value['address'] ?></li>
                                    <li><i class="pe-7s-mail"></i> <a
                                            href="<?php echo $value['email'] ?>"><?php echo $value['email'] ?> </a></li>
                                    <li><i class="pe-7s-call"></i> <a
                                            href="<?php echo $value['phone'] ?>"><?php echo $value['phone'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Information</h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li><a href="<?php echo base_url('web/home/about') ?>">about us</a></li>
                                <li><a href="<?php echo base_url('web/home/contact') ?>">contact us</a></li>
                                <!-- <li><a href="#">Delivery Information</a></li>
																	<li><a href="#">privet policy</a></li>
																	<li><a href="#">Terms & Conditions</a></li> -->

                                <!-- <li><a href="#">site map</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Follow Us</h6>
                        <?php if (is_array($social)) : ?>
                        <div class="widget-body social-link">
                            <?php foreach ($social as $value) : ?>
                            <a href="<?php echo $value['link']; ?>"><i class="<?php echo $value['icon'];?>"></i></a>

                            <?php endforeach; ?>
                        </div>
                        <?php else : ?>
                        <div class="widget-body social-link">
                            <a href="#"><i class="icon-line-awesome-youtube"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="row align-items-center mt-20">
									<div class="col-md-6">
											<div class="newsletter-wrapper">
													<h6 class="widget-title-text">Signup for newsletter</h6>
													<form class="newsletter-inner" id="mc-form">
															<input type="email" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address">
															<button class="news-btn" id="mc-submit">Subscribe</button>
													</form>
													<!-- mailchimp-alerts Start -->
            <!-- <div class="mailchimp-alerts">
															<div class="mailchimp-submitting"></div>
															<div class="mailchimp-success"></div>
															<div class="mailchimp-error"></div>
													</div> -->
            <!-- mailchimp-alerts end -->
            <!-- </div>
									</div>
									<div class="col-md-6">
											<div class="footer-payment">
													<img src="<?php echo base_url() ?>/assets/img/payment.png" alt="payment method">
											</div>
									</div>
							</div>  -->
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a
                                href="https://rectorsol.com/">RectorSol</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->


<!-- Quick view modal end -->

<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <?php if ($this->cart->total_items() > 0) {
							foreach ($cartIvalue as $item) { ?>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product/' . $item["image"]) : base_url('/assets/img/product/product-1.jpg'); ?>
                                    <img src="<?php echo $imageURL; ?>" />
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html"><?php echo $item["name"]; ?></a>
                                </h3>
                                <p>
                                    <span class="cart-quantity"><input type="number" class="form-control text-center"
                                            value="<?php echo $item["qty"]; ?>"
                                            onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></span>
                                    <span class="cart-price"><?php echo '₹' . $item["price"]; ?></span>
                                </p>
                            </div>
                            <div><br>
                                <a href="<?php echo base_url('web/collection/removeItem/' . $item["rowid"]); ?>"
                                    class="minicart-remove"> <i class="pe-7s-close"></i></a>
                            </div>
                        </li>
                        <?php }
						} else { ?>
                        <tr>
                            <td colspan="6">
                                <p>Your cart is empty.....</p>
                            </td>
                            <?php } ?>

                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <?php if ($this->cart->total_items() > 0) {
							$sub_total = 0;
							$gst=0;
							foreach ($cartIvalue as $item) {
								$data['cartIvalue'] = $item;

								$sub_total = ($sub_total + $item['subtotal']);

								$gst= $gst+ $item['gst'];
							}  ?>

                        <li>
                            <span>sub-total</span>
                            <span><strong><?php echo '₹' . $sub_total; ?></strong></span>
                        </li>
                        <li>
                            <span>Tax </span>
                            <span><strong><?php echo $gst;?>%</strong></span>
                        </li>

                        <li class="total">
                            <span>total</span>
                            <?php $total = 0;
								$total = $sub_total + $gst ?>

                            <span><strong><?php echo '₹' . $total; ?></strong></span>
                        </li>
                        <?php } else { ?>
                        <li>
                            <span>sub-total</span>
                            <span><strong>0</strong></span>
                        </li>
                        <li>
                            <span>Tax </span>

                            <span><strong>₹10</strong></span>
                        </li>

                        <li class="total">
                            <span>total</span>

                            <span><strong>0</strong></span>
                        </li>

                        <?php } ?>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="<?php echo base_url('web/collection/cart') ?>"><i class="fa fa-shopping-cart"></i> View
                        Cart</a>

                    <a href="<?php echo base_url('web/collection/checkout') ?>"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- offcanvas mini cart end -->
<script>
/* Update item quantity */
function updateCartItem(obj, rowid) {
    $.get("<?php echo base_url('web/Collection/updatecart/'); ?>", {
            rowid: rowid,
            qty: obj.value
        },
        function(resp) {

            if (resp) {
                location.reload();
            } else {
                alert('Cart update failed, please try again.');
            }
        });
}
</script>
<?php include 'layout/footer.php'; ?>