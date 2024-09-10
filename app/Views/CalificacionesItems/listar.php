
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Calificaciones-Items
            <small><i class="fa fa-check-square-o"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/CalificacionesItemsController/registrarItems" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear
                                </a>
		        			</div>
		        			<div class="col-md-2">
		        				<a href="#" class="btn btn-block btn-success">
		        					<i class="fa fa-file-excel-o"></i>
		        					Reporte Excel
		        				</a>
		        			</div>
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th>#</th>
							                <th>Calificacion</th>
                                            <th>Item</th>
											<th>Ponderacion</th>
											<th>Tipo</th>
                                            <th>Estado</th>
							                <th>Acciones</th>
							            </tr>
							            </thead>
                                        <?php
											$contador = 0;
                                            foreach ($calificacionesItems as $ci) {
												$contador = $contador+1;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?php echo $contador; ?></th>
                                                <td><?php echo $ci['CALDESCRIPCION']; ?></td>
                                                <td><?php echo $ci['ITENOMBRE']; ?></td>
                                                <td><?php echo $ci['CITPONDERACION']; ?></td>
												<td><?php echo $ci['CITTIPO']; ?></td>
												<td><?php echo $ci['CITESTADO']; ?></td>
                                                <td>                            
                                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/ItemsController/editar?id=<?php echo $ci['ITEID'];?>"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/ItemsController/borrar?id=<?php echo $ci['ITEID'];?>"><i class="fa fa-trash"></i></a>
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



