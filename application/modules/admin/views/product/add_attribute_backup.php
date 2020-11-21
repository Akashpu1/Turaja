<div class="container-fluid">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Add Product</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('admin/Dashboard')?>">Add Product</a></li>
				<li class="active"><span><?php echo $page?></span></li>
				<!-- <li class="active"><span>data-table</span></li> -->
			</ol>

		</div>
		<!-- /Breadcrumb -->
	</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">

			<div class="panel-heading">
				<ul role="tablist" class="nav nav-pills" id="myTabs_6">
					<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab"
							id="home_tab_6" href="#home">Product Details</a></li>
					<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#images"
							aria-expanded="true">Images</a></li>
					<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab"
							href="#attributes" aria-expanded="true">Product Attributes</a></li>
					<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#tagstab"
							aria-expanded="true">Tags & Category</a></li>
				</ul>
			</div>

			<div class="panel-wrapper collapse in">
				<div class="panel-body">

					<div class="pills-struct mt-40">
						<form action="<?php echo base_url('admin/Product/Add_attribute')?>" method="POST" enctype="multipart/form-data">

							<div class="tab-content" id="myTabContent_6">
								<div id="home" class="tab-pane fade active in" role="tabpanel">
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small"> Name</label>
										<div class="col-sm-9">

											<input type="text" name="product" class="form-control input-sm"
												placeholder="Product">

										</div>

									</div>
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
											Description</label>
										<div class="col-sm-9">
											<textarea type="text" name="desc"	class="form-control summernote"></textarea>
										</div>

									</div>
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small"> INR Price</label>

										<div class="col-sm-4">
											<input type="text" name="price" class="form-control input-sm"
												placeholder="Price">
										</div>
										<label class="col-sm-1 control-label " for="example-input-small"> USD  Price</label>
										<div class="col-sm-4">
											<input type="text" name="usd" class="form-control input-sm"
												placeholder=" USD Price">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
											Quantity</label>
										<div class="col-sm-9">

											<input type="text" name="quantity" class="form-control input-sm"
												placeholder="Quantity">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
											Discount</label>
										<div class="col-sm-9">
											<input type="text" name="discount" class="form-control input-sm"
												placeholder="Discount">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
											Product Code</label>
										<div class="col-sm-9">
											<input type="text" name="product_code" class="form-control input-sm"
												placeholder="Product Code">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
										GST</label>
										<div class="col-sm-9">
											<select name="gst" class="form-control">
												<option value="none">Select</option>
												<?php foreach($gstValue as $row){ ?>
												<option value="<?php echo $row['gstValue'] ?>"> <?php echo $row['gstName'] ?>
												</option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small">
											Care</label>
										<div class="col-sm-9">
											<textarea name="care" class="form-control input-sm"></textarea>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small"> Product
											image</label>
										<div class="col-sm-10">
											<div class="mt-40">
												<input type="file" class="dropify form-control" name='profile' />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 control-label " for="example-input-small"> Product	Back image </label>
										<div class="col-sm-10">
											<div class="mt-40">
												<input type="file" class="dropify form-control" name='profile1'/>
											</div>
										</div>
									</div>
								</div>

								<div id="attributes" class="tab-pane fade" role="tabpanel">
									<div class="container">
										<div class="form-group row">
											<label class="col-sm-2 control-label "
												for="example-input-small">Attribute</label>
											<div class="col-sm-4">
												<select name="attribute[]" class="form-control">
													<option value="none">Select attribute</option>
													<?php foreach($attribute as $row){ ?>
													<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?>
													</option>
													<?php } ?>
												</select>

											</div>
											<div class="col-sm-4">
												<input type="text" name="value[]" class="form-control input-sm"
													placeholder="value">
											</div>
											<div class="col-sm-2">
												<button type="button" name="add_more" id="add"
													class="btn btn-success">+</button>
											</div>
										</div>
										<div class="form-group row" id="add_data"></div>


									</div>
								</div>
								<div id="tagstab" class="tab-pane fade" role="tabpanel">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group ">
												<label class="login2">Craft Type</label>
												<select class="select2 form-control" name='craft'
													data-placeholder="Choose Product Craft..." required>
													<?php foreach($craft as $row){ ?>
													<option value="<?php echo $row['id'] ?>">
														<?php echo $row['craftname'] ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<!-- <div class="col-sm-3">
											<div class="form-group ">
												<label class="login2">Product Tag</label>
												<select class="select2 form-control" name='tag[]'
													data-placeholder="Choose a Tags..." multiple="multiple" required>
													<?php foreach($tag as $row){ ?>
													<option value="<?php echo $row['id'] ?>">
														<?php echo $row['title'] ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div> -->
										<div class="col-sm-4">
											<div class="form-group ">
												<label class="login2">Product Category</label>
												<select class="select2 form-control" name='category'
													data-placeholder="Choose a Category..."  required>
													<?php foreach($category as $row){ ?>
													<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group ">
											<label class="login2">Size</label>
											<select class="select2 form-control" name='masurment[]' data-placeholder="Choose a Category..." multiple required>

												<option value=""> Null</option>
												<option value="S"> S</option>
												<option value="M"> M</option>
												<option value="L"> L</option>
												<option value="XL"> XL</option>
												<option value="XXl"> XXL</option>
											</select>
											</div>
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-sm-12 text-center">
											<input type="hidden"
												name="<?php echo $this->security->get_csrf_token_name();?>"
												value="<?php echo $this->security->get_csrf_hash();?>">
											<input type="submit" value="Submit" class="btn btn-primary pull-right">

										</div>

									</div>
								</div>
								<div id="images" class="tab-pane fade" role="tabpanel">
									<div class="form-group row">
										<table class="table" id="tr_images">
											<tr>
												<th>Image</th>
												<th>Upload</th>
												<th>option</th>
											</tr>

											<tr>
												<td colspan='2'>Click to add images
												</td>
												<td>

													<button type="button" name="add_image" id="add_image"
														class="btn btn-success">+</button>
												</td>
											</tr>

										</table>
									</div>
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
<!-- /Main Content -->
<script>
	function delete_detail(id) {
		var del = confirm("Do you want to Delete");
		if (del == true) {
			var sureDel = confirm("Are you sure want to delete");
			if (sureDel == true) {
				window.location = "<?php echo base_url()?>admin/Product/Delete/" + id;
			}
		}
	}
</script>
<?php include('product_js.php');?>
