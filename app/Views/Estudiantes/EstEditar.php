<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Actualizar Estudiante</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController'" class="btn btn-light">Cancelar</button>
              </div>              
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/EstudianteController/modificar" method="post" accept-charset="utf-8">

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">C&oacute;digo</label>
                                  <input type="text" class="form-control" name="txtCodigo" readonly="true" placeholder="codigo..." value="<?php echo $estudiantes["ESTID"] ?>">
                              </div>

                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="nombres..." value="<?php echo $estudiantes["ESTNOMBRE"] ?>">
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCedula">Digite No. C&eacute;dula</label>
                                  <input type="text" class="form-control" name="txtCedula" placeholder="c&eacute;dula..." value="<?php echo $estudiantes["ESTCEDULA"] ?>">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtDreccion">Digite Direcci&oacute;n</label>
                                  <input type="text" class="form-control" name="txtDreccion" placeholder="direcci&oacute;..." value="<?php echo $estudiantes["ESTDIRECCION"] ?>">
                              </div>  

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtTelefono">Digite Tel&eacute;fono</label>
                                  <input type="phone" class="form-control" name="txtTelefono" placeholder="tel&eacute;fono..." value="<?php echo $estudiantes["ESTTELEFONO"] ?>">
                              </div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCorreo">Digite Correo</label>
                                  <input type="email" class="form-control" name="txtCorreo" placeholder="correo..." value="<?php echo $estudiantes["ESTCORREO"] ?>">
                              </div>    

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtEstado">Seleccione Estado</label>
                                  <?php 
                                  
                                  $options = [
                                    'ACTIVO'  => 'ACTIVO',
                                    'INACTIVO'    => 'INACTIVO'
                                  ];

                                  echo "<select class='form-control' name='txtEstado' id='txtEstado'>";
                                  foreach ($options as $item){
                                    if($estudiantes["ESTESTADO"]==$item) {
                                      echo "<option value='" . $item . "'selected>" . $item . "</option>";
                                    }else{
                                        echo "<option value='" . $item . "'>" . $item . "</option>";
                                    }
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>

                          <div class="d-flex flex-column align-items-center">
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                            </div>
                          </div>  

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
