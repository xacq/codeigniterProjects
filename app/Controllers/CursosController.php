<?php

namespace App\Controllers;

use App\Models\CursosModel;
use App\Models\MatriculasModel;
use App\Models\RegistroCursosModel;
use App\Models\RegistroDocentesModel;

class CursosController extends BaseController
{
	protected $db;
	public function __construct()
	{
		$this->db = db_connect(); // loading database 
		helper('form');
	}

	public function index()
	{
		$model = new CursosModel();

		$data = [
			'cursos' => $model->getAllData(),
			'pagi_path' => 'sgcc/cursos',
			'content' => 'Cursos/CursoListar'
		];

		$estructura =	view('Estructura/layout/index', $data);

		return $estructura;
	}

	public function nuevo()
	{
		//areas
		$builder = $this->db->table("areas");
		$builder->select('AREID,ARENOMBRE');
		$areas = $builder->get()->getResult();
		//docentes
		$builder = $this->db->table("docentes");
		$builder->select('DOCID, DOCNOMBRE');
		$docentes = $builder->get()->getResult();
		$data = [
			'content' => 'Cursos/CursoNuevo',
			'areas' => $areas,
			'docentes' => $docentes
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function guardar()
	{

		$CursosModel = new CursosModel($db);
		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$request = \Config\Services::request();

		//registro curso
		$data = array(
			'AREID' => $request->getPostGet('cmbAreas'),
			'CURNOMBRE' => $request->getPostGet('txtNombre'),
			'CURFECINICIO' => $request->getPostGet('txtFecha_Inicio'),
			'CURFECFINAL' => $request->getPostGet('txtFecha_Final'),
			'CURPRECIO' => $request->getPostGet('txtPrecio'),
			'CURNUMESTUDIANTES' => $request->getPostGet('txtNº_Estudiantes'),
			'CURMODALIDAD' => $request->getPostGet('txtModalidad'),
			'CURESTADO' => $request->getPostGet('txtEstado'),

		);
		if ($CursosModel->insert($data) === false) {
			var_dump($CursosModel->errors());
		}

		//registro docente
		// $data=array(
		// 	'DOCID'=>$request->getPostGet('docente'),
		// 	'CURID'=>$CursosModel->getInsertID(),
		// 	'RDOFECHA'=>$request->getPostGet('txtFecha_Inicio'),
		// 	'RDOESTADO'=> 'ACTIVO'
		// );

		// if($RegistroDocentesModel->add($data)===false){
		// 	var_dump($RegistroDocentesModel->errors());
		// }
		session()->setFlashdata('mensaje', 'Se ha registrado el curso de manera correctamente');
		session()->setFlashdata('title', 'Curso Registrado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/CursosController'));
	}

	public function editar()
	{
		$request = \Config\Services::request();

		if ($request->getPostGet('id')) {
			$id = $request->getPostGet('id');
		} else {
			$id = $request->uri->getSegment(3);
		}
		//registroDocentes
		// $RegistroDocentesModel=new RegistroDocentesModel($db);
		// $registroDocente = $RegistroDocentesModel->where('CURID', $id)->find();

		//cursos
		$CursosModel = new CursosModel($db);
		$cursos = $CursosModel->find($id);
		//areas
		$builder = $this->db->table("areas");
		$builder->select('AREID, ARENOMBRE');
		$areas = $builder->get()->getResult();

		//docentes
		// $builder = $this->db->table("docentes");
		// $builder->select('DOCID, DOCNOMBRE');
		// $docentes = $builder->get()->getResult();

		$data = [
			'content' => 'Cursos/CursoEditar',
			'areas' => $areas,
			'cursos' => $cursos,
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function modificar()
	{
		$request = \Config\Services::request();
		$CursosModel = new CursosModel($db);
		$RegistroDocentesModel = new RegistroDocentesModel($db);

		//actualizar curso
		$data = array(
			'CURID' => $request->getPostGet('txtCodigo'),
			'AREID' => $request->getPostGet('cmbAreas'),
			'CURNOMBRE' => $request->getPostGet('txtNombre'),
			'CURFECINICIO' => $request->getPostGet('txtFecha_Inicio'),
			'CURFECFINAL' => $request->getPostGet('txtFecha_Final'),
			'CURPRECIO' => $request->getPostGet('txtPrecio'),
			'CURNUMESTUDIANTES' => $request->getPostGet('txtNº_Estudiantes'),
			'CURMODALIDAD' => $request->getPostGet('txtModalidad'),
			'CURESTADO' => $request->getPostGet('txtEstado'),

		);
		if ($CursosModel->save($data) === false) {
			var_dump($CursosModel->errors());
		}

		//registro docente
		$dataDocente = array(
			//'RDOID'=>$request->getPostGet('idRegistroDocente'),
			'DOCID' => $request->getPostGet('docente'),
			//'CURID'=>$request->getPostGet('txtCodigo'),
			//'RDOFECHA'=>$request->getPostGet('txtFecha_Inicio'),
			//'RDOESTADO'=> $request->getPostGet('txtEstado')
		);
		if ($RegistroDocentesModel->update($request->getPostGet('idRegistroDocente'), $dataDocente) === false) {
			var_dump($CursosModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado el curso de manera correctamente');
		session()->setFlashdata('title', 'Curso Actualizado Correctamente');
		session()->setFlashdata('status', 'success');

		return redirect()->to(site_url('/CursosController'));
	}

	public function borrar()
	{
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$CursosModel = new CursosModel($db);
		$cursos = $CursosModel->find($id);

		$builder = $this->db->table("areas");
		$builder->select('AREID, ARENOMBRE');
		$areas = $builder->get()->getResult();

		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$registroDocente = $RegistroDocentesModel->where('CURID', $id)->find();

		$registroDocenteData = (!empty($registroDocente) ? $registroDocente[0] : null);

		$builder = $this->db->table("docentes");
		$builder->select('DOCID, DOCNOMBRE');
		$docentes = $builder->get()->getResult();

		$mensajeEmergente = "";
		//print_r($areas);
		if (empty($registroDocente)) {


			$mensaje = "No se puede eliminar por que a un no a asignado un docente.!";
			session()->setFlashdata('mensaje', $mensaje);

			//$mensajeError = "Por favor, no puede eliminar. Primero debe asignar un docente.";
			// Redirige al controlador de áreas con un mensaje de error
			return redirect()->to(site_url('/CursosController'))->with('error', $mensajeEmergente);
		}

		$data = [
			'content' => 'Cursos/CursoEliminar',
			'areas' => $areas,
			'cursos' => $cursos,
			'registroDocente' => $registroDocenteData,
			'docentes' => $docentes,
			'mensajeError' => $mensajeEmergente
		];

		$estructura = view('Estructura/layout/index', $data);
		return $estructura;
	}



	public function eliminar()
	{

		$request = \Config\Services::request();
		$CursosModel = new CursosModel($db);
		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$RegistroCursosModel = new RegistroCursosModel($db);
		$MatriculaModel = new MatriculasModel($db);

		$id = $request->getPostGet('txtCodigo');
		$idRegistroDocente = $request->getPostGet('idRegistroDocente');

		$cursos = $CursosModel->find($id);
		$cursos = array('cursos' => $cursos);

		//eliminar registro docente
		/*if ($RegistroDocentesModel->delete($idRegistroDocente) === false) {
			print_r($RegistroDocentesModel->errors());
		} else {
			$RegistroDocentesModel->purgeDeleted($idRegistroDocente);
			//eliminar curso
			/*if ($CursosModel->delete($id) === false) {
				print_r($CursosModel->errors());
			} else {
				$CursosModel->purgeDeleted($id);
			}
		}
		return redirect()->to(site_url('/CursosController'));*/

		//echo $idRegistroDocente;
		$RegistroDocentesModel->delete($idRegistroDocente);
		$RegistroDocentesModel->purgeDeleted($idRegistroDocente);


		////////////////////////////////////////////////////////////////
		//Regitros cursos
		$RegistroCursosModel->where('CURID', $id)->delete();
		//$RegistroCursosModel->purgeDeleted($id);

		/*$RegistroCursosModel = $RegistroCursosModel->where('CURID', $id);

		$MatriculaModel->where('RCUID', $id)->delete();
		$MatriculaModel->purgeDeleted($id);*/
		////////////////////////////////////////////////////////////////
		session()->setFlashdata('mensaje', 'Se ha eliminado el curso de manera correctamente');
		session()->setFlashdata('title', 'Curso Eliminado Correctamente');
		session()->setFlashdata('status', 'success');

		$CursosModel->delete($id);
		//Opcion
		$CursosModel->update($id, ['CURESTADO' => 'INACTIVO']);

		return redirect()->to(site_url('/CursosController'));
		
		//$CursosModel->purgeDeleted($id); //No se le puede eliminar por lo que esta con la tabla de matricula
		//print_r($cursos);


	}
}
