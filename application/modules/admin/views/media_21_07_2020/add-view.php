
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

		<div class="row">
       <div class="col-sm-12 ol-md-12 col-xs-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"> Upload Gallery</h6>
									</div>
									<div class="clearfix"></div>
								</div>
                <div class="dropzone-pro">
                    <div id="dropzone" class="multi-uploader-cs">
                        <form action="<?php echo base_url('file_upload') ?>" class="dropzone dropzone-custom needsclick" id="demo-upload" enctype="multipart/form-data">
                            <div class="dz-message needsclick download-custom">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                <h2>Drop files here or click to upload.</h2>
                                <button type="button" class="btn btn-primary" name="button">select File</button>
                                <p><span class="note needsclick">( only <strong>[jpg, png, jpeg, gif]</strong> file are allows to uploaded.)</span>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
							</div>
						</div>
          </div>
				</div>
