<?php 
namespace App\Controllers;

use App\Models\RegistroCursosModel;
use App\Models\MatriculasModel;
use App\Models\PagosModel;

class MatriculasController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$model = new RegistroCursosModel();
		$estadoMat = "ACTIVO";
		$matriculasData = $this->db->table("matriculas t1")
        ->join('registrocursos t2', 't2.RCUID = t1.RCUID')
		->join('cursos t3', 't2.CURID = t3.CURID')
		->join('estudiantes t4', 't2.ESTID = t4.ESTID')
		->join('pagos t5', 't1.MATID = t5.MATID')
		->where('t1.MATESTADO', $estadoMat)
		->groupBy('t1.RCUID')
		->get();
		/*
       foreach ($matriculasData->getResult() as $matriculas) {
			$pagos = $this->db->table("pagos")
			->where('MATID', $matriculas->MATID)->orderBy('PAGFECREGPAGO', 'DESC')
			->get()->getResultArray();
			$matriculas->pagos = $pagos;
		}*/
		//$data['matriculados'] = $matriculasData->getResultArray();

		$data = [
			'matriculados' => $matriculasData->getResultArray(),
			'matriculas' => $model->paginatePendientes(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/MatriculasController/pendientes',
			'content' => 'Matriculas/pendientes'			
		];
		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
	}
	public function pendientes()
	{
		$model = new RegistroCursosModel();
		$estadoMat = "ACTIVO";
		$matriculasData = $this->db->table("matriculas t1")
        ->join('registrocursos t2', 't2.RCUID = t1.RCUID')
		->join('cursos t3', 't2.CURID = t3.CURID')
		->join('estudiantes t4', 't2.ESTID = t4.ESTID')
		->join('pagos t5', 't1.MATID = t5.MATID')
		->where('t1.MATESTADO', $estadoMat)
		->groupBy('t1.RCUID')
		->get();
		/*
       foreach ($matriculasData->getResult() as $matriculas) {
			$pagos = $this->db->table("pagos")
			->where('MATID', $matriculas->MATID)->orderBy('PAGFECREGPAGO', 'DESC')
			->get()->getResultArray();
			$matriculas->pagos = $pagos;
		}*/
		//$data['matriculados'] = $matriculasData->getResultArray();

		$data = [
			'matriculados' => $matriculasData->getResultArray(),
			'matriculas' => $model->paginatePendientes(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/MatriculasController/pendientes',
			'content' => 'Matriculas/pendientes'			
		];
		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
	}

	public function matriculaPendiente(){

		$request=\Config\Services::request();
		$id = $request->getPostGet('id');
		$pendiente = $this->db->table("registrocursos t1")
		->join('cursos t2', 't1.CURID = t2.CURID')
		->join('estudiantes t3', 't3.ESTID  = t1.ESTID')
		->where('t1.RCUID', $id)
        ->get()
        ->getResultArray();

		$estudiante = '';
		$idCurso = "";
		foreach ($pendiente as $p) {
			$estudiante 	= $p['ESTNOMBRE'];
			$idCurso 		= $p['RCUID'];
			$precioCurso 	= $p['CURPRECIO'];
		}

		$data = [
			'estudiante' => $estudiante,
			'idCurso' => $idCurso,
			'pendiente' => $pendiente,
			'precioCurso' => $precioCurso,
			'content' => 'Matriculas/matricular'			
		];
		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;		
	}


	public function matricularAlumno(){

		$request=\Config\Services::request();
		$MatriculasModel = new MatriculasModel();
		$RegistroCursosModel = new RegistroCursosModel();
		$PagosModel = new PagosModel();
		//get data
		$idCurso = $request->getPostGet('idCurso');
		$precioCurso = $request->getPostGet('precioCurso');
		$tipoPago = $request->getPostGet('tipoPago');
		$numeroCuotas = $request->getPostGet('numeroCuotas');
		$fecha = $request->getPostGet('fecha');
		$estadoMatricula = $request->getPostGet('estadoMatricula');
		$estado = "ACTIVO";
		$valorCuota = $precioCurso / $numeroCuotas;
		//add data matriculas
		$data = array(
			'RCUID' => $idCurso,
			'MATTIPPAGO' => $tipoPago,
			'MATCUOTAS' => $numeroCuotas,
			'MATFECHA' => $fecha,
			'MATESTPAGO' => $estadoMatricula,
			'MATESTADO' => $estado
		);
		$MatriculasModel->add($data);
		$idMatricula = $this->db->insertID();

		//add data pagos
		$mesProximo = "";
		$contador = 0;
		if($numeroCuotas > 1){
			for ($i = 1; $i <= $numeroCuotas; $i++) {
				$data = array(
					'MATID' => $idMatricula,
					'PAGFECHA' => $fecha,
					'PAGFECREGPAGO' => date("Y-m-d",strtotime($fecha."+ ".$i." month")) ,
					'PAGESTADO' => 'PENDIENTE',
					'PAGCUOTA' => $valorCuota,
					'PAGNUMCUOTA' => $i
				);
				//$pagosModel es el modelo de
				$PagosModel->add($data);
				//redirige a metodo index
		session()->setFlashdata('mensaje', 'Se ha registrado el area de manera correctamente');
		session()->setFlashdata('title', 'Area Registrada Correctamente');
		session()->setFlashdata('status', 'success');
			}
		}else{
			$data = array(
				'MATID' => $idMatricula,
				'PAGFECHA' => $fecha,
				'PAGFECREGPAGO' => $fecha,
				'PAGESTADO' => 'PENDIENTE',
				'PAGCUOTA' => $valorCuota,
				'PAGNUMCUOTA' => $numeroCuotas
			);
			$PagosModel->add($data);
		}
		
		//update estado registro cursos
		$dataRegistroCurso = array(
			'RCUESTADO'=> 'INACTIVO'
		);
		if($RegistroCursosModel->update($idCurso,$dataRegistroCurso)===false){
			var_dump($RegistroCursosModel->errors());
		}
		return redirect()->to(site_url('/MatriculasController/pendientes'));
	}

}
