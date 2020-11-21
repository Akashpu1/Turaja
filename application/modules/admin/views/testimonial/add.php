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
	<div id="addnew"	class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
	  <div class="modal-dialog" role="document ">
	    <div class="modal-content">

	            <form action="<?php echo base_url('admin/Testimonial/Add')?>" method="POST" enctype="multipart/form-data">
	              <div class="modal-header header-color-modal bg-color-1 ">
	              <h4>Add Testimonial </h4>
	              <div class="modal-close-area modal-close-df">
	                <a class="close" data-dismiss="modal" href="#"><i
	                    class="fa fa-close"></i></a>
	              </div>
	            </div>
	              <div class="modal-body">
	                <div class="widget-content nopadding">
	                  <div class="form-group row">

	                      <div class="col-sm-12">
	                        <input name="name" type="text" class="form-control" placeholder="Name">
	                      </div>
	                  </div>
	                  <div class="form-group row">

	                      <div class="col-sm-12">
	                        <textarea name="discription"  coll="100" row="100"  required>Add a content here</textarea>
	                      </div>
	                  </div>
	                  <div class="form-group row">

	                    <div class="col-sm-12">
	                      <input type="file" name="profile" class="form-control dropify input-sm" placeholder="image">
	                    </div>
	                 </div>
	                 <div class="form-group row">

	                  <div class="col-sm-12">
											<div class="col">
													<label class="col-form-label"><span class="text-danger">*</span>
															Rating</label>
													&nbsp;&nbsp;&nbsp; Bad&nbsp;
													<input type="radio" value="1" name="ratting">
													&nbsp;
													<input type="radio" value="2" name="ratting">
													&nbsp;
													<input type="radio" value="3" name="ratting">
													&nbsp;
													<input type="radio" value="4" name="ratting">
													&nbsp;
													<input type="radio" value="5" name="ratting" checked>
													&nbsp;Good
											</div>

	                    <span id="error"></span>
	                  </div>
	               </div>
	              <div class="modal-footer">
	                <input type="hidden"
	                  name="<?php echo $this->security->get_csrf_token_name();?>"
	                  value="<?php echo $this->security->get_csrf_hash();?>">
	                <input type="submit" value="Submit" class="btn btn-primary">
	                <a data-dismiss="modal" class="btn" href="#">Cancel</a>
	              </div>
	            </div>
	          </div>
	        </form>
	      </div>
	   </div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Testimonial List</h6>
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

								<table id="datable_1" class="table table-hover display  pb-30" >

										<thead>
											<tr>
												<th>S.No</th>
												<th>Name</th>
												<th>Content</th>
												<th>image</th>
												<th>Action</th>
											</tr>
										</thead>
									<?php $i=1; foreach($testimonial_data as $row){?>
									<tr>
										<td> <?php echo $i ?></td>
										<td><?php echo $row['name'] ?></td>
										<td><?php echo $row['discription'] ?></td>
										<td><img src="<?php echo base_url('uploads/testimonial/').$row['image']?>"></td>
										<td><a data-target="<?php echo '#'.$row['id']; ?>" class="pd-setting-ed"
											 data-toggle="modal" data-original-title="Edit" ><i
												 class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i></a>

										 <a title="Trash" class="pd-setting-ed"
											 onclick="delete_detail(<?php echo $row['id'] ;?>)"><i class="fa fa-trash-o"
												 aria-hidden="true" style="font-size:20px;color:red;"></i></a>
										</td>
									</tr>

									<div id="<?php echo $row['id'] ; ?>"
										class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
										<div class="modal-dialog" role="document ">
											<div class="modal-content">
												<form  method="post"
													action="<?php echo base_url('admin/Testimonial/Edit/').$row['id'] ?>" enctype="multipart/form-data">

													<div class="modal-header header-color-modal bg-color-1 ">
														<h4 class="modal-title">Edit Testimonial</h4>
														<div class="modal-close-area modal-close-df">
															<a class="close" data-dismiss="modal" href="#"><i
																	class="fa fa-close"></i></a>
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
																		<textarea name="discription"  coll="100" row="100" width="100%" required><?php echo $row['discription']?></textarea>
																	</div>
															</div>

															<div class="form-group row">
																<div class="col-sm-12">
																	<input type="file" name="profile" class="form-control dropify input-sm" placeholder="image">
																	<img src="<?php echo base_url('uploads/testimonial/').$row['image']?>" >
																</div>
														 </div>

														</div>
													</div>
													<div class="modal-footer">
														<input type="hidden"
															name="<?php echo $this->security->get_csrf_token_name();?>"
															value="<?php echo $this->security->get_csrf_hash();?>">
															<input type="submit" value="Update" class="btn btn-primary">
															<a data-dismiss="modal" class="btn" href="#">Cancel</a>
													</div>
												</form>
											</div>
										</div>
									</div>
									<?php  $i++ ; }?>


								</table>




						  </div>
					  </div>
		      </div>
		    </div>
		 </div>
		</div>
	</div>
</div>


		<script>
			function delete_detail(id) {
				var del = confirm("Do you want to Delete");
				if (del == true) {
					var sureDel = confirm("Are you sure want to delete");
					if (sureDel == true) {
						window.location = "<?php echo base_url()?>admin/testimonial/Delete/" + id;
					}

				}
			}

			$(document).ready(function(){
				$("#ratt").keyup(function(){
      var rating =$('#ratt').val();
		  if(rating>5){
				 $("#error").text("please enter less than  5");
				 $("#error").css("color","red");
			}
        });
     });

		</script>
</div>
