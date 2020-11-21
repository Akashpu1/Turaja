<div id="featureImageModel" class="modal modal-edu-general default-popup-PrimaryModal fade in" role="dialog" style="display: block; padding-right: 17px;">
  <div class="modal-dialog" style="min-width: auto; min-height: auto; width: 75%;">
    <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-1">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
        </div>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-link" name="button">upload new</button>
      </div>
    </div>
  </div>
</div>
<style media="screen">
.modal-edu-general .modal-body {
  text-align: center;
  /* padding: 50px 70px; */
  overflow: scroll;
  height: 382px;
  overflow-y: auto;
  overflow-x: hidden;
}

.form-control{
    color: #181818;
}

.text-center.content-box.__video-file {
    border: 1px solid #ccc;
    width: fit-content;
    padding: 0px;
    margin: 0px;
}
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
                          <div class="text-center content-box"
                          onclick="__video_file(this)"
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

  function __video_file(element) {
    console.log(element);
    var obj = $(element);
    var preview = $('#addlecturepreview');
    var button = $('#addlectureimage');
    var remove = $('#lectureremovepreview');
    var name = obj.attr('data-name');
    var path = obj.attr('data-path');
    var url = obj.attr('data-src');
    var html = '<video class="afterglow" width="250" height="180"><source type="video/mp4" src="'+url+'" /></video><h5 class="m-b-xs">'+name+'</h5>';
    html += '<input type="hidden" name="lactureVideo[]" value="'+path+'" >';
    preview.append(html);
    $('#featureImageModel').remove();
    remove.removeClass('hide');
    button.html('Add More');
  }
  $('.close').on("click", function(){
    $('#featureImageModel').remove();
  });
</script>
