<script src="<?php echo base_url() ?>/assets/js/vendor/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

     filter_data();

     function filter_data() {

                var minimum_price = $('#min_price_hide').val();
                var maximum_price = $('#max_price_hide').val();
                var id = $('.min_id').val();


                var color = get_filter('color');
                  
                var fabric = get_filter('fabric');
                var patern = get_filter('patern');
                var weaving = get_filter('weaving');

                $.ajax({
                    url: "<?php echo base_url('web/shop/filter') ?>",
                    method: "POST",
                    data: {
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        id:id,

                        fabric: fabric,
                        color: color,
                        patern: patern,
                        weaving: weaving,
                    },
                    success: function(data) {
                        $('#details').html(data);
                    }
                });
            }

    function get_filter(class_name) {
                 var filter = [];
                 $('.' + class_name + ':checked').each(function() {
                     filter.push($(this).val());
                 });
                 return filter;
             }

             $('.filter_all').click(function(){
                 filter_data();
             });

             $('#price_range').slider({
                          range: true,
                          min: 1000,
                          max: 50000,
                          values: [1000, 50000],
                          step: 10,
                          stop: function(event, ui) {
                              $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                              $('#min_price_hide').val(ui.values[0]);
                              $('#max_price_hide').val(ui.values[1]);
                              filter_data();
                          }
                      });


      // alert(min);
      // alert(max);
      //alert(res);
    });


</script>
