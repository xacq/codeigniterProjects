<?php
echo form_open('email/send');
echo form_label('cedula:','cedula');
echo "<br>";
echo form_input(array('name'=>'txtCedula','placeholder'=>'Ingrese la cedula'));
echo "<br>";
echo "<br>";
echo form_label('Nombre:','Nombre');
echo "<br>";
echo form_input(array('name'=>'txtNombre','placeholder'=>'Ingrese el nombre'));
echo "<br>";
echo "<br>";
echo form_label('Direccion:','Direccion');
echo "<br>";
echo form_input(array('name'=>'txtDireccion','placeholder'=>'Ingrese la direccion'));
echo "<br>";
echo "<br>";
echo form_label('Telefono:','Telefono');
echo "<br>";
echo form_input(array('name'=>'txtTelefono','placeholder'=>'Ingrese el telefono'));
echo "<br>";
echo "<br>";

echo form_label('Ciudad:','ciudad');
echo "<br>";
echo "select class='form-control' name'cmbCiudad' id='cmbCiudad'>";
foreach ($ciudades as $ciudad){
    echo "<option value='".$ciudad->CIUID."'>".$ciudad->CIUNOMBRE."</option>";
}
echo "</select>";
echo "<br>";

echo form_label('Genero:','Genero');
echo "<br>";
echo form_input(array('name'=>'txtGenero','placeholder'=>'Ingrese el genero'));
echo "<br>";
echo "<br>";
// COMBOBOX DE ESTADO CIVIL
$options =[
    'Ninguno' => 'Escoja un Estado Civil',
    'Soltero' => 'Soltero',
    'Casado' => 'Casado',
    'Divorcio' => 'Divorciado',
    'Union libre' => 'Union libre',
];
echo form_dropdown('cmbEstCivil',$options,'Ninguno');
// COMBOBOX DE GENERO
$options =[
    'Ninguno' => 'Escoja un Genero',
    'Masculino' => 'Masculino',
    'Femenino' => 'Femenino',
    'No definido' => 'No definido',
   
];
echo "<br>";
echo "<br>";
echo form_dropdown('cmbGenero',$options,'Ninguno');
echo "<br>";
echo "<br>";
echo form_submit('btnGuardar','Guardar');
echo "<br>";
echo form_close();
?>