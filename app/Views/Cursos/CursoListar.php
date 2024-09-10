<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Cursos</h3>
            <?php if($_SESSION['perfilId'] !== '3'){?>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/nuevo'" class="btn btn-primary">Crear Curso </button>
            </div>
            <?php }?>
            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">C&oacute;digo</th>
                            <th style="text-align:center">Área</th>
                            <th style="text-align:center">Curso</th>
                            <th style="text-align:center">Fecha Inicio</th>
                            <th style="text-align:center">Fecha Final</th>
                            <th style="text-align:center">Precio</th>
                            <th style="text-align:center">Nº Estudiantes</th>
                            <th style="text-align:center">Modalidad</th>
                            <th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        $contador = 0;
                        foreach($cursos as $curso) {
                            $contador++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $contador; ?></td>
                        <td style="text-align:center"><?php echo $curso['ARENOMBRE']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURNOMBRE']; ?><br></td>
                        <td style="text-align:center"><?php echo $curso['CURFECINICIO']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURFECFINAL']; ?></td>
                        <td style="text-align:center"> $ <?php echo $curso['CURPRECIO']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURNUMESTUDIANTES']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURMODALIDAD']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURESTADO']; ?></td>
                        <td style="text-align:center">
                            <?php if($_SESSION['perfilId'] !== '3'){?>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/editar?id=<?php echo $curso['CURID'];?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/borrar?id=<?php echo $curso['CURID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                            <?php }?>
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