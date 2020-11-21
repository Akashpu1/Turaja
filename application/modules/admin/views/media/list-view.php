<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-md-2 col-sm-2 col-xs-12">
        <div class="hpanel responsive-mg-b-30">
          <div class="panel-body">

          </div>
        </div>
      </div>
      <div class="col-md-10 col-md-10 col-sm-10 col-xs-12">
          <div class="hpanel">
            <div class="panel-body">
              <?php if (is_array($file)): ?>
                <div class="table-responsive ib-tb">
                <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                    <select class="form-control dt-tb">
                      <option value="">Delete All</option>
                      <option value="all">Save To Draft</option>
                    </select>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                      data-click-to-select="true" data-toolbar="#toolbar" class="table table-hover">
                  <thead>
                    <tr>
                      <th>
                        <div>
                        <input type="checkbox">
                        <label></label>
                      </div>
                      </th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Path</th>
                      <th>Size</th>
                      <th>Last Modified</th>
                      <th>Del</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($file as $id => $value): ?>
                      <tr class="unread">
                      <td class="">
                        <div class="">
                          <input type="checkbox" value="<?php echo $id; ?>">
                          <label></label>
                        </div>
                      </td>
                      <td><a target="_blank" href="<?php echo base_url($value->dirname.'/'.$value->basename); ?>"><?php echo $value->filename; ?></a></td>
                      <td><?php echo $value->extension; ?>
                      </td>
                      <td><?php echo $value->dirname; ?></td>
                      <td><?php echo convertToReadableSize($value->size); ?></td>
                      <td><?php echo my_date_show($value->last_modified); ?></td>
                      <td>
                        <button type="button" onclick="delete_detail('<?php echo $id; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
                <?php else: ?>
                  <h3> Document not found </h3>
              <?php endif; ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
	function delete_detail(id) {
		var del = confirm("Do you want to Delete");
		if (del == true) {
			var sureDel = confirm("Are you sure want to delete");
			if (sureDel == true) {
				window.location = "<?php echo base_url()?>admin/media/delete/" + id;
			}

		}
	}
</script>
