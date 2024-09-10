<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Items</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/ItemsController/nuevo'" class="btn btn-primary">Crear Item</button>
            </div>

            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
							<th>Nombre</th>
							<th>Observación</th>
							<th>Estado</th>
							<th>Acciones</th>
                        </tr>
                    </thead>
                <tbody>                   
                    <?php 
                        foreach($items as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->ITEID; ?></td>
                        <td><?php echo $item->ITENOMBRE; ?></td>
						<td><?php echo $item->ITEOBSERVACION; ?></td>
						<td><?php echo $item->ITEESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/ItemsController/editar?id=<?php echo $item->ITEID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/ItemsController/borrar?id=<?php echo $item->ITEID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
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



