<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">

        <div class="card">
        
            <div class="card-header">
            <h3>Administrar Areas</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/nuevo'" class="btn btn-primary">Crear Area</button>
            </div>
           
            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">C&oacute;digo</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        $contador = 0;
                        foreach($areas as $area) {
                            $contador++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $contador; ?></td>
                        <td style="text-align:center"><?php echo $area['ARENOMBRE']; ?></td>
                        <td style="text-align:center">
                            <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/editar?id=<?php echo $area['AREID'];?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/borrar?id=<?php echo $area['AREID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
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