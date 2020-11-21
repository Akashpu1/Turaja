<!-- Begin Product Area -->
<div class="product-area pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>You Might Also Like:</h3>
                    <div class="product-arrow"></div>
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

                <?php foreach ($related as $value): ?>
                  <div class="product-item">
                    <div class="single-product">
                      <div class="product-img">
                        <a href="#">
                          <img class="primary-img" src="<?php echo base_url('uploads/product/').$value->profile_pic ?>" alt="Kenne's Product Image">
                          <img class="secondary-img" src="<?php echo base_url('uploads/product/').$value->profile_pic1 ?>" alt="Kenne's Product Image">
                        </a>

                        <div class="add-actions">
                          <ul>
                            <li class="quick-view-btn" data-id='<?php echo $value->id; ?>' data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                            </li>
                            
                            <li><a href="javascript:void(0)" class="minicart" data-id="<?php echo $value->id; ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="product-content">
                        <div class="product-desc_info">
                          <h3 class="product-name"><a href="<?php echo base_url('product?pid=').$value->id ?>"><?php echo substr($value->name, 0, 18); ?></a></h3>
                          <div class="price-box">
                            <span class="new-price">Rs.<?php echo number_format(($value->price - $value->discount), 0) ?></span>
                            <span class="old-price">Rs.<?php echo number_format($value->price, 0) ?></span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
