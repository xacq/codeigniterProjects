<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?php
			echo "Id:", $perId;
			echo "<br/>";
			echo "Perfil: ", $perNombre;
			?>
			<small><i class="fa fa-tags"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Area</h3>
					</div>
					<div class="box-body">
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-12">
								<?php
								$base = base_url();
								echo form_open('/AreasController/modificar'); //equivale al <form></form> en html
								echo "<br>";

								$codigo = 0;
								foreach ($areas as $value) {
									$codigo = $value['AREID'];
									$areaNombre = $value['ARENOMBRE'];
								}

								echo form_input(['name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo]);
								echo "<br>";

								echo form_label('Área:', 'area'); //equivale al <label></label> en html
								echo "<br>";


								echo form_input(['name' => 'txtArea', 'placeholder' => 'Ingrese el Área', 'class' => 'form-control', 'value' => $areaNombre]);
								echo "<br>";

								echo form_button(['name' => 'btnGuardar', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Guardar']);
								echo form_close();

								?>

								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover dt-responsive display nowrap"
												 cellspacing="0">
										<thead>
										<tr>
											<th>Código</th>
											<th>Nombre</th>
											<th>Estado</th>
											<th>Acciones</th>

										</tr>
										</thead>
										<?php
										foreach ($perfiles

										as $perfil) {

										?>
										<tbody>

										<tr>
											<th><?php echo $perfil->PERID; ?></th>
											<td><?php echo $perfil->PERNOMBRE; ?></td>
											<td><?php echo $perfil->PERESTADO; ?></td>
											<td>
												<a class="btn btn-primary"
													 href="<?php echo base_url(); ?>/PerfilesController/editar?id=<?php echo $perfil->PERID; ?>">Editar
													<i class="fa fa-pencil-square"></i></a>
												<a class="btn btn-danger"
													 href="<?php echo base_url(); ?>/PerfilesController/borrar?id=<?php echo $perfil->PERID; ?>">Eliminar
													<i class="fa fa-trash"></i></a>

												<a class="btn btn-success"
													 href="<?php echo base_url(); ?>/PerfilesOpcionesController/nuevo?perId=<?php echo $perfil->PERID; ?>&perNombre=<?php echo $perfil->PERNOMBRE; ?>">Agregar
													Opciones <i class="fa fa-pencil-square"></i></a>
											</td>
										</tr>
										<?php
										}
										?>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
