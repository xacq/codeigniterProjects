<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Actualizar Usuario</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController'" class="btn btn-light">Cancelar</button>
              </div>                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/UsuariosController/modificar" method="post" accept-charset="utf-8">

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="txtNombre">C&oacute;digo</label>
                                  <input type="text" class="form-control" name="txtCodigo" readonly="true" value="<?php echo $usuarios["USUID"] ?>">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="nombres..." value="<?php echo $usuarios["USUNOMBRE"] ?>">
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCedula">Digite No. C&eacute;dula</label>
                                  <input type="text" class="form-control" name="txtCedula" placeholder="c&eacute;dula..." value="<?php echo $usuarios["USUCEDULA"] ?>">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtClave">Digite Clave</label>
                                  <input type="paswword" class="form-control" name="txtClave" placeholder="clave..." value="<?php echo $usuarios["USUCLAVE"] ?>">
                              </div>  

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCorreo">Digite Correo</label>
                                  <input type="text" class="form-control" name="txtCorreo" placeholder="correo..." value="<?php echo $usuarios["USUCORREO"] ?>">
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
                                foreach ($options as $usuario){
                                  echo "<option value='".$usuario."'>".$usuario."</option>";
                                }
                                echo "</select>";                                
                                
                                ?>
                            </div>  
                          </div>
                        
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cmbPerfiles">Seleccione Perfil</label>
                                  <?php 
                                  
                                    echo "<select class='form-control' name='cmbPerfiles' id='cmbPerfiles'>";
                                    foreach($perfiles as $perfil)
                                    {
                                      if($perfil->PERID==$usuarios["PERID"] ) {
                                        echo "<option value='" . $perfil->PERID . "'selected>" . $perfil->PERNOMBRE . "</option>";
                                      }else{
                                          echo "<option value='" . $perfil->PERID . "'>" . $perfil->PERNOMBRE . "</option>";
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
