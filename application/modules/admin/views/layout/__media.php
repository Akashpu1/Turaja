
<script src="<?php echo base_url('optimum/dist/js/jquery.lazy/jquery.lazy.min.js'); ?>" charset="utf-8"></script>
<script type="text/javascript">

$(function(){
  // $('.lazy').Lazy();
  $('.lazy').Lazy({
        customLoaderName: function(element) {
            element.html('element handled by "customLoaderName"');
            element.load();
        },
        asyncLoader: function(element, response) {
            setTimeout(function() {
                element.html('element handled by "asyncLoader"');
                response(true);
            }, 1000);
        }
    });
});
$(document).ready(function(){
  $('#addfeatureimage').on('click', function(event){
    event.preventDefault();
    $.ajax({
      url: '<?php echo base_url('admin/media/get_model'); ?>',
      type: 'POST',
      success: function(response){
        $("body").append(response);
      }
    })
  });
  $('#removepreview').on('click', function(){
    $("#addfeaturepreview").html("");
    $('#addfeatureimage').html("Add feature image");
    $(this).addClass('hide');
  });
  $('#editfeatureimage').on('click', function(event){
    event.preventDefault();
    $.ajax({
      url: '<?php echo base_url('admin/media/get_model'); ?>',
      type: 'POST',
      success: function(response){
        $("body").append(response);
      }
    })
  });
  $('#removepreview').on('click', function(){
    $("#addfeaturepreview").html("");
    $('#editfeatureimage').html("Add feature image");
    $(this).addClass('hide');
  });


});


$('.dropzone').dropzone({

    maxFilesize: 10, //MB
    maxFiles: 10, //number of file
    url: '<?php echo base_url('file_upload'); ?>',
    success: function(file, response){
      $.ajax({
        url: '<?php echo base_url('admin/media/save'); ?>',
        type: 'POST',
        data: JSON.parse(response),
        success: function(data) {
          var result = JSON.parse(data);
          if (result.status) {
            toastr.success('Success!', result.msg);
          } else {
            toastr.error('Faild!', result.msg);
          }
        },
      })
    }
  });



</script>
