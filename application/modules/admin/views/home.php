<div class="container-fluid pt-30">

	<!-- Row -->
	<div class="row">
		<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view pa-0">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">
						<div class="sm-data-box">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
										<span class="txt-dark block counter"><span class="counter-anim"><?php echo $totalOrder;?></span></span>
										<span class="weight-500 uppercase-font block text-primary">Total Order</span>
									</div>
									<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
										<i class="icon-graph  data-right-rep-icon txt-grey"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $newOrder;?></span></span>
													<span class="weight-500 uppercase-font block font-13 text-success">New Order</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-user-following data-right-rep-icon txt-grey"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $accepted;?></span></span>
													<span class="weight-500 uppercase-font block text-info" >Accepted</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-graph  data-right-rep-icon txt-grey"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $pending;?></span></span>
													<span class="weight-500 uppercase-font block text-warning">Pending</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-graph  data-right-rep-icon txt-grey"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $cancle;?></span></span>
													<span class="weight-500 uppercase-font block text-danger">Cancle</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-graph  data-right-rep-icon txt-grey"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter"><span class="counter-anim"><?php echo $new_customer;?></span></span>
													<span class="weight-500 uppercase-font block">New customer</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-layers data-right-rep-icon txt-grey"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

	</div>
	<!-- /Row -->

	<!-- Row -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-default card-view panel-refresh">
				<div class="refresh-container">
					<div class="la-anim-1"></div>
				</div>
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Top 10 order  List</h6>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body row pa-0">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table  display table-hover border-none">
									<thead>
										<tr>
											<th>S.No</th>
	 									 <th>Customer Name</th>
	 									 <th>Phone</th>
	 									 <th>Order Date</th>
	 									 <th>Status</th>
										</tr>
									</thead>

									<tbody>
											 <?php $i=1; foreach($orderlimit as $row){?>
										<tr>
										<td> <?php echo $i;?></td>
	 									 <td><?php echo $row['first_name']. $row['last_name']?></td>
	 									 <td><?php echo $row['phone'] ?></td>
	 									 <td><?php echo my_date_show($row['created']) ?></td>

	 							   	<td><?php if($row['status']==1){?>
	 									<a href="" width="45px" height="20px" style="color:green;font-weight: bold; " class="text-center tip ">New</a>
	 							  	<?php	}?></td>
										</tr>
										<?php $i++ ;	}?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-lg-6 col-md-6 col-xs-12">
			<div class="panel panel-default card-view panel-refresh">
				<div class="refresh-container">
					<div class="la-anim-1"></div>
				</div>
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Top 10 Contact  List</h6>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body row pa-0">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table  display table-hover border-none">
									<thead>
										<tr>
										 <th>S.No</th>
	 									 <th>Name</th>
	 									 <th>Phone</th>
	 									 <th>Email</th>
										 <th>Status</th>
										</tr>
									</thead>

									<tbody>
											 <?php $i=1; foreach($contact_data as $row){?>
										<tr>
											<td> <?php echo $i ?></td>
 										 <td><?php echo $row['name'] ?></td>
 										 <td><?php echo $row['phone'] ?></td>
 										 <td><?php echo $row['email'] ?></td>

										 <td><?php if($row['status']=='New'){?>
	 									  <a href="<?php echo base_url('admin/Contact/update_status1/').$row['id'] ?>" width="45px" height="20px" style="color:green;font-weight: bold; " class="text-center tip "><?php echo $row['status'] ?></a>
	 									 <?php }?></td>

										</tr>
										<?php $i++ ;	}?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<!-- /Row -->
</div>
