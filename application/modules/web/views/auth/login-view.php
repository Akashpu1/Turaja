<!-- Begin  Login Register Area -->
<div class="kenne-login-register_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
        <!-- Login Form s-->
        <form action="<?php echo base_url('auth')?>" method="post">
          <div class="login-form">
            <h4 class="login-title">Login</h4>
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
              <div class="col-md-12 col-12">
                <label>Email Address/Mobile Number*</label>
                <input type="text" name="username" placeholder="Email Address" required>
              </div>
              <div class="col-12 mb--20">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
              </div>
              <div class="col-md-8">
                <div class="check-box">
                  <input type="checkbox" id="remember_me">
                  <label for="remember_me">Remember me</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="forgotton-password_info">
                  <a href="<?php echo base_url('forgotten') ?>"> Forgotten pasward?</a>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="kenne-login_btn">Login</button>
                <div class="col-md-12">
                  <div class="forgotton-password_info text-center">
                    <a href="<?php echo base_url('join'); ?>">Haven't an account create one?</a>
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
