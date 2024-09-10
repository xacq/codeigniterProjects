<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Estudiantes</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/nuevo'" class="btn btn-primary">Crear Estudiante</button>
            </div>

            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">Código</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">C&eacute;dula</th>
                            <th style="text-align:center">Direcci&oacute;n</th>
							<th style="text-align:center">Tel&eacute;</th>
                            <th style="text-align:center">Correo</th>
							<th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($estudiantes as $item) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $item->ESTID; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTNOMBRE; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTCEDULA; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTDIRECCION; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTTELEFONO; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTCORREO; ?></td>
                        <td style="text-align:center"><?php echo $item->ESTESTADO; ?></td>
                        <td style="text-align:center">
                            <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/editar?id=<?php echo $item->ESTID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/borrar?id=<?php echo $item->ESTID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
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