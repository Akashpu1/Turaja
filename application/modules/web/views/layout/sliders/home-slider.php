<!-- Begin Slider Area -->
<div class="slider-area slider-area-2">

  <div class="kenne-element-carousel home-slider arrow-style" data-slick-options='{
            "slidesToShow": 1,
            "adaptiveHeight":true,
            "slidesToScroll": 1,
            "infinite": true,
            "arrows": false,
            "dots": false,
            "autoplay" : true,
            "fade" : true,
            "autoplaySpeed" : 7000,
            "pauseOnHover" : false,
            "pauseOnFocus" : false
            }' data-slick-responsive='[
            {"breakpoint":768, "settings": {
            "slidesToShow": 1
            }},
            {"breakpoint":575, "settings": {
            "slidesToShow": 1
            }}
        ]'>
        <?php if (!empty($settings->home_slider)): $slider = json_decode($settings->home_slider);?>
          <?php foreach ($slider as $value): ?>
            <div class="slide-item animation-style-01">
              <img class="inside-image" src="<?php echo base_url('uploads/slider/').$value->source ?>" />
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="slide-item animation-style-01">
            <img class="inside-image" src="<?php echo base_url('assets/images/slider/2-1.jpg') ?>" />
          </div>
        <?php endif; ?>

  </div>

</div>
<!-- Slider Area End Here -->
