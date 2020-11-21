<script src="<?php echo base_url(); ?>/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $("#size_container").hide();
    $('#add').on('click', function() {
      var element = '	<div class="row">';
      element += '<br>';
      element += '<div class="col-sm-2 " ></div><div class="col-sm-4">';
      element += '<select name="attribute[]" id="example-input-small" class="form-control attribute">';
      element += '<option value="none">Select attribute</option>';
      element += '<?php foreach ($attribute as $row) { ?>';
      element += '<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>';
      element += '<?php } ?>';
      element += '</select>';
      element += '</div>';
      element += '<div class="col-sm-4">';
      element += '<input type="text" id="example-input-small" name="value[]" class="form-control input-sm text" placeholder="value">';
      element += '</div>';
      element += '<div class="col-sm-2"> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></div>';
      element += '</div>';
      element += '</div>';

      $('#add_data').append(element);
    });
    $('#add_image').on('click', function() {
      element = "<tr ><td>";
      element += "product image</td>	<td>";
      element += "<input type='file' class='dropify form-control' name='pics[]' /></td></tr><tr><td>";
      element += "product color</td><td>";
      element += "<input type='color'  name='color[]' value='' /></td>";
      element += "	<button type='button'   class='btn btn-danger remove_image'>-</button>	</td>	</tr>";


      $('#tr_images tbody').append(element);
      $('.dropify').dropify();
    });


    $(document).on('click', '.remove_image', function() {
      $(this).parent().parent().remove();
    });
    $(document).on('click', '.remove', function() {
      $(this).parent().parent().remove();
    });

    $(document).on("change", "#category", function() {
      console.log($(this).val());
      if ($(this).val() == 15 || $(this).val() == 17) {
        $("#size_container").show();
      } else {
        $("#size_container").hide();
      }

    });
    $(document).on("change", ".attribute", function() {
      console.log($(this).val());
      var html = '<input type="text" name="value[]" class="form-control  " placeholder="value">'

      if ($(this).val() == 20) {
        html = $("#template").html();

      }
      $(this).parent().parent().find(".text").html(html);
    });

  });
</script>