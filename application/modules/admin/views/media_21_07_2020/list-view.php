
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-payment-inner-st">
          <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#images"> Images </a></li>
            <li><a href="#video"> Video </a></li>
            <li><a href="#other"> other </a></li>
          </ul>
          <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="images">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="image-grid-row">
                      <section class="__file-media">
                        <?php foreach ($image as $value): ?>
                        <?php //pre(getFileInfo($value));  ?>
                        <img src="<?php echo base_url($value) ?>">
                        <?php endforeach; ?>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-tab-list tab-pane fade" id="video">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="row">
                      <?php foreach ($video as $key => $value): ?>
                        <?php $temp = getFileInfo($value);  ?>
                      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                          <div class="panel-body">
                            <div class="text-center content-box">
                                <div class="m icon-box">
                                  <video class="afterglow" width="250" height="180">
                                    <source type="video/mp4" src="<?php echo base_url($value) ?>" />
                                  </video>
                                </div>
                                <p class="small mg-t-box">
                                  <h5 class="m-b-xs"><?php echo $temp['basename'] ?></h5>
                                </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-tab-list tab-pane fade" id="other">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="sparkline13-list">
                          <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-pagination-switch="true" data-show-refresh="true" data-resizable="true" data-cookie="true" data-click-to-select="true"
                                data-sort="true">
                                <thead>
                                  <tr>
                                    <th data-field="name">Name</th>
                                    <th data-field="type">Type</th>
                                    <th data-field="last_modified">Last Modified</th>
                                    <th data-field="size">Size</th>
                                    <th data-field="action">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($other as $value): ?>
                                  <?php $file = getFileInfo($value); ?>
                                  <tr>
                                    <td><?php echo $file['basename'] ?></td>
                                    <td><?php echo $file['extension'] ?></td>
                                    <td><?php echo $file['last_modified'] ?></td>
                                    <td><?php echo convertToReadableSize($file['size']) ?></td>
                                    <td class="datatable-ct"><i class="fa fa-check"></i>
                                    </td>
                                  </tr>
                                  <?php endforeach; ?>
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
  </div>
</div>
