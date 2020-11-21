
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
                        <section id="load" class="__file-media"></section>
                        <br>
                        <button type="button" name="image" class=" btn btn-primary" id="loadmore"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
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

<script src="<?php echo base_url('optimum/dist/js/google.lazy.load/lazysizes.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript">
var load = $("#load");

var refresh = $('button[name=refresh]');
var counter = 0;
var flickerAPI = "<?php echo base_url(FILE_JSON_INFO) ?>";
var refraceAPI = "<?php echo base_url('admin/media/get_file_refrace') ?>";
var image = ['png', 'jpg', 'jpeg'];

var file = (function(){
    var result = null;
    function load(){
           $.ajax({
              async: false,
              url: flickerAPI,
              dataType: "json",
              success : function(data)

              { result = data; }
            });
    }
    return {
        load : function() {
            if(result) return;
            load();
        },
        getHtml: function(){
             if(!result) load();
             return result;
        }
    }
})();
   // file.getHtml();
(function(){
  go_loop(0);
  $('#loadmore').on('click', function(){
    go_loop(counter + 10);
    counter = counter + 10;
  })
  refresh.on('click', function(){
    $(this).attr('disabled', 'true');
    get_refrace();
  });
  $("select[name=mediatype]").on('change', function(){
    var type = $(this).val();
    if(type === 'image'){

    }else if (type === 'video'){
      window.location = "<?php echo base_url('admin/media/videos') ?>"
    }
  });
})();
function go_loop(counter) {
  var data = file.getHtml();

  for(i = counter; i < data.length; i++) {
      if(jQuery.inArray(data[i].extension, image) != -1) {
        if (i <= (counter + 10)) {
        var url = "<?php echo base_url() ?>" + data[i].dirname + '/' + data[i].basename;
          $( "<img>" )
          .attr({
            "data-sizes": "auto",
            "data-src": url,
            // "data-srcset":  url + " 30w," + url + " 600w, " + url + " 900w",
            "class": "lazyload blur-up",
          })
          .appendTo( load );
      } else {
          break;
      }
    }else{

    }
   }
}
function get_refrace(){
  $.ajax({
     async: true,
     url: refraceAPI,
     success : function() {

       window.location.reload();
     }
   });
}
</script>
