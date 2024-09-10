
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Calificaciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Calificaciones </h3>
            </div>
            <div class="box-body">
              <div class="row" style="margin-top: 15px;">
                <div class="col-xs-12">
                <form action="<?php echo base_url('/RegistroCalificacionesController/guardar');?>" method="post">
                  <input type="hidden" name="MATID" id="MATID" value="<?=$matriculaId?>">
                    <div class="col-xs-6">
                      <label for="item">Estudiante:</label>
                      <input type="text" name="estudiante" id="estudiante" class="form-control" value="<?=$estudiante?>" readonly>
                    </div>
                    <div class="col-xs-6">
                      <label for="item">Curso:</label>
                      <input type="text" name="curso" id="curso" class="form-control" value="<?=$curso?>" readonly>
                    </div>
                    <div class="col-xs-4" style="margin-top: 15px;">
                      <label for="item">Item:</label>
                      <select name="item" id="item" class="form-control">
                        <?php
                          foreach($listadoItems as $item){
                        ?>
                        <option value="<?=$item['CITID']?>"><?=$item['ITENOMBRE']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-xs-4" style="margin-top: 15px;">
                      <label for="item">Fecha:</label>
                      <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>
                    <div class="col-xs-4" style="margin-top: 15px;">
                      <label for="item">Nota:</label>
                      <input type="text" name="nota" id="nota" class="form-control">
                    </div>
                    <div class="col-xs-4" style="margin-top: 15px;">
                      <label for="item">Equivalente:</label>
                      <input type="text" name="equivalente" id="equivalente" class="form-control">
                    </div>
                    <div class="col-xs-8" style="margin-top: 15px;">
                      <label for="item">Observacion:</label>
                      <input type="text" name="observacion" id="observacion" class="form-control">
                    </div>
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <button type="submit" class="btn btn-primary btn-xy">Registrar Calificacion</button>
                    </div>
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <a href="<?php echo base_url('/RegistroCalificacionesController');?>" class="btn btn-danger btn-xy">Cancelar</a>
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