<div class="container-fluid">
  <div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark">Carousel</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/Dashboard')?>">Dashboard</a></li>
        <li class="active"><span><?php echo $page?></span></li>
        <!-- <li class="active"><span>data-table</span></li> -->
      </ol>

    </div>
    <!-- /Breadcrumb -->
  </div>
    <div class="panel panel-default card-view">

        <div class="panel-wrapper collapse in">
            <div class="panel-body">

                <div class="pills-struct mt-40">
                    <ul role="tablist" class="nav nav-pills" id="myTabs_6">
                        <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" href="#saree">Saree</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#dupatta" aria-expanded="false">Dupatta</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#suit" aria-expanded="false">Suite</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#lehenga" aria-expanded="false">Lehenga</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent_6">
                        <div id="saree" class="tab-pane fade active in" role="tabpanel">
                            <div class="container-fluid">
                                <form action="<?php echo base_url('admin/Homepage/add/') ?>saree" method="post">
                                    <?php
                                    for ($i = 0; $i < 10; $i++) {

                                    ?>
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <input type="text" name="sno[]" class="form-control " value="Corousel<?php $y = $i + 1;
                                                                                                                        echo $y; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control select2" name="product[]">
                                                    <option value='0'>Select Saree</option>

                                                    <?php
                                                    foreach ($saree as $row) { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' Rs - ' . $row['price'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                        <div id="dupatta" class="tab-pane fade" role="tabpanel">
                            <div class="container-fluid">
                                <form action="<?php echo base_url('admin/Homepage/add/') ?>dupatta" method="post">
                                    <?php
                                    for ($i = 0; $i < 10; $i++) {

                                    ?>
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <input type="text" name="sno[]" class="form-control " value="Corousel<?php $y = $i + 1;
                                                                                                                        echo $y; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control select2" name="product[]">
                                                    <option value='0'>Select Dupatta</option>

                                                    <?php
                                                    foreach ($Dupatta as $row) { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' Rs - ' . $row['price'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                        <div id="suit" class="tab-pane fade " role="tabpanel">
                            <div class="container-fluid">
                                <form action="<?php echo base_url('admin/Homepage/add/') ?>suit" method="post">
                                    <?php
                                    for ($i = 0; $i < 10; $i++) {

                                    ?>
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <input type="text" name="sno[]" class="form-control " value="Corousel<?php $y = $i + 1;
                                                                                                                        echo $y; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control select2" name="product[]">
                                                    <option value='0'>Select Suit</option>

                                                    <?php
                                                    foreach ($suit as $row) { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' Rs - ' . $row['price'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                      <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                        <div id="lehenga" class="tab-pane fade" role="tabpanel">
                            <div class="container-fluid">
                                <form action="<?php echo base_url('admin/Homepage/add/') ?>lehenga" method="post">
                                    <?php
                                    for ($i = 0; $i < 10; $i++) {

                                    ?>
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <input type="text" name="sno[]" class="form-control " value="Corousel<?php $y = $i + 1;
                                                                                                                        echo $y; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control select2" name="product[]">
                                                    <option value='0'>Select Lehenga</option>

                                                    <?php
                                                    foreach ($Lehenga as $row) { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' Rs - ' . $row['price'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#SaveSaree').on('click', function() {

        });
    });
</script>
