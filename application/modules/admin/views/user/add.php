<!-- Main Content -->

	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark"></h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
				<li><a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a></li>
				<!-- <li><a href="#"><span>table</span></a></li> -->
				<li class="active"><span><?php echo $page?></span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">User List</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="table-wrap">
								<div class="table-responsive">
									<table id="datable_1" class="table table-hover display  pb-30" >
										<thead>
										   <tr>
										     <th>S.No</th>
										     <th>Id</th>
										     <th>Name</th>
										     <th>Email</th>
										     <th>Mobile</th>
										     <th>address</th>
										     <th>Action</th>
										   </tr>
										 </thead>

										<tbody>
											<?php $i=1; foreach($aim as $row){?>
	 								   <tr>
	 								     <td> <?php echo $i ?></td>
	 								     <td><?php echo $row['user_id'] ?></td>
	 								     <td><?php echo $row['first_name']." ".$row['last_name']  ?></td>
	 								      <td><?php echo $row['email'] ?></td>
	 								     <td><?php echo $row['phone'] ?></td>
	 								     <td><?php echo $row['address'] ?></td>
	 								     <td>
	 								         <a title="Trash" class="pd-setting-ed" onclick="delete_detail(<?php echo $row['id'] ;?>)"><i class="fa fa-trash-o " aria-hidden="true" style="font-size:20px;color:red;"></i></a>

	 								      </td>
	 								   </tr>
                            <?php $i++;} ?>

										</tbody>
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
		 function delete_detail(id) {
			 var del = confirm("Do you want to Delete");
			 if (del == true) {
				 var sureDel = confirm("Are you sure want to delete");
				 if (sureDel == true) {
					 window.location = "<?php echo base_url()?>admin/user/Delete/" + id;
				 }

			 }
		 }
	 </script>
<style>

</style>

<!-- /Main Content -->
