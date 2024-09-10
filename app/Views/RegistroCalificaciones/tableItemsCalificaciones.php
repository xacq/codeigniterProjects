<table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
    <thead>
        <tr>
            <th>Item</th>
            <th>Ponderaci&oacute;n</th>
            <th>Tipo</th>
            <th>Nota</th>
            <th>Equivalente</th>
            <th>Observaci&oacute;n</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>                   
    <?php 
        foreach($calificacionesItems as $item) {
        ?>
        <tr>
            <td><?php echo $item['ITENOMBRE']; ?></td>
            <td><?php echo $item['CITPONDERACION']; ?></td>
            <td><?php echo $item['CITTIPO']; ?></td>
            <td><?php echo $item['RCANOTA']; ?></td>
            <td><?php echo $item['RCAEQUIVALENTE']; ?></td>
            <td><?php echo $item['RCAOBSERVACION']; ?></td>
            <td>
                <button type="button" 
                    onclick="registrarCalificacion('<?php echo $item['ITENOMBRE']; ?>', <?php echo $item['CITID']; ?>)"
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#modal-default">Calificar
                </button>
            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>



<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <form action="<?php echo base_url();?>/RegistroCalificacionesController/guardar" method="POST" autocomplete="off">
        <input type="hidden" id="CITID" name="CITID">
        <input type="hidden" id="MATID" name="MATID" value="<?php echo $MATID; ?>">
        <input type="hidden" id="ESTID" name="ESTID" value="<?php echo $ESTID; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Registro de Calificaci&oacute;n <div id="item-data"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="nota">Nota</label>
                                  <input type="text" class="form-control" id="nota" name="nota" value="" placeholder="nota...">
                              </div>
                        </div>                      
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="equivalente">Equivalente</label>
                                  <input type="text" class="form-control" id="equivalente" name="equivalente" value="" placeholder="equivalente...">
                              </div>
                        </div>                      
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="observacion">Observacion</label>
                                  <input type="text" class="form-control" id="observacion" name="observacion" value="" placeholder="observacion...">
                              </div>
                        </div>                      
                    </div>    
                    
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="fecha">Fecha</label>
                                  <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha_actual ?>" placeholder="fecha...">
                              </div>
                        </div>                      
                    </div>                     
                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Calificar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    function registrarCalificacion(item, CITID){
        // $("#modal-default #numeroCuota").find("option").remove().end().append();
        // console.log('valor: ', valorPago);
        // console.log('pagoId: ', pagoId);
      
        // console.log('numeroCuotas: ', numeroCuotas);
        
        // for (i=1; i<= numeroCuotas; i++){
        //     var o = new Option("option text", "value");
        //     $(o).html(i, i);
        //     $("#modal-default #numeroCuota").append(o);
        // }
        $("#modal-default #item-data").html(item);
        $("#modal-default #CITID").val(CITID);
        // $("#modal-default #numeroDocumento").val('');
        // $("#modal-default #pagoId").val(pagoId);
        // $("#modal-default #MATID").val(matid);
    }
</script>