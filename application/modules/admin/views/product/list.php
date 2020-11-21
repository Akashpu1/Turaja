
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
							<h6 class="panel-title txt-dark">Product List</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="table-wrap">
								<div class="table-responsive">
									<table id="datable_1" class="table table-hover display  pb-30" >
											 <caption>
												 <!-- <h4> User  List</h4> -->
											 </caption>
												 <tr>
													 <th>S.No</th>
													 <!-- <th>Id</th> -->
													 <th>Pic</th>
													 <th>Name</th>
													 <th>Price</th>
													 <th>Quantity</th>
													 <th>Status</th>
													 <th>Action</th>
												 </tr>
								       <?php $i=1; foreach($product_data as $row){?>
												 <tr>
													 <td> <?php echo $i ?></td>
													 <!-- <td class="get_data"  ><?php echo $row['id'] ?></td> -->
													 <td class="get_data" id="<?php echo $row['id'] ?>"><img src="<?php echo base_url('/uploads/product/').$row['profile_pic'] ?>" style="width:50px " alt="<?php echo $row['profile_pic'] ?>" ></td>
													 <td class="get_data" ><?php echo $row['name'] ?></td>
													 <td class="get_data" ><?php echo $row['price'] ?></td>
													 <td class="get_data" ><?php echo $row['quantity'] ?></td>


												  <td class="get_data">
                            <?php if($row['status']=='On_Sell'){?>
													<a href="<?php echo base_url('admin/product/update_status1/').$row['id'] ?>" class="text-center tip" style="color:#28a745"><?php echo $row['status'] ?></a>

													<?php	}else{	?>
														<a href="<?php echo base_url('admin/product/update_status2/').$row['id'] ?>" class="text-center tip " style="color:#17a2b8"><?php echo $row['status'] ?></a>
											     <?php		}?>
													</td>


													 <td>
														 <a class="text-center tip" onclick="Edit_detail(<?php echo $row['id'] ;?>)"><i class="fa fa-pencil-square-o " aria-hidden="true" style="font-size:20px;color:#007bff;"></i></a>
														 <a title="Trash" class="pd-setting-ed " onclick="delete_detail(<?php echo $row['id'] ;?>)"><i class="fa fa-trash-o " aria-hidden="true" style="font-size:20px;color:red;"></i></a>
													 </td>
												 </tr>


								 <?php $i++ ; }?>

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
					window.location = "<?php echo base_url()?>admin/Product/Delete/" + id;
				}

			}
		}
		function Edit_detail(id) {

				var sureDel = confirm("Are you sure want to Edit");
				if (sureDel == true) {
					window.location = "<?php echo base_url()?>admin/Product/product_details/" + id;
				}
		}
	</script>
	<?php include('product_js.php');?>
