<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Crear Area</h3>
                <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController'" class="btn btn-light">Cancelar</button>
                </div>                  
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url(); ?>/AreasController/guardar" method="post" accept-charset="utf-8" id="formArea">
                            <div class="form-group">
                                <label for="txtAreas">Digite el &Aacute;rea</label>
                                <input type="text" class="form-control" name="txtAreas" placeholder="Nombre del &Aacute;rea">
                            </div>

                            <div class="d-flex flex-column align-items-center">
                                <div class="col-md-4">
                                  <button  type="submit" class="btn btn-primary btn-block">Crear</button>
                                </div>
                            </div>

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>