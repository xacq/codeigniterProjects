<?php 
namespace App\Controllers;


use App\Models\OpcionesModel;
use App\Models\PerfilesOpcionesModel;

class OpcionesController extends BaseController
{
	protected $db;
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		
		$builder = $this->db->table("opciones");
		$builder->select('*');
		$opciones = $builder->get()->getResult();

        $data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;		
	}

    public function nuevo(){

		$data = [
			'content' => 'Opciones/OpcionNuevo'
        ];

		$estructura=	view('Estructura/layout/index', $data);

		return $estructura;
	}

    public function guardar(){
		$OpcionesModel= new OpcionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
				'OPCNOMBRE'=>$request->getPostGet('txtNombre'),
                'OPCRUTA'=>$request->getPostGet('txtRuta'),
                'OPCESTADO'=>$request->getPostGet('txtEstado'),
                
		);
		
		if($OpcionesModel->insert($data)===false){
			var_dump($OpcionesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha registrado la opción de manera correctamente');
		session()->setFlashdata('title', 'Opción  Registrada Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/OpcionesController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$OpcionesModel=new OpcionesModel($db);
		$opciones=$OpcionesModel->find($id);
	
		
        $data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionEditar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	

	}

	public function modificar(){
		$OpcionesModel= new OpcionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			
			'OPCNOMBRE'=>$request->getPostGet('txtNombre'),
			'OPCRUTA'=>$request->getPostGet('txtRuta'),
			'OPCESTADO'=>$request->getPostGet('txtEstado'),
			
		);
		$OPCID=$request->getPostGet('txtCodigo');
		
		if($OpcionesModel->update($OPCID,$data)===false){
			var_dump($OpcionesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado la opción de manera correctamente');
		session()->setFlashdata('title', 'Opción  Actualizada Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/OpcionesController'));	
	}

	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$OpcionesModel=new OpcionesModel($db);
		$opciones=$OpcionesModel->find($id);

		$data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionBorrar'
		];

		$estructura=	view('Estructura/layout/index', $data);							
		return $estructura;			
	}
	
	public function eliminar() {
		$request = \Config\Services::request();
		$OpcionesModel = new OpcionesModel($db);
		$id = $request->getPostGet('txtCodigo');
		
		$PerfilesOpcionesModel = new PerfilesOpcionesModel($db);
		$count = $PerfilesOpcionesModel->where('OPCID', $id)->countAllResults();
		
		if ($count > 0) {

			$mensaje = "No se puede eliminar la opción porque existe $count registro relacionado";
			session()->setFlashdata('mensaje', $mensaje);
			//$message = "No se puede eliminar la opción porque existen $count registros relacionados.";
			return redirect()->to(site_url('/OpcionesController'))->with('message', $mensaje);
		} else {
			if ($OpcionesModel->delete($id) === false) {
				$message = "Error al eliminar la opción: " . print_r($OpcionesModel->errors(), true);
			} else {
				$message = "Opción eliminada con éxito.";
				$OpcionesModel->purgeDeleted($id);
			}
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado la opción de manera correctamente');
		session()->setFlashdata('title', 'Opción  Eliminada Correctamente');
		session()->setFlashdata('status', 'success');
		
		return redirect()->to(site_url('/OpcionesController'))->with('message', $message);
	}
	
	



}
