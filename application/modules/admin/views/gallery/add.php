

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
			<div class="span4 text-right">
				 <a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add New</a>
		 </div><br>
<hr class="light-grey-hr" />
			<!-- /Title -->
			 <div id="addnew"	class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
				<div class="modal-dialog" role="document ">
					<div class="modal-content">

							<form action="<?php echo base_url('File_upload')?>" method="POST" enctype="multipart/form-data">
										<div class="modal-header header-color-modal bg-color-1 ">
										<h4>Add Category</h4>
										<div class="modal-close-area modal-close-df">
											<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
										</div>
									</div>
										<div class="modal-body">
											<div class="widget-content nopadding">
										<div class="form-group row">
												<label class="control-label col-sm-3">Image</label>
												<div class="col-sm-9">
											    <input name="file" type="file" class="form-control" placeholder="Image">
										    </div>
										</div>

										<div class="modal-footer">
											<input type="hidden"	value="<?php echo $this->security->get_csrf_hash();?>">
											<input type="submit" value="Submit" class="btn btn-primary">
											<a data-dismiss="modal" class="btn" href="#">Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
				 </div>
			</div>

			<!-- Row -->
			<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default card-view">
										<div class="panel-heading">
											<div class="pull-left">
												<h6 class="panel-title txt-dark">With Filter</h6>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="panel-wrapper collapse in">
											<!-- <div class="panel-body">
												<div class="filter-wrap mb-40"> -->
													<!-- Portfolio Filters -->
													<!-- <ul id="filters" class="col-md-5">
														<li><a id="all" href="#" data-filter="*" class="active">all</a></li>
														<li><a href="#" data-filter=".branding">branding</a></li>
														<li><a href="#" data-filter=".design">design</a></li>
														<li><a href="#" data-filter=".photography">photo</a></li>
														<li><a href="#" data-filter=".web">web</a></li>
													</ul> -->
													<!--/Portfolio Filters -->
													<!-- <div class="clearfix"></div>
												</div> -->

												<div class="gallery-wrap">

													<div class="portfolio-wrap project-gallery">
														<ul id="portfolio" class="portf auto-construct  project-gallery" data-col="3">
                         <?php  foreach($image_data as $row) { ?>
															<li  class="item tall branding"   data-src="<?php echo base_url($row['image']) ?>" data-sub-html="<h6>Bagwati</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" >
																<a href="">
																<img class="img-responsive" src="<?php echo base_url($row['image']) ?>"  alt="Image description" />
																<!-- <span class="hover-cap">Bagwati</span> -->
																</a>
															</li>
												<?php } ?>
															<!-- <li class="item small photography" data-src="http://www.youtube.com/watch?v=Pq9yPrLWMyU" data-poster="<?php echo base_url(); ?>/optimum/img/gallery/mock2.jpg"  data-sub-html="<h6>Not a Keyboard</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
																<a href="">
																<img class="img-responsive" src="<?php echo base_url(); ?>/optimum/img/gallery/mock2.jpg"  alt="Image description" />
																<span class="hover-cap">Not a Keyboard</span>
																</a>
															</li> -->

														</ul>
														<!-- Hidden video div -->
														<div style="display:none;" id="video1">
															<video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none">
																<source src="../videos/video1.mp4" type="video/webm">
																<source src="../videos/video1.webm" type="video/webm">
																 Your browser does not support HTML5 video.
															</video>
														</div>
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
