<?php

namespace App\Controllers;

use App\Models\EstudianteModel;
use App\Models\UsuariosModel;
use CodeIgniter\RESTful\ResourceController;

class RestEstudianteController extends ResourceController
{
    
    protected $modelName = 'App\Models\EstudianteModel';
    protected $format    = 'json';

    //MUESTRA TODOS LOS DATOS
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    //BUSCAR 
    public function show ($id=NULL){
        return $this->respond($this->model->find($id));

    }
    //ELIMINAR 
    public function delete($id = NULL){
        $usuario = new UsuariosModel();
        $usuario->delete($id);
        return $this->respond("Registro eliminado");

    }
    //INSERTAR UN REGISTRO EN UNA TABLA 
    public function create(){
        $usuario= new UsuariosModel();
        $data = $this->request->getRawInput();
        $data = [ 
            'NOMBRE' => $data['NOMBRE'],
            'DIRECCION' => $data['DIRECCION'],
            'TELEFONO' => $data['TELEFONO'],
        ];
        $usuario->insert($data);
        return $this->respond("Registro Creado");     
} 
    
//METODO PARA ACTUALIZAR
public function update($id = NULL)
{
    $usuario = new UsuariosModel();
    $data = $this->request->getRawInput();
    $data = [
        'ID' => $data['ID'],
        'NOMBRE' => $data['NOMBRE'],
        'DIRECCION' => $data['DIRECCION'],
        'TELEFONO' => $data['TELEFONO'],
    ];
   
    $usuario->save($data);
    return $this->respond($data);
}


}