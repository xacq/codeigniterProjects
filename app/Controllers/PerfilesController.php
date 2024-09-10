<?php

namespace App\Controllers;

use App\Models\PerfilesModel;
use App\Models\OpcionesModel;
use App\Models\PerfilesOpcionesModel;
use App\Models\UsuariosModel;

class PerfilesController extends BaseController {
	protected $db;
	public function __construct() {
		$this->db = db_connect(); // loading database
		helper('form');
	}

	public function index() {
		$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilListar'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;

	}

	public function nuevo() {
		$data = [
			'content' => 'Perfiles/PerfilNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function guardar() {
		$PerfilesModel = new PerfilesModel($db);
		$request = \Config\Services::request();
		$data = [

			'PERNOMBRE' => $request->getPostGet('txtNombre'),
			'PERESTADO' => $request->getPostGet('txtEstado'),

		];

		if ($PerfilesModel->insert($data) === false) {
			var_dump($PerfilesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha registrado el perfil de manera correctamente');
		session()->setFlashdata('title', 'Perfil  Registrado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/PerfilesController'));	
	}

	public function editar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);

		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilEditar'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function editarOpciones() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);

		$perfilesOpciones = $PerfilesModel->getOptions($id);

		$OpcionesModel = new OpcionesModel($db);
		$opciones = $OpcionesModel->findAll();

		// $opcionesLimpias = [];
		// foreach ($opciones as $opcion) {
		// 	if (!in_array($opcion['OPCID'], array_column($perfilesOpciones, 'OPCID'))) {
		// 		$opcionesLimpias[] = $opcion;
		// 	}
		// }

		$data = [
			'perfiles' => $perfiles,
			'opciones' => $opciones,
			'perfilesOpciones' => $perfilesOpciones,
			'content' => 'Perfiles/PerfilAgregarOpciones'
		];
		
		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function modificar() {
		$PerfilesModel = new PerfilesModel($db);
		$request = \Config\Services::request();
		$data = [
			'PERNOMBRE' => $request->getPostGet('txtNombre'),
			'PERESTADO' => $request->getPostGet('txtEstado'),
		];
		
		$PERID = $request->getPostGet('txtCodigo');

		if ($PerfilesModel->update($PERID, $data) === false) {
			var_dump($PerfilesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado el perfil de manera correctamente');
		session()->setFlashdata('title', 'Perfil  Actualizado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/PerfilesController'));
	}

	public function borrar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);

		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilBorrar'
		];
		session()->setFlashdata('mensaje', 'Se ha eliminado la  de manera correctamente');
		session()->setFlashdata('title', 'Opción  Eliminado Correctamente');
		session()->setFlashdata('status', 'success');
		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function eliminar() {
		$request = \Config\Services::request();
		$PerfilesModel = new PerfilesModel($db);
		$id = $request->getPostGet('txtCodigo');
	
		$UsuariosModel = new UsuariosModel($db);
		$countUsuarios = $UsuariosModel->where('PERID', $id)->countAllResults();
	
		if ($countUsuarios > 0) {
			$mensaje = "No se puede eliminar el perfil porque existen $countUsuarios usuarios relacionados.";
			session()->setFlashdata('mensaje', $mensaje);
			return redirect()->to(site_url('/PerfilesController'))->with('message', $mensaje);
		}
	
		$PerfilesOpcionesModel = new PerfilesOpcionesModel($db);
		$countPerfilesOpciones = $PerfilesOpcionesModel->where('PERID', $id)->countAllResults();
	
		if ($countPerfilesOpciones > 0) {
			$mensaje = "No se puede eliminar el perfil porque existen $countPerfilesOpciones registros relacionados en perfilesopciones.";
			session()->setFlashdata('mensaje', $mensaje);
			return redirect()->to(site_url('/PerfilesController'))->with('message', $mensaje);
		}
	
		if ($PerfilesModel->delete($id) === false) {
			$message = "Error al eliminar el perfil: " . print_r($PerfilesModel->errors(), true);
		} else {
			$message = "Perfil eliminado con éxito.";
			$PerfilesModel->purgeDeleted($id);
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado el perfil de manera correctamente');
		session()->setFlashdata('title', 'Perfil  Eliminado Correctamente');
		session()->setFlashdata('status', 'success');
	
		return redirect()->to(site_url('/PerfilesController'))->with('message', $message);
	}
	
}
