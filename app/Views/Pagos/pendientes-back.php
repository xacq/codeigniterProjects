
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pagos
            <small><i class="fa fa-inbox"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Pagos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th>Codigo</th>
							                <th>Estudiante</th>
							                <th>Curso</th>
                                            <th>Cuota</th>
                                            <th>Fecha de Pago</th>
                                            <th>Forma Pago</th>
                                            <th>Número Documento</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
							            </tr>
							            </thead>
                                        <?php
                                            $contador =0;
                                            foreach ($pagosPendientes->resultArray as $pago) {
                                            $contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$pago['ESTNOMBRE']?></td>
                                                <td><?=$pago['CURNOMBRE']?></td>
                                                <td><?=$pago['PAGCUOTA']?></td>
                                                <td><?=$pago['PAGFECREGPAGO']?></td>
                                                <td><?=$pago['FORMAPAGO']?></td>
                                                <td><?=$pago['NUMDOCPAGO']?></td>
                                                <td><?=$pago['PAGESTADO']?></td>
                                                        
                                                <?php if($pago['PAGESTADO'] == 'PENDIENTE'){ ?> 
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-xs" 
                                                                data-toggle="modal" 
                                                                onclick="registrarPago(<?=$pago['PAGCUOTA']?>, <?=$pago['PAGID']?>, <?=$pago['MATCUOTAS']?>,<?=$pago['MATID']?>)"
                                                                data-target="#modal-default">
                                                            <i class="fa fa-edit"> Registrar Pago</i>
                                                        </button>
                                                    </td>                 
                                                <?php }else{
                                                    ?>
                                                    <!--<td><span class='badge bg-green'>Cancelado</span></td>-->
                                                    <td>
                                                        <a href="<?php echo base_url();?>/PagosController/generarFactura?id=<?php echo $pago['PAGID'];?>" class="btn btn-xs btn-primary">
                                                            <i class="fa fa-print"></i> Ver Factura
                                                        </a>
                                                    </td>
                                               <?php }?>
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
			</div>
		</div>




	</section>
</div>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url();?>/PagosController/registrarPago" method="POST" autocomplete="off">
                <input type="hidden" id="pagoId" name="pagoId" value="">
                <input type="hidden" id="MATID" name="MATID">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Registrar Pago</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" readonly="true" value="" id="valorPago">
                    </div>
                    <div class="col-md-6">
                        <label for="valor">Forma de Pago:</label>
                        <select name="formaPago" id="formaPgo" class="form-control">
                            <option value="EFECTIVO">EFECTIVO</option>
                            <option value="CHEQUE">CHEQUE</option>
                            <option value="DEBITO">DEBITO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="valor">Numero Cuota:</label>
                        <select name="numeroCuota" id="numeroCuota" class="form-control" disabled>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="valor">Numero Documento de Pago:</label>
                        <input type="text" 
                            class="form-control" 
                            name="numeroDocumento" 
                            id="numeroDocumento" placeholder="Numero Documento de Pago">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit " 
                    class="btn btn-primary">Registrar Pago
                </button>
                <button type="button" 
                    class="btn btn-danger " 
                    data-dismiss="modal">Cancelar
                </button>
            </div>
            </form>
        </div>

    </div>
</div>
<script>
    function registrarPago(valorPago, pagoId, numeroCuotas,matid){
        $("#modal-default #numeroCuota").find("option").remove().end().append();
        console.log('valor: ', valorPago);
        console.log('pagoId: ', pagoId);
      
        console.log('numeroCuotas: ', numeroCuotas);
        
        for (i=1; i<= numeroCuotas; i++){
            var o = new Option("option text", "value");
            $(o).html(i, i);
            $("#modal-default #numeroCuota").append(o);
        }
        $("#modal-default #valorPago").val(valorPago);
        $("#modal-default #numeroDocumento").val('');
        $("#modal-default #pagoId").val(pagoId);
        $("#modal-default #MATID").val(matid);
    }

    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
</script>