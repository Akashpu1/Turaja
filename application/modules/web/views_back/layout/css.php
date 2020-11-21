<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php foreach($setting as $value):?>
    <title><?php echo $value['title']?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('uploads/product/').$value['favicon'] ?>">
   <?php endforeach;?>
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/vendor/font-awesome.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/plugins/jqueryui.min.css">
    <!-- Line CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/icons.css">
    <script src="<?php echo base_url() ?>/assets/js/vendor/jquery-3.3.1.min.js"></script>
<!-- ============================================  -->
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">


</head>

<body>
