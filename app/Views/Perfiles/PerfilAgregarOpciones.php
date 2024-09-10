<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Agregar Opci&oacute;n a <?php echo $perfiles['PERNOMBRE']; ?></h3>
            <div class="card-header-right">
				<button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController'" class="btn btn-light">Cancelar</button>
            </div>

            </div>
            <div class="card-body">
				<form action="<?php echo base_url(); ?>/PerfilesOpcionesController/nuevoPerfilOpcion?perid=<?php echo $perfiles['PERID']; ?>" method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<!-- <label for="txtEstado">Seleccione Opci&oacute;n</label> -->
								<?php 
								
								echo "<select class='form-control' name='opcion' id='opcion'>";
								echo "<option value=''>seleccione opci&oacute;n...</option>";
								foreach ($opciones as $item){
									echo "<option value='".$item['OPCID']."'>".$item['OPCNOMBRE']."</option>";
								}
								echo "</select>";                                
								
								?>
							</div> 

						</div>

						<div class="col-md-4">
							<button type="submit" class="btn btn-primary">Agregar</button>							
						</div>					

					</div>
				</form>


                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
							<th>Opci&oacute;n</th>
							<th>Acciones</th>
                        </tr>
                    </thead>

					<tbody>                   
					<?php 
						foreach($perfilesOpciones as $item) {
						?>
						<tr>
							<td><?php echo $item['OPCNOMBRE']; ?></td>
							<td>
								<button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesOpcionesController/borrarPerfilOpcion?popid=<?php echo $item['POPID'].'?perid='. $perfiles['PERID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
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
