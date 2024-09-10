<?php

namespace App\Controllers;

use App\Models\PerfilesModel;
use App\Models\PerfilesOpcionesModel;

class PerfilesOpcionesController extends BaseController {
	protected $db;
	public function __construct() {
		$this->db = db_connect(); // loading database
		helper('form');
	}

	public function index() {
		$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilListar', $perfiles) .
			view('Estructura/Footer');
		return $estructura;
	}

	public function nuevoPerfilOpcion() {
		$request = \Config\Services::request();
		$perid = $request->getPostGet('perid');
		$opcid = $request->getPostGet('opcion');

		$perfilesOpcionesModel = new PerfilesOpcionesModel($db);
		$data = [
			'PERID' => intval($perid),
			'OPCID' => $opcid,
			'POPESTADO' => 'ACTIVO',
		];

		if ($perfilesOpcionesModel->save($data)) {
			session()->setFlashdata('mensaje', 'Se ha agregado la opción de manera correctamente');
			session()->setFlashdata('title', 'Opción  Agregado Correctamente');
			session()->setFlashdata('status', 'success');
			return redirect()->to(site_url('/PerfilesController/editarOpciones?id=' . $perid));
		} else {
			var_dump($perfilesOpcionesModel->errors());
		}

	}

	public function borrarPerfilOpcion() {
		$request = \Config\Services::request();
		$popid = $request->getPostGet('popid');

		$perfilModel = new PerfilesModel($db);
		$perfilesOpcionesModel = new PerfilesOpcionesModel($db);

		$perfilOpcion = $perfilesOpcionesModel->find($popid);
		$perid = $perfilOpcion['PERID'];

		if ($perfilesOpcionesModel->delete(intval($popid), true)) {
			session()->setFlashdata('mensaje', 'Se ha eliminado la opción de manera correctamente');
			session()->setFlashdata('title', 'Opción  Eliminado Correctamente');
			session()->setFlashdata('status', 'success');
			return redirect()->to(site_url('/PerfilesController/editarOpciones?id=' . $perid));
		} else {
			var_dump($perfilesOpcionesModel->errors());
		}

	}

	public function nuevo() {
		$request = \Config\Services::request();
		$perId = $request->getPostGet('perId');
		$perNombre = $request->getPostGet('perNombre');

		$sessionPerfil = [
			'perId' => $perId,
			'perNombre' => $perNombre,
		];
		//$this->session->set($sessionPerfil);

		//$builder = $this->db->table("perfiles");

		//$opcionesModel=new OpcionesModel(db);

		//$opciones=$OpcionesModel->findAll();
		//$opciones=array('opciones'=>$opciones);

		/*
		$perfilesOpciones=new PerfilesOpcionesModel($db);

        $perfilesOpciones=$perfilesOpciones->where('PERID',$perId)->findAll();
        $perfilesOpciones=array('perfilesOpciones'=>$perfilesOpciones);
		*/

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('perfilesOpciones/listaOpciones', $sessionPerfil) .
			view('Estructura/Footer');
		return $estructura;


		/*$builder = $this->db->table("perfiles");
$builder->select('*');
$perfiles = $builder->get()->getResult();
$perfiles=array('perfiles'=>$perfiles);*/


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

		$builder = $this->db->table("perfiles");
		$builder->select("*");
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilListar', $perfiles) .
			view('Estructura/Footer');
		return $estructura;
	}

	public function editar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);
		$perfiles = ['perfiles' => $perfiles];
		//var_dump($areas);
		$data['perfiles'] = $perfiles;

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilEditar', $data) .
			view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
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
		$perfiles = ['perfiles' => $perfiles];
		//var_dump($areas);
		$data['perfiles'] = $perfiles;

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilBorrar', $data) .
			view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
		return $estructura;
	}

	public function eliminar() {
		$request = \Config\Services::request();
		$PerfilesModel = new PerfilesModel($db);
		$id = $request->getPostGet('txtCodigo');
		$perfiles = $PerfilesModel->find($id);
		$perfiles = ['perfiles' => $perfiles];
		var_dump($perfiles);
		if ($PerfilesModel->delete($id) === false) {
			print_r($PerfilesModel->errors());
		} else {
			$PerfilesModel->purgeDeleted($id);
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado el perfil de manera correctamente');
		session()->setFlashdata('title', 'Perfil  Eliminado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/PerfilesController'));
	}

	//--------------------------------------------------------------------

}
