
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
        <!-- breadcrumb area end -->

        <!-- google map start -->
        <!-- <div class="map-area section-padding">
            <div id="google-map"></div>
        </div> -->
        <!-- google map end -->

        <!-- contact area start -->
        <div class="contact-area section-padding pt-0">
            <div class="container">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper ">
									<div class="panel-body">
										<div class="form-wrap">
											<form role="form" class="form-horizontal">
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label " for="example-input-small">Select Product</label>
                          <div class="col-sm-9">
                            <select class="select2_demo_2 form-control" name='user' data-placeholder="Choose a Product..." >
                              <?php foreach($product_data as $row){ ?>
                              <option value="<?php echo $row['id'] ?>"> <?php echo $row['product'] ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Select Product</label>
                            <div class="col-sm-9">
                              <select  name='product' data-placeholder="Choose a Product..." >
                                  <option>Select Product</option>
                                <?php foreach($product_data as $row){ ?>
                                <option value="<?php echo $row['id'] ?>"> <?php echo $row['product'] ?> </option>
                                <?php } ?>
                              </select>
                           </div>
                        </div>
												<div class="form-group row">
													<label class="col-sm-3 control-label " for="example-input-small">Select user</label>
													<div class="col-sm-9">
                            <select  name='user' data-placeholder="Choose a Category..." >
                              <option>Select user</option>
        		                  <?php foreach($user_data as $row){ ?>
        		                  <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
        		                  <?php } ?>
        		                </select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 control-label " for="example-input-normal">Price</label>
													<div class="col-sm-6">
														<input type="text" id="example-input-normal" name="price" class="form-control" placeholder="Price">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 control-label " for="example-input-large">discount Prise</label>
													<div class="col-sm-6">
														<input type="text" id="example-input-large" name="discount" class="form-control input-lg" placeholder="Discount price">
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
        <!-- contact area end -->
<style>
select{
  width:100%;
}
</style>
