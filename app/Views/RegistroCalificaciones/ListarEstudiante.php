<div class="row">
    <div class="col-md-16">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Calificaciones</h3>

                <div class="card-header-right">
                    <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroCalificacionesController/index'" class="btn btn-light">Regresar</button>
                </div>                
            </div>
            <?php
    // Obtiene la fecha actual en el formato "AAAA-MM-DD"
                $fechaActual = date('Y-m-d');
                if($curso["CURNUMESTUDIANTES"] >0){
                ?>
                 <form method="post" action="<?php echo base_url();?>/RegistroCalificacionesController/registrarNotas">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">Curso: <b><?php echo $curso["CURNOMBRE"] ?></b></div>
                    <div class="col-md-12">No. Estudiantes: <b><?php echo $curso["CURNUMESTUDIANTES"] ?></b></div>
                    <div class="col-md-12">Modalidad: <b><?php echo $curso["CURMODALIDAD"] ?></b></div><br>
                    <div class="col-md-12 d-flex align-items-center">
                    <b><span class="mr-2">Fecha :</span></b>
                            <input type="date" style="width: 220px;" class="form-control"  id="txtFecha_Final" name="txtFecha_Final" placeholder="seleccione fecha" value="<?php echo (sizeof($estudiantes)>0)?$estudiantes[0]['RCAFECHA']:''; ?>">
                    </div>
                </div>


               
                <?php
                        $conteoFilas = count($notas);
                        ?>
            
                    <input type="hidden" name="CURID" value="<?php echo $curso['CURID']; ?>">
                    <input type="hidden" name="aprobado" value="<?php echo $notamax[0]['CALPUNAPROBACION']; ?>">
                    <input type="hidden" name="calificacion" value="<?php echo $notamax[0]['CALPUNTAJE']; ?>">
                    <input type="hidden" name="cantidaditems" value="<?php echo $conteoFilas; ?>"><br><br>
                    <table id="table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                        <thead>
                            <tr>
                                <th style="width:100px; text-align:center;" >Nombre Estudiante</th>
                                <th style="width:100px; text-align:center;" >Cédula</th>
                                <th style="width:100px;; text-align:center;" >Correo</th>
                                <?php foreach($notas as $no) { ?>
                                <th style="width:100px; text-align:center;" ><?php echo $no['ITENOMBRE']; ?></th>
                                <?php } ?>
                                <th style="width:100px; text-align:center;" >equivalente</th>
                                <th style="width:100px; text-align:center;" >Observacion</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($estudiantes as $item) { ?>
                                <tr class="estudiante-row" data-estudiante-id="<?php echo $item['MATID']; ?>">
                                    <td style="width:100px; text-align:center;" ><?php echo $item['ESTNOMBRE']; ?></td>
                                    <td style="width:100px; text-align:center;" ><?php echo $item['ESTCEDULA']; ?></td>
                                    <td style="width:100px; text-align:center;" ><?php echo $item['ESTCORREO']; ?></td>
                                    <?php
                                    $notas_estudiante = explode(', ', $item['Notas']);

                                    foreach($notas as $no) { 
                                        list($RCAID, $RCANOTA) = explode(':', array_shift($notas_estudiante));
                                        ?>
                                        <td style="width:100px; text-align:center;" >
                                        <center><input style="width:90px;border:1px solid #BDC3F7; text-align:center;" type="text" class="form-control nota-input"
                                                value="<?php echo $RCANOTA; ?>"
                                                name="reg_<?php echo $RCAID; ?>"
                                                data-estudiante-id="<?php echo $item['MATID']; ?>"
                                                data-RCAID="<?php echo $RCAID; ?>"
                                                placeholder="Nota <?php echo $RCAID; ?>">
                                                
                                        </td></center>  
                                    <?php } ?>
                                    <td style="width:100px; text-align:center;" >
                                    <center><input style="width:90px;border:1px solid #BDC3F7; text-align:center;" type="text" class="form-control equivalente"
                                            name="equivalente_<?php echo $item['MATID']; ?>"
                                            data-RCAIDs="<?php echo $RCAID; ?>"
                                            value="0" readonly>
                                            <input type="hidden" name="CURID" value="<?php echo $curso['CURID']; ?>">


                                    </td></center>  
                                    <td >
                                        <input style="width:100px;text-align:center;" type="text" class="form-control observacion"
                                            name="observacion_<?php echo $item['MATID']; ?>"
                                            data-RCAIDs="<?php echo $RCAID; ?>"
                                            value="0" readonly>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    var numeroEstudiantes = '<?php echo $curso["CURNUMESTUDIANTES"];?>'
    
    let notas = '<?php echo json_encode($notas);?>'
    notas = JSON.parse(notas);
    // Obtener todas las filas de estudiantes por su clase
    const estudianteRows = document.querySelectorAll('.estudiante-row');

    // Obtener el valor de la cantidad de ítems
    const cantidadItems = parseFloat(document.querySelector('input[name="cantidaditems"]').value);

    // Función para calcular la suma de notas de una fila y actualizar el campo "equivalente" y "Observacion"
    function calcularSumaYActualizarEquivalente(filaEstudiante) {
        const inputsNota = filaEstudiante.querySelectorAll('.nota-input');
        let sumaNotas = 0;
        let tipoCalificacion = '<?php echo $tipoCalificacion; ?>';
        let notasMax = '<?php echo json_encode($notas); ?>';
        notasMax = JSON.parse(notasMax);
        console.log(notasMax);
        const equivalenteInput = filaEstudiante.querySelector('.equivalente');
        let valorFinalEquivalente = 0;

        inputsNota.forEach((input, index) => {
            const valorNota = parseFloat(input.value);
            
            

            if(tipoCalificacion.toUpperCase() === 'PORCENTAJE'){
                if(valorNota > parseFloat(notasMax[index]['CALPUNTAJE'])){
                    input.value = '0';
                    return alert('La nota no puede ser mayor a la configurada en el Puntaje');
                }else{
                    console.log(valorFinalEquivalente);
                    valorFinalEquivalente += ((valorNota*parseFloat(notas[index].CITPONDERACION))/100);
                }
            }else{
                if(valorNota > parseFloat(notasMax[index]['CITPONDERACION'])){
                    input.value = '0';
                    return alert('La nota no puede ser mayor a la configurada en ponderacion');   
                }
            }
            if (!isNaN(valorNota)) {
                sumaNotas += valorNota;
            }
        });

        
        equivalenteInput.value = parseFloat(valorFinalEquivalente).toFixed(2);

        // Calcular el equivalente
        if (equivalenteInput) {
            if(tipoCalificacion.toUpperCase() === 'VALOR'){
                const equivalente = (sumaNotas).toFixed(2);
                equivalenteInput.value = equivalente;
            }
        }

        // Actualizar Observacion
        const observacionInput = filaEstudiante.querySelector('.observacion');
        if (observacionInput) {
            if (equivalenteInput.value >= parseFloat(document.querySelector('input[name="aprobado"]').value)) {
                
                observacionInput.value = "Aprobado";
            } else {
                observacionInput.value = "Reprobado";
                
            }
        }
    }

    // Agregar un evento 'input' a cada entrada de nota para calcular la suma en tiempo real
    estudianteRows.forEach(row => {
        const notaInputs = row.querySelectorAll('.nota-input');
        notaInputs.forEach(input => {
            input.addEventListener('input', (value) => {
                calcularSumaYActualizarEquivalente(row);
            });
        });
    });

    // Calcular la suma inicial para cada fila
    estudianteRows.forEach(row => {
        calcularSumaYActualizarEquivalente(row);
    });



</script>


