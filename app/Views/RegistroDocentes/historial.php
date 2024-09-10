<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
        <h3>Historial de curso: <?php echo $registros[0]["CURNOMBRE"]; ?></h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroDocentesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
        
            <div class="card-header">
               
            </div>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>/RegistroDocentesController/guardar_historial" method="post" accept-charset="utf-8">
                <!-- Agrega el input hidden con el valor de $registros[0]["CURID"] -->
                        <input type="hidden" name="curid" value="<?php echo $registros[0]["CURID"]; ?>">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="docente" class="form-label">Seleccione Docente</label>
                           
                            <select name="docente" id="docente" class="form-control">
                                <?php foreach ($docentes as $docente) { ?>
                                    <option value="<?php echo $docente['DOCID']; ?>"><?php echo $docente['DOCNOMBRE']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </div>
                </form>
                <table id="table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">C&oacute;digo</th>
                            <th style="text-align:center">Docente</th>
                            <th style="text-align:center">Fecha</th>
                            <th style="text-align:center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        foreach ($registros as $registro) {
                            $contador++;
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $contador; ?></td>
                                <td style="text-align:center"><?php echo ($registro['DOCNOMBRE'] != null) ? $registro['DOCNOMBRE'] : 'NO ASIGNADO'; ?></td>
                                <td style="text-align:center"><?php echo $registro['RDOFECHA']; ?></td>
                                <td style="text-align:center"><?php echo $registro['RDOESTADO'] ?? 'INACTIVO'; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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