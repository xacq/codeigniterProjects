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
				<div class="box box-danger">
		            <div class="box-header with-border">
		              <h3 class="box-title">Borrar Auditoria</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base = base_url();
                echo form_open('AuditoriasController/eliminar'); //equivale al <form></form> en html
                echo "<br>";

                $codigo=0;
                foreach ($auditorias as $value) {
                    $codigo = $value['AUDID'];
                    $codigoA = $value['USUID'];
                    $AUDACCION = $value['AUDACCION'];
                    $AUDTABLA = $value['AUDTABLA'];
                    $AUDFECHA = $value['AUDFECHA'];
                    $AUDHORA = $value['AUDHORA'];
                    $AUDIP = $value['AUDIP'];
                    $AUDHOST = $value['AUDHOST'];
                    $AUDSENTENCIA = $value['AUDSENTENCIA'];
                   
                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo));
                echo "<br>";

                echo form_label('Accion:', 'Accion'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtAccion','readOnly' => 'true', 'placeholder' => 'Ingrese la Accion', 'class' => 'form-control', 'value' => $AUDACCION));
                echo "<br>";

                echo form_label('Tabla:', 'Tabla'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtTabla','readOnly' => 'true', 'placeholder' => 'Ingrese la Tabla', 'class' => 'form-control', 'value' => $AUDTABLA));
                echo "<br>";

                echo form_label('Fecha:', 'Fecha'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type' => 'date','name' => 'txtFecha','readOnly' => 'true', 'placeholder' => 'Ingrese la Fecha', 'class' => 'form-control', 'value' => $AUDFECHA));
                echo "<br>";

                echo form_label('Hora:', 'Hora'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type' => 'time','name' => 'txtHora','readOnly' => 'true', 'placeholder' => 'Ingrese la Hora', 'class' => 'form-control', 'value'=> $AUDHORA));
                echo "<br>";
                echo form_label('Ip:', 'Ip'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtIp','readOnly' => 'true', 'placeholder' => 'Ingrese la Ip', 'class'=>'form-control', 'value' => $AUDIP));
                echo "<br>";

                echo form_label('Host:', 'Host'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtHost','readOnly' => 'true', 'placeholder' => 'Ingrese el Host', 'class'=>'form-control', 'value' => $AUDHOST));
                echo "<br>";

                echo form_label('Sentencia:', 'Sentencia'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtSentencia','readOnly' => 'true', 'placeholder' => 'Ingrese la Sentencia', 'class'=>'form-control', 'value' => $AUDSENTENCIA));
                echo "<br>";
              
               echo form_label('Perfiles:', 'cmbUsuario');
                echo "<select class='form-control' name='cmbUsuario' id='cmbUsuario'>";
                foreach($usuarios as $usuario){
                  if($usuario->USUID==$codigoA){
                   echo "<option value='" . $usuario->USUID . "'selected>" . $usuario->USUNOMBRE . "</option>";
               }else{
                      echo "<option value='" . $usuario->USUID . "'>" . $usuario->USUNOMBRE . "</option>";
                  }
                  
               } 
                echo "</select>";
                echo "<br>";
                echo form_button(array('name' => 'btnBorrar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'ELIMINAR'));
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