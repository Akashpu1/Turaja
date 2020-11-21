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


			<!-- /Title -->
			<!-- Row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Order List</h6>
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
									 <th>Customer Name</th>
									 <th>Phone</th>
									 <th>Order Date</th>
									 <th>Status</th>
                   <th>Invoice</th>
									 <th>Action</th>
								 </tr>
								 <?php $i=1; foreach($order_data as $row){?>
								 <tr>
									 <td> <?php echo $i ?></td>
									 <td><?php echo $row['first_name']. $row['last_name']?></td>
									 <td><?php echo $row['phone'] ?></td>

									 <td><?php echo my_date_show($row['created']) ?></td>

								  <td style="font-size:16px;font-weight:bold"><?php  if($row['status']==1){?>
										<a href="<?php echo base_url('admin/order/update_status1/').$row['id'] ?>"  class=" " style="color:#007bff;">Created</a>
									   <?php	}elseif($row['status']==2){?>
										<a href="<?php echo base_url('admin/order/update_status2/').$row['id'] ?>"  class=" " style="color:#28a745;">Accepted</a>
									<?php	}elseif($row['status']==3){?>
									<a href="<?php echo base_url('admin/order/update_status3/').$row['id'] ?>"  class="" style="color:#ffc107;"> pending</a>

									<?php }else{?>
										<a href="#"  class="" style="color:#dc3545;">Cancle</a>

							<?php		} ?>
							 </td>


									<td><a href="<?php echo base_url('admin/order/invoice/').$row['id']?>" class="btn btn-primary "><i class="fa fa-print" aria-hidden="true"></i></a></td>

									 <td> <a title="Trash" class="" onclick="delete_detail(<?php echo $row['id'] ;?>)">
											<i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>



								 </tr>


								 <?php $i++ ;	}?>
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
					window.location = "<?php echo base_url()?>admin/order/Delete/" + id;
				}

			}
		}
		</script>

	<!-- /Main Content -->
