<style>
  body {
    /*background: #ecdcc51a;*/
    background: rgb(255, 255, 255);
  }

  .sp-area .sp-nav {
    background: rgb(255, 255, 255) !important;
  }

  .product-tab_area-2 {
    background: rgb(255, 255, 255) !important;
    ;
  }

  .sp-product-tab_nav {
    background: rgb(255, 255, 255) !important;
     !important;
    padding-top: 50px !important;
  }

  .sp-area {
    padding: 50px 0 0 !important;
  }

  .select-size-h1 {
    font-size: 18px;
    color: #a8741a;
  }

  .sp-essential_stuff-2 {
    padding-top: 5px;
  }

  a.size-chart-link {
    cursor: pointer;
    color: #a8741a !important;
    font-weight: 500;
  }


  .sp-area .sp-nav .sp-content .quantity {
    padding-top: 15px;
  }

  .notify-me-link {
    position: relative;
    top: 15px;
    float: right;
    right: 60px;

  }

  .notifyme {
    border: 1px solid #e5e5e5;
    padding: 10px 15px;
    color: #242424;
    text-transform: uppercase;
    background-color: #a8741a;
    color: #ffffff;

  }

  .swatch label {
    width: 45px !important;
    height: 46px !important;
    margin: 0;
    border: 1px solid #999999;
    background-color: transparent;
    font-size: 15px !important;
    text-align: center;
    line-height: 45px;
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    text-transform: uppercase;
    cursor: pointer;
    padding: 0;
    color: #999999;
    border-radius: 50% !important
  }

  .swatch label:hover {
    box-shadow: 0 0 1px 1px #ccc
  }

  .swatch-element {
    display: inline-block;
    margin: 2px 15px 0 0
  }

  .swatch-element.selected label {
    color: #fbfaf8;
    border: 2px solid #a8741a;
    background-color: #a8741a;
    box-shadow: 0 0 1px 1px #ccc;
    font-weight: 400;
    font-size: 16px !important;
  }

  .swatch input {
    display: none
  }

  @media (max-width: 1199px) {
    .swatch-container {
      text-align: center
    }
  }
</style>
<div class="sp-area">
  <div class="container">
    <div class="sp-nav">
      <div class="row">
        <div class="col-lg-4">
          <div class="sp-img_area">
            <div class="sp-img_slider slick-img-slider kenne-element-carousel" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".sp-img_slider-nav"
                        }'>
              <div class="single-slide red zoom">
                <div class="imgbox">
                <img src="<?php echo base_url('uploads/product/') . $product->profile_pic ?>" alt="">
              </div>
            </div>

            </div>
            <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3" data-slick-options='{
                        "slidesToShow": 3,
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
              <?php foreach ($gallery as $value) : ?>
                <div class="single-slide red">
                  <ul class="thumb">
                  <li><a href="<?php echo base_url('uploads/product/') . $value['image'] ?>" target="imgbox"> </a></li>
                  <li><a href="<?php echo base_url('uploads/product/') . $value['image'] ?>" target="imgbox">
                  <img src="<?php echo base_url('uploads/product/') . $value['image'] ?>" alt="<?php echo $product->name ?> Product Thumnail">
                  </a></li></ul>

                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="sp-content">
            <div class="sp-heading">
              <h5><a href="#"><?php echo $product->name ?></a></h5>
            </div>
            <div class="sp-essential_stuff">
              <ul>

                <li>Product Code: <a href="javascript:void(0)"><?php echo $product->product_code; ?></a></li>

                <li>Availability: <?php if ($product->quantity >= 1) : ?>
                    <a href="javascript:void(0)">In Stock</a>
                  <?php else : ?>
                    <a href="javascript:void(0)">Out of Stock</a>
                  <?php endif; ?></li>


                <li style="font-size:25px; color:#a8741a;" id="inr">₹<?php echo number_format(($product->price  - $product->discount)); ?></li>
                <li style="font-size:25px; color:#a8741a;" id="dlr">$<?php echo number_format(($product->usd - $product->discount)); ?></li>
              </ul>
            </div>


            <?php if ($product->masurment != '') { ?>
              <div class="product-size_box">

                <!--<span>Size</span>-->
                <!--<select class="myniceselect nice-select">-->
                <!--    <option value="1">S</option>-->
                <!--    <option value="2">M</option>-->
                <!--    <option value="3">L</option>-->
                <!--    <option value="4">XL</option>-->
                <!--</select>-->

                <div class="swatch-container clearfix">
                  <span>SELECT SIZE</span>
                  <div class="swatch productsize">

                    <?php $arr['data'] = explode(" ", $product->masurment);

                    // echo($arr['data'][$i]);exit;
                    $count = count($arr['data']);

                    for ($i = 0; $i <= $count - 1; $i++) {

                    ?>
                      <div class="swatch-element"><label class="productType lbl"><?php echo $arr['data'][$i] ?> </label></div>

                    <?php } ?>
                  </div>
                </div>


              </div>
              <div class="sp-essential_stuff-2">
                <p class="select-size-heading" id="size_chart_id">
                  <span class="select-size-h1">Note:</span><span class="garment-size-alert"> (Our sizes are bigger as compared to other Indian Ethnic Wear brands. You can view our <a data-toggle="modal" id="<?php $product->id ?>" data-target="#sizechartmodal" class="size-chart-link">Size Chart</a> here)</span>
                </p>
                <p class="notify-me-link mobileOff" style="display: block;"><a data-toggle="modal" data-target="#notifyMeModal" style="color: #000; font-weight: 100;" id="notify-me-link">Can’t find my size. <span style="cursor: pointer; color: #b07c38; font-weight: 300;">Notify me</span></a></p>
              </div>
            <?php } ?>

            <div class="quantity">
              <?php if ($product->category != 14) { ?>
                <label id="unit">Quantity</label>
              <?php } else { ?>
                <label id="unit"> Metres </label>
              <?php } ?>

              <div class="cart-plus-minus">
                <input class="cart-plus-minus-box" value="1" type="text" id="qty">
                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
              </div>


            </div>
            <div class="qty-btn_area">
              <ul>

                <li class="minicart-wrap"><a href="#miniCart" class="minicart" data-placement="right" data-toggle="tooltip" data-id="<?php echo $product->id; ?>" data-placement="right" title="">Add To cart</a>
                </li>



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
                  <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Begin Product Tab Area Two -->
          <div class="product-tab_area-2">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sp-product-tab_nav">
                    <div class="product-tab">
                      <ul class="nav product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Information</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#specification"><span>Details</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Care</span></a></li>
                      </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                      <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                          <table class="table table-bordered specification-inner_stuff">
                            <tbody>
                              <?php foreach ($attribute as $value) : ?>
                                <tr>
                                  <td><?php echo $value['name']; ?></td>
                                  <td><?php echo $value['value']; ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>

                        </div>
                      </div>
                      <div id="specification" class="tab-pane" role="tabpanel">
                        <?php echo $product->description; ?>
                      </div>
                      <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="tab-pane active" id="tab-review">
                          <p> <?php echo $product->care; ?> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Product Tab Area Two End Here -->
        </div>
      </div>
    </div>
  </div>
</div>


<!--size chart modal window-->
<div id="sizechartmodal" class="modal" role="dialog" aria-labelledby="Farida Gupta Size Chart">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#BODYSIZE" role="tab" aria-controls="BODYSIZE" aria-selected="true">BODY SIZE CHART</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#GARMENTSIZE" role="tab" aria-controls="GARMENTSIZE" aria-selected="false">GARMENT SIZE CHART</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="BODYSIZE" role="tabpanel" aria-labelledby="BODYSIZE-tab">
            <Div class="container ">
              <h5><?php echo $size[0]['text'] ?></h5>
            </Div>
            <Div class="container">
              <img src="<?php echo base_url('uploads/size_chart/') . $size[0]['chart'] ?>" style="width:100% " alt="<?php echo $size[0]['chart'] ?>">
            </Div>

          </div>

          <div class="tab-pane fade" id="GARMENTSIZE" role="tabpanel" aria-labelledby="GARMENTSIZE-tab">
            <Div class="container">
              <h5><?php echo $size[0]['text2'] ?></h5>
            </Div>
            <Div class="container">
              <img src="<?php echo base_url('uploads/size_chart/') . $size[0]['image'] ?>" style="width:100% " alt="<?php echo $size[0]['image'] ?>">
            </Div>
          </div>




        </div>
      </div>
    </div>

  </div>

</div>


</div>
<!-- Size chart modal window-->

<div id="notifyMeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title text-center">We'll notify you as soon as your size is back in stock</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

      </div>
      <div class="modal-body text-center text-center">

        <p style="text-transform: uppercase;">Select your size</p>
        <form class="form-horizontal" id="notify-me" action="<?php echo base_url('admin/Product/notifacation') ?>" method="POST">
          <div class="form-group">
            <select class="form-control" name="size">

              <option value="XXXL">XXXL</option>
              <option value="SX">SX</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" maxlength="32" required="required" name="name" class="form-control " id="customer_name" pattern="[A-Z a-z]{1,32}" placeholder="Name">
            <input type="hidden" maxlength="32" required="required" name="proId" class="form-control " id="" value="<?php echo $product->id ?>" pattern="[A-Z a-z]{1,32}" placeholder="Name">
            <input type="hidden" maxlength="32" required="required" name="proName" class="form-control " value="<?php echo $product->name ?>" pattern="[A-Z a-z]{1,32}" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="tel" required="required" name="mobile" class="form-control required-entry" id="customer_mobile" placeholder="Mobile Number" title="Enter your mobile number">
          </div>
          <button type="submit" class="btn notifyme">Notify Me</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($shopthelook)) :

  get_section('products/shopthelook');

endif; ?>

<?php if (!empty($related)) :

  get_section('products/retaled');

endif; ?>

<div class="offcanvas-minicart_wrapper" id="miniCart"></div>
<script>
  $(document).ready(function() {
    $("#dlr").hide();
    $("#myselect").change(function() {

      var inr = $(this).val();
      if (inr == 'USD') {
        $("#dlr").show();
        $("#inr").hide();
      } else if (inr == 'INR') {
        $("#dlr").hide();
        $("#inr").show();
      } else {
        $("#inr").show();
      }
    });

    $('.swatch-element').click(function() {
      $('.swatch-element').removeClass('selected');
      $(this).addClass('selected');

    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('.thumb a').click(function(e){

      e.preventDefault();
      $('.imgbox img').attr("src",$(this).attr("href"));
            $('.zoomImg').attr("src",$(this).attr("href"));
    });
  });
</script>
