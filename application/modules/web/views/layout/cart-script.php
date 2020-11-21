<script type="text/javascript">
  $(document).ready(function() {
    $('.lbl').click(function() {

      window.size = $(this).text();


    });
    var miniCart = $('#miniCart');
    var itemCount = $('.card-item-count');
    $(document).on('click', '.minicart', function() {

      var pid = $(this).attr('data-id');
      var qty = $("#qty").val();
      var unit = $("#unit").text();
      miniCart.addClass('open');


      $.ajax({
        url: "<?php echo base_url('web/collection/addtocard'); ?>",
        method: "POST",
        data: {
          pid: pid,
          qty: qty,
          unit: unit,
          size: window.size
        },
        success: function(data) {
          cart_view();
        }
      });
    });



    function cart_view() {
      $.ajax({
        url: "<?php echo base_url('web/collection/miniCart'); ?>",
        method: "GET",
        success: function(data) {
          cart_count();
          miniCart.html(data);

        }
      });
    }

    function cart_count() {
      $.ajax({
        url: "<?php echo base_url('web/collection/cart_count'); ?>",
        method: "GET",
        success: function(data) {
          itemCount.html(data);
        }
      });
    }
    $(document).on('click', '.quick-view-btn', function() {

      var pid = $(this).attr('data-id');
      //console.log(pid);
      $.ajax({
        url: "<?php echo base_url('web/collection/quick_view'); ?>",
        method: "POST",
        data: {
          pid: pid,

        },
        success: function(data) {
          $('body').append(data);
        }
      });
    });
    
    cart_view();
  });
</script>