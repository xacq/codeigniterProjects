
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Registro Calificaciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<!-- CALIFICACIONES REGISTRADAS -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Registro Calificaciones</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="tableCalificaciones" class="table display table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
											<tr>
												<th>Codigo</th>
												<th>Curso</th>
												<th style="text-align:center">Nombre del Estudiante</th>
												<th>Fecha</th>
												<th>Nota</th>
												<th>Equivalente</th>
												<th>Observación</th>
												<th>Accion</th>
											</tr>
							            </thead>
                                        <?php
											$contador = 0;
                                            foreach ($calificaciones as $calificacion) {
											$contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$calificacion['CURNOMBRE']?></td>
												<td style="text-align:center"><?=$calificacion['ESTNOMBRE']?></td>
												<td><?=$calificacion['RCAFECHA']?></td>
												<td><?=$calificacion['RCANOTA']?></td>
												<td><?=$calificacion['RCAEQUIVALENTE']?></td>
												<td><?=$calificacion['RCAOBSERVACION']?></td>
                                                <td>                            
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/RegistroCalificacionesController/eliminar?id=<?php echo $calificacion['RCAID'];?>">
														<i class="fa fa-trash"> Eliminar</i>
													</a>
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

		<!-- LISTADO ALUMNOS -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Listado Alumnos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="tableAlumnos" class="table display table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
											<tr>
												<th>Codigo</th>
												<th>Curso</th>
												<th style="text-align:center">Nombre del Estudiante</th>
												<th>Accion</th>
											</tr>
							            </thead>
                                        <?php
											$contador = 0;
                                            foreach ($listadoAlumnos as $alumno) {
											$contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$alumno['CURNOMBRE']?></td>
												<td style="text-align:center"><?=$alumno['ESTNOMBRE']?></td>
                                                <td>                            
                                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/RegistroCalificacionesController/nuevo?id=<?php echo $alumno['MATID'];?>">
														<i class="fa fa-pencil"> Registrar</i>
													</a>
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


	<script>
  $(function () {
    $('table.display').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
</div>



