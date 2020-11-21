<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">shop</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding">
    <div class="container">
        <div class="row">
            <!-- sidebar area start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="sidebar-wrapper">
                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Collection</h5>
                        <div class="sidebar-body">
                            <ul class="shop-categories">
                                <?php foreach ($category as $value) : ?>
                                    <li><a href="<?php echo base_url('web/shop/shop_by_category/') . $value['id'] ?>"><?php echo $value['name'] ?> </a></li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- single sidebar end -->

                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">price</h5>
                        <div class="sidebar-body">
                            <div class="price-range-wrap" id="rang">
                                <div class="price-range" data-min="1000" data-max="50000"></div>
                                <div class="range-slider">
                                    <form action="#">
                                        <div class="price-input">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount">
                                            <input type="hidden" value="<?php echo $id; ?>" class="min_id">
                                            <input type="hidden" value="price" id="price">

                                            <input type="hidden" value="search" class="search">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single sidebar end -->



                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">color filter</h5>
                        <?php foreach ($color as $value) : ?>
                        <div class="sidebar-body">

                          <label>
                               <input type="checkbox" class="filter_all color" value="<?php echo $value['fab_name']; ?>">
                              <?php echo $value['fab_name']; ?>
                           </label>


                            <input type="hidden" value="<?php echo $id; ?>"  class="min_id">
                            <input type="hidden" value="Color" id="clr">
                            <input type="hidden" value="search" class="search">
                        </div>
                         <?php endforeach; ?>
                    </div><br><br>
                    <!-- single sidebar end -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Fabric Filter</h5>
                          <?php foreach ($fabric as $value) : ?>
                        <div class="sidebar-body">
                          <label>
                              <input type="checkbox" class="filter_all fabric" value="<?php echo $value['fab_name']; ?>">
                              <?php echo $value['fab_name']; ?>
                           </label>

                            <input type="hidden" value="<?php echo $id; ?>" id="f_id" class="min_id">
                            <input type="hidden" value="Fabric" id="fab">
                            <input type="hidden" value="search" class="search">
                        </div>
                          <?php endforeach; ?>
                    </div><br><br>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Pattern Filter</h5>
                        <div class="sidebar-body">
                            <select name="patern" id="filter_all patern">
                                <option>--select patern--</option>
                                <?php foreach ($pattern as $value) : ?>
                                    <option value="<?php echo $value['fab_name']; ?>" style="text-transform:capitalize;"><?php echo $value['fab_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" value="<?php echo $id; ?>" id="p_id" class="min_id">
                            <input type="hidden" value="Pattern" id="par">
                            <input type="hidden" value="search" class="search">
                        </div>
                    </div><br><br>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Weaving Filter</h5>
                        <div class="sidebar-body">
                            <select name="weaving" id="filter_all weaving">
                                <option>--select weaving--</option>
                                <?php foreach ($weaving as $value) : ?>
                                    <option value="<?php echo $value['fab_name']; ?>" style="text-transform:capitalize;"><?php echo $value['fab_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" value="<?php echo $id; ?>" id="w_id" class="min_id">
                            <input type="hidden" value="Weaving" id="weav">
                            <input type="hidden" value="search" class="search">
                        </div>
                    </div>


                    <!-- single sidebar start -->
                    <div class="sidebar-banner">
                        <div class="img-container">
                            <a href="#">
                                <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- single sidebar end -->
                </aside>
            </div>
            <!-- sidebar area end -->

            <!-- shop main wrapper start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="shop-product-wrapper">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                <div class="top-bar-left">
                                    <div class="product-view-mode">
                                        <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                        <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <?php echo $result_count ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby" id='sort'>

                                            <option value="New">What's New</option>
                                            <option value="Popularity">Popularity</option>
                                            <option value="Discount">Discount</option>
                                            <option value="Price_Asc">Price (Low &gt; High)</option>
                                            <option value="Price_Desc">Price (High &gt; Low)</option>

                                        </select>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- shop product top wrap start -->
                    <?php echo $content ?>
                    <!-- start pagination area -->
                    <div class="paginatoin-area text-center">
                        <?php echo $links ?>
                    </div>
                    <!-- end pagination area -->
                </div>
            </div>
            <!-- shop main wrapper end -->
        </div>
    </div>
</div>

<!-- page main wrapper end -->
<?php include('shop_js.php'); ?>
