
		<div class="container-fluid">

			<!-- Title -->
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark">Dashboard</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin/Dashboard')?>">Dashboard</a></li>
					<li  class="active"><span><?php echo $page?></span></li>
					<!-- <li class="active"><span>data-table</span></li> -->
					</ol>

				</div>

				<!-- /Breadcrumb -->
			</div>


			<!-- Row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Blog List</h6>
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
													<!-- <th data-field="state" data-checkbox="true"></th> -->
													<th>S.No</th>
													<th>Title</th>

													<th>Status</th>
													<th>Created</th>
													<th>Date</th>
													<th data-field="action">Action</th>
										 	</tr>
											<?php $i=1; foreach ($articles as $value): ?>
												<tr>

													<td><?php echo $i; ?></td>
													<td><?php echo $value['title'] ?></td>

													<td>
														<?php if ($value['is_publish']): ?>
															<span>Publish</span>
														<?php else: ?>
															<button class="btn btn-default">Draft</button>
														<?php endif ?>
													</td>
													<td><?php echo $value['created_by'] ?></td>
													<td><?php echo my_date_show($value['created_at']) ?></td>

													<td>
													 	 <a class="pd-setting-ed" onclick="Edit_detail(<?php echo $value['id'] ;?>)"><i class="fa fa-pencil-square-o " aria-hidden="true" style="font-size:20px;color:#007bff;"></i></a>
														 <a title="Trash" class="pd-setting-ed " onclick="delete_detail(<?php echo $value['id'] ;?>)"><i class="fa fa-trash-o " aria-hidden="true" style="font-size:20px;color:red;"></i></a>
													</td>
												</tr>
											<?php $i++; endforeach; ?>

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
		function delete_detail(id) {
			var del = confirm("Do you want to Delete");
			if (del == true) {
				var sureDel = confirm("Are you sure want to delete");
				if (sureDel == true) {
					window.location = "<?php echo base_url()?>admin/article/Delete/" + id;
				}

			}
		}
		function Edit_detail(id) {

				var sureDel = confirm("Are you sure want to Edit");
				if (sureDel == true) {
					window.location = "<?php echo base_url()?>admin/article/edit/" + id;
				}
		}
		</script>
