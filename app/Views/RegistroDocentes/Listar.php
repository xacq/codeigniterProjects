<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <div class="row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <h3>Asignaci&oacute;n de Curso a Docente</h3>


             </div>
             <div class="card-body">
                 <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                     <thead>
                         <tr>
                             <th style="text-align:center">C&oacute;digo</th>
                             <th style="text-align:center">Curso</th>
                             <th style="text-align:center">Docente</th>
                             <th style="text-align:center">Fecha</th>
                             <th style="text-align:center">Estado</th>
                             <th style="text-align:center">Accion</th>
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
                                 <td style="text-align:center"><?php echo $registro['CURNOMBRE']; ?></td>

                                 <td style="text-align:center"><?php echo  $registro['DOCNOMBRE'] != null ? $registro['DOCNOMBRE'] : 'NO ASIGNADO'; ?></td>
                                 <td style="text-align:center"><?php echo $registro['RDOFECHA']; ?></td>
                                 <td style="text-align:center"><?php echo $registro['RDOESTADO'] ?? 'INACTIVO'; ?></td>
                                 <td style="text-align:center">
                                     <button type="button" onclick="location.href='<?php echo base_url(); ?>/RegistroDocentesController/editar_view?id=<?php echo $registro['RDOID']; ?>'" class="btn btn-icon btn-info"><i class="ik ik-edit-2"></i></button>
                                     <button type="button" onclick="location.href='<?php echo base_url(); ?>/RegistroDocentesController/eliminar?id=<?php echo $registro['RDOID'] ?? null; ?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                                     <?php if (!isset($registro['DOCID'])) { ?>
                                         <button type="button" title="Asignar Docente" onclick="location.href='<?php echo base_url(); ?>/RegistroDocentesController/nuevo?id=<?php echo $registro['CURID']; ?>'" class="btn btn-icon btn-success"><i class="ik ik-check-circle"></i></button>
                                     <?php } ?>
                                     <button type="button" onclick="location.href='<?php echo base_url(); ?>/RegistroDocentesController/historial?id=<?php echo $registro['CURID']; ?>'" class="btn btn-icon btn-warning" title="Historial">
                                         <i class="fas fa-history"></i> <!-- Este es el icono de historial de Font Awesome -->
                                     </button>
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