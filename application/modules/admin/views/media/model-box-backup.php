<div id="featureImageModel" class="modal modal-edu-general default-popup-PrimaryModal fade in" role="dialog" style="display: block; padding-right: 17px;">
  <div class="modal-dialog" style="min-width: auto; min-height: auto;">
    <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-1">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
        </div>
      </div>
      <div class="modal-body">
        <div class="image-grid-row">
          <section id="load" class="__file-media"></section>
          <button type="button" name="image" class="btn btn-outline-info" id="loadmore"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</button>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" name="button">upload new</button>
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
  var image = ['png', 'jpg', 'jpeg'];
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
    go_loop(0);
    $('#loadmore').on('click', function(){
      go_loop(counter + 10);
      counter = counter + 10;
    })
    refresh.on('click', function(){
      $(this).attr('disabled', 'true');
      get_refrace();
    });
  })();
  function go_loop(counter) {
    var data = file.getHtml();
    for(i = counter; i < data.length; i++) {
      if (i <= (counter + 10)) {
        if(jQuery.inArray(data[i].extension, image) != -1) {
          var url = "<?php echo base_url() ?>" + data[i].dirname + '/' + data[i].basename;
          var path = "" + data[i].dirname + '/' + data[i].basename;
          var name = "" + data[i].basename;
            $( "<img>" )
            .attr({
              "data-sizes": "auto",
              "src": url,
              "data-src": url,
              "data-name": name,
              "data-path": path,
              "onclick": "__file_media(this)",
              // "data-srcset":  url + " 30w," + url + " 600w, " + url + " 900w",
              "class": "lazyload blur-up",
            })
            .appendTo( load );
        } else {

        }
      }else{
        break;
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

    function __file_media (element) {
      var preview = $('#addfeaturepreview');
      var obj = $(element);
      var button = $('#addfeatureimage');
      var remove = $('#removepreview');
      var name = obj.attr('data-name');
      var url = obj.attr('src');
      var path = obj.attr('data-path');
      var html = '<img src=" '+url+'" >';
      html += '<input type="hidden" name="featureImage" value="'+path+'" >';
      preview.html("");
      preview.html(html);
      $('#featureImageModel').remove();
      remove.removeClass('hide');
      button.html('change feature images');
    }
    $('.close').on("click", function(){
      $('#featureImageModel').remove();
    });
  </script>
</div>
