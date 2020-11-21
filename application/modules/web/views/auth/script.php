<script type="text/javascript">
  $(document).ready(function() {

    var submit = $('button[name="register"]');
    $('input[name="email"], input[name="phone"]').on('change', function() {
      var username = $(this);
      $.ajax({
        url: '<?php echo base_url('exist'); ?>',
        type: "POST",
        data: {
          username: username.val()
        },
        success: function(data) {
          var response = JSON.parse(data);
          if (response.status) {
            submit.attr('disabled', true);
            username.addClass('error');
            username.after('<p>' + response.msg + '</p>');
          } else {
            submit.attr('disabled', false);
            username.removeClass('error');
            username.next('p').remove();
          }
        },
      });
    });

    $('input[name="email"]').on('change', function() {
      var username = $(this);
      $.ajax({
        url: '<?php echo base_url('exist'); ?>',
        type: "POST",
        data: {
          username: username.val()
        },
        success: function(data) {
          var response = JSON.parse(data);
          if (!response.status) {
            submit.attr('disabled', true);
            username.addClass('error');
            username.after('<p> </p>');
          } else {
            submit.attr('disabled', false);
            username.removeClass('error');
            username.next('p').remove();
          }
        },
      });
    });

    $('input[name="re_password"]').on('change', function() {
      var password = $('input[name="password"]');
      var repassword = $(this);
      if (password.val() != repassword.val()) {
        submit.attr('disabled', true);
        repassword.after('<p> Please, Confirm Your Password.</p>');
        repassword.addClass('error');
      } else {
        submit.removeAttr('disabled', false);
        repassword.removeClass('error');
        repassword.next('p').remove();
      }
    });

  });
  $('.view').on('click', function() {
    var id = $(this);
    $.ajax({
      url: '<?php echo base_url('view_order'); ?>',
      type: "POST",
      data: {
        id: id.val()
      },
      success: function(data) {
        $('#account-orders').html(data);
      },
    });
  });
</script>