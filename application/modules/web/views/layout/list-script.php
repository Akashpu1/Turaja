<script type="text/javascript">
  $(document).ready(function(){
      // Select cities list
      

    $('.cities').select2({
      ajax: {
         url: '<?php echo base_url('cities'); ?>',
         type: "GET",
         dataType: 'json',
         data: function (params) {
           var query = {
             search: params.term,
             type: 'public',
             "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>",
           }
           return query;
         },
         processResults: function (data) {
            return {
              results: data
            };
          },
         // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
       }
    });
    // Select states list
    $('#states').select2({
      ajax: {
         url: '<?php echo base_url('states'); ?>',
         type: "GET",
         dataType: 'json',
         data: function (params) {
           var query = {
             search: params.term,
             type: 'public',
             "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>",
           }
           return query;
         },
         processResults: function (data) {
            return {
              results: data
            };
          },
         // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
       }
    });
  });
</script>
