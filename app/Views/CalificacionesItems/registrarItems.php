<div class="content-wrapper">
	<?php
	$codigo = $perfiles['PERID'];
	$PERNOMBRE = $perfiles['PERNOMBRE'];
	$PERESTADO = $perfiles['PERESTADO'];
	?>
	<section class="content-header">
		<h1>
			Calificaciones-Items ?>
			<small><i class="fa fa-check-square-o"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Agregar opcion</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<?php
								$opcionesLista = ['0' => '--Seleccione--'];
								foreach ($items as $item) {
									$imtemsLista[$item['ITEID']] = $item['ITENOMBRE'];
								}
								$base = base_url();
								echo form_open(''); //equivale al <form></form> en html
								?>

								<br>
								<div class="mb-3 row">
									<?php echo form_label('Items:', 'opcion', ['class' => 'col-sm-1 col-form-label']); ?>
									<div class="col-sm-11">
										<?php echo form_dropdown('opcion', $imtemsLista, '0', ['id' => 'opcion', 'class' => 'form-select']);

										if (count($opciones) == 0) {
											echo form_button(['name' => 'btnGuardar', 'type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left: 1rem;', 'content' => 'Agregar', 'disabled' => '']);
										} else {
											echo form_button(['name' => 'btnGuardar', 'type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left: 1rem;', 'content' => 'Agregar']);
										} ?>

									</div>
								</div>
								<?php
								echo form_close();
								?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover dt-responsive display nowrap"
												 cellspacing="0">
										<thead>
										<tr>
											<th>Código</th>
											<th>Opción</th>
											<th>Acciones</th>
										</tr>
										</thead>
										<tbody>

										<?php
										if (count($perfilesOpciones) == 0) {
											echo "<tr>";
											echo "<td colspan='3'>No hay opciones asignadas</td>";
											echo "</tr>";
										} else {
											foreach ($perfilesOpciones as $perfilOpcion) {
												?>
												<tr>
													<th><?php echo $perfilOpcion['OPCID']; ?></th>
													<td><?php echo $perfilOpcion['OPCNOMBRE']; ?></td>
													<td>
														<a class="btn btn-danger"
															 href="<?php echo base_url() . '/PerfilesOpcionesController/borrarPerfilOpcion?popid=' . $perfilOpcion['POPID'] . '?perid=' . $codigo ?>">
															<i class="fa fa-trash"></i>
														</a>
													</td>
												</tr>
												<?php
											}
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
