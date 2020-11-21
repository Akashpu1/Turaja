<script>
$(document).ready(function(){
	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#sort-list").append(data);
			},
			error: function(){$('#loader-icon').hide();}
	   });
	}
	<?php if (isset($cat) && !empty($cat)) { ?>
		// code...
		getresult('load?cat=<?php echo $cat; ?>&page=1');
		<?php	}else { ?>
		getresult('load?page=1');
	<?php	} ?>
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				<?php if (isset($cat) && !empty($cat)) { ?>
					getresult('load?cat=<?php echo $cat; ?>&page='+pagenum);
					<?php	}else { ?>
						getresult('load?page='+pagenum);
				<?php	} ?>
			}
		}
	});

	// Load side filter
	var sideFilter = $('#load-side-filter');
	$(function(){
		$.ajax({
			url: '<?php echo base_url('side_filter?cat=').$cat ?>',
			type: "GET",
			success: function(data){
				sideFilter.html(data);
			},
		});
	});

	var container = $("#sort-list");
	function resortByTitleAsc() {
			var alphabeticallyOrderedDivs = $('.kshort').sort(function(a, b) {
				return String.prototype.localeCompare.call($(a).data('title').toLowerCase(), $(b).data('title').toLowerCase());
			});
			container.detach().empty().append(alphabeticallyOrderedDivs);
			$('#product-list').append(container);
		}

	function resortByTitleDesc() {
			var alphabeticallyOrderedDivs = $('.kshort').sort(function(a, b) {
				return String.prototype.localeCompare.call($(b).data('title').toLowerCase(), $(a).data('title').toLowerCase());
			});
			container.detach().empty().append(alphabeticallyOrderedDivs);
			$('#product-list').append(container);
		}

		function resortByPriceAsc() {
			var alphabeticallyOrderedDivs = $('.kshort').sort(function(a, b) {
				// return String.prototype.localeCompare.call($(a).data('price').toLowerCase(), $(b).data('price').toLowerCase());
				return parseFloat($(a).data('price')) - parseFloat($(b).data('price'));
			});
			container.detach().empty().append(alphabeticallyOrderedDivs);
			$('#product-list').append(container);
		}

		function resortByPriceDesc() {
			var alphabeticallyOrderedDivs = $('.kshort').sort(function(a, b) {
				// return String.prototype.localeCompare.call($(a).data('price').toLowerCase(), $(b).data('price').toLowerCase());
				return parseFloat($(b).data('price')) - parseFloat($(a).data('price'));
			});
			container.detach().empty().append(alphabeticallyOrderedDivs);
			$('#product-list').append(container);
		}

		$('.myniceselect').change(function(){
			var type = $(this).val();
			switch (type) {
				case 'asc':
					resortByTitleAsc();
					break;
				case 'desc':
					resortByTitleDesc();
					break;
				case 'pasc':
					resortByPriceAsc();
					break;
				case 'pdesc':
					resortByPriceDesc();
					break;
				default:
				resortByTitleAsc();
				break;
			}
		});
});
</script>
