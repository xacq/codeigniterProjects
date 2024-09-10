
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Auditorias
            <small><i class="fa fa-tags"></i></small>
            <?php  
              echo $_SERVER['SERVER_NAME'];
            ?>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Auditorias</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row"><!--
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/AuditoriasController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear Auditorias
                                </a>
		        			</div>-->
		        			<div class="col-md-2">
		        				<a href="<?php echo base_url('AuditoriasController/reportePDf') ?>" class="btn btn-block btn-danger">
		        					<i class="fa fa-file-pdf-o"></i>
		        					Reporte PDF
		        				</a>
		        			</div>
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
        
      <tr class="col-12">
            <th scope="col">CODIGO</th>
            <th scope="col">USUARIO</th>
            <th scope="col">ACCION</th>
            <th scope="col">TABLA</th>
            <th scope="col">FECHA</th>
            <th scope="col">HORA</th>
            <th scope="col">IP</th>
            <th scope="col">HOST</th>
            <th scope="col">SENTENCIA</th>
            <!--<th scope="col">ACCIONES</th>-->
            
          </tr>
        </thead>
        <tbody>
          <?php
          $cont=0;
          foreach($auditorias as $auditoria){
            $cont++;
          ?>
            <tr>
                <td ><?php echo $cont; ?></td>
                <td><?php echo $auditoria['USUNOMBRE']; ?></td>
                <td><?php echo $auditoria['AUDACCION']; ?></td>
                <td><?php echo $auditoria['AUDTABLA']; ?></td>
                <td><?php echo $auditoria['AUDFECHA']; ?></td>
                <td><?php echo $auditoria['AUDHORA']; ?></td>
                <td><?php echo $auditoria['AUDIP']; ?></td>
                <td><?php echo $auditoria['AUDHOST']; ?></td>
                <td><?php echo $auditoria['AUDSENTENCIA']; ?></td>
                
            </tr>
          <?php
          }
          ?>
        </tbody>
							        </table>
                    <!-- Pagination -->
									<div class="d-flex justify-content-end">
										<?php if ($pager) :?>
										<?php $pagi_path= $pagi_path ?>
										<?php $pager->setPath($pagi_path); ?>
										<?= $pager->links() ?>
										<?php endif ?>
									</div>
						        </div>
		        			</div>
		        		</div>
		            </div>
	          	</div>
			</div>
		</div>
	</section>



</div>