<script>
$(document).ready(function(){

    // filter_data();
    var pstart = $('input[name="price-start"]');
    var pend = $('input[name="price-end"]');
    var cat = $('input[name="category"]').val();
    var page = $('.pagenum').val();

    function filter_data()
    {
        var minimum_price = pstart.val();
        var maximum_price = pend.val();
        var craft = get_filter('craft');
        var color = get_filter('color');
        var filter = 1;
        $.ajax({
            url:"filter_data",
            method:"POST",
            data:{filter:filter, cat:cat, minimum_price:minimum_price, maximum_price:maximum_price, craft:craft, color:color, page:page},
            success:function(data) {
              $('#sort-list').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('input[type="checkbox"]').change(function(){
        filter_data();
    });


    /*--------------------------------
	Price Slider Active
	-------------------------------- */
	var sliderrange = $('#slider-range');
	var amountprice = $('#amount');
	$(function () {
		sliderrange.slider({
			range: true,
			min: 500,
			max: 25000,
			values: [0, 10000],
			slide: function (event, ui) {
				amountprice.val('₹' + ui.values[0] + ' - ₹' + ui.values[1]);
      },
      stop:function(event, ui) {
        pstart.val(sliderrange.slider('values', 0));
        pend.val(sliderrange.slider('values', 1));
        filter_data();
      }
		});
		amountprice.val('₹' + sliderrange.slider('values', 0) + ' - ₹' + sliderrange.slider('values', 1));
    pstart.val(sliderrange.slider('values', 0));
    pend.val(sliderrange.slider('values', 1));
  });

});
</script>
