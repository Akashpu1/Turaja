
  <!-- JS
============================================ -->
  <!-- Modernizer JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- Popper JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/vendor/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/vendor/bootstrap.min.js"></script>

  <!-- Slick Slider JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/slick.min.js"></script>
  <!-- Barrating JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.barrating.min.js"></script>
  <!-- Counterup JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.counterup.js"></script>
  <!-- Nice Select JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.nice-select.js"></script>
  <!-- Sticky Sidebar JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.sticky-sidebar.js"></script>
  <!-- Jquery-ui JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.ui.touch-punch.min.js"></script>
  <!-- Theia Sticky Sidebar JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/theia-sticky-sidebar.min.js"></script>
  <!-- Waypoints JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/waypoints.min.js"></script>
  <!-- jQuery Zoom JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/jquery.zoom.min.js"></script>
  <!-- Timecircles JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/plugins/timecircles.js"></script>

  <script src="<?php echo base_url(ASSETS) ?>/select2/select2.js"></script>


  <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
  <!--
<script src="<?php echo base_url(ASSETS) ?>/js/vendor/vendor.min.js"></script>
<script src="<?php echo base_url(ASSETS) ?>/js/plugins/plugins.min.js"></script> -->

  <!-- Main JS -->
  <script src="<?php echo base_url(ASSETS) ?>/js/main.js"></script>

  <!-- GetButton.io widget -->

  <!-- /GetButton.io widget -->

  <?php get_section('cart-script'); ?>
  <?php get_section('list-script'); ?>

  <?php if (isset($is_script)):
      echo $is_script;
  ?>
  <?php endif; ?>

</body>

</html>
