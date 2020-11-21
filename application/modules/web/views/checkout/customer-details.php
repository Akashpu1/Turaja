<style>
  .select2-container--default .select2-selection--single {

    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 0;
    height: 42px;
    width: 100%;
    padding: 0 0 0 10px;
  }



  .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 8px;
  }
</style>
<div class="checkout-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="coupon-accordion">
          <?php if (!check()) : ?>
            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
            <div id="checkout-login" class="coupon-content">
              <div class="coupon-info">

                <form action="javascript:void(0)">
                  <p class="form-row-first">
                    <label>Username or email <span class="required">*</span></label>
                    <input type="text">
                  </p>
                  <p class="form-row-last">
                    <label>Password <span class="required">*</span></label>
                    <input type="text">
                  </p>
                  <p class="form-row">
                    <input value="Login" type="submit">
                    <label>
                      <input type="checkbox">
                      Remember me
                    </label>
                  </p>
                  <p class="lost-password"><a href="javascript:void(0)">Lost your password?</a></p>
                </form>
              </div>
            </div>
          <?php endif; ?>
          <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
          <div id="checkout_coupon" class="coupon-checkout-content">
            <div class="coupon-info">
              <form action="javascript:void(0)">
                <p class="checkout-coupon">
                  <input placeholder="Coupon code" type="text">
                  <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('gopayment') ?>" method="post">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="checkbox-form">
            <h3>Billing Details</h3>
            <?php if (isset($_SESSION["username"])) { ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>First Name <span class="required">*</span></label>
                    <?php if (isset($customer->first_name)) { ?>
                      <input placeholder="" type="text" name="first_name" value="<?php echo $customer->first_name ?>" required>
                    <?php } else { ?>
                      <input placeholder="" type="text" name="first_name" value="" required>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Last Name <span class="required">*</span></label>
                    <?php if (isset($customer->last_name)) { ?>
                      <input placeholder="" type="text" name="last_name" value="<?php echo $customer->last_name ?>" required>
                    <?php } else { ?>
                      <input placeholder="" type="text" name="last_name" value="" required>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Email Address <span class="required">*</span></label>
                    <?php if (isset($customer->email)) { ?>
                      <input placeholder="" type="email" name="email" value="<?php echo $customer->email ?>" required>
                    <?php } else { ?>
                      <input placeholder="" type="email" name="email" value="" required>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Phone <span class="required">*</span></label>
                    <?php if (isset($customer->phone)) { ?>
                      <input type="tel" name="phone" value="<?php echo $customer->phone ?>" required>
                    <?php } else { ?>
                      <input type="tel" name="phone" value="" required>
                    <?php } ?>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Address <span class="required">*</span></label>
                    <?php if (isset($customer->address)) { ?>

                      <input placeholder="Street address" type="text" name="address" value="<?php echo $customer->address ?>" required>
                    <?php } else { ?>
                      <input placeholder="Street address" type="text" name="address" value="" required>
                    <?php } ?>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <?php if (isset($customer->street)) { ?>
                      <input placeholder="Apartment, suite, unit etc. (optional)" name="street" type="text" value="<?php echo $customer->street ?>" required>
                    <?php } else { ?>
                      <input placeholder="Apartment, suite, unit etc. (optional)" name="street" type="text" value="" required>
                    <?php } ?>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Town / City <span class="required">*</span></label>
                    <select class="form-control cities" name="city" required>
                      <?php if (isset($customer->city)) { ?>
                        <option value="<?php echo $customer->city ?>"><?php echo $customer->city ?></option>
                      <?php } else { ?>

                        <option selected="">Select City</option>
                      <?php } ?>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list ">
                    <label>State<span class="required">*</span></label>
                    <select id="states" class="form-control" name="states" required>
                      <?php if (isset($customer->city)) { ?>

                        <option value="<?php echo $customer->states ?>"><?php echo $customer->states ?></option>
                      <?php } else { ?>
                        <option selected="">Your States</option>
                      <?php } ?>


                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Postcode / Zip <span class="required">*</span></label>
                    <?php if (isset($customer->pincode)) { ?>

                      <input placeholder="Postcode / Zip" name="pincode" type="number" value="<?php echo $customer->pincode ?>" required>
                    <?php } else { ?>
                      <input placeholder="Postcode / Zip" name="pincode" type="number" value="" required>

                    <?php } ?>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="country-select clearfix">
                    <label>Country <span class="required">*</span></label>
                    <?php if (isset($customer->country)) { ?>

                      <input placeholder="Country" name=country type="text" value="<?php echo $customer->country ?>" required>
                    <?php } else { ?>
                      <input placeholder="Country" name=country type="text" value="" required>
                    <?php } ?>


                  </div>
                </div>

                <div class="col-md-12">
                  <div class="checkout-form-list create-acc">
                    <input id="cbox" name="create_account" type="checkbox">
                    <label>Create an account?</label>
                  </div>
                  <div id="cbox-info" class="checkout-form-list create-account">
                    <p>Create an account by entering the information below. If you are a returning
                      customer please login at the top of the page.</p>
                    <label>Account password <span class="required">*</span></label>
                    <input placeholder="password" type="password"  name="password" required>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>First Name <span class="required">*</span></label>
                    <input placeholder="" type="text" name="first_name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Last Name <span class="required">*</span></label>
                    <input placeholder="" type="text" name="last_name" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Email Address <span class="required">*</span></label>
                    <input placeholder="" type="email" name="email" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Phone <span class="required">*</span></label>
                    <input type="tel" name="phone" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Address <span class="required">*</span></label>
                    <input placeholder="Street address" type="text" name="address" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <input placeholder="Apartment, suite, unit etc. (optional)" name="street" type="text" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>Town / City <span class="required">*</span></label>
                    <select class="form-control cities" name="city" required>
                      <option selected="">Select City</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>State<span class="required">*</span></label>
                    <select id="states" class="form-control" name="states" required>
                      <option selected="">Your States</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Postcode / Zip <span class="required">*</span></label>
                    <input placeholder="Postcode / Zip" name="pincode" type="number" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="country-select clearfix">
                    <label>Country <span class="required">*</span></label>
                    <input placeholder="Country" name="country" type="text" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="checkout-form-list create-acc">
                    <input id="cbox" name="create_account" type="checkbox">
                    <label>Create an account?</label>
                  </div>
                  <div id="cbox-info" class="checkout-form-list create-account">
                    <p>Create an account by entering the information below. If you are a returning
                      customer please login at the top of the page.</p>
                    <label>Account password <span class="required">*</span></label>
                    <input placeholder="password" type="password">
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="different-address">
              <div class="ship-different-title">
                <h3>
                  <label>Ship to a different address?</label>
                  <input id="ship-box" type="checkbox">
                </h3>
              </div>
              <div id="ship-box-info" class="row">
                <div class="row">
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>First Name <span class="required">*</span></label>
                      <input placeholder="" type="text" name="fname1" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>Last Name <span class="required">*</span></label>
                      <input placeholder="" type="text" name="lname1" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>Email Address <span class="required">*</span></label>
                      <input placeholder="" type="email" name="email1" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>Phone <span class="required">*</span></label>
                      <input type="tel" name="mobile1" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="checkout-form-list">
                      <label>Address <span class="required">*</span></label>
                      <input placeholder="Street address" type="text" name="address1" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="checkout-form-list">
                      <input placeholder="Apartment, suite, unit etc. (optional)" name="street1" type="text" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>Town / City <span class="required">*</span></label>
                      <select class="form-control cities" name="city1" >
                        <option selected="">Distributor City</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>State <span class="required">*</span></label>
                      <input placeholder="" type="text" name="state1" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="checkout-form-list">
                      <label>Postcode / Zip <span class="required">*</span></label>
                      <input placeholder="" type="number" name="zip1" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="myniceselect country-select clearfix">
                      <label>Country <span class="required">*</span></label>
                      <select class="nice-select myniceselect wide" style="display: none;" name="country1"  >
                        <option data-display="Bangladesh">Bangladesh</option>
                        <option value="uk">London</option>
                        <option value="rou">Romania</option>
                        <option value="fr">French</option>
                        <option value="de">Germany</option>
                        <option value="aus">Australia</option>
                      </select>
                      <div class="nice-select myniceselect wide" tabindex="0"><span class="current">Bangladesh</span>
                        <ul class="list">
                          <li data-value="Bangladesh" data-display="Bangladesh" class="option selected">Bangladesh</li>
                          <li data-value="uk" class="option">London</li>
                          <li data-value="rou" class="option">Romania</li>
                          <li data-value="fr" class="option">French</li>
                          <li data-value="de" class="option">Germany</li>
                          <li data-value="aus" class="option">Australia</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="order-notes">
                <div class="checkout-form-list checkout-form-list-2">
                  <label>Order Notes</label>
                  <textarea id="checkout-mess" name="notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-6 col-12">
          <div class="your-order">
            <h3>Your order</h3>
            <div class="your-order-table table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="cart-product-name">Product</th>
                    <th class="cart-product-total">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($cart as $value) : ?>
                    <tr class="cart_item">
                      <td class="cart-product-name"> <?php echo $value['name'];  ?><strong class="product-quantity">
                          × <?php echo $value['qty']; ?></strong>(<?php echo $value['unit']; ?>)</td>
                      <td class="cart-product-total"><span class="amount">₹ <?php echo number_format($value['price'], 2);  ?> </span></td>
                      <?php if (isset($value['size'])) { ?>
                        <td class="cart-product-name"> size: <?php echo $value['size'];  ?><strong class="product-quantity">
                          <?php } ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td><span class="amount">₹<?php echo number_format($this->cart->total(), 2); ?></span></td>
                  </tr>
                  <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">₹<?php echo number_format($this->cart->total(), 2); ?></span></strong></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="payment-method">
              <div class="payment-accordion">
                <div id="accordion">
                  <div class="card">
                    <!--<div class="card-header" id="#payment-1">-->
                    <!--  <h5 class="panel-title">-->
                    <!--    <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
                    <!--      Direct Bank Transfer.-->
                    <!--    </a>-->
                    <!--  </h5>-->
                    <!--</div>-->

                  </div>
                  <div class="card">
                    <!--<div class="card-header" id="#payment-3">-->
                    <!--  <h5 class="panel-title">-->
                    <!--    <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
                    <!--      PayPal-->
                    <!--    </a>-->
                    <!--  </h5>-->
                    <!--</div>-->

                  </div>
                </div>
                <div class="order-button-payment">
                  <input value="Place order" type="submit">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>