<?php include('layout/css.php'); ?>
<div class="wrapper  theme-3-active pimary-color-blue">
	<!-- Top Menu Items -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="mobile-only-brand pull-left">
			<div class="nav-header pull-left">
				<div class="logo-wrap">
					<a href="<?php echo base_url('admin/dashboard') ?>">
						<img class="brand-img" src="<?php echo base_url('assets/images/menu/logo/1.png') ?>" alt="brand" height="50px;" width="180px;" />

					</a>
				</div>
			</div>
			<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
			<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
			<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			<form id="search_form" role="search" class="top-nav-search collapse pull-left">
				<div class="input-group">
					<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
					<span class="input-group-btn">
						<button type="button" class="btn  btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
					</span>
				</div>
			</form>
		</div>

		<div id="mobile_only_nav" class="mobile-only-nav pull-right">

			<ul class="nav navbar-right top-nav pull-right">

				<li class="dropdown auth-drp">

					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url('optimum') ?>/img/download.png" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>

					<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">

						<li>
							<a href="<?php echo base_url('home/logout') ?>"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>

	</nav>
	<!-- /Top Menu Items -->

	<!-- Left Sidebar Menu -->
	<div class="fixed-sidebar-left">
		<ul class="nav navbar-nav side-nav nicescroll-bar">
			<?php
			if (check()) {
				if (isAdmin($this->session->userdata('roles'))) {
			?>

					<li>
						<a class="active" href="<?php echo base_url('admin/Dashboard') ?>" data-toggle="collapse" data-target="#dashboard_dr">
							<div class="pull-left"><i class="zmdi zmdi-view-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div>
							<div class="clearfix"></div>
						</a>

					</li>

					<li>
						<a href="<?php echo base_url('admin/user') ?>" data-toggle="collapse" data-target="#ecom_dr">
							<div class="pull-left"><i class="zmdi zmdi-account-o mr-20"></i><span class="right-nav-text">Users</span></div>
							<div class="clearfix"></div>
						</a>
					</li>

					<li>
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#pro">
							<div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Products </span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="pro" class="collapse collapse-level-1 two-col-list">
							<li>
								<a href="<?php echo base_url('admin/Product/attribute') ?>">Add Product</a>
							</li>

							<li>
								<a href="<?php echo base_url('admin/Product') ?>">Product List</a>
							</li>
							<li>
								<a href="<?php echo base_url('admin/Attribute') ?>">Attribute </a>
							</li>
							<li>
								<a href="<?php echo base_url('admin/Product/Gst') ?>">GST </a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#ui_dr">
							<div class="pull-left"><i class="zmdi zmdi-collection-music mr-20"></i><span class="right-nav-text">Homepage</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
							<li>
								<!--<a href="<?php echo base_url('admin/homepage/faq') ?>">FAqs</a>-->
							</li>
							<li>
								<!--<a href="<?php echo base_url('admin/homepage/refund') ?>">Refund/Exchange policy</a>-->
							</li>
							<li>
								<a href="<?php echo base_url('admin/setting/slider') ?>">Add Slider</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="<?php echo base_url('admin/Category') ?>" data-toggle="collapse" data-target="#form_dr">
							<div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Category</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/newsletter') ?>" data-toggle="collapse" data-target="#form_dr">
							<div class="pull-left"><i class="zmdi zmdi-email mr-20"></i><span class="right-nav-text">News letter</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/Tags') ?>" data-toggle="collapse" data-target="#table_dr">
							<div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Tags</span></div>
							<div class="clearfix"></div>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url('admin/Size/addsize') ?>" data-toggle="collapse" data-target="#table_dr">
							<div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Size</span></div>
							<div class="clearfix"></div>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url('admin/Size/notification') ?>" data-toggle="collapse" data-target="#table_dr">
							<div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Notification</span></div>
							<div class="clearfix"></div>
						</a>
					</li>


					<li>
						<a href="<?php echo base_url('admin/order') ?>">
							<div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Order List</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" data-toggle="collapse" data-target="#setting">
							<div class="pull-left"><i class="zmdi zmdi-collection-music mr-20"></i><span class="right-nav-text">Setting</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>

						<ul id="setting" class="collapse collapse-level-1 two-col-list">

							<li>
								<a href="<?php echo base_url('admin/Social') ?>">Social icon</a>
							</li>
							<li>
								<a href="<?php echo base_url('admin/setting/SettingData') ?>"> Setting Data</a>
							</li>


						</ul>
					</li>
				<?php } else {
				?>
					<li>
						<a href="<?php echo base_url('admin/yourorder') ?>" data-toggle="collapse" data-target="#ourorder">
							<div class="pull-left"><i class="zmdi zmdi-view-dashboard mr-20"></i><span class="right-nav-text">Your Order</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
			<?php }
			} ?>
		</ul>
	</div>


	<!-- /Left Sidebar Menu -->

	<!-- Main Content -->
	<div class="page-wrapper">

		<?php echo	$main_content ?>

		<footer class="footer container-fluid pl-30 pr-30">
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="copyright-text text-center">
								<p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a href="https://rectorsol.com/">RectorSol</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>
	<!-- Footer -->

	<!-- /Footer -->
	<!-- /Main Content -->

</div>

<!-- /#wrapper -->

<?php include('layout/footer.php'); ?>