<script type="text/javascript">
$(document).ready(function(){
  <?php if ($this->session->flashdata()):?>
    <?php if ($this->session->flashdata('error')): ?>
      toastr.error('Faild!', '<?php echo $this->session->flashdata('msg') ?>');
    <?php else: ?>
      toastr.success('Success!', '<?php echo $this->session->flashdata('msg') ?>');
    <?php endif; ?>
  <?php endif; ?>
});


</script>
