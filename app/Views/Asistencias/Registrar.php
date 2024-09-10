
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Asistencias
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Asistencia</h3>
            </div>
            <div class="box-body">
              <div class="row" style="margin-top: 15px;">
                <div class="col-xs-12">
                <form action="<?php echo base_url('/AsistenciasController/guardar');?>" method="post">
                  <input type="hidden" name="MATID" id="MATID" value="<?=$alumno[0]['MATID']?>">
                    <div class="col-xs-5">
                      <label for="item">Estudiante:</label>
                      <input type="text" name="estudiante" id="estudiante" class="form-control" value="<?=$alumno[0]['ESTNOMBRE']?>" readonly>
                    </div>
                    <div class="col-xs-4">
                      <label for="item">Curso:</label>
                      <input type="text" name="curso" id="curso" class="form-control" value="<?=$alumno[0]['CURNOMBRE']?>" readonly>
                    </div>
                    <div class="col-xs-3">
                      <label for="item">Fecha:</label>
                      <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>
                    <div class="col-xs-5" style="margin-top: 15px;">
                      <label for="asistencia">Estado:</label>
                      <select name="asistencia" id="asistencia" class="form-control" require>
                        <option value="SI">ASISTE</option>
                        <option value="NO">NO ASISTE</option>
                      </select>
                    </div>
                    <div class="col-xs-7" style="margin-top: 15px;">
                      <label for="observacion">Observacion:</label>
                      <input type="text" name="observacion" id="observacion" class="form-control" r>
                    </div>
                    
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <button type="submit" class="btn btn-primary btn-xy">Registrar Asistencia</button>
                    </div>
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <a href="<?php echo base_url('/AsistenciasController');?>" class="btn btn-danger btn-xy">Cancelar</a>
                    </div>
                </form>
                </div>
              </div>
            </div>
        </div>
			</div>
		</div>
	</section>
</div>