<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- PAGE TITLE -->
    <title>TPRO PORTAL - <?php echo $pageTitle; ?></title>
    
    <!-- FAVICON -->
    <link rel="icon" href="http://sneaselplushie.legends-station.com/images/icons/favicon-pokeball.ico" type="image/icon">
    
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    
    <meta name="description" content="TPRO application">
    <meta name="author" content="Fhad Sheikh">

    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css') ;?>" rel="stylesheet"> 

    <!-- CSS -->
    <link type="text/css" href="<?php echo base_url('assets/css/styles.css') ;?>" rel="stylesheet">                                     <!-- Core CSS with all styles -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet">                    <!-- Bootstrap Support for Datatables -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.fontAwesome.css'); ?>" rel="stylesheet">                  <!-- FontAwesome Support for Datatables -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/form-daterangepicker/daterangepicker-bs3.css') ;?>" rel="stylesheet"> 	<!-- DateRangePicker -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/progress-skylo/skylo.css" rel="stylesheet'); ?>"> 	<!-- Skylo -->
    <link type="text/css" href="<?php echo base_url('assets/plugins/summernote/dist/summernote.css'); ?>" rel="stylesheet"> <!-- Summernote -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    
    <?php if(isset($refresher)){echo $refresher;}?>
    
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    
    <!-- Subscribe to pusher -->
    <script> var pusher = new Pusher('<?php echo $this->session->pusher_api_key; ?>', {encrypted: true}); </script>
    
    <!-- QuickFind tickets shortcut modal -->
    <script>
        function nextTextBox(tb){
            if(tb.value.length >= 1){
                var id = parseInt(tb.id)+1;
                $("#"+id).focus();
            }
            if(parseInt(tb.id) >= 4){
                var ticketNumber = $('#1').val() + $('#2').val() + $('#3').val() + $('#4').val();
                $('#ticketSearchTextBox').val(ticketNumber);
                $('#submitTicketSearch').click();
            }
            if(tb.value.length == 0){
                var id = parseInt(tb.id)-1;
                $("#"+id).val('').focus();
            }
        }
    </script>
    
</head>
<body class="infobar-offcanvas"> 