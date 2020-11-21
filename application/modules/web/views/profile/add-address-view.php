<!-- Begin  Login Register Area -->
<div class="kenne-login-register_area">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
        <form action="<?php echo base_url('saddress'); ?>" method="post">
          <div class="login-form">
            <h4 class="login-title">Add New Shipping Address</h4>
            <?php if (!empty($this->session->flashdata())): ?>

              <?php if ($this->session->flashdata('status')): ?>
                <div class="alert alert-success">
                  <strong>Success!</strong> <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php else: ?>
                  <div class="alert alert-danger">
                    <strong>Danger!</strong> <?php echo $this->session->flashdata('msg'); ?>
                  </div>
              <?php endif; ?>

            <?php endif; ?>

            <div class="row">
              <div class="col-md-12 col-12 mb--20">
                <label>Street Address</label>
                <input type="text" name="street" placeholder="e.g 234/S23 4th Floor">
              </div>
              <div class="col-md-6 col-12 mb--20">
                <label>Pin Code / Zip Code</label>
                <input type="text" name="pincode" placeholder="124321">
              </div>
              <div class="col-md-6 col-12 mb--20">
                <label>Post Address</label>
                <input type="text" name="post" placeholder="e.g peernager">
              </div>
              <div class="col-md-6 col-12 mb--20">
                <label>Town / City <span class="required">*</span></label>
                <select id="cities" class="form-control cities" name="city" required>
                    <option selected="">Select City</option>
                </select>
              </div>
              <div class="col-md-6 col-12 mb--20">
                <label>State<span class="required">*</span></label>
                <select id="states" class="form-control" name="states" required>
                    <option selected="">Your States</option>
                </select>
              </div>
              <div class="col-md-12 col-12 mb--20">
                <label>Full Address<span class="required">*</span></label>
                <textarea name="address" class="form-control" rows="4" cols="80" placeholder="Enter Your Full Address"></textarea>
              </div>
              <div class="col-6">
                <button type="submit" name="register" class="kenne-register_btn"> Save New Address </button>
              </div>
              <div class="col-6">
                <a href="<?php echo base_url('profile'); ?>"><button type="button" class="kenne-register_btn"> Back to profile </button> </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  Login Register Area  End Here -->
