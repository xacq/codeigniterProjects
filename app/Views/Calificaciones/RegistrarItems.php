<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Asignar Items a Calificaci&oacute;n</h3>
            <div class="card-header-right">
				<button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController'" class="btn btn-light">Cancelar</button>
            </div>

            </div>
            <div class="card-body">
				<form accept-charset="utf-8">
                    <input type="hidden" value="<?=$calificacion['CALID']?>" id="txtCalificacion">
					<div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacion">Calificaci&oacute;n</label>
                                <input type="text" disabled class="form-control" name="calificacion" value="<?php echo $calificacion['CALDESCRIPCION'] ?>" placeholder="calificaci&oacute;n...">
                            </div>
						</div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacionPuntaje">Calificaci&oacute;n Puntaje</label>
                                <input type="text" disabled class="form-control" id="calificacionPuntaje" name="calificacionPuntaje" value="<?php echo $calificacion['CALPUNTAJE'] ?>" placeholder="calificaci&oacute;n puntaje...">
                            </div>
						</div>       

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacionAprobacion">Calificaci&oacute;n Aprobaci&oacute;n</label>
                                <input type="text" disabled class="form-control" name="calificacionAprobacion" value="<?php echo $calificacion['CALPUNAPROBACION'] ?>" placeholder="calificaci&oacute;n puntaje...">
                            </div>
						</div>                                           			

					</div>

                    <div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<label for="item">Seleccione Item</label>
								<?php 
								
								echo "<select class='form-control' name='item' id='item'>";
								echo "<option value=''>seleccione opci&oacute;n...</option>";
								foreach ($items as $item){
									echo "<option value='".$item['ITEID']."'>".$item['ITENOMBRE']."</option>";
								}
								echo "</select>";                                
								
								?>
							</div> 

						</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ponderacion">Ponderaci&oacute;n</label>
                                <input type="number" class="form-control" name="ponderacion" id="ponderacion" placeholder="digite ponderaci&oacute;n...">
                                <div class="text-danger" id="error_mensaje" style="display: none;">No puede ingresar un número mayor a 10.</div>
                            </div>
						</div> 

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var myNumber = document.getElementById('ponderacion');
                                var errorMensaje = document.getElementById('error_mensaje');

                                myNumber.addEventListener('input', function () {
                                    errorMensaje.style.display = 'none';
                                    var value = parseFloat(myNumber.value);
                                    if (value > 10) {
                                        errorMensaje.style.display = 'block';
                                        myNumber.value = '';
                                    } else {
                                        errorMensaje.style.display = 'none';
                                    }
                                });
                            });


                        </script>
                        
                        <div class="col-md-2">
                              <div class="form-group">
                                  <label for="tipo">Tipo</label>
                                  <?php 
                                  
                                  $options = [
                                    'VALOR'  => 'VALOR',
                                    
                                  ];

                                  
                                  echo  "<select   disabled class='form-control' name='tipo' id='tipo'>";
                                 
                                  foreach ($options as $item){
                                    echo "<option value='".$item."'>".$item."</option>";
                                  }
                                  echo "</select>";                              
                                  
                                  ?>

                                
                                  
                              </div>  
                        </div>                        
                            
                        <div class="col-md-2"><br><br>
                            <div class="form-group">
                                 <button type="button" id="agregarBtn" class="btn btn-primary" onclick="insertarItem();">Agregar</button>
                            </div>
						</div> 

                        
                    </div>
				</form>

                <table id="table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Calificaci&oacute;n</th>
                            <th>Item</th>
                            <th>Ponderaci&oacute;n</th>
                            <th>Valor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

					<tbody>                   
					<?php 
                    $totalPonderacion = 0; // Inicializa la variable de suma

						foreach($calificacionesItems as $item) {
                            $totalPonderacion += $item['CITPONDERACION']; // Suma el valor actual al total

						?>
						<tr>
							<td><?php echo $item['CALDESCRIPCION']; ?></td>
                            <td><?php echo $item['ITENOMBRE']; ?></td>
                            <td><?php echo $item['CITPONDERACION']; ?></td>
                            <td><?php echo $item['CITTIPO']; ?></td>
							<td>
								<button type="button" onclick="deleteItem(<?=$item['CITID']?>);" class="btn btn-icon btn-info"title="Editar Item"><i class="ik ik-edit"></i></button>
							</td>
						</tr>

						<?php } ?>
					</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1"></td> <!-- Colspan para que ocupe las celdas vacías -->
                            <td>Total:</td>
                            <td style="background-color: #f0f0f0; font-weight: bold;"><?php echo $totalPonderacion; ?> 
                            <input type="hidden" name="totalPonderacion_val" id="totalPonderacion_val" value="<?= $totalPonderacion ?>">

                        </td> <!-- Aplicar estilos al total -->
                        </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>
</div>

<script>
    // Obtén el valor total ponderado
   // Obtén el valor total ponderado
var totalPonderacion = <?php echo $totalPonderacion; ?>;
var tipoCalificacion = '';
// Obtén el elemento del botón por su ID
var agregarBtn = document.getElementById("agregarBtn");
var ponderacionInput = document.getElementById("calificacionPuntaje");

// Función para verificar si el input ponderado es mayor al total ponderado
function verificarPonderacion() {
    var ponderacion = parseInt(ponderacionInput.value);
    // Compara la ponderación inicial con el total ponderado
    if (totalPonderacion >= ponderacion) {
        // Si es mayor, deshabilita el botón
        agregarBtn.disabled = false;
    } else {
        // Si no es mayor, habilita el botón
        agregarBtn.disabled = false;
    }
}
// Función para verificar si el input ponderado es mayor al total ponderado
function verificarPorcentaje() {
    var porcentaje = parseInt(ponderacionInput.value);
    // Compara la ponderación inicial con el total ponderado
    if (totalPonderacion >= ponderacion) {
        // Si es mayor, deshabilita el botón
        agregarBtn.disabled => true;
    } else {
        // Si no es mayor, habilita el botón
        agregarBtn.disabled = true;
    }
}

// Llama a la función cuando el valor del input ponderado cambia
ponderacionInput.addEventListener("input", verificarPonderacion);


// Verifica la ponderación inicial al cargar la página
window.addEventListener("load", verificarPonderacion);
window.addEventListener("load", verificarPorcentaje);
verificarPonderacion();

document.getElementById('tipo').addEventListener('change', function(){
    tipoCalificacion = this.value;
    if(this.value === 'VALOR'){
     //   totalPonderacion  = 10
        var inputCalificacion = document.getElementById('calificacionPuntaje');
        inputCalificacion.value = '10.0'
        verificarPonderacion();
    }else{
       // totalPonderacion = 100
        var inputCalificacion = document.getElementById('calificacionPuntaje');
        inputCalificacion.value = '100.0'
        verificarPonderacion();
    }
    
})

</script>


<script type="text/javascript">


    document.addEventListener('DOMContentLoaded', function () {
        var totalPonderacion_val = parseFloat($("#totalPonderacion_val").val());
        //alert(totalPonderacion_val)

        if(totalPonderacion_val == 10){
            $("#agregarBtn").prop('disabled', true);
            $("#ponderacion").prop('disabled', true);
        }
    });
    
    
    function insertarItem()
    {
        var tableId = document.getElementById("table");
        var cell = table.rows[1].cells[3];

        var txtCalificacion = $("#txtCalificacion").val();
        if (txtCalificacion =="" || txtCalificacion== null ){
            alert("Error al seleccionar la calificacion !");
            return false;
        }

        var item = $("#item option:selected").val();
        if (item =="" || item== null || item=="Seleccione:"){
            alert("Seleccione un Item !");
            return false;
        }

        var tipo = $("#tipo option:selected").val();
        if (tipo =="" || tipo== null || tipo=="Seleccione:"){
            alert("Seleccione un Tipo !");
            return false;
        }

        tipoPoneracion = tipo;
        if(cell?.textContent && tipo != cell.textContent){
            alert("El tipo de ponderacion debe ser el mismo");
            return;
        }
        
        var ponderacion = $("#ponderacion").val();
        if (ponderacion =="" || ponderacion== null ){
            alert("Digite valor de ponderacion");
            return false;
        }
        
        //Validacion para boton y envio de datos.
        var totalPonderacion_val = parseFloat($("#totalPonderacion_val").val());
        //alert('totalPonderacion_val' + totalPonderacion_val);

        var ponderacion_val = parseFloat(ponderacion);
        //alert('ponderacion_val' + ponderacion_val);


        var suma = ponderacion_val + totalPonderacion_val;

        if (suma > 10) {
            alert('No se puede ingresar porque pasa el valor de 10');
        }else{
            var baseurl = "<?php echo base_url(); ?>";

            //alert('con exito' + suma);

            $.ajax({
                method: "post",
                url: "<?= base_url('calificaciones/insertItem'); ?>",
                data: {
                txtCalificacion:$("#txtCalificacion").val(),
                item: $("#item option:selected").val(),
                tipo,
                ponderacion
                },
                dataType: "json",
                success: function(response) {
                //console.log(response);
                location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }



        

    
    }

    function deleteItem(item)
    {

        if (item =="" || item== null || item=="Seleccione:"){
            swal("Error al seleccionar item!", "", "info");
            return false;
        }//end if
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('calificaciones/deleteItem'); ?>",
             data: {
                item: item
             },
             dataType: "json",
             success: function(response) {
                location.reload();
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }
</script>

<?php if (session()->getFlashdata('mensaje')): ?>
    <script>
        var msg = '<?php echo session()->getFlashdata('mensaje'); ?>'
        var title = '<?php echo session()->getFlashdata('title'); ?>'
        var status = '<?php echo session()->getFlashdata('status'); ?>'
         function showSuccessSweetAlert(icon) {
            Swal.fire({
                title: title,
                text: msg,
                icon: 'success'
            }).then((result) => {
            });
        }
        if(status === 'success'){
            showSuccessSweetAlert('success')
        }else{
            showSuccessSweetAlert('error')
        }
    </script>
<?php endif; ?>
