
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Auditorias
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Crear Auditoria</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base=base_url();
                echo form_open('AuditoriasController/guardar'); //equivale al <form></form> en html
                
                echo form_label('Accion:', 'Accion'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtAccion', 'placeholder' => 'Ingrese la Accion', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Tabla:', 'Tabla'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtTabla', 'placeholder' => 'Ingrese la Tabla', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Fecha:', 'Fecha'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type' => 'date','name' => 'txtFecha', 'placeholder' => 'Ingrese la Fecha', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Hora:', 'Hora'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type' => 'time','name' => 'txtHora', 'placeholder' => 'Ingrese la Hora', 'class'=>'form-control'));
                echo "<br>";
                echo form_label('Ip:', 'Ip'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtIp', 'placeholder' => 'Ingrese la Ip', 'class'=>'form-control'));
                echo "<br>";
                echo form_label('Host:', 'Host'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtHost', 'placeholder' => 'Ingrese el Host', 'class'=>'form-control'));
                echo "<br>";
                echo form_label('Sentencia:', 'Sentencia'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtSentencia', 'placeholder' => 'Ingrese la Sentencia', 'class'=>'form-control'));
                echo "<br>";
               
                 echo form_label('Usuario:', 'cmbUsuario');
                echo "<select class='form-control' name='cmbUsuario' id='cmbUsuario'>";
                foreach ($usuarios as $usuario){
                     echo "<option value='".$usuario->USUID."'>".$usuario->USUNOMBRE."</option>";
                }
                echo "</select>";
                echo "<br>";

                echo form_button (array('name'=>'btnGuardar', 'type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Guardar'));
                echo form_close();

                ?>
          
                         </div>
		        		</div>
		            </div>
	          	</div>
			</div>
		</div>
	</section>
</div>