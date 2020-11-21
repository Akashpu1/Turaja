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

				<form action="<?php echo base_url('admin/Size/Add') ?>" method="POST" enctype="multipart/form-data">
					<div class="modal-header header-color-modal bg-color-1 ">
						<h4>Add Size Chart </h4>
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<div class="modal-body">
						<div class="widget-content nopadding">
							<div class="form-group row">
								<div class="col-sm-12">
									<select class="select2 form-control" name='category' id="category" data-placeholder="Choose a Category..." required>
										<?php foreach ($category as $row) { ?>
											<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<select class="select2 form-control" name='product' id="product" data-placeholder="Choose a product..." required>

									</select>

								</div>
							</div>


							<div class="form-group row">
								<div class="col-sm-12">
									<textarea type="text" name="body_text" class="form-control summernote"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<input name="chart" type="file" class="form-control" placeholder="Text">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<textarea type="text" name="garment_text" class="form-control summernote"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<input name="image" type="file" class="form-control" placeholder="Text">
								</div>
							</div>


							<div class="modal-footer">
								<input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input type="submit" value="Submit" class="btn btn-primary">
								<a data-dismiss="modal" class="btn" href="#">Cancel</a>
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
						<h6 class="panel-title txt-dark">Chart List</h6>
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
									<thead>
										<tr>
											<th>S.No</th>
											<th>Product</th>
											<th>Body text</th>
											<th>Body Image</th>
											<th>Garment text</th>
											<th>Garment Image</th>

											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($chart as $row) { ?>
											<tr>
												<td> <?php echo $i ?></td>
												<td><?php echo $row['productId'] ?></td>
												<td><?php echo $row['text'] ?></td>
												<td><img src="<?php echo base_url('/uploads/size_chart/') . $row['chart'] ?>" style="width:50px " alt="<?php echo $row['chart'] ?>"></td>
												<td><?php echo $row['text2'] ?></td>
												<td><img src="<?php echo base_url('/uploads/size_chart/') . $row['image'] ?>" style="width:50px " alt="<?php echo $row['image'] ?>"></td>
												<td>
													<a data-target="<?php echo '#modal' . $row['id']; ?>" class="pd-setting-ed " data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i></a>
													<a title="Trash" class="pd-setting-ed " onclick="delete_detail(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o " aria-hidden="true" style="font-size:20px;color:red;"></i></a>
												</td>


											</tr>


										<?php
											$i++;
										} ?>
									</tbody>
									<div id="modal<?php echo $row['id'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
										<div class="modal-dialog" role="document ">
											<div class="modal-content">
												<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/Size/Edit/') . $row['id'] ?>">
													<div class="modal-header header-color-modal bg-color-1 ">
														<h4 class="modal-title">Edit Size Chart</h4>
														<div class="modal-close-area modal-close-df">
															<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
														</div>
													</div>
													<div class="modal-body">
														<div class="widget-content nopadding">

															<div class="form-group row">
																<div class="col-sm-12">
																	<input type="text" class="form-control" name="product" value="<?php echo $row['productId'] ?>" readonly>

																</div>
															</div>


															<div class="form-group row">
																<div class="col-sm-12">
																	<textarea type="text" name="body_text" class="form-control summernote">
																		<?php echo $row['text'] ?>
																	</textarea>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<img src="<?php echo base_url('/uploads/size_chart/') . $row['chart'] ?>" style="width:50px " alt="<?php echo $row['chart'] ?>">
																	Change Me
																</div>
																<div class="col-sm-8">
																	<input name="chart" type="file" class="form-control">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<textarea type="text" name="garment_text" class="form-control summernote">
																		<?php echo $row['text2'] ?>
																	</textarea>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<img src="<?php echo base_url('/uploads/size_chart/') . $row['image'] ?>" style="width:50px " alt="<?php echo $row['image'] ?>">Change Me
																</div>
																<div class="col-sm-8">
																	<input name="image" type="file" class="form-control">
																</div>
															</div>




															<div class="modal-footer">
																<input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">
																<input type="submit" value="Update" class="btn btn-primary">
																<a data-dismiss="modal" class="btn" href="#">Cancel</a>
															</div>
														</div>
												</form>
											</div>
										</div>
									</div>

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

<script>
	$(document).ready(function() {

		$("#category").change(function() {
			var id = $(this).val();
			var html = '';
			$.ajax({
				url: "<?php echo base_url('admin/Size/getId'); ?>",
				method: "POST",
				data: {
					id: id
				},

				success: function(data) {
					data = JSON.parse(data);
					//	console.log(data);
					data.forEach(value);

					function value(item, index, arr) {


						html += '<option value=' + arr[index].id + '>' + arr[index].name + '</option>';

					}
					$('#product').html(html);

				}
			});
		});

	});



	function delete_detail(id) {
		var del = confirm("Do you want to Delete");
		if (del == true) {
			var sureDel = confirm("Are you sure want to delete");
			if (sureDel == true) {
				window.location = "<?php echo base_url() ?>admin/Size/Delete/" + id;
			}

		}
	}
</script>

<!-- /Main Content -->