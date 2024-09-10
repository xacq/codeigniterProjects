<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

	<section class="sidebar">

		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url(); ?>/public/img/avatar.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?= session('usuNombre'); ?></p>
				<a href="#">
					<i class="fa fa-circle text-success"></i>
					<?php
					switch (session('perfilId')) {
						case '1':
							echo "Administrador";
							break;
						case '2':
							echo "Estudiante";
							break;
						default:
							echo "Docente";
							break;
					}
					?>
				</a>
			</div>
		</div>

		<ul class="sidebar-menu" data-widget="tree">

			<!-- ACCESO ADMIN -->
			<?php if (session('perfilId') === '1') : ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i> <span>Usuario</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('UsuariosController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-tags"></i> <span>Areas</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('/areas'); ?>"><i class="fa fa-circle-o"></i> Administrar</a></li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Estudiantes</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('EstudianteController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Docentes</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('DocentesController'); ?>">
								<i class="fa fa-circle-o"></i> Administrar
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('RegistroDocentesController'); ?>">
								<i class="fa fa-circle-o"></i> Registro
							</a>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-university"></i> <span>Cursos</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('CursosController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<!-- ACCESO MATRICULAS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-book"></i> <span>Matriculas</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('MatriculasController/pendientes'); ?>">
								<i class="fa fa-circle-o"></i> Pendientes
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('MatriculasController/pendientes'); ?>">
								<i class="fa fa-circle-o"></i> Matriculados
							</a>
						</li>
					</ul>
				</li>


				<!-- ACCESO PAGOS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-inbox"></i> <span>Pagos</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('PagosController'); ?>">
								<i class="fa fa-circle-o"></i> Pendientes
							</a>
						</li>

					</ul>
				</li>

				<!-- ACCESO OPCIONES -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Opciones</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('OpcionesController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<!-- ACCESO PERFILES -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Perfiles</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('PerfilesController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<!-- ACCESO Auditorias -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Auditorias</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('AuditoriasController'); ?>"><i class="fa fa-circle-o"></i> Administrar</a>
						</li>
					</ul>
				</li>

				<!-- ACCESO Calificaciones -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Calificaciónes</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('CalificacionesController'); ?>"><i class="fa fa-circle-o"></i>
								Administrar</a>
						</li>
						<li>
							<a href="<?php echo base_url('RegistroCalificacionesController'); ?>">
								<i class="fa fa-circle-o"></i>
								Registro Calif.
							</a>
						</li>
					</ul>
				</li>
				<!-- ACCESO ASISTENCIAS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-check"></i> <span>Asistencias</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('AsistenciasController'); ?>">
								<i class="fa fa-circle-o"></i> Administrar
							</a>
						</li>
					</ul>
				</li>


				<!-- ACCESO ITEMS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Items</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('ItemsController'); ?>"><i class="fa fa-circle-o"></i>
								Administrar</a></li>
					</ul>
				</li>


				<!-- ACCESO CALIFICACIONES ITEMS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-check-square-o"></i> <span>Calificaciones Items</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('CalificacionesItemsController'); ?>"><i class="fa fa-circle-o"></i>
								Administrar
							</a>
						</li>
					</ul>
				</li>

			<?php endif; ?>




			<!-- ACCESO ESTUDIANTE -->
			<?php if (session('perfilId') === '2') : ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-book"></i> <span>Mis Cursos</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('MyCoursesController'); ?>"><i class="fa fa-circle-o"></i>
								Administrar</a></li>
					</ul>
				</li>

			<?php endif; ?>

			<!-- ACCESO DOCENTE -->
			<?php if (session('perfilId') === '3') : ?>
				<!-- CALIFICACIONES -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Calificaciónes</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('RegistroCalificacionesController'); ?>">
								<i class="fa fa-circle-o"></i>
								Registro Calif.
							</a>
						</li>
					</ul>
				</li>
				<!-- ASISTENCIAS -->
				<li class="treeview">
					<a href="#">
						<i class="fa fa-check"></i> <span>Asistencias</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo base_url('AsistenciasController'); ?>">
								<i class="fa fa-circle-o"></i> Administrar
							</a>
						</li>
					</ul>
				</li>

			<?php endif; ?>




		</ul>
	</section>
	<!-- /.sidebar -->
</aside>

<!-- =============================================== -->