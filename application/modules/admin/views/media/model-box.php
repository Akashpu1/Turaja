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
      <div class="modal-footer">
        <a href="<?php echo base_url('admin/media/add'); ?>" class="btn btn-link btn-info">upload new</a>
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

      $('.info').click(function() {
        var preview = $('#addfeaturepreview');
        var obj = $(this);
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
      });

      $('.close').on("click", function(){
        $('#featureImageModel').remove();
      });

  });

  </script>
</div>
