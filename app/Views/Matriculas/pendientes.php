<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Gesti&oacute;n de Matriculas Pendientes</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                        <thead>
                            <tr>
                                <th style="text-align:center">Codigo </th>
                                <th style="text-align:center">Curso</th>
                                <th style="text-align:center">Estudiante</th>
                                <th style="text-align:center">Telefono</th>
                                <th style="text-align:center">Correo</th>
                                <th style="text-align:center">Valor del Curso</th>
                                <th style="text-align:center">Fecha Registro</th>
                                <th style="text-align:center">Estado</th>
                                <th style="text-align:center">Acción</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $contador =0;
                            foreach ($matriculas as $matricula) {
                                $contador = $contador + 1;
                            ?>
                            <tr>
                                <td style="text-align:center"><?=$contador;?></td>
                                <td style="text-align:center"><?php echo $matricula['CURNOMBRE']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTNOMBRE']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTTELEFONO']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTCORREO']; ?></td>
                                <td style="text-align:center"> $ <?php echo $matricula['CURPRECIO']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['RCUFECHA']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['RCUESTADO']; ?></td>
                                <td style="text-align:center"><button type="button" onclick="location.href='<?php echo base_url();?>/MatriculasController/matriculaPendiente?id=<?php echo $matricula['RCUID'];?>'" class="btn btn-primary">Matricular</button></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MATRICULADOS -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Matriculados</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                        <thead>
                            <tr>
                                <th style="text-align:center">Codigo</th>
                                <th style="text-align:center">Curso</th>
                                <th style="text-align:center">Estudiante</th>
                                <th style="text-align:center">Telefono</th>
                                <th style="text-align:center">Correo</th>
                                <th style="text-align:center">Valor del Curso</th>
                                <th style="text-align:center">Fecha Registro</th>
                                <th style="text-align:center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $contador =0;
                            foreach ($matriculados as $matricula) {
                                $contador = $contador + 1;
                            ?>
                            <tr>
                                <td style="text-align:center"><?=$contador;?></td>
                                <td style="text-align:center"><?php echo $matricula['CURNOMBRE']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTNOMBRE']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTTELEFONO']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['ESTCORREO']; ?></td>
                                <td style="text-align:center"> $ <?php echo $matricula['CURPRECIO']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['RCUFECHA']; ?></td>
                                <td style="text-align:center"><?php echo $matricula['MATESTADO']; ?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>