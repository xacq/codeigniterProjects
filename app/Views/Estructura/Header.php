<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema De Gestión Capacitacion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTAbles -->
   <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/AdminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/css/styleDashboard.css?v=<?php echo(rand()); ?>"/>
  <!-- FOOTER JS-->
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>/public/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styleReloj.css">
<script src="<?php echo base_url();?>/public/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/public/SweetAlertJs/sweetalert.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini"  onload="startTime()">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size:12px;">MENU</span>
      <!-- logo for regular state and mobile devices 
      <span class="logo-lg"><b>Control</b>Sanitario</span>
      -->
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="cerrarSession" href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span></a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php if (session('perfilId') === '1'): ?>
          <!-- NOTIFICACIONES  SI ES ADMINISTRADOR -->
          <li class="dropdown notifications-menu" style="margin-top:15px; margin-right: 50px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?=session('totalPagosPendientes')?></span>
            </a>
            <ul class="dropdown-menu">
            <li class="header"> <?=session('totalPagosPendientes')?> Pagos Pendientes</li>
            <li>

            <ul class="menu">
              <li>
                <a href="<?php echo base_url('PagosController'); ?>">
                  <i class="fa fa-info-circle text-red"></i> 
                  Revisar Pagos Pendientes
                </a>
              </li>
            </ul>
            </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>