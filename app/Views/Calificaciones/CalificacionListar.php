<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Calificaciones</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/nuevo'" class="btn btn-primary">Crear Calificaci&oacute;n</button>
            </div>

            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">Descripcion</th>
                            <th style="text-align:center">Puntaje</th>
                            <th style="text-align:center">Aprobacion</th>
                            <th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($calificaciones as $item) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $item->CALDESCRIPCION; ?></td>
                        <td style="text-align:center"><?php echo $item->CALPUNTAJE; ?></td>
                        <td style="text-align:center"><?php echo $item->CALPUNAPROBACION; ?></td>
                        <td style="text-align:center"><?php echo $item->CALESTADO; ?></td>
                        <td style="text-align:center">
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/editar?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/borrar?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                            <button type="button" title="Asignar Items" onclick="location.href='<?php echo base_url();?>/CalificacionesController/registrarItems?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-success"><i class="ik ik-check-circle"></i></button>
                        </td>
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