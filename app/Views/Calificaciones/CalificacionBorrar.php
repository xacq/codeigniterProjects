<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Eliminar Calificaci&oacute;n</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/CalificacionesController/eliminar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtCodigo">C&oacute;digo</label>
                                <input type="text" readonly class="form-control" name="txtCodigo" value="<?php echo $calificaciones["CALID"] ?>" placeholder="c&oacute;digo...">
                            </div>  
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtDescripcion">Digite Descripci&oacute;n</label>
                                <input type="text" readonly class="form-control" name="txtDescripcion" value="<?php echo $calificaciones["CALDESCRIPCION"] ?>" placeholder="descripci&oacute;n...">
                            </div>  
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtPuntaje">Digite Puntaje</label>
                                <input type="number" readonly class="form-control" name="txtPuntaje" value="<?php echo $calificaciones["CALPUNTAJE"] ?>" placeholder="puntaje...">
                            </div>  
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtAprobado">Digite Aprobado</label>
                                <input type="number" readonly class="form-control" name="txtAprobado" value="<?php echo $calificaciones["CALPUNAPROBACION"] ?>" placeholder="aprobado...">
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
                                  if($calificaciones["CALESTADO"]==$item) {
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
