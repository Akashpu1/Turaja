<script src="<?php echo base_url() ?>/assets/js/vendor/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {

    $(".category").click(function(event) {
      var id = $(this).attr('id');
      //console.log(id);
      // alert(id);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('web/Home/arivel_slider') ?>",
        data: {
          'id': id,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $(".data_body").html(data);
        }

      });

    });

            $(".wishlist").click(function(event) {
            var id= $(this).attr('id');
            //alert(id);
                $.ajax({
                  type: "POST",
                  url: "<?= base_url()?>web/home/view",

                  data: {'id' : id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
                  datatype: 'json',
                  success: function(data)
                  {
                    $('body').append(data);
                  }
                });
            });


                    $('.add_cart').click(function(){

                        var product_id    = $(this).data("productid");
                        var product_icon    = $(this).data("producticon");
                        var product_name  = $(this).data("productname");
                        var product_price = $(this).data("productprice");
                        var quantity    = $('#' + product_id).val();

                        $.ajax({
                            url : "<?php echo site_url('web/collection/add_to_cart');?>",
                            method : "POST",
                            data : {product_id: product_id,product_icon: product_icon, product_name: product_name, product_price: product_price, quantity: quantity},

                            success: function(data){
                               $('#detail_cart').html(data);
                            }
                        });
                    });


                      $('#detail_cart').load("<?php echo site_url('web/collection/load_cart');?>");


                    // $(document).on('click','.romove_cart',function(){
                    //     var row_id=$(this).attr("id");
                    //     $.ajax({
                    //         url : "<?php echo site_url('product/delete_cart');?>",
                    //         method : "POST",
                    //         data : {row_id : row_id},
                    //         success :function(data){
                    //             $('#detail_cart').html(data);
                    //         }
                    //     });
                    // });






  });
</script>
