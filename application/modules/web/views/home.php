<?php get_section('layout/sliders/home-slider'); ?>
<!-- About Section Start -->
<div class="about-us-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-5">
        <div class="overview-img text-center img-hover_effect">
          <a href="#">
            <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/about-us/1.jpg" alt="Kenne's About Us Image">
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 d-flex align-items-center">
        <div class="overview-content">
          <h2>Welcome To <span>Turaja</span> Store!</h2>
          <p class="short_desc">Tuaraja, the Giver of Life! A synonym of Goddess Bhavani, avatar of Goddess Parvati/ Durga, Turaja is the source of creative energy, the divine Mother, who is the supreme provider.

            We, at Turaja, delve deep into the philosophy of The Goddess. Our creations are made for the sustainability conscious, aesthetic driven consumer. Our designs suit the global palette while being rooted firmly into Indian craftsmanship.</p>
          <div class="kenne-about-us_btn-area">
            <a class="about-us_btn" href="<?php echo base_url('about') ?>">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Abount section Ending -->

<!-- Begin Banner Area Two -->
<!-- <div class="banner-area banner-area-2 saree-wear">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="text-center">SHOP BY <span>CATEGORY</span></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('shop?cat=12') ?>">
            <?php //echo base_url('/uploads/cat/').$row['images'] ?>

              <img class="img-full" src="<?php echo base_url('/uploads/cat/').$row['images'] ?>" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('shop?cat=12') ?>">SAREES</a>
            </h3>
          </div>
        </div>

      </div>
      <div class="col-md-3">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('shop?cat=Duppata') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/product/small-size/suit1-3.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('shop?cat=Duppata') ?>">DUPATTA</a>
            </h3>
          </div>
        </div>

      </div>
      <div class="col-md-3">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('shop?cat=Duppata') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/product/small-size/suit-2.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('shop?cat=16') ?>">SUITS</a>
            </h3>
          </div>
        </div>

      </div>

      <div class="col-md-3">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('shop?cat=Febric') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/banner/1-5.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('shop?cat=Febric') ?>">FABRIC</a>
            </h3>
          </div>
        </div>

      </div>
    </div>
  </div>
</div> -->
<!-- Banner Area Two End Here -->


<!-- Begin Banner Area MEN'S -->
<div class="banner-area banner-area-2 saree-wear">
  <div class="container">
  <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="text-center">SHOP BY <span>CATEGORY</span></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach($cat as $kat){?>
      <div class="col-md-4">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('shop?cat=').$kat['id'] ?>">
              <img class="img-full" src="<?php echo base_url('uploads/cat/').$kat['images'] ?>" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('shop?cat=').$kat['id'] ?>"><?php echo $kat['name'];?></a>
            </h3>
          </div>
        </div>

      </div>
      <?php }?>
    </div>
  </div>
</div>
<!-- Banner Area Two MEN'S -->




<!-- Begin Product Area -->
<div class="product-area ARRIVALS">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h3>NEW ARRIVALS</h3>
          <div class="product-arrow"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                     "autoplay": true,
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "autoplaySpeed": 2000,
                    "infinite": true,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30,
                    "appendArrows": ".product-arrow"
                    }' data-slick-responsive='[
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>

          <?php if (!empty($newarrivals)) : ?>
            <?php foreach ($newarrivals as $value) : ?>
              <div class="product-item">
                <div class="single-product">
                  <div class="product-img">
                    <a href="<?php echo base_url('product?pid=') . $value['id'] ?>">
                      <img class="primary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic'] ?>" alt="Kenne's Product Image">
                      <img class="secondary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic1'] ?>" alt="Kenne's Product Image">
                    </a>

                    <div class="add-actions">
                      <ul>
                        <li class="quick-view-btn" data-id='<?php echo $value['id']; ?>'data-id='<?php echo $value['id']; ?>'  data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                        </li>

                        <li><a href="javascript:void(0)" class="minicart" data-id="<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="product-desc_info">
                      <h3 class="product-name"><a href="<?php echo base_url('product?pid=') . $value['id'] ?>"><?php echo substr($value['name'], 0, 18); ?></a></h3>
                      <div class="price-box">

                      <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                      <?php if(!number_format($value['discount'])==0)
                     
                     echo '<span class="old-price">Rs.'.number_format($value['price'], 0).'</span>'
                     
                    ?>
              
                       
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url('shop') ?>" class="us_btn">View All</a>
      </div>
    </div>
  </div>
</div>
<!-- Product Area End Here -->

<div class="product-area p-b-30 saree-2 ">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h3>SAREES</h3>
          <div class="product-arrow-fabrics"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": false,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30,
                    "appendArrows": ".product-arrow-fabrics"
                    }' data-slick-responsive='[
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>
          <?php if (!empty($Saree)) : ?>
            <?php foreach ($Saree as $key => $value) : ?>
              <div class="product-item">
                <div class="single-product">
                  <div class="product-img">
                    <a href="<?php echo base_url('product?pid=') . $value['id'] ?>">
                      <img class="primary-img" src="<?php echo base_url('uploads/product/') .  $value['profile_pic'] ?>" alt="Kenne's Product Image">
                      <img class="secondary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic1'] ?>" alt="Kenne's Product Image">
                    </a>

                    <div class="add-actions">
                      <ul>
                        <li class="quick-view-btn" data-id='<?php echo $value['id']; ?>' data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                        </li>

                        <li><a class="minicart" data-id="<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="product-desc_info">
                      <h3 class="product-name"><a href="#"><?php echo substr($value['name'], 0, 18); ?></a></h3>
                      <div class="price-box">
                        <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                        <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                        <?php if(!number_format($value['discount'])==0)
                     
                     echo '<span class="old-price">Rs.'.number_format($value['price'], 0).'</span>'
                     
                    ?>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url('shop?cat=12') ?>" class="us_btn">View All</a>
      </div>
    </div>
  </div>
</div>

<!-- Ready to wear-->

<div class="product-area p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h3>READY TO WEAR</h3>
          <div class="product-arrow-lehengastwo"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": false,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30,
                    "appendArrows": ".product-arrow-lehengastwo"
                    }' data-slick-responsive='[
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>

          <?php if (!empty($ready_to_wear)) : ?>
            <?php foreach ($ready_to_wear as $key => $value) : ?>
              <div class="product-item">
                <div class="single-product">
                  <div class="product-img">
                    <a href="<?php echo base_url('product?pid=') . $value['id'] ?>">
                      <img class="primary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic'] ?>" alt="Kenne's Product Image">
                      <img class="secondary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic1'] ?>" alt="Kenne's Product Image">
                    </a>

                    <div class="add-actions">
                      <ul>
                        <li class="quick-view-btn" data-id='<?php echo $value['id']; ?>' data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                        </li>

                        <li><a class="minicart" data-id="<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="product-desc_info">
                      <h3 class="product-name"><a href="#"><?php echo substr($value['name'], 0, 18); ?></a></h3>
                      <div class="price-box">
                        <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                        <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                        <?php if(!number_format($value['discount'])==0)
                     
                     echo '<span class="old-price">Rs.'.number_format($value['price'], 0).'</span>'
                     
                    ?>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url('shop?cat=15') ?>" class="us_btn">View All</a>
      </div>
    </div>
  </div>
</div>
<!--Ready to wear -->

<!-- Febric -->
<div class="product-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h3>FABRIC</h3>
          <div class="product-arrow-lehengasone"></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": false,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30,
                    "appendArrows": ".product-arrow-lehengasone"
                    }' data-slick-responsive='[
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>

          <?php if (!empty($fabric)) : ?>
            <?php foreach ($fabric as $key => $value) : ?>
              <div class="product-item">
                <div class="single-product">
                  <div class="product-img">
                    <a href="<?php echo base_url('product?pid=') . $value['id'] ?>">
                      <img class="primary-img" src="<?php echo base_url('uploads/product/') .  $value['profile_pic'] ?>" alt="Kenne's Product Image">
                      <img class="secondary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic1'] ?>" alt="Kenne's Product Image">
                    </a>

                    <div class="add-actions">
                      <ul>
                        <li class="quick-view-btn" data-id='<?php echo $value['id']; ?>' data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                        </li>

                        <li><a class="minicart" data-id="<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="product-desc_info">
                      <h3 class="product-name"><a href="#"><?php echo substr($value['name'], 0, 18); ?></a></h3>
                      <div class="price-box">
                        <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                         <span class="new-price">Rs.<?php echo number_format(($value['price'] - $value['discount']), 0) ?></span>
                  

<?php if(!number_format($value['discount'])==0)
                     
                     echo '<span class="old-price">Rs.'.number_format($value['price'], 0).'</span>'
                     
                    ?>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url('shop?cat=14') ?>" class="us_btn">View All</a>
      </div>
    </div>
  </div>
</div>
<!--Febric-->

<!--crop block-->
<div class="banner-area-3 artistry">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="text-center">OUR <span>ARTISTRY</span></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-6 custom-xxs-col">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('weaving') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/banner/turaja-1-min (2).jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('weaving') ?>">Weaving</a>
            </h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6 custom-xxs-col">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('embroidery') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/banner/our2.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('embroidery') ?>">Embroidery</a>
            </h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6 custom-xxs-col">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('printing') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/banner/2-2.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('printing') ?>">Printing </a>
            </h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6 custom-xxs-col">
        <div class="banner-item img-hover_effect">
          <div class="banner-img">
            <a href="<?php echo base_url('surface') ?>">
              <img class="img-full" src="<?php echo base_url(ASSETS) ?>/images/banner/2-3.jpg" alt="Banner">
            </a>
          </div>
          <div class="product-catb">
            <h3 class="heading">
              <a href="<?php echo base_url('surface') ?>">Surface Ornamentation</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--crop block-->
