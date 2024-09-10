   
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Eliminar Opci&oacute;n</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/OpcionesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/OpcionesController/eliminar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtCodigo">C&oacute;digo</label>
                                <input type="text" class="form-control" name="txtCodigo" value="<?php echo $opciones["OPCID"] ?>" readonly placeholder="nombre...">
                            </div>  
                          </div>
                        </div>                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombre">Digite Nombre</label>
                                <input type="text" class="form-control" name="txtNombre" value="<?php echo $opciones["OPCNOMBRE"] ?>" readonly placeholder="nombre...">
                            </div>  
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtRuta">Digite Ruta</label>
                                <input type="text" class="form-control" value="<?php echo $opciones["OPCRUTA"] ?>" name="txtRuta" readonly placeholder="ruta...">
                            </div>  
                          </div>

                        </div>   
                        
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtEstado">Seleccione Estado</label>
                                  <?php 
                                  
                                  $options = [
                                    'ACTIVO'  => 'ACTIVO',
                                    'INACTIVO'    => 'INACTIVO'
                                  ];

                                  echo "<select class='form-control' readonly name='txtEstado' id='txtEstado'>";
                                  foreach ($options as $item){
                                    if($opciones["OPCESTADO"]==$item) {
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
                              <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                            </div>
                          </div>  

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
