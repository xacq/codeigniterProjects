<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Registrar Calificaciones</h3>
            <div class="card-header-right">
				<button type="button" onclick="location.href='<?php echo base_url();?>/RegistroCalificacionesController/index'" class="btn btn-light">Cancelar</button>
            </div>

            </div>
            <div class="card-body">
				<form accept-charset="utf-8">
                    <input type="hidden" id="MATID" name="MATID" value="<?php echo $MATID; ?>">
                    <input type="hidden" id="ESTID" name="ESTID" value="<?php echo $ESTID; ?>">
                    <div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<label for="calificacion">Seleccione Calificaci&oacute;n</label>
								<?php 
								
								echo "<select class='form-control' name='calificacion' id='calificacion' onchange='selectedChange(this);'>";
								echo "<option value=''>seleccione opci&oacute;n...</option>";
								foreach ($calificaciones as $item){
									echo "<option value='".$item['CALID']."'>".$item['CALDESCRIPCION']."</option>";
								}
								echo "</select>";                                
								
								?>
							</div> 

						</div>    
                        
                        <div class="col-md-8">Estudiante: <b><?php echo $estudiante['ESTNOMBRE'] ?></b></div>                    

                    </div>

                 
				</form>

                <div id="items_calificaciones">

                </div>


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function selectedChange( data) {
        CALID = data.value
        MATID = $('#MATID').val();
        ESTID = $('#ESTID').val();
        
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('registro/calificaciones/items'); ?>",
             data: {
                calificacion: CALID,
                MATID,
                ESTID
             },
             dataType: "json",
             success: function(response) {
                // location.reload();
                $('#items_calificaciones').html(response.html );
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }

</script>

