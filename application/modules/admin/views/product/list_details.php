

			<!-- Row -->

							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">product_details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-wrap">
													<form class="form-horizontal" role="form">
														<div class="form-body">
															<!-- <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Person's Info</h6>
															<hr class="light-grey-hr"/> -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">

																		<div class="col-md-12">
																			<h5 class="form-control-static">Product </h5>
																		</div>

																	</div>
																	<div class="form-group">

																		 <?php foreach($attribute as $row){?>
																		<label class="control-label col-md-4"><b><?php echo $row['attribute'] ?>:-<b></label>

																		<div class="col-md-8">
																			<p class="form-control-static"> <?php echo $row['value'] ?> </p>
																		</div>
																			<?php } ?>
																	</div>
																</div>

															</div>

															<hr class="light-grey-hr"/>


													</form>
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
