<div class="container-fluid">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Add Product</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('admin/Dashboard') ?>">Add Product</a></li>
				<li class="active"><span><?php echo $page ?></span></li>
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
						<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_6" href="#home">Product Details</a></li>
						<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#images" aria-expanded="true">Images</a></li>
						<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#attributes" aria-expanded="true">Product Attributes</a></li>
						<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#tagstab" aria-expanded="true">Tags & Category</a></li>
					</ul>
				</div>

				<div class="panel-wrapper collapse in">
					<div class="panel-body">

						<div class="pills-struct mt-40">
							<form action="<?php echo base_url('admin/Product/Add_attribute') ?>" method="POST" enctype="multipart/form-data">

								<div class="tab-content" id="myTabContent_6">
									<div id="home" class="tab-pane fade active in" role="tabpanel">
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small"> Name</label>
											<div class="col-sm-9">

												<input type="text" name="product" class="form-control input-sm" placeholder="Product">

											</div>

										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small">
												Description</label>
											<div class="col-sm-9">
												<textarea type="text" name="desc" class="form-control summernote"></textarea>
											</div>

										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small"> INR Price</label>

											<div class="col-sm-4">
												<input type="text" name="price" class="form-control input-sm" placeholder="Price">
											</div>

											<label class="col-sm-1 control-label " for="example-input-small">INR GST</label>
											<div class="col-sm-5">
											    <input type="text" name="inrgst" class="form-control">
												<!--<select name="inrgst" class="form-control">-->
												<!--	<option value="none">Select</option>-->
												<!--	<?php foreach ($gstValue as $row) { ?>-->
												<!--		<option value="<?php echo $row['gstValue'] ?>"> <?php echo $row['gstName'] ?>-->
												<!--		</option>-->
												<!--	<?php } ?>-->
												<!--</select>-->
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small"> USD Price</label>
											<div class="col-sm-4">
												<input type="text" name="usd" class="form-control input-sm" placeholder=" USD Price">
											</div>
											<label class="col-sm-1 control-label " for="example-input-small"> USD GST</label>
											<div class="col-sm-5">
											    <input type="text" name="usdgst" class="form-control">
												<!--<select name="usdgst" class="form-control">-->
												<!--	<option value="none">Select</option>-->
												<!--	<?php foreach ($gstValue as $row) { ?>-->
												<!--		<option value="<?php echo $row['gstValue'] ?>"> <?php echo $row['gstName'] ?>-->
												<!--		</option>-->
												<!--	<?php } ?>-->
												<!--</select>-->
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small">
												Quantity</label>
											<div class="col-sm-9">

												<input type="text" name="quantity" class="form-control input-sm" placeholder="Quantity">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small">
												Discount</label>
											<div class="col-sm-9">
												<input type="text" name="discount" class="form-control input-sm" placeholder="Discount">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small">
												Product Code</label>
											<div class="col-sm-9">
												<input type="text" name="product_code" class="form-control input-sm" placeholder="Product Code">
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
												image <span>(allowed file types :gif|jpg|png|jpeg Max-size:5 mb, MAX WxH :6000 x 6000 )</span></label>
											<div class="col-sm-10">
												<div class="mt-40">
													<input type="file" class="dropify form-control" name='profile' />
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 control-label " for="example-input-small"> Product Back image <span>(allowed file types :gif|jpg|png|jpeg Max-size:11mb,MAX WxH :6000 x 6000 )</span></label>
											<div class="col-sm-10">
												<div class="mt-40">
													<input type="file" class="dropify form-control" name='profile1' />
												</div>
											</div>
										</div>
									</div>

									<div id="attributes" class="tab-pane fade" role="tabpanel">
										<div class="container">
											<div class="form-group row">
												<label class="col-sm-2 control-label " for="example-input-small">Attribute</label>
												<div class="col-sm-4">
													<select name="attribute[]" class="form-control attribute">
														<option value="none">Select attribute</option>
														<?php foreach ($attribute as $row) { ?>
															<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?>
															</option>
														<?php } ?>
													</select>

												</div>
												<div class="col-sm-4 text">

												</div>
												<div class="col-sm-2">
													<button type="button" name="add_more" id="add" class="btn btn-success">+</button>
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
													<select class="select2 form-control" name='craft' data-placeholder="Choose Product Craft..." required>
														<?php foreach ($craft as $row) { ?>
															<option value="<?php echo $row['id'] ?>">
																<?php echo $row['craftname'] ?>
															</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group ">
													<label class="login2">Product Category</label>
													<select class="select2 form-control" name='category' id='category' data-placeholder="Choose a Category..." required>
														<?php foreach ($category as $row) {
															if ($row['parent'] == "none") { ?>
																<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
														<?php }
														} ?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group ">
													<label class="login2">Product Sub Category</label>
													<select class="select2 form-control" name='sub_category' data-placeholder="Choose a Category..." multiple >
														<?php foreach ($category as $row) {
															if ($row['parent'] != "none") {	?>
																<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
														<?php }
														} ?>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group ">
													<label class="login2">SHOP THE LOOK</label>
													<select class="select2 form-control" name='shopthelook[]' data-placeholder="Add Product to shop the look..." multiple>
														<?php foreach ($product as $row) { ?>
															<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-sm-4" id="size_container">
												<div class="form-group ">
													<label class="login2">Size</label>
													<select class="select2 form-control" name='masurment[]' data-placeholder="Choose a Size...">

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
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
													<td colspan='2'>Click to add images <span>(allowed file types :gif|jpg|png|jpeg Max-size:11mb,MAX WxH :6000 x 6000 )</span>
													</td>
													<td>

														<button type="button" name="add_image" id="add_image" class="btn btn-success">+</button>
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
<template id="template">
	<select name="value[]"  class="select2 form-control">
		<option value="aqua">AliceBlue</option>
		<option value="AntiqueWhite">AntiqueWhite</option>
		<option value="Azure">Azure</option>
		<option value="Aqua">Aqua</option>
		<option value="Beige">Beige</option>
		<option value="Bisque">Bisque</option>
		<option value="Black">Black</option>
		<option value="BlanchedAlmond">BlanchedAlmond</option>
		<option value="Blue">Blue</option>
		<option value="BlueViolet">BlueViolet</option>
		<option value="Brown">Brown</option>
		<option value="BurlyWood">BurlyWood</option>
		<option value="CadetBlue">CadetBlue</option>
		<option value="Chartreuse">Chartreuse</option>
		<option value="Chocolate">Chocolate</option>
		<option value="Coral">Coral</option>
		<option value="CornflowerBlue">CornflowerBlue</option>
		<option value="Cornsilk">Cornsilk</option>
		<option value="Crimson">Crimson</option>
		<option value="Cyan">v</option>
		<option value="DarkBlue">DarkBlue</option>
		<option value="DarkCyan">DarkCyan</option>
		<option value="DarkGoldenRod">DarkGoldenRod</option>
		<option value="DarkGray">DarkGray</option>
		<option value="DarkGreen">DarkGreen</option>
		<option value="DarkKhaki">DarkKhaki</option>
		<option value="DarkMagenta">DarkMagenta</option>
		<option value="DarkOliveGreen">DarkOliveGreen</option>
		<option value="DarkOrange">DarkOrange</option>
		<option value="DarkOrchid">DarkOrchid</option>
		<option value="DarkRed">DarkRed</option>
		<option value="DarkSalmon">DarkSalmon</option>
		<option value="DarkSeaGreen">DarkSeaGreen</option>
		<option value="DarkSlateBlue">DarkSlateBlue</option>
		<option value="DarkSlateGray">DarkSlateGray</option>
		<option value="DarkSlateGrey">DarkSlateGrey</option>
		<option value="DarkTurquoise">DarkTurquoise</option>
		<option value="DarkViolet">DarkViolet</option>
		<option value="DeepPink">DeepPink</option>
		<option value="DeepSkyBlue" DeepSkyBlue</option> <option value="DimGray">DimGray</option>
		<option value="DimGrey">DimGrey</option>
		<option value="DodgerBlue">DodgerBlue</option>
		<option value="FireBrick">FireBrick</option>
		<option value="FloralWhite">FloralWhite</option>
		<option value="ForestGreen">ForestGreen</option>
		<option value="Fuchsia">Fuchsia</option>
		<option value="Gainsboro">Gainsboro</option>
		<option value="GhostWhite">GhostWhite</option>
		<option value="Gold">Gold</option>
		<option value="GoldenRod">GoldenRod</option>
		<option value="Gray">Gray</option>
		<option value="Grey">Grey</option>
		<option value="Green">Green</option>
		<option value="GreenYellow">GreenYellow</option>
		<option value="HoneyDew">HoneyDew</option>
		<option value="HotPink">HotPink</option>
		<option value="IndianRed">IndianRed</option>
		<option value="Indigo">Indigo</option>
		<option value="Ivory">Ivory</option>
		<option value="Khaki">Khaki</option>
		<option value="Lavender">Lavender</option>
		<option value="LavenderBlush">LavenderBlush</option>
		<option value="LawnGreen">LawnGreen</option>
		<option value="LemonChiffon">LemonChiffon</option>
		<option value="LightBlue">LightBlue</option>
		<option value="LightCoral">LightCoral</option>
		<option value="LightCyan">LightCyan</option>
		<option value="LightGoldenRodYellow">LightGoldenRodYellow</option>
		<option value="LightGray">LightGray</option>
		<option value="LightGrey">LightGrey/option>
		<option value="LightGreen">LightGreen</option>
		<option value="Lightpink">Lightpink</option>
		<option value="LightSalmon">LightSalmon</option>
		<option value="LightSeaGreen">LightSeaGreen</option>
		<option value="LightSkyBlue">LightSkyBlue</option>
		<option value="LightSlateGray">LightSlateGray</option>
		<option value="LightSlateGrey">LightSlateGrey</option>
		<option value="LightSteelBlue">LightSteelBlue</option>
		<option value="LightYellow">LightYellow</option>
		<option value="Lime">Lime</option>
		<option value="LimeGreen">LimeGreen</option>
		<option value="Linen">Linen</option>
		<option value="Magenta">Magenta</option>
		<option value="Maroon">Maroon</option>
		<option value="MediumAquaMarine">MediumAquaMarine</option>
		<option value="MediumBlue">MediumBlue</option>
		<option value="MediumOrchid">MediumOrchid</option>
		<option value="MediumPurple">MediumPurple</option>
		<option value="MediumSeaGreen">MediumSeaGreen</option>
		<option value="MediumSlateBlue">MediumSlateBlue</option>
		<option value="MediumSpringGreen">MediumSpringGreen</option>
		<option value="MediumTurquoise">MediumTurquoise</option>
		<option value="MediumVioletRed">MediumVioletRed</option>
		<option value="MidnightBlue">MidnightBlue</option>
		<option value="MintCream">MintCream</option>
		<option value="MistyRose">MistyRose</option>
		<option value="Moccasin">Moccasin</option>
		<option value="NavajoWhite">NavajoWhite</option>
		<option value="Navy">Navy</option>
		<option value="OldLace">OldLace</option>
		<option value="Olive">Olive</option>
		<option value="OliveDrab">OliveDrab</option>
		<option value="Orange">Orange</option>
		<option value="OrangeRed">OrangeRed</option>
		<option value="Orchid">Orchid</option>
		<option value="PaleGoldenRod">PaleGoldenRod</option>
		<option value="PaleGreen">PaleGreen</option>
		<option value="PaleTurquoise">PaleTurquoise</option>
		<option value="PaleVioletRed">PaleVioletRed</option>
		<option value="PapayaWhip">PapayaWhip</option>
		<option value="PeachPuff">PeachPuff</option>
		<option value="Peru">Peru</option>
		<option value="Pink">Pink</option>
		<option value="Plum">Plum</option>
		<option value="PowderBlue">PowderBlue</option>
		<option value="Purple">Purple</option>
		<option value="RebeccaPurple">RebeccaPurple</option>
		<option value="Red">Red</option>
		<option value="RosyBrown">RosyBrown</option>
		<option value="RoyalBlue">RoyalBlue</option>
		<option value="SaddleBrown">SaddleBrown</option>
		<option value="Salmon">Salmon</option>
		<option value="SandyBrown">SandyBrown</option>
		<option value="SeaGreen">SeaGreen</option>
		<option value="SeaShell">SeaShell</option>
		<option value="Sienna">Sienna</option>
		<option value="Silver">Silver</option>
		<option value="SkyBlue">SkyBlue</option>
		<option value="SlateBlue">SlateBlue</option>
		<option value="SlateGray">SlateGray</option>
		<option value="SlateGrey">SlateGrey</option>
		<option value="Snow"></option> Snow</option>
		<option value="SpringGreen">SpringGreen</option>
		<option value="SteelBlue">SteelBlue</option>
		<option value="Tan">Tan</option>
		<option value="Teal">Teal</option>
		<option value="Thistle">Thistle</option>
		<option value="Tomato">Tomato</option>
		<option value="Turquoise">Turquoise</option>
		<option value="Violet">Violet</option>
		<option value="Wheat">Wheat</option>
		<option value="White">White</option>
		<option value="WhiteSmoke">WhiteSmoke</option>
		<option value="Yellow">Yellow</option>
		<option value="YellowGreen">YellowGreen</option>
	</select>
</template>
<!-- /Main Content -->
<script>
	function delete_detail(id) {
		var del = confirm("Do you want to Delete");
		if (del == true) {
			var sureDel = confirm("Are you sure want to delete");
			if (sureDel == true) {
				window.location = "<?php echo base_url() ?>admin/Product/Delete/" + id;
			}
		}
	}
</script>
<?php include('product_js.php'); ?>
