<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | SGCC</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href=".. /style.css">
        <!-- estilo del boton flotante whatsap -->
        <link rel="stylesheet" href="public/css/styleWhatsap.css">
        <!-- estilo del boton flotante whatsap -->
        

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/dist/css/theme.min.css">
        <script src="<?php echo base_url();?>/public/tema/src/js/vendor/modernizr-2.8.3.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <style>
            .authentication-form{
                padding: 20px 0 !important;
                /* border:solid; */
                height:100vh;
                display:flex;
                justify-content: center;
                margin:auto;
            }
            .logo-container{
                border-radius:10%;
                overflow:hidden;
                width: 125px;
                height: 125px ;
                display: flex;
                margin:10px auto;

            }
            .img-logo{
                height:100%;
                width:100%;
            }
        </style>
         <!-- boton flotante whatsap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=+593987676018&text=BIENVENIDOS%20AL%20SISTEMA%20DE%20CENTRO%20DE%20CAPACITAC%C3%93N%20SOCRATES" class="float" target="_blank" >
            <i class="fa fa-whatsapp my-float"></i>
            </a>
          <!-- boton flotante whatsap -->  
        <div class="auth-wrapper  ">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('<?php echo base_url();?>/public/tema/img/auth/login-bg.jpeg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 ">
                        <div class="authentication-form mx-auto text-center "  >
                            <div class="logo-container">
                                <img class ="img-logo" src="<?php echo base_url();?>/public/img/login.jpeg" alt="">
                            </div>
                            <h3>Bienvenidos</h3>
                            <p>Iniciar en Sistema de Gesti&oacute;n</p>
                            <form action="<?php echo base_url('home/auth'); ?>" method="post" autocomplete="off">
                                <div class="form-group">
                                    <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuario" required="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtClave" id="txtClave" class="form-control" placeholder="Clave" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    Si eres estudiantes recuerda que tu clave y contraseña es tu número de cédula!!
                                    </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-primary btn-rounded">Iniciar</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>¿No tienes una cuenta? <a href="<?php echo base_url('EstudianteController/nuevoreg'); ?>"><span class="text-primary"><b>Registrate</b></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>/public/tema/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>/public/tema/node_modules/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url();?>/public/tema/dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <?php if (session()->getFlashdata('mensaje')): ?>
    <script>
        var msg = '<?php echo session()->getFlashdata('mensaje'); ?>'
        var title = '<?php echo session()->getFlashdata('title'); ?>'
        var status = '<?php echo session()->getFlashdata('status'); ?>'
         function showSuccessSweetAlert(icon) {
            Swal.fire({
                title: title,
                text: msg,
                icon: 'success'
            }).then((result) => {
            });
        }
        if(status === 'success'){
            showSuccessSweetAlert('success')
        }else{
            showSuccessSweetAlert('error')
        }
    </script>
<?php endif; ?>
    </body>
</html>
