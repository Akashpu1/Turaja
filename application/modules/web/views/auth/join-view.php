<!-- Begin  Login Register Area -->
<div class="kenne-login-register_area">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
        <form action="<?php echo base_url('signup'); ?>" method="post">
          <div class="login-form">
            <h4 class="login-title">Register</h4>
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
              <div class="col-md-6 col-12 mb--20">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First Name *" required>
              </div>
              <div class="col-md-6 col-12 mb--20">
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="col-md-12">
                <label>Email Address*</label>
                <input type="email" name="email" placeholder="Email Address" required>
              </div>
              <div class="col-md-12">
                <label>Enter Mobile Number*</label>
                <input type="text" name="phone"  placeholder="Mobile Number" required>
              </div>
              <div class="col-md-6">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label>Confirm Password</label>
                <input type="password" name="re_password" placeholder="Confirm Password" required>
              </div>
              <div class="col-12">
                <button type="submit" name="register"  class="kenne-register_btn">Register</button>
                <div class="col-md-12">
                  <div class="forgotton-password_info">
                    <a href="<?php echo base_url('auth'); ?>">Already Have an Account, Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  Login Register Area  End Here -->
