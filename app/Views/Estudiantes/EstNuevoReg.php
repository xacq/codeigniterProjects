<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registro Estudiante | SGCC</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/public/tema/dist/css/theme.min.css">
        <script src="<?php echo base_url();?>/public/tema/src/js/vendor/modernizr-2.8.3.min.js"></script>
       
    </head>

    <body>
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


      <div class="auth-wrapper">
        <div class="container-fluid h-100">
          <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg h-100" style="background-image: url('<?php echo base_url();?>/public/tema/img/auth/login-bg.jpeg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
              <div class="authentication-form mx-auto" >
                  <h3>Registrar Estudiante</h3>
              <form action="<?php echo base_url(); ?>/EstudianteController/guardarreg" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtNombre">Digite el Nombre </label>
                        <input type="text" class="form-control <?php if( isset($validation) && $validation->getError('txtNombre')): ?>is-invalid<?php endif ?>" name="txtNombre" placeholder="Nombre">
                        <?php if( isset($validation) && $validation->getError('txtNombre') ) : ?>
                            <div class='alert alert-danger mt-2'>
                              <?= $error = $validation->getError('txtNombre'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtCedula">Digite Nº. C&eacute;dula</label>
                        <input type="number" class="form-control <?php if( isset($validation) && $validation->getError('txtCedula')): ?>is-invalid<?php endif ?>" name="txtCedula" placeholder="C&eacute;dula">
                        <?php if( isset($validation) && $validation->getError('txtCedula') ) :?>
                            <div class='alert alert-danger mt-2'>
                              <?= $error = $validation->getError('txtCedula'); ?>
                            </div>
                        <?php endif; ?>                                          
                    </div>                               
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="txtDreccion">Digite Direcci&oacute;n</label>
                      <input type="text" class="form-control" name="txtDreccion" placeholder="Direcci&oacute;n">
                    </div>  
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="txtTelefono">Digite Tel&eacute;fono</label>
                      <input type="number" class="form-control" name="txtTelefono" placeholder="Tel&eacute;fono">
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtCorreo">Digite Correo </label>
                        <input type="email" class="form-control <?php if( isset($validation) && $validation->getError('txtCorreo')): ?>is-invalid<?php endif ?>" name="txtCorreo" placeholder="Correo">
                        <?php if( isset($validation) && $validation->getError('txtCorreo') ) : ?>
                            <div class='alert alert-danger mt-2'>
                              <?= $error = $validation->getError('txtCorreo'); ?>
                            </div>
                        <?php endif; ?>                                            
                    </div>    
                  </div>
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtEstado">Seleccione Estado</label>
                        <?php 
                        
                        $options = [
                          'ACTIVO'  => 'ACTIVO',
                          'INACTIVO'    => 'INACTIVO'
                        ];

                        echo "<select class='form-control' name='txtEstado' id='txtEstado'>";
                        foreach ($options as $item){
                          echo "<option value='".$item."'>".$item."</option>";
                        }
                        echo "</select>";                                
                        
                        ?>
                    </div>  
                  </div> -->
                </div>
                <div class="alert alert-warning" role="alert">
                                    Si eres estudiantes recuerda que tu clave y contraseña es tu número de cédula!!
                                    </div>
                <div class="d-flex flex-column align-items-center">
                  <div class=" w-100">
                    <button type="submit" id="submit_button" class="btn btn-primary btn-block">Registrar</button>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <a class="text-muted" href="<?php echo base_url('login'); ?>">Ya tienes una cuenta?<span class="text-dark text-secondary py-1 pl-1"><b>Iniciar Sesi&oacute;n</b></span></a>
                  </div>
                </div>
              </form>   
              </div>
            </div>
          </div>
        </div>
      </div>
        



        <!-- <div class="container-fluid">
            
          <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                      <h3>Crear Estudiante</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="<?php echo base_url(); ?>/EstudianteController/guardarreg" method="post" accept-charset="utf-8">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtNombre">Digite el Nombre *</label>
                                          <input type="text" class="form-control <?php if( isset($validation) && $validation->getError('txtNombre')): ?>is-invalid<?php endif ?>" name="txtNombre" placeholder="nombres...">
                                          <?php if( isset($validation) && $validation->getError('txtNombre') ) : ?>
                                              <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('txtNombre'); ?>
                                              </div>
                                          <?php endif; ?>

                                      </div>

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtCedula">Digite No. C&eacute;dula *</label>
                                          <input type="number" class="form-control <?php if( isset($validation) && $validation->getError('txtCedula')): ?>is-invalid<?php endif ?>" name="txtCedula" placeholder="c&eacute;dula...">
                                          <?php if( isset($validation) && $validation->getError('txtCedula') ) :?>
                                              <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('txtCedula'); ?>
                                              </div>
                                          <?php endif; ?>                                          
                                      </div>                               
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtDreccion">Digite Direcci&oacute;n</label>
                                          <input type="text" class="form-control" name="txtDreccion" placeholder="direcci&oacute;...">
                                      </div>  

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtTelefono">Digite Tel&eacute;fono</label>
                                          <input type="number" class="form-control" name="txtTelefono" placeholder="tel&eacute;fono...">
                                      </div> 
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtCorreo">Digite Correo *</label>
                                          <input type="email" class="form-control <?php if( isset($validation) && $validation->getError('txtCorreo')): ?>is-invalid<?php endif ?>" name="txtCorreo" placeholder="correo...">
                                          <?php if( isset($validation) && $validation->getError('txtCorreo') ) : ?>
                                              <div class='alert alert-danger mt-2'>
                                                <?= $error = $validation->getError('txtCorreo'); ?>
                                              </div>
                                          <?php endif; ?>                                            
                                      </div>    

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="txtEstado">Seleccione Estado</label>
                                          <?php 
                                          
                                          $options = [
                                            'ACTIVO'  => 'ACTIVO',
                                            'INACTIVO'    => 'INACTIVO'
                                          ];

                                          echo "<select class='form-control' name='txtEstado' id='txtEstado'>";
                                          foreach ($options as $item){
                                            echo "<option value='".$item."'>".$item."</option>";
                                          }
                                          echo "</select>";                                
                                          
                                          ?>
                                      </div>  
                                    </div>
                                  </div>



                                  <div class="d-flex flex-column align-items-center">
                                    <div class="col-md-4">
                                      <button type="submit" id="submit_button" class="btn btn-primary btn-block">Crear</button>
                                    </div>
                                  </div>
                                  
                                  <br>

                                  <div class="row">
                                    <div class="col-md-12 text-center">
                                      <a href="<?php echo base_url('login'); ?>"><span class="text-secondary"><b>Iniciar Sesi&oacute;n</b></span></a>
                                    </div>
                                  </div>
                                </form>            
                            </div>
                        </div>

                    </div>
                </div>

              </div>
            </div>
            
          </div> 

        </div>       -->
                
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
    </body>
</html>
