<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Crear Calificaci&oacute;n</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/CalificacionesController/guardar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtDescripcion">Digite Descripci&oacute;n</label>
                                <input type="text" class="form-control" name="txtDescripcion" placeholder="descripci&oacute;n...">
                            </div>  
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtPuntaje">Digite Puntaje</label>
                                <input type="number" class="form-control" name="txtPuntaje" placeholder="puntaje...">
                            </div>  
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtAprobado">Digite Aprobado</label>
                                <input type="number" class="form-control" name="txtAprobado" placeholder="aprobado...">
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
                            <button type="button" onclick="verificarEstado()" class="btn btn-primary btn-block">Crear</button>
                            <button type="submit" id="hiddenSubmitButton" name="submit" class="btn btn-primary btn-block" style="display: none;">Crear</button>
                          </div>
                        </div>  

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
  function verificarEstado(){
    var estado = document.getElementById('txtEstado')
    var hiddenButton = document.getElementById('hiddenSubmitButton');
    if(estado.value == 'ACTIVO'){
      var confirmacion = confirm('Desea cambiar el modo de calificacion');
      if(confirmacion){
        hiddenButton.click();
      }
    }else{
      hiddenButton.click();
    }
  }
</script>