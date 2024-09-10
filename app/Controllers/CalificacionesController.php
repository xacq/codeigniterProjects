<?php

namespace App\Controllers;

use App\Models\CalificacionesItemsModel as ciModels;
use App\Models\CalificacionesItemsModel;
use App\Models\CalificacionesModel;
use App\Models\ItemsModel as itemModel;

use CodeIgniter\HTTP\IncomingRequest;

class CalificacionesController extends BaseController
{
	protected $db;
	public function __construct()
	{
		$this->db = db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$builder = $this->db->table("calificaciones");
		$builder->select('*');
		$calificaciones = $builder->get()->getResult();

		$data = [
			'calificaciones' => $calificaciones,
			'content' => 'Calificaciones/CalificacionListar'
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function nuevo()
	{
		$data = [
			'content' => 'Calificaciones/CalificacionNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function guardar()
	{
		$CalificacionesModel = new CalificacionesModel($db);
		$request = \Config\Services::request();
		$data = array(

			'CALDESCRIPCION' => $request->getPostGet('txtDescripcion'),
			'CALPUNTAJE' => $request->getPostGet('txtPuntaje'),
			'CALPUNAPROBACION' => $request->getPostGet('txtAprobado'),
			'CALESTADO' => $request->getPostGet('txtEstado'),

		);
		if ($data['CALESTADO'] == 'ACTIVO') {
			$CalificacionesModel->set(array('CALESTADO' => 'INACTIVO'))->update();
		}

		if ($CalificacionesModel->insert($data) === false) {
			var_dump($CalificacionesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha registrado la califiacación de manera correctamente');
		session()->setFlashdata('title', 'Calificación Registrada Correctamente');
		session()->setFlashdata('status', 'success');

		return redirect()->to(site_url('/CalificacionesController'));
	}

	public function editar()
	{
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$CalificacionesModel = new CalificacionesModel($db);
		$calificaciones = $CalificacionesModel->find($id);

		$data = [
			'calificaciones' => $calificaciones,
			'content' => 'Calificaciones/CalificacionEditar'
		];
		session()->setFlashdata('mensaje', 'Se ha actualizado la califiacación de manera correctamente');
		session()->setFlashdata('title', 'Calificación Actualizada Correctamente');
		session()->setFlashdata('status', 'success');
		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function modificar()
	{
		$CalificacionesModel = new CalificacionesModel($db);
		$request = \Config\Services::request();
		$data = array(

			'CALDESCRIPCION' => $request->getPostGet('txtDescripcion'),
			'CALPUNTAJE' => $request->getPostGet('txtPuntaje'),
			'CALPUNAPROBACION' => $request->getPostGet('txtAprobado'),
			'CALESTADO' => $request->getPostGet('txtEstado'),

		);
		$CALID = $request->getPostGet('txtCodigo');
		echo ($CALID);

		if ($CalificacionesModel->update($CALID, $data) === false) {
			var_dump($CalificacionesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado la califiacación de manera correctamente');
		session()->setFlashdata('title', 'Calificación Actualizada Correctamente');
		session()->setFlashdata('status', 'success');

		return redirect()->to(site_url('/CalificacionesController'));
	}

	public function borrar()
	{
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$CalificacionesModel = new CalificacionesModel($db);
		$calificaciones = $CalificacionesModel->find($id);

		$data = [
			'calificaciones' => $calificaciones,
			'content' => 'Calificaciones/CalificacionBorrar'
		];
		session()->setFlashdata('mensaje', 'Se ha eliminado la califiacación de manera correctamente');
		session()->setFlashdata('title', 'Calificación Eliminada Correctamente');
		session()->setFlashdata('status', 'success');
		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function eliminar()
	{
		$request = \Config\Services::request();
		$CalificacionesModel = new CalificacionesModel($db);
		$CalificacionesItem = new CalificacionesItemsModel($db);
		$id = $request->getPostGet('txtCodigo');
		$calificaciones = $CalificacionesModel->find($id);
		$calificaciones = array('calificaciones' => $calificaciones);

		$CalificacionesItem->where('CALID', $id)->delete();
		$CalificacionesItem->purgeDeleted($id);

		if ($CalificacionesModel->delete($id) === false) {
			print_r($CalificacionesModel->errors());
		} else {
			$CalificacionesModel->purgeDeleted($id);
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado la califiacación de manera correctamente');
		session()->setFlashdata('title', 'Calificación Eliminada Correctamente');
		session()->setFlashdata('status', 'success');

		return redirect()->to(site_url('/CalificacionesController'));
	}


	public function registrarItems()
	{

		$request = \Config\Services::request();
		$idCalificacion = $request->getPostGet('id');
		//get data calificacion
		$CalificacionesModel = new CalificacionesModel($db);
		$calificacionData = $CalificacionesModel->find($idCalificacion);
		//get data items
		$ItemsModel = new itemModel($db);
		$itemsData = $ItemsModel->findAll();
		//get data calificaciones-items
		$calificacionesItems = $this->db->table("calificacionesitems t1")
			->join('calificaciones t2', 't2.CALID = t1.CALID')
			->join('items t3', 't3.ITEID = t1.ITEID ')
			->where('t1.CALID ', $idCalificacion)
			->get()
			->getResultArray();

		$data = [
			'calificacion' => $calificacionData,
			'items' => $itemsData,
			'calificacionesItems' => $calificacionesItems,
			'content' => 'Calificaciones/RegistrarItems'
		];
		
		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}


	public function insertItem()
	{
		$request = \Config\Services::request();
		$txtCalificacion = $request->getPostGet('txtCalificacion');
		$item = $request->getPostGet('item');
		$ponderacion = $request->getPostGet('ponderacion');
		$tipo = $request->getPostGet('tipo');
		$CalificacionesItemsModel = new ciModels();
		$data = array(
			'CALID' => $txtCalificacion,
			'ITEID' => $item,
			'CITPONDERACION' => $ponderacion,
			'CITTIPO' => $tipo,
			'CITESTADO' => null
		);
		$CalificacionesItemsModel->add($data);
		echo json_encode(array(
			"status" => TRUE,
			//"txtCalificacion" => $txtCalificacion,
			//"item" => $item
		));
		session()->setFlashdata('mensaje', 'Se ha registrado el items de manera correcta');
		session()->setFlashdata('title', 'Items Registrado Correctamente');
		session()->setFlashdata('status', 'success');	
	}

	public function deleteItem()
	{
		$request = \Config\Services::request();
		$item = $request->getPostGet('item');
		$CalificacionesItemsModel = new ciModels();
		$CalificacionesItemsModel->delete_item($item);
		echo json_encode(array("status" => TRUE));
	}
}
