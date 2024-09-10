<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SGCC</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/c3/c3.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/owl.carousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/owl.carousel/dist/assets/owl.theme.default.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/dist/css/theme.min.css">
        <script src="<?php echo base_url();?>/public/tema/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            
            <?php echo view('Estructura/layout/header') ?>

            <div class="page-wrap">

                <?php echo view('Estructura/layout/sidebar') ?>

                <div class="main-content">
                    <div class="container-fluid">

                        <?php echo view($content) ?>

                    </div>
                </div>

                <?php echo view('Estructura/layout/footer') ?>
                
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>/tema/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/moment/moment.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/d3/dist/d3.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/c3/c3.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/js/tables.js?v=<?php echo(rand()); ?>"></script>
        <script src="<?php echo base_url();?>/public/tema/js/widgets.js"></script>
        <script src="<?php echo base_url();?>/public/tema/js/charts.js"></script>
        <script src="<?php echo base_url();?>/public/tema/dist/js/theme.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
