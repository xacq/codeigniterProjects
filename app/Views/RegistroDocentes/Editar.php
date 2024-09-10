
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Editar Docente Asignado al Curso</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroDocentesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/RegistroDocentesController/actualizar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <input  class="form-control" type="hidden" 
                                value="<?php echo $registroDocente['RDOID'] ?>" 
                                name="txtRegistroDocId" id="">
                                <label for="docente">Seleccione el Docente</label>
                                
                                <select name="cbxDocente" id="docente" class="form-control">
                                
                                  <?php
                                  
                                  foreach($docentes as $docente){
                                    
                                  if ($docente['DOCID'] == $registroDocente['DOCID'])
                                  {?>
                                    <option selected value="<?=$docente['DOCID']?>"><?=$docente['DOCNOMBRE']?></option>
                                <?php } else {?>
                                  
                                    <option value="<?=$docente['DOCID']?>"><?=$docente['DOCNOMBRE']?></option>
                              <?php  }
                              }
                                  ?>
                                </select>
                            </div>  
                          </div>

                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="curso">Seleccione Curso</label>
                                <select disabled name="cbxCurso" id="curso" class="form-control">
                                    <option   value="<?= $curso->CURID?>"><?=$curso->CURNOMBRE?></option>
                                 
                                </select>
                            </div>  
                          </div>

                        </div>     
                        

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="item">Seleccione Fecha</label>
                                <input disabled type="date" name="txtFecha" id="fecha" class="form-control" value="<?php echo $registroDocente['RDOFECHA'] ?>">
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
