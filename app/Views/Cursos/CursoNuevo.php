<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Crear Curso</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController'" class="btn btn-light">Cancelar</button>
              </div>                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/CursosController/guardar" method="post" accept-charset="utf-8">
                          
                          <div class="row" style="margin-top:5px">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre </label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="Nombre del Curso">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Inicio">Seleccione la Fecha de Inicio</label>
                                  <input type="date" class="form-control" name="txtFecha_Inicio" placeholder="Seleccione fecha">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Final">Seleccione la Fecha Final</label>
                                  <input type="date" class="form-control" name="txtFecha_Final" placeholder="seleccione fecha">
                              </div>                               
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtPrecio">Digite el Precio</label>
                                  <input type="number" class="form-control" name="txtPrecio" placeholder="$0.00">
                              </div>
                            </div>                            
                          </div>     
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNº_Estudiantes">Digite Nº de Estudiantes</label>
                                  <input type="number" class="form-control" name="txtNº_Estudiantes" placeholder="#">
                              </div>                               
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtModalidad">Seleccione la Modalidad</label>
                                  <?php 
                                  
                                  $options = [
                                    'PRESENCIAL'  => 'PRESENCIAL',
                                    'VIRTUAL'    => 'VIRTUAL',
                                    'NOCTURNA'    => 'NOCTURNA'
                                  ];

                                  echo "<select class='form-control' name='txtModalidad' id='txtModalidad'>";
                                  foreach ($options as $item){
                                    echo "<option value='".$item."'>".$item."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>   
                          
                          
                          <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtEstado">Seleccione el Estado</label>
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

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cmbAreas">Seleccione el &Aacute;rea</label>
                                  <?php 
                                  
                                  echo "<select class='form-control' name='cmbAreas' id='cmbAreas'>";
                                  foreach ($areas as $item){
                                    echo "<option value='".$item->AREID."'>".$item->ARENOMBRE."</option>";
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
