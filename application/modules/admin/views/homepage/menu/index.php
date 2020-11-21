<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Dashboard</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
                <li class="active"><span><?php echo $page ?></span></li>
                <!-- <li class="active"><span>data-table</span></li> -->
            </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>

    <!-- /Title -->
    <div id="addnew" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <form action="<?php echo base_url('admin/Homepage/Add_menu') ?>" method="POST">
                    <div class="modal-header header-color-modal bg-color-1  ">
                        <h4>Add Menu Item </h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="widget-content nopadding">

                            <div class="form-group row">
                                <label class="control-label col-sm-3">Title</label>
                                <div class="col-sm-9">
                                    <input name="title" type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3">Link</label>
                                <div class="col-sm-9">
                                    <input type="url" name="url" class="form-control" id="" placeholder="Enter URL">
                                </div>
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


    <div class="pills-struct mt-40">
        <ul role="tablist" class="nav nav-pills" id="">
            <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" href="#menu_text">Menu List </a></li>
            <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#menu_image" aria-expanded="false">Menu Images</a></li>
        </ul>
        <div class="tab-content" id="">
            <div id="menu_text" class="tab-pane fade active in" role="tabpanel">
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Menu List</h6>
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
                                                <caption>
                                                    <!-- <h4> User  List</h4> -->
                                                </caption>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Parent</th>
                                                    <th>Name</th>
                                                    <th>link</th>
                                                    <th>Setting</th>
                                                </tr>
                                                <?php $i = 1;
                                                foreach ($menu as $row) { ?>
                                                    <tr>
                                                        <td> <?php echo $i ?></td>
                                                        <td><?php echo $row['parent'] ?></td>
                                                        <td><?php echo $row['title'] ?></td>
                                                        <td><?php echo $row['url'] ?></td>
                                                        <td> <a data-target="<?php echo '#' . $row['menu_id']; ?>" class="pd-setting-ed " data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#667add;font-size:20px;"></i></a>
                                                            <a title="Trash" class="pd-setting-ed" onclick="delete_detail(<?php echo $row['menu_id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true" style="color:red;font-size:20px;"></i></a></td>
                                                    </tr>

                                                    <div id="<?php echo $row['menu_id']; ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                        <div class="modal-dialog" role="document ">
                                                            <div class="modal-content">
                                                                <form class="form-horizontal " method="post" action="<?php echo base_url('admin/Category/Edit/') . $row['menu_id'] ?>">
                                                                    <div class="modal-header header-color-modal bg-color-1 ">
                                                                        <h4 class="modal-title">Edit Menu</h4>
                                                                        <div class="modal-close-area modal-close-df">
                                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="widget-content nopadding">
                                                                            <div class="form-group row">
                                                                                <label class="control-label col-sm-3">Parent Menu</label>
                                                                                <div class="col-sm-9">
                                                                                    <select name="parent" id="parent" class="form-control">
                                                                                        <option value="shop" <?php if ($row['parent'] == 'shop') {
                                                                                                                    echo "selected";
                                                                                                                } ?>>Shop</option>
                                                                                        <option value="collection" <?php if ($row['parent'] == 'collection') {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>collection</option>
                                                                                        <option value="technique" <?php if ($row['parent'] == 'technique') {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>Technique</option>
                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label class="control-label col-sm-3">Title</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="name" value="<?php echo $row['title'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="control-label col-sm-3">Link</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="url" name="url" class="form-control" value="<?php echo $row['url'] ?>" placeholder="Enter URL">

                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <span id="msg" style="color: red;"></span>
                                                                            <input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
                                                                            <input type="submit" value="Upadte" class="btn btn-primary">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    $i++;
                                                } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu_image" class="tab-pane fade" role="tabpanel">
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Menu Images</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="pills-struct mt-40">
                                        <ul role="tablist" class="nav nav-pills" id="">
                                            <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" href="#shop">Shop</a></li>
                                            <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#collect" aria-expanded="false">Collection</a></li>
                                            <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#tech" aria-expanded="false">Technique</a></li>
                                        </ul>
                                        <div class="tab-content" id="">
                                            <div id="shop" class="tab-pane fade active in" role="tabpanel">
                                                <div class="container-fluid">
                                                    <div class="table-wrap">
                                                        <div class='table-responsive'>
                                                            	<table id="datable_1" class="table table-hover display  pb-30" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <th>Image</th>
                                                                        <th>Link</th>
                                                                        <th>Option</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($shop_image as $row) { ?>


                                                                        <tr>
                                                                            <td><?php echo $row['title'] ?></td>
                                                                            <td> <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>" style="width:150px " alt="<?php echo $row['image'] ?>"> </td>
                                                                            <td><?php echo $row['url'] ?></td>
                                                                            <td><a data-target="<?php echo '#Image' . $row['menu_id']; ?>" class="pd-setting-ed" data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#667add;font-size:20px;"></i></a></td>
                                                                        </tr>

                                                                        <div id="Image<?php echo $row['menu_id']; ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                                            <div class="modal-dialog" role="document ">
                                                                                <div class="modal-content">
                                                                                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/homepage/edit_menu_image/') . $row['menu_id'] ?>">
                                                                                      <div class="modal-header header-color-modal bg-color-1 ">
                                                                                          <h4 class="modal-title"> Edit Menu Images</h4>
                                                                                          <div class="modal-close-area modal-close-df">
                                                                                              <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="modal-body">
                                                                                          <div class="widget-content nopadding">
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-sm-3">Title</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input name="title" type="text" class="form-control" value="<?php echo $row['title'] ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-sm-3">Image</label>
                                                                                            <div class="col-sm-9">
                                                                                                <div class="mt-40">
                                                                                                    <input type="file" class=" form-control" name='image' />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="control-label col-sm-3">Link</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input name="url" type="url" class="form-control" value="<?php echo $row['url'] ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                                                      </div>
                                                                                        <div class="modal-footer">
                                                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                            <input type="submit" value="Submit" class="btn btn-primary">
                                                                                            <a data-dismiss="modal" class="btn btn-warning" href="#">Cancel</a>
                                                                                        </div>
                                                                                      </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collect" class="tab-pane fade" role="tabpanel">
                                                <div class="container-fluid">
                                                        <table class="table  table-bordered ">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Image</th>
                                                                    <th>Link</th>
                                                                    <th>Option</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($collect_image as $row) { ?>


                                                                    <tr>
                                                                        <td><?php echo $row['title'] ?></td>
                                                                        <td> <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>" style="width:150px " alt="<?php echo $row['image'] ?>"> </td>
                                                                        <td><?php echo $row['url'] ?></td>
                                                                        <td><a data-target="<?php echo '#Image' . $row['menu_id']; ?>" class="pd-setting-ed" data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#667add;font-size:20px;"></i></a></td>
                                                                    </tr>
                                                                    <div id="Image<?php echo $row['menu_id']; ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                                        <div class="modal-dialog" role="document ">
                                                                            <div class="modal-content">
                                                                                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/homepage/edit_menu_image/') . $row['menu_id'] ?>">
                                                                                  <div class="modal-header header-color-modal bg-color-1 ">
                                                                                      <h4 class="modal-title"> Edit collection </h4>
                                                                                      <div class="modal-close-area modal-close-df">
                                                                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="modal-body">
                                                                                      <div class="widget-content nopadding">
                                                                                    <div class="form-group row">
                                                                                        <label class="control-label col-sm-3">Title</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input name="title" type="text" class="form-control" value="<?php echo $row['title'] ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="control-label col-sm-3">Image</label>
                                                                                        <div class="col-sm-9">
                                                                                            <div class="mt-40">
                                                                                                <input type="file" class=" form-control" name='image' />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="control-label col-sm-3">Link</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input name="url" type="url" class="form-control" value="<?php echo $row['url'] ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                    <div class="modal-footer">
                                                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                        <input type="submit" value="Submit" class="btn btn-primary">
                                                                                        <a data-dismiss="modal" class="btn btn-warning" href="#">Cancel</a>
                                                                                    </div>
                                                                                  </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                            <div id="tech" class="tab-pane fade " role="tabpanel">
                                                <div class="container-fluid">
                                                    <table class="table  table-bordered ">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Image</th>
                                                                <th>Link</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($tech_image as $row) { ?>


                                                                <tr>
                                                                    <td><?php echo $row['title'] ?></td>
                                                                    <td> <img src="<?php echo base_url('/uploads/product/') . $row['image'] ?>" style="width:150px " alt="<?php echo $row['image'] ?>"> </td>
                                                                    <td><?php echo $row['url'] ?></td>
                                                                    <td><a data-target="<?php echo '#Image' . $row['menu_id']; ?>" class="pd-setting-ed" data-toggle="modal" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#667add;font-size:20px;"></i></a></td>
                                                                </tr>
                                                                <div id="Image<?php echo $row['menu_id']; ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                                    <div class="modal-dialog" role="document ">
                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/homepage/edit_menu_image/') . $row['menu_id'] ?>">
                                                                              <div class="modal-header header-color-modal bg-color-1 ">
                                                                                  <h4 class="modal-title"> Edit Technique</h4>
                                                                                  <div class="modal-close-area modal-close-df">
                                                                                      <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                  <div class="widget-content nopadding">
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-3">Title</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input name="title" type="text" class="form-control" value="<?php echo $row['title'] ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-3">Image</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="mt-40">
                                                                                            <input type="file" class=" form-control" name='image' />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-3">Link</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input name="url" type="url" class="form-control" value="<?php echo $row['url'] ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                              </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                                                    <a data-dismiss="modal" class="btn btn-warning" href="#">Cancel</a>
                                                                                </div>
                                                                              </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                window.location = "<?php echo base_url() ?>admin/Category/Delete/" + id;
            }
        }
    }

</script>
