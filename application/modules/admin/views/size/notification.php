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
							<h6 class="panel-title txt-dark">Notification List</h6>
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

										     <th>Name</th>
										     <th>Mobile</th>
												 <th>Product</th>
										     <th>Size</th>
										     <th>Action</th>
										   </tr>
										 </thead>

										<tbody>
											<?php $i=1; foreach($notification as $row){?>
	 								   <tr>
	 								     <td> <?php echo $i ?></td>

	 								     <td><?php echo $row['name']  ?></td>
	 								     <td><?php echo $row['mobile'] ?></td>
	 								     <td><?php echo $row['proName'] ?></td>
											 <td><?php echo $row['size'] ?></td>
	 								     <td>
	 								         <?php if( $row['status']==0 ){?>
	 								         <a href="<?php echo base_url('admin/product/update_notifi/').$row['id']?>" title="Trash" class="pd-setting-ed" style="font-size:16px;color:red;"> New </a>
	 								         <?php } ?>
	 								          

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
