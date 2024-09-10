
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Actualizar Area</h3>
                <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController'" class="btn btn-light">Cancelar</button>
                </div>                  
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/AreasController/modificar" method="post" accept-charset="utf-8">
							<div class="form-group">
                                <label for="txtCodigo">C&oacute;digo de &Aacute;rea</label>
                                <!-- <input type="text" disabled value="<?php echo $areas["AREID"] ?>" class="form-control" name="txtCodigo" placeholder="&aacute;rea"> -->
                                <?php echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'placeholder' => 'C&oacute;digo', 'class'=>'form-control','value'=>$areas["AREID"])); ?>
                            </div>

                            <div class="form-group">
                                <label for="txtAreas">Digite el &Aacute;rea</label>
                                <input type="text" value="<?php echo $areas["ARENOMBRE"] ?>" class="form-control" name="txtAreas" placeholder="&aacute;rea">
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
