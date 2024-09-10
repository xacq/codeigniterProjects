 <?php 
    $uriActual = service('uri');
    $segmentoActual = $uriActual ->getSegment(1);
 ?>

<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand">
            <!-- <div class="logo-img">
                <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
            </div> -->
            <span class="text">SGCC</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
                    
    <div class="sidebar-content">
    <div class="submenu-content" style="color: white;">
    
    
</div>

        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Men&uacute;</div>
               
                <!-- BOTON INICIO -->
                <div class="submenu-content">
                <div class="nav-item active">
                        <a href="<?php echo base_url('AreasController/home'); ?>"><i class="fa fa-home"></i><span>Inicio</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('/AreasController'); ?>"></a>
                            </div>
                        </div>
                    </div> 
               
               <!-- BOTON INICIO -->                  
                                
                           
                <?php
                    $session=session();
                    $menu = $session->get('menu');
                    $perfilId = $session->get('perfilId');
                    
                    
                    foreach ($menu  as $menu) {
                    ?>
                    <div class="nav-item has-sub <?php
                    if( 
                        ($segmentoActual == 'AreasController' && $menu['OPCNOMBRE'] == 'Areas') ||
                        ($segmentoActual == 'AsistenciasController' && $menu['OPCNOMBRE'] == 'Asistencias') ||
                        ($segmentoActual == 'AuditoriasController' && $menu['OPCNOMBRE'] == 'Auditoria') ||
                        ($segmentoActual == 'CalificacionesController' && $menu['OPCNOMBRE'] == 'Calificaciones') ||
                        ($segmentoActual == 'RegistroCalificacionesController' && $menu['OPCNOMBRE'] == 'Calificaciones') ||
                        ($segmentoActual == 'CursosController' && $menu['OPCNOMBRE'] == 'Cursos') ||
                        ($segmentoActual == 'RegistroDocentesController' && $menu['OPCNOMBRE'] == 'Cursos') ||
                        ($segmentoActual == 'DocentesController' && $menu['OPCNOMBRE'] == 'Docentes') ||
                        ($segmentoActual == 'EstudianteController' && $menu['OPCNOMBRE'] == 'Estudiantes') ||
                        ($segmentoActual == 'ItemsController' && $menu['OPCNOMBRE'] == 'Calificaciones') ||
                        ($segmentoActual == 'MatriculasController' && $menu['OPCNOMBRE'] == 'Matriculas') ||
                        ($segmentoActual == 'OpcionesController' && $menu['OPCNOMBRE'] == 'Opciones') ||
                        ($segmentoActual == 'PagosController' && $menu['OPCNOMBRE'] == 'Pagos') ||
                        ($segmentoActual == 'PerfilesController' && $menu['OPCNOMBRE'] == 'Perfiles') ||
                        ($segmentoActual == 'UsuariosController' && $menu['OPCNOMBRE'] == 'Usuarios')  
        
                      ){
                        echo "open";
                    }
                    ?>">
                    
                        <a href="#"><i class="ik ik-command"></i><span><?php echo $menu['OPCNOMBRE']?></span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url($menu['OPCRUTA']); ?>" class="menu-item">Administrar</a>
                            <?php if($menu['OPCRUTA'] === 'CursosController' ) : ?>
                                <a href="<?php echo base_url('RegistroDocentesController'); ?>" class="menu-item">Asignar Docente</a>
                            <?php endif; ?>


                            <?php if($menu['OPCRUTA'] === 'CalificacionesController') : ?>
                                <a href="<?php echo base_url('ItemsController'); ?>" class="menu-item">Items</a>
                                <a href="<?php echo base_url('RegistroCalificacionesController'); ?>" class="menu-item">Registro Califaciónes</a>
                            <?php endif; ?>  
                            
                            
                        </div>
                    </div>                    
                <?php } ?>             

            </nav>
        </div>
    </div>
</div>