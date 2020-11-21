<!-- Begin Page Content Area -->
<?php //pre($profile); exit; ?>
<main class="page-content">
  <div class="account-page-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="account-logout-tab" href="<?php echo base_url('Home/logout') ?>" role="tab" aria-selected="false">Logout</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
              <div class="myaccount-dashboard">
                <p>Hello <b><?php echo $profile->first_name; ?></b> <a href="<?php echo base_url('Home/logout'); ?>"> </p>
                <p>From your account dashboard you can view your recent orders, manage your shipping and
                  billing addresses and <a href="javascript:void(0)">edit your password and account
                    details</a>.</p>
              </div>
            </div>
            <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
              <div class="myaccount-orders">
                <h4 class="small-title">MY ORDERS</h4>
                <?php if (!empty($orders)) : ?>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <tbody>
                        <tr>
                          <th>ORDER</th>
                          <th>DATE</th>
                          <th>STATUS</th>
                          <th>TOTAL</th>
                          <th></th>
                          <th></th>
                        </tr>
                        <?php foreach ($orders as $value) : ?>
                          <tr>
                            <td><a class="account-order-id" href="javascript:void(0)">#<?php echo $value['id'] ?></a></td>
                            <td><?php echo my_date_show($value['created']); ?></td>

                            <td><?php echo $value['status']; ?></td>

                            <td>₹ <?php echo $value['grand_total']; ?> for <?php echo $value['quantity']; ?> items</td>
                            <td>
                              <?php if (dateDiffInDays($value['created']) < 1 && ($value['status'] == 'pending' || $value['status'] == 'on_way')) { ?>
                                <a class="kenne-btn kenne-btn_sm " href="<?php echo base_url('cancel/') . $value['id'] ?>"><span> Cancel </span></a>
                              <?php } else {
                                echo $value['status'];
                              } ?>
                            </td>
                            <td>
                              <button class="kenne-btn kenne-btn_sm view" value="<?php echo$value['id']?>"><span>View</span></button>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
              <?php if (!empty($address)) : ?>
                <div class="myaccount-address">
                  <p>The following addresses will be used on the checkout page by default.</p>

                  <?php foreach ($address as $value) : ?>
                    <div class="row">
                      <div class="col">
                        <h4 class="small-title">Shipping Address</h4>
                        <address>
                          <?php echo  $value->addstr; ?>
                        </address>
                        <div class="editaddress">
                          <a href="<?php echo base_url('editaddress/') . $value->address_id; ?>"> Edit</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  <div class="row">
                    <div class="col">
                      <div class="editaddress">
                        <a href="<?php echo base_url('naddress'); ?>"><button type="button" class="kenne-register_btn"> Add New Address </button> </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php else : ?>
                <div class="myaccount-address">
                  <p>No Shipping Address Found.</p>
                  <div class="row">
                    <div class="col">
                      <div class="editaddress">
                        <a href="<?php echo base_url('naddress'); ?>"> Add New Address</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
              <div class="myaccount-details">
                <form action="<?php echo base_url('profile/update') ?>" class="kenne-form" method="post">
                  <div class="kenne-form-inner">
                    <div class="single-input">
                      <label for="account-details-lastname">Full Name*</label>
                      <input type="text" name="fullname" required value="<?php echo $profile->first_name . " " . $profile->last_name; ?>">
                    </div>
                    <div class="single-input single-input-half">
                      <label for="account-details-email">Email*</label>
                      <input type="email" name="email" readonly required value="<?php echo $profile->email; ?>">
                    </div>
                    <div class="single-input single-input-half">
                      <label for="account-details-email">Mobile*</label>
                      <input type="text" name="phone" required value="<?php echo $profile->phone; ?>">
                    </div>
                    <div class="single-input">
                      <label for="account-details-oldpass">Current Password(leave blank to leave
                        unchanged)</label>
                      <input type="password">
                    </div>
                    <div class="single-input">
                      <label for="account-details-newpass">New Password (leave blank to leave
                        unchanged)</label>
                      <input type="password" name="password">
                    </div>
                    <div class="single-input">
                      <label for="account-details-confpass">Confirm New Password</label>
                      <input type="password" name="re_password">
                    </div>
                    <div class="single-input">
                      <button class="kenne-btn kenne-btn_dark" name="register" type="submit"><span>SAVE
                          CHANGES</span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  Account Page Area End Here -->
</main>