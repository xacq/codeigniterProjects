<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Actualizar Perfil</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/PerfilesController/modificar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtCodigo">C&oacute;digo</label>
                                <input type="text" class="form-control" name="txtCodigo" value="<?php echo $perfiles["PERID"] ?>" readonly placeholder="nombre...">
                            </div>  
                          </div>
                        </div>  

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombre">Digite Nombre</label>
                                <input type="text" class="form-control" name="txtNombre" placeholder="nombre..." value="<?php echo $perfiles["PERNOMBRE"] ?>">
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
                                    if($perfiles["PERESTADO"]==$item) {
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
