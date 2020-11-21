
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

            <form action="<?php echo base_url('admin/setting/addtitle')?>" method="POST">
              <div class="modal-header header-color-modal bg-color-1 ">
              <h4>Add Application Title </h4>
              <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i
                    class="fa fa-close"></i></a>
              </div>
            </div>
              <div class="modal-body">
                <div class="widget-content nopadding">
                  <div class="form-group">
                      <input name="title" type="text" class="form-control" placeholder="Title">
                  </div>

                    <span id="addfeaturepreview" ></span>
                    <button id="removepreview" type="button" class="btn btn-link hide"  style="color:blue">remove</button>
                    <button id="" type="button" class="addfeatureimage btn btn-link" style="color:blue" name="button">Add Slider image</button>
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
								<h6 class="panel-title txt-dark">Title</h6>
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
										<table class="table table-striped table-bordered">
								 <caption>
									 <!-- <h4> User  List</h4> -->
								 </caption>
                 <tr>
                   <!-- <th data-field="state" data-checkbox="true"></th> -->
                   <th>Title</th>

                   <th class="text-center">Favicon Icon</th>

                   <th data-field="action">Action</th>
                 </tr>
                 <?php foreach ($app_title as $key => $value): ?>

                   <tr>
                     <td><?php echo $value['title'] ?></td>

                     <td class="text-center">
                       <img src="<?php echo base_url($value['source']) ?>" alt="" width="120" height="80">
                     </td>

                     <td>
                       <a  href="<?php echo '#'.$key; ?>" data-toggle="modal"  data-original-title="Edit"> <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:#007bff;"></i> </a>
                       <a onclick="delete_detail('<?php echo $key; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"  style="font-size:20px;color:red;"></i></a>
                     </td>

                   </tr>

							 <div id="<?php echo $key; ?>"
									 class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
									 <div class="modal-dialog" role="document ">
										 <div class="modal-content">
                       <form  id="sliderForm" class="form-horizontal" method="post"
                         action="<?php echo base_url('admin/setting/edittitle/').$key?>"
                         name="basic_validate" id="basic_validate" novalidate="novalidate">
                         <div class="modal-header header-color-modal bg-color-1 ">
                           <h4 class="modal-title">Edit Title</h4>
                           <div class="modal-close-area modal-close-df">
                             <a class="close" data-dismiss="modal" href="#"><i
                                 class="fa fa-close"></i></a>
                           </div>
                         </div>
                        <div class="modal-body">
                           <div class="widget-content nopadding">

														 <div class="form-group">
																 <input name="title" type="text" class="form-control" placeholder="Title" value="<?php echo $value['title']?>">
														 </div>

															 <span id="addfeaturepreview" ></span>
															 <button id="removepreview" type="button" class="btn btn-link hide"  style="color:blue">remove</button>
															 <button id="addfeatureimage" type="button" class="btn btn-link" style="color:blue" name="button">Favicon Icon</button>

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


	<!-- /Main Content -->
  <script>
    function delete_detail(id) {
      var del = confirm("Do you want to Delete");
      if (del == true) {
        var sureDel = confirm("Are you sure want to delete");
        if (sureDel == true) {
          window.location = "<?php echo base_url()?>admin/setting/deletetitle/" + id;
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
