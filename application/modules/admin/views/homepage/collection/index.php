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
    <div class="pills-struct mt-40">
        <ul role="tablist" class="nav nav-pills" id="">
            <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" href="#shop">ADD New</a></li>
            <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#collect" aria-expanded="false">Collection</a></li>
        </ul>
        <div class="tab-content" id="">
            <div id="shop" class="tab-pane fade active in" role="tabpanel">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">ADD Collection </h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <form action="<?php echo base_url('admin/Homepage/Collection_Add') ?>" method="POST">


                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Title</label>
                                                <div class="col-sm-9">
                                                    <input name="title" type="text" class="form-control" placeholder="Title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Subtitle</label>
                                                <div class="col-sm-9">
                                                    <textarea name="subtitle" type="text" class="form-control summernote" placeholder="Subtitle" required> </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Select Product</label>
                                                <div class="col-sm-9">
                                                    <select multiple id="public-methods" name="product[]" required>
                                                        <?php
                                                        foreach ($product_data as $row) { ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' Rs - ' . $row['price'] ?></option>
                                                        <?php
                                                        } ?>
                                                    </select>
                                                    <div class="button-box">
                                                        <a id="select-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">select all</a>
                                                        <a id="deselect-all" class="btn btn-info btn-outline mr-10 mt-15" href="#">deselect all</a>
                                                        <a id="add-option" class="btn btn-success btn-outline mr-10 mt-15" href="#">Add option</a>
                                                        <a id="refresh" class="btn btn-warning btn-outline mr-10 mt-15" href="#">refresh</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Add to Homepage Menu List</label>
                                                <div class="col-sm-3">
                                                    <input name="menu" type="checkbox" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                    <input name="submit" type="submit" class="form-control btn btn-primary">

                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="collect" class="tab-pane fade" role="tabpanel">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Collection List</h6>
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
                                                        <th>S.No</th>
                                                        <th>Id</th>
                                                        <th>Title</th>
                                                        <th>Sub-Title</th>
                                                        <th>Menu</th>
                                                        <th>Created at</th>
                                                        <th>Setting</th>
                                                    </tr>
                                                    <?php $i = 1;
                                                    foreach ($collection as $row) { ?>
                                                        <tr>
                                                            <td> <?php echo $i ?></td>
                                                            <td><?php echo $row['collection_id'] ?></td>
                                                            <td><?php echo $row['title'] ?></td>
                                                            <td><?php echo $row['sub_title'] ?></td>
                                                            <td><?php if ($row['menu'] == 1) {
                                                                    echo "Added";
                                                                } else {
                                                                    echo "Not added";
                                                                }  ?></td>
                                                            <td><?php echo $row['created_at'] ?></td>
                                                            <td>
                                                                <a title="Trash" class="pd-setting-ed " onclick="delete_detail(<?php echo $row['collection_id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                                                        </tr>


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
            </div>


        </div>
    </div>

    <!-- Row -->

    <!-- /Row -->


</div>



<!-- /Main Content -->
<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {
            var sureDel = confirm("Are you sure want to delete");
            if (sureDel == true) {
                window.location = "<?php echo base_url() ?>admin/Collection/Delete/" + id;
            }

        }
    }
</script>
