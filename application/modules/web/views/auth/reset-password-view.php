<!-- Begin  Login Register Area -->
<div class="kenne-login-register_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
        <!-- Login Form s-->
        <form action="<?php echo base_url('reset')?>" method="post">
          <div class="login-form">
            <h4 class="login-title">Create New Password</h4>
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
                <label>New Password</label>
                <input type="password" name="password" placeholder="Enter New Password" required>
              </div>
              <div class="col-md-12 col-12">
                <label>Confirm New Password</label>
                <input type="text" name="re_password" placeholder="************" required>
              </div>
              <div class="col-md-4">
                <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="logid" value="<?php echo $logid; ?>">
                <button type="submit" name="register" class="kenne-login_btn"> Reset Password </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  Login Register Area  End Here -->
