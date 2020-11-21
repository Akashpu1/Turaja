<div class="container-fluid">
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Dashboard</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
				<li class="active"><span><?php echo $page ?></span></li>
				<!-- <li class="active"><span>data-table</span></li> -->
			</ol>
		</div>
		<!-- /Breadcrumb -->
	</div>

	<!-- /Title -->
	<div id="addnew" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
		<div class="modal-dialog" role="document ">
			<div class="modal-content">

				<form action="<?php echo base_url('admin/Category/Add') ?>" method="POST">
					<div class="modal-header header-color-modal bg-color-1 sliderForm ">
						<h4>Add Category </h4>
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<div class="modal-body">
						<div class="widget-content nopadding">
							<div class="form-group row">
								<label class="control-label col-sm-3">Name</label>
								<div class="col-sm-9">
									<input name="name" type="text" class="form-control" placeholder="Name">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-sm-3">Parent</label>
								<div class="col-sm-9">
									<select name="parent" id="icon" class="form-control">
										<option value="none">none</option>
										<?php foreach ($category as $row) { ?>
											<option value="<?php echo $row['name'] ?>"> <?php echo $row['name'] ?> </option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="modal-footer">
								<span id="msg" style="color: red;"></span>
								<input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
								<input type="submit" value="Save" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Category List</h6>
					</div>
					<div class="span4 pull-right">
						<a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add New</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<caption>
										<!-- <h4> User  List</h4> -->
									</caption>
									<tr>
										<th>S.No</th>
										<th>Name</th>
										<th>Parent</th>
										<th>Images</th>
										<th>Action</th>
									</tr>
									<?php $i = 1;
									foreach ($aim as $row) { ?>
										<tr>
											<td> <?php echo $i ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['parent'] ?></td>
											<td><img src="<?php echo base_url('/uploads/cat/') . $row['images'] ?>" style="width: 50px; height: 50px;"></td>
											<td> <a data-target="<?php echo '#' . $row['id']; ?>" class="pd-setting-ed" data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i></a>
												&nbsp;&nbsp;
												<!-- <a title="Trash" class="pd-setting-ed" onclick="delete_detail(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o"
						   aria-hidden="true" style="font-size:20px;color:red;"></i></a> -->
											</td>
										</tr>

										<div id="<?php echo $row['id']; ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
											<div class="modal-dialog" role="document ">
												<div class="modal-content">
													<form class="form-horizontal" method="post" action="<?php echo base_url('admin/Category/Edit/') . $row['id'] ?>" enctype="multipart/form-data">
														<div class="modal-header header-color-modal bg-color-1 ">
															<h4 class="modal-title">Edit Category</h4>
															<div class="modal-close-area modal-close-df">
																<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
															</div>
														</div>
														<div class="modal-body">
															<div class="widget-content nopadding">
																<div class="form-group row">
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" id="required">



																	</div>
																</div>

																<div class="form-group row">
																	<div class="col-sm-12">
																		<select name="parent" id="icon" class="form-control">
																			<option value="none">none</option>

																			<?php foreach ($category as $row1) { ?>
																				<option <?php if ($row1['name'] == $row['parent']) { ?>selected<?php } ?> value="<?php echo $row1['name'] ?>"> <?php echo $row1['name'] ?> </option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<label for="exampleFormControlFile1">Image</label>
																<input type="file" class="form-control-file" id="images" name="images">
																<span>Allowed Image types :gif|jpg|png|jpeg Max-size:5 mb, MAX WxH :1600 x 2500</span>
																<div class="modal-footer">
																	<span id="msg" style="color: red;"></span>
																	<input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
																	<input type="submit" value="upload" class="btn btn-primary">
																</div>




															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php $i++;
									} ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Row -->
</div>
<!-- /Main Content -->
<script>
	// function delete_detail(id) {
	//   var del = confirm("Do you want to Delete");
	//   if (del == true) {
	//     var sureDel = confirm("Are you sure want to delete");
	//     if (sureDel == true) {
	//       window.location = "<?php //echo base_url()
								?>admin/Category/Delete/" + id;
	//     }

	//   }
	// }
	$('.sliderForm').on('submit', function(event) {
		event.preventDefault();
		if ($('input[name=featureImage]').length) {
			$(this)[0].submit();
		} else {
			$('#msg').html('Select Image file After Click Save');
		}
	})
</script>