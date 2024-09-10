<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Crear nuevo Perfil</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/PerfilesController/guardar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombre">Digite el Nombre</label>
                                <input type="text" class="form-control" name="txtNombre" placeholder="nombre...">
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
