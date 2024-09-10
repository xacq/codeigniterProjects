<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Asistencias</h3>

                <div class="card-header-right">
                    <button type="button" onclick="location.href='<?php echo base_url(); ?>/AsistenciasController/index'" class="btn btn-light">Regresar</button>
                </div>
            </div>
            <?php

            $fechaActual = date('Y-m-d');
            ?>
            <form action="<?php echo base_url(); ?>/AsistenciasController/guardar" method="POST" autocomplete="off">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">Curso: <b><?php echo $curso["CURNOMBRE"] ?></b></div>
                        <div class="col-md-12">No. Estudiantes: <b><?php echo $curso["CURNUMESTUDIANTES"] ?></b></div>
                        <div class="col-md-12">Modalidad: <b><?php echo $curso["CURMODALIDAD"] ?></b></div>
                        <div class="col-md-12 d-flex align-items-center">
                            <b><span class="mr-2">Fecha :</span></b>
                            <input min="<?php echo $curso["CURFECINICIO"] ?>" max="<?php echo $curso["CURFECFINAL"] ?>" type="date" style="width: 220px;" class="form-control" id="txtFecha_Final" name="txtFecha_Final" placeholder="Seleccione fecha" value="<?php echo $fechaActual; ?>" onchange="validarFecha()">
                        </div>

                        <input type="hidden" name="txt_fecha_inicio" id="txt_fecha_inicio" value="<?php echo $curso["CURFECINICIO"] ?>">
                        <input type="hidden" name="txt_fecha_fin" id="txt_fecha_fin" value="<?php echo $curso["CURFECFINAL"] ?>">

                        <script>
                            function validarFecha() {
                                var txt_fecha_inicio = document.getElementById('txt_fecha_inicio').value;
                                var txt_fecha_fin = document.getElementById('txt_fecha_fin').value;
                                var txtFechaFinal = document.getElementById('txtFecha_Final');

                                var fechaInicio = new Date(txt_fecha_inicio);
                                var fechaFin = new Date(txt_fecha_fin);

                                var fechaSeleccionada = new Date(txtFechaFinal.value);
                                if (fechaSeleccionada < fechaInicio || fechaSeleccionada > fechaFin) {
                                    alert('Por favor, seleccione una fecha dentro del rango permitido: ' + txt_fecha_inicio + ' - ' + txt_fecha_fin);
                                    txtFechaFinal.value = '';
                                }
                                
                                txtFechaFinal.setAttribute('min', txt_fecha_inicio);
                                txtFechaFinal.setAttribute('max', txt_fecha_fin);
                            }
                        </script>

                        <div class="card-header">
                            <div class="card-header-right">
                                <button type="button" onclick="abrirModalAsistencia();" class="btn btn-primary">Ver Asistencias Específica</button>
                                <button type="button" onclick="abrirModalAsistenciaGeneral();" class="btn btn-primary">Ver Asistencias General</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="MATID" name="MATID" value="<?php echo count($estudiantes) == 0 ? 0 : $estudiantes[0]['MATID']; ?>"><br><br><br><br>
                    <table id="table" class="table nowrap" data-paging="true" data-info="true" data-searching="true">
                        <thead>
                            <tr>
                                <th style="width:100px;border:1px solid #BDBBBA; text-align:center;">Nombre Estudiante</th>
                                <th style="width:100px;border:1px solid #BDBBBA; text-align:center;">Cédula</th>
                                <th style="width:100px;border:1px solid #BDBBBA; text-align:center;">Correo</th>
                                <th style="width:100px;border:1px solid #BDBBBA; text-align:center;">Asistencia</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($estudiantes as $item) {
                            ?>
                                <tr>
                                    <td style="display:none"><input type="hidden" style="border:none" type="text" name="ESTID[]" readonly value="<?php echo $item['ESTID']; ?>"> </td>
                                    <td style="width:100px;border:1px solid #BDBBBA; text-align:center;"><input style="border:none" type="text" readonly value="<?php echo $item['ESTNOMBRE']; ?>"> </td>
                                    <td style="width:100px;border:1px solid #BDBBBA; text-align:center;"><input style="border:none" type="text" readonly value="<?php echo $item['ESTCEDULA']; ?>"> </td>
                                    <td style="width:100px;border:1px solid #BDBBBA; text-align:center;"><input style="border:none" type="text" readonly value="<?php echo $item['ESTCORREO']; ?>"> </td>

                                    <td style="width:10px;border:1px solid #BDBBBA; text-align:center;">
                                        <!-- <button type="button" 
                                onclick="registrarAsistencia(<?php echo $item['MATID']; ?>, '<?php echo $item['ESTNOMBRE']; ?>')"
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#modal-default-asistencia">Marcar Asistencia
                            </button> -->
                                        <center>
                                            <input required style="width:50px;border:1px solid #BDC3F7; text-align:center;" type="text" name="ASIESTADO[]" maxlength="1" style="text-align:center;width:60px;box-sizing:border-box;border: solid 1px black;" class="form-control" min="0" max="2" aria-label="Username" aria-describedby="basic-addon1">
                                        </center>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="submit"  class="col-2 btn btn-success">Guardar</button>
                        
                    </div>

            </form>
        </div>
    </div>



</div>
</div>



<div class="modal fade" id="modal-default-asistencia" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <form action="<?php echo base_url(); ?>/AsistenciasController/guardar" method="POST" autocomplete="off">
        <input type="hidden" id="MATID" name="MATID">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Registro de Asistencia <div id="item-data"></div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            Estudiante: <span id="nombre_estudiante"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="asistencia">Estado</label>
                                <select name="asistencia" id="asistencia" class="form-control" require>
                                    <option value="SI">ASISTE</option>
                                    <option value="NO">NO ASISTE</option>
                                </select>
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
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    function registrarAsistencia(MATID, nombre) {
        $("#modal-default-asistencia #MATID").val(MATID);
        $("#modal-default-asistencia #nombre_estudiante").html(nombre);
    }

    function abrirModalAsistencia() {
        $('#modal_asistencia').modal('show');

        var curso_id = <?php echo json_encode($curso_id); ?>; // Obtén el ID del curso desde PHP

        // Construye la URL del PDF
        var url = '<?php echo base_url() . "/AsistenciasController/mostrarPDFasistencias?id="; ?>' + curso_id;

        // Asigna la URL al atributo src del iframe
        document.getElementById('iframe_asistencias').src = url;
    }

    function abrirModalAsistenciaGeneral() {
        $('#modal_asistencia').modal('show');

        var curso_id = <?php echo json_encode($curso_id); ?>; // Obtén el ID del curso desde PHP

        // Construye la URL del PDF
        var url = '<?php echo base_url() . "/AsistenciasController/mostrarPDFasistenciasGeneral?id="; ?>' + curso_id;

        // Asigna la URL al atributo src del iframe
        document.getElementById('iframe_asistencias').src = url;
    }
</script>


<div class="modal fade full-window-modal" id="modal_asistencia" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="embed-responsive embed-responsive-4by3" style="margin-top: 30px">
                                <iframe class="embed-responsive-item" id="iframe_asistencias">

                                </iframe>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>