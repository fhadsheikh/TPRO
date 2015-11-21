<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TPRO PORTAL - <?php echo $pageTitle; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenger Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->

    <link type="text/css" href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css') ;?>" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<?php echo base_url('assets/css/styles.css') ;?>" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="<?php echo base_url('assets/plugins/jstree/dist/themes/avenger/style.min.css') ;?>" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/codeprettifier/prettify.css') ;?>" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/iCheck/skins/minimal/blue.css') ;?>" rel="stylesheet">              <!-- iCheck -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="<?php echo base_url('assets/css/ie8.css') ;?>" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-daterangepicker/daterangepicker-bs3.css') ;?>" rel="stylesheet"> 	<!-- DateRangePicker -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.css') ;?>" rel="stylesheet"> 					<!-- FullCalendar -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/charts-chartistjs/chartist.min.css') ;?>" rel="stylesheet"> 				<!-- Chartist -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet">                    <!-- Bootstrap Support for Datatables -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.fontAwesome.css'); ?>" rel="stylesheet">                  <!-- FontAwesome Support for Datatables -->

    <link type="text/css" href="<?php echo base_url('assets/plugins/tables-fixedheader/css/dataTables.fixedHeader.min.css'); ?>" rel="stylesheet">  <!-- FixedHeader CSS -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/progress-skylo/skylo.css" rel="stylesheet'); ?>"> 	<!-- Skylo -->
    
    <link type="text/css" href="<?php echo base_url('assets/plugins/jstree/dist/themes/avenger/style.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/plugins/summernote/dist/summernote.css'); ?>" rel="stylesheet"> <!-- Summernote -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-select2/select2.css" rel="stylesheet') ;?>">                        <!-- Select2 -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-multiselect/css/multi-select.css') ;?>" rel="stylesheet">           <!-- Multiselect -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-fseditor/fseditor.css') ;?>" rel="stylesheet">                      <!-- FullScreen Editor -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-tokenfield/bootstrap-tokenfield.css') ;?>" rel="stylesheet">        <!-- Tokenfield -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/switchery/switchery.css') ;?>" rel="stylesheet">        					<!-- Switchery -->

    <link type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') ;?>" rel="stylesheet"> <!-- Touchspin -->

    <link type="text/css" href="<?php echo base_url('assets/js/jqueryui.css') ;?>" rel="stylesheet">        									<!-- jQuery UI CSS -->

    <link type="text/css" href="<?php echo base_url('assets/plugins/iCheck/skins/minimal/_all.css') ;?>" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/iCheck/skins/flat/_all.css') ;?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/plugins/iCheck/skins/square/_all.css') ;?>" rel="stylesheet">

    <link type="text/css" href="<?php echo base_url('assets/plugins/card/lib/css/card.css') ;?>" rel="stylesheet"> 									<!-- Card -->
    <style>
    /*To make sure there is modal displayed with this class for demo*/
    .visiblemodal {
        position: relative;
        top: auto;
        right: auto;
        left: auto;
        bottom: auto;
        z-index: 1;
        display: block;
        overflow: hidden;
    }
    </style>
    
    
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script>
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('460661f1790679919797', {
      encrypted: true
    });

    </script>
    
    <?php if(isset($refresher)){echo $refresher;}; ?>
    
    </head>
<body class="infobar-offcanvas"> 