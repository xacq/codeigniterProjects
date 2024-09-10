<?php
    $session=session();
    $id=$session->get('usuId');
    $usuNombre=$session->get('usuNombre');
    $usuCedula=$session->get('usuCedula');
?>


<div class="row">


  <div class="col-lg-12 col-md-7">

    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="card">
          <div class="card-header d-block">
              <h3>Listado de cursos</h3>
          </div>
          <div class="card-body p-0 table-border-style">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">MODALIDAD</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">FECHA INICIO</th>
                            <th scope="col">FECHA FIN</th> 
                            <th scope="col"></th>  
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($cursos as $curso){
                        ?>
                          <tr>
                          <td ><?php echo $curso->CURID; ?></td>
                              <td ><?php echo $curso->CURNOMBRE; ?></td>
                              <td ><?php echo $curso->CURMODALIDAD; ?></td>
                              <td><?php echo $curso->CURPRECIO; ?></td>
                              <td><?php echo $curso->CURFECINICIO; ?></td>
                              <td><?php echo $curso->CURFECFINAL; ?></td>
                              <td>
                              <?php
                                  echo form_open('MyCoursesController/matricular');
                                  echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->CURID));
                                  echo form_button(array('name' => 'btnMatricularme', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Registrarse'));
                                  echo form_close();
                              ?>
                              </td> 
                              
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

    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="card">
          <div class="card-header d-block">
              <h3>Administrar mis cursos</h3>
          </div>
          <div class="card-body p-0 table-border-style">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">MODALIDAD</th>
                            <th scope="col">INICIO</th>
                            <th scope="col">FIN</th>
                            <th scope="col">PRECIO</th>  
                            <th scope="col">ACCIONES</th> 
                          </tr>
                      </thead>
                      <tbody>
                      <?php
        
                        foreach($registrocursos as $curso){

                        ?>
                          <tr>
                              <td ><?php echo $curso->RCUID; ?></td>
                              <td ><?php echo $curso->CURNOMBRE; ?></td>
                              <td ><?php echo $curso->CURMODALIDAD; ?></td>
                              <td><?php echo $curso->CURFECINICIO; ?></td>
                              <td><?php echo $curso->CURFECFINAL; ?></td>
                              <td><?php echo $curso->CURPRECIO; ?></td>
                               <td>
                                <span class="badge badge-pill <?php echo $curso->RCUESTADO  == "ACTIVO" ?"badge-warning":"badge-success" ; ?> "><?php echo $curso->RCUESTADO  == "ACTIVO"?"PENDIENTE":"MATRICULADO" ; ?></span> 
                              <!-- <?php
                                    echo form_open('MyCoursesController/unmatricular');
                                    echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->RCUID));
                                    echo form_button(array('name' => 'btnAbandonar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'Abandonar'));
                                    echo form_close();
                                ?> -->
                          </td>
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