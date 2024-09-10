
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Matricular Estudiante</h3>
                <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/MatriculasController/pendientes'" class="btn btn-light">Cancelar</button>
                </div>                  
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/MatriculasController/matricularAlumno" method="post" accept-charset="utf-8">
							<input type="hidden" name="idCurso" id="idCurso" value="<?=$idCurso?>">
							<input type="hidden" name="precioCurso" id="precioCurso" value="<?=$precioCurso?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="alumno">Nombre de Estudiante</label>
										<input type="text" class="form-control" name="alumno" value="<?php echo $estudiante;?>" disabled placeholder="nombres...">
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="curso">Precio</label>
										<select name="curso" id="curso" class="form-control" disabled>
										<?php
											foreach ($pendiente as $p) {
										?>
											<option value="<?=$p['CURID']?>">$ <?=$p['CURPRECIO']?></option><br>
										
										<?php
											}
										?>
										</select>
									</div>                               
								</div>
                          	</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="curso">Nombre del Curso</label>
										<select name="curso" id="curso" class="form-control" disabled>
										<?php
											foreach ($pendiente as $p) {
										?>
										<option value="<?=$p['CURID']?>"><?=$p['CURNOMBRE']?></option><br>
										
										<?php
											}
										?>
									</select>
									</div>                               
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="estadoMatricula">Estado de la Matr&iacute;cula</label>
										<select name="estadoMatricula" id="estadoMatricula" class="form-control" disabled>
										<?php
										?>
											<option value="PENDIENTE">PENDIENTE</option>
										
										<?php
										?>
										</select>
									</div>                               
								</div>

                          	</div>		
							
							
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="tipoPago">Forma de Pago</label>
										<select name="tipoPago" id="tipoPago" class="form-control">
											<option  rvalue="">Seleccione...</option>
											<option value="EFECTIVO">EFECTIVO</option>
											<option value="CREDITO">CREDITO</option>
										</select>
									</div>                               
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="numeroCuotas">No. de Cuota(s)</label>
										<input type="number" class="form-control" name="numeroCuotas" value="1" min="1" placeholder="digite...">
									</div>                              
								</div>

							</div>								



                            <div class="d-flex flex-column align-items-center">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">Matricular</button>
                                </div>
                            </div>

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
