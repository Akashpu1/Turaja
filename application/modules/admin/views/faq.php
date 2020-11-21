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

                <form action="<?php echo base_url('admin/faq/add') ?>" method="POST">
                    <div class="modal-header header-color-modal bg-color-1 ">
                        <h4>Add FAQs </h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="widget-content nopadding">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <input name="title" type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <textarea name="content" type="text" class="form-control summernote" placeholder="Content"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">FAQs</h6>
                    </div>
                    <div class="span4 pull-right">
                        <a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add new</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="row">

                                <div class="col-sm-4">
                                    <form action="<?php echo base_url('admin/faq/update') ?>" method="POST">
                                        <div class="modal-header header-color-modal bg-color-1 ">
                                            <h4>Update heading </h4>

                                        </div>
                                        <div class="modal-body">
                                            <div class="widget-content nopadding">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <input name="title" type="text" class="form-control" value="<?php echo $faq_main[0]['heading'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <textarea name="content" type="text" class="form-control summernote"><?php echo $faq_main[0]['content'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-8">
                                    <div class="table-responsive">
                                        <div class="modal-header header-color-modal bg-color-1 ">
                                            <h4>FAQ list </h4>

                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($faqs as $row) { ?>
                                                        <tr>
                                                            <td> <?php echo $i ?></td>
                                                            <td><?php echo $row['question'] ?></td>
                                                            <td><?php echo $row['answer'] ?></td>
                                                            <td>

                                                                <a title="Trash" class="pd-setting-ed " onclick="delete_detail(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    } ?>

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
    <!-- /Row -->


</div>

<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {
            var sureDel = confirm("Are you sure want to delete");
            if (sureDel == true) {
                window.location = "<?php echo base_url() ?>admin/faq/Delete/" + id;
            }

        }
    }
</script>

<!-- /Main Content -->