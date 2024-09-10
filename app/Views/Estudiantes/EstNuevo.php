<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Crear Estudiante</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController'" class="btn btn-light">Cancelar</button>
              </div>                 
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/EstudianteController/guardar" method="post" accept-charset="utf-8">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="Nombre del Estudiante">
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCedula">Digite Nº de C&eacute;dula</label>
                                  <input type="text" class="form-control" name="txtCedula" placeholder="C&eacute;dula">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtDreccion">Digite la Direcci&oacute;n</label>
                                  <input type="text" class="form-control" name="txtDreccion" placeholder="Direcci&oacute;n">
                              </div>  

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtTelefono">Digite el Tel&eacute;fono</label>
                                  <input type="phone" class="form-control" name="txtTelefono" placeholder="Tel&eacute;fono">
                              </div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCorreo">Digite el Correo</label>
                                  <input type="email" class="form-control" name="txtCorreo" placeholder="Correo">
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
                                    echo "<option value='".$item."'>".$item."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>

                          <div class="d-flex flex-column align-items-center">
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary btn-block">Crear</button>
                            </div>
                          </div>                          

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
