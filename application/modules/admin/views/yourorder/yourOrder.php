<div class="container-fluid">
  <?php if($order_data){?>
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 >Usre Name:&nbsp; <?php echo $order_data['customer_name'];?></h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="<?php echo base_url('admin/Dashboard')?>">Dashboard</a></li>
    <li  class="active"><span><?php echo $page;?></span></li>
    <!-- <li class="active"><span>data-table</span></li> -->
    </ol>

  </div>
  <!-- /Breadcrumb -->
</div>

        <!-- /Title -->

        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-heading">
                <div class="pull-left">
                  <h6 class="panel-title txt-dark">Order List</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">

                <div class="panel-body row">

                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Product</th>
                            <th>Order ID</th>
                            <th>Photo</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Status</th>
                            <!-- <th>Actions</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=0;foreach($order_item as $value):$i++;?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td class="txt-dark"><?php echo $value['name'];?></td>
                            <td class="txt-dark"><?php echo $value['payment']?></td>
                            <td>
                              <img src="<?php echo base_url('/uploads/product/').$value['profile_pic']?>" alt="iMac" width="80">
                            </td>
                            <td><?php echo $value['price']?></td>
                            <td><?php echo $value['quantity']?></td>
                            <td><?php echo $value['sub_total']?></td>
                            <td><?php echo my_date_show($value['created']);?></td>
                            <td style="font-size:16px;font-weight:bold"><?php if($value['status']==1){?>
                              <a href="" style="color:#007bff;">Send Order</a>
                               <?php	}elseif($value['status']==2){?>
                              <a href=""  style="color:#28a745;">Accepted</a>
                            <?php	}elseif($value['status']==3){?>
                            <a href=""  style="color:#ffc107;">On going</a>

                            <?php }else{?>
                              <a href="#"  style="color:#dc3545;">Cancle</a>
                           <?php		} ?>
                         </td>
                            <!-- <td><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete txt-danger"></i></a></td> -->
                          </tr>
                        <?php endforeach;?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Row -->
<?php
}else{?>
<br><br>
  <h2>No Order record</2>
<br><br>
  <h5><i class="fa fa-arrow-left" aria-hidden="true"></i> <a href="<?php echo base_url('web/home')?>"> Go To home</a></h5>
  <?php
}
    ?>
			</div>
