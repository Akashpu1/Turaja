
  <div class="container-fluid">

    <div class="row heading-bg">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Dashboard</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/Dashboard')?>">Dashboard</a></li>
        <li  class="active"><span>Image Gallery</span></li>
        <!-- <li class="active"><span>data-table</span></li> -->
        </ol>
      </div>
      <!-- /Breadcrumb -->
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-payment-inner-st">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <ul id="filters" class="col-md-5">
                <li>
                  <a href="<?php echo base_url('admin/media/add'); ?>">Add New</a>
                </li>
                <li>
                  <select class="form-control" name="mediatype">
                    <option selected value="image">Images</option>
                    <option value="video">Videos</option>
                    <option value="other">Other</option>
                  </select>
                </li>
                <li>
                  <button type="button" name="refresh" class="btn btn-default btn-md" title="Refrash"> <i class="fa fa-refresh" aria-hidden="true"></i> </button>
                </li>
              </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="breadcome-heading pull-right">
                <input type="text" placeholder="Search..." class="form-control">
              </div>
            </div>
          </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section text-center">
                    <div class="image-grid-row">
                      <?php if (isset($file)): ?>
                        <section id="load" class="__file-media">
                          <?php foreach ($file as $key => $value): ?>
                            <img data-sizes="auto" data-src="<?php echo base_url($value['dirname'].'/'.$value['basename']); ?>" data-id="<?php echo $value['id'] ?>" class="lazyload info" alt="<?php echo $value['filename'] ?>">

                            <?php $postID = $key+1; endforeach; ?>
                          </section>
                          <div lastID="<?php echo $postID; ?>" name="image" id="loadmore" style="display: none;">
                            <img src="<?php echo base_url('assets/images/preloder-0.2s-200px.svg') ?>" width="60" height="40" alt="">
                          </div>
                          <?php else: ?>
                            <p class="text-center">File not Found.</p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
</div>




 <div id="information"	class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
<div class="modal-dialog" role="document ">
  <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-1 sliderForm ">

      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" href="#"><i
            class="fa fa-close"></i></a>
      </div>
    </div>
      <div class="modal-body">
        <div class="courses-inner">
         <div class="courses-title preview"></div>
       </div>
     </div>

      <div class="modal-footer">

        <input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
        <a class="delete btn btn-primary" ><i class="fa fa-trash" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</form>
    </div>
 </div>
</div>


<style media="screen">
.blur-up {
  -webkit-filter: blur(5px);
  filter: blur(5px);
  transition: filter 400ms, -webkit-filter 400ms;
}

.blur-up.lazyloaded {
  -webkit-filter: blur(0);
  filter: blur(0);
}
</style>
<script src="<?php echo base_url('optimum/js/google.lazy.load/lazysizes.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript">

$(document).ready(function(){
  var load = $("#load");
  var refraceAPI = "<?php echo base_url('admin/media/get_gallery') ?>";
  var image = ['png', 'jpg', 'jpeg'];


    $(window).scroll(function(){
        var lastID = $('#loadmore').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
            $.ajax({
                type:'POST',
                url:refraceAPI,
                data:'id='+lastID,
                beforeSend:function(){
                    $('#loadmore').show();
                },
                success:function(data){
                  var data = JSON.parse(data);
                    if (!data.is_end) {
                      $(load).append(data.html);
                      $(load).parent().append(data.loadmore);
                      $('#loadmore').remove();
                    }else {
                      $('#loadmore').remove();
                    }
                }
            });
        }
    });

    $("select[name=mediatype]").on('change', function(){
      var type = $(this).val();
      if (type === 'video') {
        window.location = "<?php echo base_url('admin/media/videos') ?>"
      }
    });

    $(".info").on('click', function(){
      var model = $('#information');
      var url = $(this).attr('data-src');
      var name = $(this).attr('alt');
      var id = $(this).attr('data-id');
      console.log(id);
      var src = $( "<img>" )
      .attr({
        "data-sizes": "auto",
        "data-src": url,
        // "data-srcset":  url + " 30w," + url + " 600w, " + url + " 900w",
        "class": "lazyload blur-up",
      })
      model.find('.preview').html( src ).append('<h3>'+name+'</h3><p>'+url+'</p>');
      model.find('.delete').attr('href', "<?php echo base_url()?>admin/media/delete/" + id);
      model.modal('show');
    });

});

</script>
