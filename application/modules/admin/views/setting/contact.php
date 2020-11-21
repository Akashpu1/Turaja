

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
			 <!-- <div id="addnew"	class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
				<div class="modal-dialog" role="document ">
					<div class="modal-content">

            <form action="<?php echo base_url('admin/setting/addcontact')?>" method="POST">
              <div class="modal-header header-color-modal bg-color-1 ">
              <h4>Add Contact Us </h4>
              <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i
                    class="fa fa-close"></i></a>
              </div>
            </div>
              <div class="modal-body">
                <div class="widget-content nopadding">
									<div class="form-group">
                      <input name="address" type="text" class="form-control" placeholder="Address">
                  </div>
									<div class="form-group">
                      <input name="email" type="text" class="form-control" placeholder="Email Id">
                  </div>
									<div class="form-group">
                      <input name="phone" type="text" class="form-control" placeholder="Contact Number">
                  </div>
                    <div class="modal-footer">
                      <span id="msg" style="color: red;"></span>
                        <input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
            </div>
          </div>
        </form>
						</div>
				 </div>
			</div> -->

			<!-- Row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Footer Contact List</h6>
							</div>
							<!-- <div class="span4 text-right">
								 <a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add New</a>
						 </div> -->
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
									 <th>Address</th>
                   <th>Email</th>
                   <th>contact number</th>

                   <th data-field="action">Action</th>
                 </tr>
                 <?php foreach ($contact as $key => $value): ?>

                   <tr>
                     <td><?php echo $value['address'] ?></td>
                     <td><?php echo $value['email'] ?></td>
                     <td><?php echo $value['phone'] ?></td>

                     <td>
                       <a  href="<?php echo '#'.$key; ?>" data-toggle="modal"  data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i> </a>

                       <a  class="" onclick="delete_detail('<?php echo $key; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>
                     </td>
                   </tr>

							 <div id="<?php echo $key; ?>"
									 class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
									 <div class="modal-dialog" role="document ">
										 <div class="modal-content">
                       <form  id="sliderForm" class="form-horizontal" method="post"
                         action="<?php echo base_url('admin/setting/editcontact/').$key?>"
                         name="basic_validate" id="basic_validate" novalidate="novalidate">
                         <div class="modal-header header-color-modal bg-color-1 ">
                           <h4 class="modal-title">Edit contact</h4>
                           <div class="modal-close-area modal-close-df">
                             <a class="close" data-dismiss="modal" href="#"><i
                                 class="fa fa-close"></i></a>
                           </div>
                         </div>
                        <div class="modal-body">
                           <div class="widget-content nopadding">
														 <div class="form-group">
														 		<input name="address" type="text" class="form-control" placeholder="Address" value="<?php echo $value['address']?>">
														 </div>
														 <div class="form-group">
														 		<input name="email" type="text" class="form-control" placeholder="Email Id" value="<?php echo $value['email']?>">
														 </div>
														 <div class="form-group">
														 		<input name="phone" type="text" class="form-control" placeholder="Contact Number" value="<?php echo $value['phone']?>">
														 </div>
			                         <div class="modal-footer">
																   <span id="msg" style="color: red;"></span>
																	 <input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
																	 <input type="submit" value="Save" class="btn btn-primary">
			                         </div>
                           </div>
                        </form>
											 </div>
										 </div>
									 </div>
								 </div>
               <?php endforeach;?>
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

<style media="screen">
#icon_view{
	display: none;
	height: 156px;
	overflow-y: scroll;
	overflow-x: hidden;
}
</style>

	<!-- /Main Content -->
  <script>
    function delete_detail(id) {
      var del = confirm("Do you want to Delete");
      if (del == true) {
        var sureDel = confirm("Are you sure want to delete");
        if (sureDel == true) {
          window.location = "<?php echo base_url()?>admin/setting/deletecontact/" + id;
        }

      }
    }
	// 	$('#sliderForm').on('submit', function(event){
  //   event.preventDefault();
  //   if($('input[name=featureImage]').length){
  //     $(this)[0].submit();
  //   }else{
  //     $('#msg').html('Select Image file After Click Save');
  //   }
  // })

  </script>
	<script type="text/javascript">
			$(document).ready(function(){
				$('#addIcon').on('click', function(){
					$.ajax({
						url:'<?php echo base_url('admin/social/icons') ?>',
						type: 'POST',
			      success: function(response){
			        $("#icon_view").show().html(response);
			      }
					});
				});
			});
		</script>
