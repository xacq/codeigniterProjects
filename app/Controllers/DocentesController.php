<?php 
namespace App\Controllers;

use App\Models\DocentesModel;
use App\Models\UsuariosModel;

class DocentesController extends BaseController
{
	protected $db;
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}

	public function index(){
		$builder = $this->db->table("docentes");
		$builder->select('*');
		$builder->where('DOCESTADO', 'ACTIVO');
		$docentes = $builder->get()->getResult();
		//$docentes=array('docentes'=>$docentes);

        $data = [
			'docentes' => $docentes,
			'content' => 'Docentes/DocenteListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function nuevo()
	{
		$data = [
			'content' => 'Docentes/DocenteNuevo'
		];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	
	}

    public function guardar(){
		$DocentesModel= new DocentesModel($db);
		$UsuariosModel= new UsuariosModel($db);
		$request=\Config\Services::request();

		//docente
		$data=array(
			'DOCCEDULA'=>$request->getPostGet('txtCedula'),
			'DOCNOMBRE'=>$request->getPostGet('txtNombre'),
			'DOCTITULO'=>$request->getPostGet('txtTitulo'),
			'DOCTELEFONO'=>$request->getPostGet('txtTelefono'),
			'DOCCORREO'=>$request->getPostGet('txtCorreo'),
			'DOCESTADO'=>$request->getPostGet('txtEstado'),
		);
		if($DocentesModel->insert($data)===false){
			var_dump($DocentesModel->errors());
		}

		//usuario
		$request=\Config\Services::request();
		$data=array(
			'PERID'=>3,
			'USUNOMBRE'=>$request->getPostGet('txtNombre'),
			'USUCEDULA'=>$request->getPostGet('txtCedula'),
			'USUCLAVE'=>$request->getPostGet('txtCedula'),
			'USUCORREO'=>$request->getPostGet('txtCorreo'),
			'USUESTADO'=>$request->getPostGet('txtEstado'),	
		);
		if($UsuariosModel->save($data)===false){
			var_dump($UsuariosModel->errors());
		}
			session()->setFlashdata('mensaje', 'Se ha registrado el docente de manera correctamente');
			session()->setFlashdata('title', 'Docente Registrado Correctamente');
			session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/DocentesController'));
	}

	public function editar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$DocentesModel=new DocentesModel($db);
		$docentes=$DocentesModel->find($id);

		$data = [
			'docentes' => $docentes,
			'content' => 'Docentes/DocenteEditar'
		];

		$estructura=	view('Estructura/layout/index', $data);

		return $estructura;			
	}

	public function modificar(){
		$DocentesModel= new DocentesModel($db);
		$request=\Config\Services::request();
		$data=array(
					
			'DOCCEDULA'=>$request->getPostGet('txtCedula'),
			'DOCNOMBRE'=>$request->getPostGet('txtNombre'),
			'DOCTITULO'=>$request->getPostGet('txtTitulo'),
			'DOCTELEFONO'=>$request->getPostGet('txtTelefono'),
			'DOCCORREO'=>$request->getPostGet('txtCorreo'),
			'DOCESTADO'=>$request->getPostGet('txtEstado'),
			
			
		);
		$DOCID=$request->getPostGet('txtCodigo');
		
		if($DocentesModel->update($DOCID,$data)===false){
			var_dump($DocentesModel->errors());
		}
			session()->setFlashdata('mensaje', 'Se ha actualizado el docente de manera correctamente');
			session()->setFlashdata('title', 'Docente Actualizado Correctamente');
			session()->setFlashdata('status', 'success');
		   
		return redirect()->to(site_url('/DocentesController'));
	}

	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$DocentesModel=new DocentesModel($db);
		$docentes=$DocentesModel->find($id);

		$data = [
			'docentes' => $docentes,
			'content' => 'Docentes/DocenteBorrar'
		];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$DocentesModel=new DocentesModel($db);
		$id=$request->getPostGet('txtCodigo');
		$docentes=$DocentesModel->find($id);
		$docentes=array('estudiadocentesntes'=>$docentes);
		
		/*if($DocentesModel->delete($id)===false){
			print_r($DocentesModel->errors());
		}else{
			$DocentesModel->purgeDeleted($id);
		}*/

		$DocentesModel->update($id, ['DOCESTADO' => 'INACTIVO']);

			session()->setFlashdata('mensaje', 'Se ha eliminado el docente de manera correctamente');
			session()->setFlashdata('title', 'Docente Eliminado Correctamente');
			session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/DocentesController'));	
	}

	public function dashboardDocente()
	{
		// $estructura=	view('Estructura/Header').
		// 				view('Estructura/Menu').
		// 				view('DashboardDocente/DashboardDocente').
		// 				view('Estructura/Footer');
        // return $estructura;


        $data = [
			'content' => 'DashboardDocente/DashboardDocente'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;

	}
}
