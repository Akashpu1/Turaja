<script src="<?php echo base_url() ?>/assets/js/vendor/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $(".color").change(function(event) {
      // alert('ok');
      var colorname = $(this).val();
      var id = $('#c_id').val();
      var type = $('#clr').val();
      var searchtype = $('.search').val();
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/color') ?>",
        data: {
          'colorname': colorname,
          'id': id,
          'type': type,
          'searchtype': searchtype,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });

    });
    $("#sort").change(function(event) {
      // alert('ok');
      var sort = $(this).val();
      var id = $('#c_id').val();
      var type = $('#clr').val();
      var searchtype = $('.search').val();
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/shop_by_category/') ?>"+id,
        data: {
          'sort': sort,

          'type': type,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });

    });
    $("#fabric").change(function(event) {
      // alert('ok');
      var fabricname = $(this).val();
      var id = $('#f_id').val();
      var type = $('#fab').val();
      var searchtype = $('.search').val();
      //console.log(id);
      // alert(id);
      // alert(name);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/color') ?>",
        data: {
          'fabricname': fabricname,
          'id': id,
          'type': type,
          'searchtype': searchtype,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });

    });
    $("#patern").change(function(event) {
      // alert('ok');
      var parternname = $(this).val();
      var id = $('#p_id').val();
      var type = $('#par').val();
      var searchtype = $('.search').val();
      //console.log(id);
      // alert(id);
      // alert(name);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/color') ?>",
        data: {
          'parternname': parternname,
          'id': id,
          'type': type,
          'searchtype': searchtype,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });

    });
    $("#weaving").change(function(event) {
      // alert('ok');
      var weavingname = $(this).val();
      var id = $('#w_id').val();
      var type = $('#weav').val();
      var searchtype = $('.search').val();
      //console.log(id);
      // alert(id);
      // alert(name);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/color') ?>",
        data: {
          'weavingname': weavingname,
          'id': id,
          'type': type,
          'searchtype': searchtype,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });

    });



    var rangeSlider = $(".price-range"),
      amount = $("#amount"),
      minPrice = rangeSlider.data('min'),
      maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
      range: true,
      min: minPrice,
      max: maxPrice,
      values: [minPrice, maxPrice],
      slide: function(event, ui) {
        amount.val(ui.values[0] + " - " + ui.values[1]);
      }
    });

    $("#rang").click(function() {
      var myString = $("#amount").val();
      // alert(a);
      array = myString.split('-');
      var min = (array[0]);
      var max = (array[1]);
      var id = $('#color_id').val();
      var type = $('#price').val();
      var searchtype = $('.search').val();


      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/shop/color') ?>",
        data: {
          'min': min,
          'max': max,
          'id': id,
          'type': type,
          'searchtype': searchtype,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#details").html(data);
        }

      });
      // alert(min);
      // alert(max);
      //alert(res);
    });

  });
</script>
