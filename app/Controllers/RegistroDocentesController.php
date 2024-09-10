<?php

namespace App\Controllers;

use App\Models\CursosModel;

use App\Models\RegistroDocentesModel;

class RegistroDocentesController extends BaseController
{

	protected $db;

	public function __construct()
	{

		$this->db = db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$cursos = $this->db->table("cursos c")->get()->getResultArray();
		// print_r($cursos);
		$registros = $this->db->table("cursos c")
			->join('registrodocente rc', 'rc.CURID = c.CURID', 'LEFT')
			->join('docentes d', 'd.DOCID = rc.DOCID', 'LEFT')
			->select('c.CURID, d.DOCID, c.CURNOMBRE, d.DOCNOMBRE, rc.RDOFECHA, rc.RDOESTADO, rc.RDOID AS RDOID')
			->where('rc.RDOID = (SELECT MAX(RDOID) FROM registrodocente WHERE CURID = c.CURID)  OR d.DOCID IS NULL')
			->where('c.CURESTADO', 'ACTIVO')
			->get()
			->getResultArray();


		// print_r($registros);
		$data = [
			'content' => 'RegistroDocentes/Listar',
			'registros' => $registros
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function nuevo()
	{

		$request = \Config\Services::request();
		$idCurso = $request->getPostGet('id');
		log_message('debug', $idCurso);
		$docentes = $this->db->table("docentes")
			->select('*')
			->get()->getResultArray();

		$curso = $this->db->table("cursos")
			->select('*')
			->where('CURID', $idCurso)
			->get()->getResultArray();

		$data = [
			'content' => 'RegistroDocentes/Registrar',
			'cursos' => $curso,
			'docentes' => $docentes,
			'fecha_actual' => date('Y-m-d')
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}


	public function guardar()
	{
		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$request = \Config\Services::request();
		$data = array(
			'DOCID' => $request->getPostGet('docente'),
			'CURID' => $request->getPostGet('curso'),
			// 'RDOFECHA'=>$request->getPostGet('fecha'),
			'RDOFECHA' => date('Y-m-d'),
			'RDOESTADO' => 'ACTIVO'
		);

		if ($RegistroDocentesModel->add($data) === false) {
			var_dump($RegistroDocentesModel->errors());
		}
			session()->setFlashdata('mensaje', 'Se ha registrado el  dcentes de manera correctamente');
			session()->setFlashdata('title', 'Docente Registrado Correctamente');
			session()->setFlashdata('status', 'success');
		//redirige a metodo index
		return redirect()->to(site_url('/RegistroDocentesController'));
	}

	public function eliminar()
	{

		$request = \Config\Services::request();
		$RegistroDocentesModel = new RegistroDocentesModel($db);

		$id = $_GET['id'] ?? null;
		$mensajeEmergente = "";
		if (!$id == NULL) {
			$RegistroDocentesModel->delete($id);
			$RegistroDocentesModel->purgeDeleted($id);
			session()->setFlashdata('mensaje', 'Se ha eliminado el registro dcentes de manera correctamente');
			session()->setFlashdata('title', 'Registro Docentes Se Elimino Correctamente');
			session()->setFlashdata('status', 'success');
			return redirect()->to(site_url('/RegistroDocentesController'));
		} else {
			$mensaje = "No se puede eliminar curso";

			session()->setFlashdata('mensaje', $mensaje);
			
			return redirect()->to(site_url('/RegistroDocentesController'))->with('error', $mensajeEmergente);
		}
	}

	public function editar_view()
	{
		$id = $_GET['id'] ?? null;

		if (!$id == NULL) {
			$request = \Config\Services::request();

			$id = $request->getPostGet('id');

			$RegistroDocentesModel = new RegistroDocentesModel($db);
			$registrodocentes = $RegistroDocentesModel->find($id);
			// var_dump($registrodocentes);
			// die();
			$docentes = $this->db->table("docentes")
				->select('*')
				->get()->getResultArray();

			$curso = $this->db->table("cursos")
				->select('*')
				->where('CURID', $registrodocentes['CURID'])
				->get()->getRow();

			$data = [
				'registroDocente' => $registrodocentes,
				'docentes' => $docentes,
				'curso' => $curso,
				'content' => 'RegistroDocentes/Editar'
			];

			$estructura =	view('Estructura/layout/index', $data);

			return $estructura;
		}

		return redirect()->to(site_url('/RegistroDocentesController'));
	}

	public function actualizar()
	{
		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$request = \Config\Services::request();
		// Obtén los datos del formulario o solicitud
		$data = [
			'DOCID' => $request->getPostGet('cbxDocente'),
			// 'CURID'=>$request->getPostGet('cbxCurso'),
			// 'RDOFECHA'=>$request->getPostGet('txtFecha'),
			// 'RDOESTADO'=> 'ACTIVO'
		];
		$RDOID = $request->getPostGet('txtRegistroDocId');

		// Llama al método de actualización del modelo
		$result = $RegistroDocentesModel->update($RDOID, $data);

		// var_dump([$result, $data]);

		if ($result === false) {
			var_dump($RegistroDocentesModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha modificado el registro dcentes de manera correctamente');
		session()->setFlashdata('title', 'Registro Docentes Se Modificado Correctamente');
		session()->setFlashdata('status', 'success');

		return redirect()->to(site_url('/RegistroDocentesController'));
	}


	/*
    public function nuevo()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Areas/AreasNuevo').
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;
	}

    public function guardar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ARENOMBRE'=>$request->getPostGet('txtAreas'),
		);
		//var_dump($data);
		if($AreasModel->insert($data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		//var_dump($areas);
		$data['areas']=$areas;
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Areas/AreasEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;			
	}

	public function modificar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'AREID'=>$request->getPost('txtCodigo'),
			'ARENOMBRE'=>$request->getPost('txtArea'),
		);
		$AREID=$request->getPost('txtCodigo');
		if($AreasModel->update($AREID,$data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		//var_dump($areas);
		$data['areas']=$areas;
		
		$estructura=	view('Estructura/Header').
		view('Estructura/Menu').
		view('Areas/AreasBorrar',$data).
		view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
		return $estructura;		
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$AreasModel=new AreasModel($db);
		$id=$request->getPostGet('txtCodigo');
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		
		if($AreasModel->delete($id)===false){
			print_r($AreasModel->errors());
		}else{
			$AreasModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));	
	}
*/

	public function historial()
	{

		$request = \Config\Services::request();
		$cursoId = $request->getPostGet('id');

		$docentes = $this->db->table("docentes")
			->select('*')
			->get()->getResultArray();

		// Cargar el modelo de RegistroDocentesModel
		$cursos = $this->db->table("cursos c")->get()->getResultArray();
		// print_r($cursos);
		$registros = $this->db->table("cursos c")
			->join('registrodocente rc', 'rc.CURID  = c.CURID ', 'LEFT')
			->join('docentes d', 'd.DOCID  = rc.DOCID ', 'LEFT')
			->select('c.CURID, d.DOCID, c.CURNOMBRE, d.DOCNOMBRE,rc.RDOFECHA,rc.RDOESTADO,RC.RDOID')
			->where('c.CURID', $cursoId) // Agrega la condición para filtrar por el ID del curso
			->orderBy('RC.RDOID', 'DESC') // Ordena por RDOID en orden descendente

			->get()->getResultArray();
		// print_r($registros);
		$data = [
			'content' => 'RegistroDocentes/historial',
			'registros' => $registros,
			'docentes' => $docentes
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function guardar_historial()
	{
		$RegistroDocentesModel = new RegistroDocentesModel($db);
		$request = \Config\Services::request();
		$docenteID = $request->getPostGet('docente');
		$cursoID = $request->getPostGet('curid');

		// Consulta para obtener el valor máximo de RDOID
		$maxRDOIDQuery = $RegistroDocentesModel
			->selectMax('RDOID')
			->where('CURID', $cursoID)
			->get()
			->getRowArray();

		$maxRDOID = $maxRDOIDQuery['RDOID'];

		if ($maxRDOID !== null) {
			// Actualiza el registro con 'RDOID' máximo a 'INACTIVO'
			$RegistroDocentesModel
				->where('RDOID', $maxRDOID)
				->set(['RDOESTADO' => 'INACTIVO'])
				->update();
			// Luego, inserta el nuevo registro
			$data = array(
				'DOCID' => $docenteID,
				'CURID' => $cursoID,
				'RDOFECHA' => date('Y-m-d'),
				'RDOESTADO' => 'ACTIVO'
			);

			if ($RegistroDocentesModel->insert($data) === false) {
				var_dump($RegistroDocentesModel->errors());
			}
		}

		session()->setFlashdata('mensaje', 'Se ha modificado el historial  manera correctamente');
		session()->setFlashdata('title', 'Historial Registrado Correctamente');
		session()->setFlashdata('status', 'success');

		// Redirige a la función index
		return redirect()->to(site_url('/RegistroDocentesController/historial?id=' . $cursoID));
	}
}
