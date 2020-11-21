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

        <!-- compare main wrapper start -->
        <div class="compare-page-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Compare Page Content Start -->
                            <div class="compare-page-content-wrap">
                                <div class="compare-table table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="first-column">Product</td>
                                                   <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>
                                                <td class="product-image-title">
                                                  <?php $imageURL = !empty($item["image"])?base_url('uploads/product/'.$item["image"]):base_url('/assets/img/product/product-1.jpg'); ?>
                                                  <img src="<?php echo $imageURL; ?>" width="80"/>
                                                    <!-- <a href="#" class="category">Daimond</a> -->
                                                    <a href="product-details.html" class="title"><?php echo $item["name"]; ?></a>
                                                </td>
                                                <?php } } ?>

                                            </tr>
                                            <tr>
                                                <td class="first-column">Description</td>
                                                   <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>
                                                <td class="pro-desc">
                                                    <p><?php echo $item["description"]; ?></p>
                                                </td>
                                                <?php } } ?>
                                            </tr>
                                            <tr>
                                                <td class="first-column">Price</td>
                                                <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>

                                                <td class="pro-price"><?php echo $item["price"]; ?></td>
                                              <?php } } ?>

                                            </tr>

                                            <!-- <tr>
                                                <td class="first-column">Stock</td>
                                                <td class="pro-stock">In Stock</td>
                                                <td class="pro-stock">Stock Out</td>
                                                <td class="pro-stock">In Stock</td>
                                            </tr> -->
                                            <tr>
                                                <td class="first-column">Add to cart</td>
                                                  <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>
                                                  <td>  <a  href="<?php echo base_url('web/Collection/addtocard/').$item['id']?>"  class="btn btn-cart" data-toggle="tooltip" data-placement="left" >Add To Cart</a></td>

                                                  <?php } } ?>
                                            </tr>
                                            <!-- <tr>
                                                <td class="first-column">Rating</td>
                                                <td class="pro-ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </td>
                                                <td class="pro-ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </td>
                                                <td class="pro-ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="first-column">Remove</td>
                                                <?php if($this->cart->total_items() > 0){ foreach($cartIvalue as $item){ ?>
                                                <td class="pro-remove">
                                                  <a href="<?php echo base_url('web/collection/comp/'.$item["rowid"]); ?>"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                                              <?php } } ?>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Compare Page Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- compare main wrapper end -->
