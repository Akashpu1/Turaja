<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">invoice</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('admin/Dashboard')?>">Dashboard</a></li>

								<li class="active"><span><?php echo $page;?></span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Invoice</h6>
									</div>
									<div class="pull-right">
										<h6 class="txt-dark">Order : <?php echo $order_data['user_id'];?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-6">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
												<address class="mb-15">
													<span class="address-head mb-5"><?php echo $order_data['first_name'].$order_data['last_name'] ;?></span>

													<?php echo $order_data['address'];?><br>
													<abbr title="Phone">Phone:</abbr>(91) <?php echo $order_data['phone'];?>
												</address>
											</div>
											<!-- <div class="col-xs-6 text-right">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">shiped to:</span>
												<address class="mb-15">
													<span class="address-head mb-5">Xyz, Inc.</span>
													795 Folsom Ave, Suite 600 <br>
													San Francisco, CA 94107 <br>
													<abbr title="Phone">P:</abbr>(123) 456-7890
												</address>
											</div> -->
										</div>

										<div class="row">
											<div class="col-xs-6">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">Payment Method:</span>
													<br>
												RazorPay<br>
													 <?php echo $order_data['email'];?>
												</address>
											</div>
											<div class="col-xs-6 text-right">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">order date:</span><br>
													 <?php echo my_date_show($order_data['created']);?><br><br>
												</address>
											</div>
										</div>

										<div class="seprator-block"></div>

										<div class="invoice-bill-table">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>Item</th>
															<th>Price</th>
															<th>Quantity</th>
															<th>Sub Total</th>

														</tr>
													</thead>
													<tbody>
														<?php foreach($allorder_data as $value):?>
														<tr>
															<td><?php echo $value['name']?></td>
															<td>₹ <?php echo $value['price']?></td>
															<td><?php echo $value['quantity']?></td>
															<td>₹ <?php echo $value['sub_total']?></td>
															<td style="display:none;" >₹ <?php $total= $total+$value['sub_total']?></td>
														</tr>
													<?php endforeach;?>

													</tbody>
												</table>
												<div class="pull-right">
													<strong>Total</strong>&nbsp;&nbsp;&nbsp;₹ <?php echo $total;?>
												</div>
											</div><br>

											<div class="button-list pull-right">

												<button type="button" class="btn btn-warning btn-outline btn-icon left-icon" onclick="javascript:window.print();">
													<i class="fa fa-print"></i><span> Print</span>
												</button>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
