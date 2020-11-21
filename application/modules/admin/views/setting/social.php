

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
			 <div id="addnew"	class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
				<div class="modal-dialog" role="document ">
					<div class="modal-content">

            <form action="<?php echo base_url('admin/Social/addsocial')?>" method="POST">
              <div class="modal-header header-color-modal bg-color-1 ">
              <h4>Add Socaical Icon </h4>
              <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i
                    class="fa fa-close"></i></a>
              </div>
            </div>
              <div class="modal-body">
                <div class="widget-content nopadding">
                  <div class="form-group">
                    <select class="form-control" name="link">
											<option value="select">Select</option>
	                    <option value="https://www.facebook.com/">facebook</option>
											<option value="https://web.whatsapp.com/">whatsapp</option>
											<option value="https://www.instagram.com/">instagram</option>
											<option value="https://twitter.com/Twitter">twitter</option>
											<option value="https://www.linkedin.com/">LinkedIn</option>
											<option value="https://www.youtube.com/">YouTube</option>
										</select>
                  </div>
									<div class="form-group">
										<label for="">Display Icon</label>
										<button type="button" id='addIcon' class="btn btn-primary" name="button">Add Icon</button>
										<div id="icon_view"></div>
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
			</div>

			<!-- Row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Social Icon</h6>
							</div>
							<div class="span4 text-right">
								 <a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add New</a>
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
                   <th>URL</th>
                   <th>Icon</th>

                   <th data-field="action">Action</th>
                 </tr>
                 <?php foreach ($social as $key => $value): ?>

                   <tr>
                     <td><?php echo $value['link'] ?></td>

                     <td class="text-center">
                      	<span class="<?php echo $value['icon'] ?>" style="color:black;font-size:30px;"></span>
                     </td>

                     <td>
                       <a  href="<?php echo '#'.$key; ?>" data-toggle="modal"  data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i </a>

                       <a  onclick="delete_detail('<?php echo $key; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>
                     </td>
                   </tr>

							 <div id="<?php echo $key; ?>"
									 class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
									 <div class="modal-dialog" role="document ">
										 <div class="modal-content">
                       <form  id="sliderForm" class="form-horizontal" method="post"
                         action="<?php echo base_url('admin/socail/editsocail/').$key?>"
                         name="basic_validate" id="basic_validate" novalidate="novalidate">
                         <div class="modal-header header-color-modal bg-color-1 ">
                           <h4 class="modal-title">Edit socail</h4>
                           <div class="modal-close-area modal-close-df">
                             <a class="close" data-dismiss="modal" href="#"><i
                                 class="fa fa-close"></i></a>
                           </div>
                         </div>
                        <div class="modal-body">
                           <div class="widget-content nopadding">

														 <div class="form-group">
															 <select class="form-control" name="link">
																<option value="select">Select</option>
																<option value="https://www.facebook.com/">facebook</option>
																<option value="https://web.whatsapp.com/">whatsapp</option>
																<option value="https://www.instagram.com/">instagram</option>
																<option value="https://twitter.com/Twitter">twitter</option>
																<option value="https://www.linkedin.com/">LinkedIn</option>
																<option value="https://www.youtube.com/">YouTube</option>
															</select>
														 </div>
														<div class="form-group">
															<label for="">Display Icon</label>
															<button type="button" id='addIcon' class="btn btn-primary" name="button">Add Icon</button>
															<div id="icon_view"></div>
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
          window.location = "<?php echo base_url()?>admin/social/deletesocial/" + id;
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
