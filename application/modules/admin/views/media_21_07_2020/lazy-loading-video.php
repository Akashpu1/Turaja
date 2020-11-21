
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
      <li  class="active"><span>All Video</span></li>
      <!-- <li class="active"><span>data-table</span></li> -->
      </ol>

    </div>


    <!-- /Breadcrumb -->
  </div>

<hr class="light-grey-hr" />
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-payment-inner-st">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul id="filters" class="col-md-5">
                  <li>
                    <a href="<?php echo base_url('admin/media/add'); ?>"><button type="button" name="button" class="btn btn-primary">Add New</button></a>
                  </li>
                  <li>
                    <select class="form-control" name="mediatype">
                      <option selected value="image">Images</option>
                      <option value="video">Videos</option>
                      <option value="other">Other</option>
                    </select>
                  </li>


                  <li>
                    <button type="button" name="refresh" class="btn btn-primary btn-md"  title="Refrash"> <i class="fa fa-refresh" aria-hidden="true"></i> </button>
                  </li>
                      </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcome-heading pull-right">
                  <input type="text" id="input" placeholder="Search..." class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section text-center">
                    <div class="row load" id="load">
                    </div>
                    <button type="button" name="image" class="btn btn-outline-info" id="loadmore"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</button>
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
var video = ['mp4', 'mkv'];
var file = (function(){
    var result = null;
    function load(){
           $.ajax({
              async: false,
              url: flickerAPI,
              dataType: "json",
              success : function(data) { result = data; }
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
  counter = go_loop(counter);
  $('#loadmore').on('click', function(){
    counter =  go_loop(counter);
  })
  refresh.on('click', function(){
    $(this).attr('disabled', 'true');
    get_refrace();
  });

  $("select[name=mediatype]").on('change', function(){
    var type = $(this).val();
    if(type === 'image'){
      window.location = "<?php echo base_url('admin/media') ?>"
    }else if (type === 'video'){

    }
  });

})();
function go_loop(counter) {
  var element = 0;
  var data = file.getHtml();
  // console.log(counter);
  for(i = counter; i < data.length; i++) {
      if(jQuery.inArray(data[i].extension, video) != -1) {
        if (element < 3 ) {
          // console.log(data[i]);
          var url = "<?php echo base_url() ?>" + data[i].dirname + '/' + data[i].basename;
          var path = "" + data[i].dirname + '/' + data[i].basename;
          var name = "" + data[i].basename;
          var extension = data[i].extension;
          $(`<div class="col-sm-4 mix `+name+`">
                      <div class="hpanel widget-int-shape responsive-mg-b-30 title">
                        <div class="panel-body">
                          <div class="text-center content-box __video-file"
                          data-src="`+url+`"
                          data-path="`+path+`"
                          data-name="`+name+`">
                          <div class="m icon-box">
                            <video class="lazyloaded" width="250" height="180">
                              <source type="video/`+extension+`" src="`+url+`" />
                            </video>
                          </div>
                          <p class="small mg-t-box">
                            <h5 class="m-b-xs">`+name+`</h5>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>`)
            .appendTo( load );
            element++;
      } else {
        return i;
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
