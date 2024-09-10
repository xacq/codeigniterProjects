<?php

namespace App\Controllers;

use App\Models\AsistenciasModel;
use App\Models\DocentesModel;
use App\Models\CursosModel;

class AsistenciasController extends BaseController
{
	protected $db;
	public function __construct()
	{

		$this->db = db_connect(); // loading database 
		helper('form');
	}

	public function index()
	{
		$session = session();
		$perfilId = $session->get('perfilId');

		$query = $this->db->table("cursos cur");
		$query->join('registrodocente rdo', 'cur.CURID = rdo.CURID');

		if ($perfilId <> 1) {
			$usuCedula = $session->get('usuCedula');
			$docenteModel = new DocentesModel($db);
			$docente = $docenteModel->where('DOCCEDULA', $usuCedula)->first();
			$DOCID = $docente['DOCID'];
			$query->where('rdo.DOCID =', $DOCID);
		}

		$query->select('cur.*, rdo.DOCID');
		$cursos = $query->get()->getResultArray();

		$data = [
			'content' => 'Asistencias/Listar',
			'cursos' => $cursos
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function indexEstudiantes()
	{
		$request = \Config\Services::request();
		$CURID = $request->getPostGet('id');

		$query = $this->db->table("matriculas mat");
		$query->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID');
		$query->join('estudiantes est', 'est.ESTID = rcu.ESTID');
		$query->where('rcu.CURID =', $CURID);
		$query->select('est.*, rcu.*, mat.MATID');
		$estudiantes = $query->get()->getResultArray();

		$CursosModel = new CursosModel($db);
		$curso = $CursosModel->find($CURID);

		$data = [
			'content' => 'Asistencias/ListarEstudiantes',
			'estudiantes' => $estudiantes,
			'curso' => $curso,
			'fecha_actual' => date('Y-m-d'),
			'curso_id' => $CURID,
		];

		$estructura =	view('Estructura/layout/index', $data);
		return $estructura;
	}


	public function nuevo()
	{
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$data = [];
		$alumno = $this->db->table("matriculas t1")
			->select('*')
			->join('registrocursos t3 ', 't3.RCUID = t1.RCUID ')
			->join('cursos t4 ', 't4.CURID = t3.CURID ')
			->join('estudiantes t5 ', 't5.ESTID = t3.ESTID ')
			->where('t1.MATID = ', $id)
			->get()->getResultArray();
		$data['alumno'] = $alumno;
		$estructura =	view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Asistencias/Registrar', $data) .
			view('Estructura/Footer');

		return $estructura;
	}

	public function guardar()
	{
		$AsistenciasModel = new AsistenciasModel($db);
		$request = \Config\Services::request();
		$ESTIDS = $request->getPostGet('ESTID');
		$ASISESTADOS = $request->getPostGet('ASIESTADO');
		$MATERIAID = $request->getPostGet('MATID');
		$txtFecha_Final = $request->getPostGet('txtFecha_Final');

		// Convertir la fecha al formato 'Y-m-d' (año-mes-día)
		$fechaNormalizada = date('Y-m-d', strtotime($txtFecha_Final));
		//var_dump( $MATERIAID);
		// var_dump($ESTIDS);
		// var_dump($ASISESTADOS);
		// die();

		for ($i = 0; $i < count($ESTIDS); $i++) {
			$data = array(
				'MATID' => $MATERIAID,
				'ASIFECHA' => $fechaNormalizada,
				'ASIOBSERVACION' => $ESTIDS[$i],
				'ASIESTADO' => $ASISESTADOS[$i],
			);

			$AsistenciasModel->add($data);
		}

		// $data = array(
		// 	'MATID' => $MATID,
		// 	'ASIFECHA'=>$request->getPostGet('fecha'),
		// 	'ASIESTADO'=>$request->getPostGet('asistencia'),
		// 	'ASIOBSERVACION'=>$request->getPostGet('observacion'),
		// );
		session()->setFlashdata('mensaje', 'Se ha registrado la asistencia manera correctamente');
		session()->setFlashdata('title', 'Asistencia Registrada Correctamente');
		session()->setFlashdata('status', 'success');

		// $AsistenciasModel->add($data);

		//redirige a metodo index
		return redirect()->to(site_url('/AsistenciasController'));
	}

	public function eliminar()
	{
		$request = \Config\Services::request();
		$AsistenciaModel = new AsistenciasModel($db);
		$id = $request->getPostGet('id');
		//$asistencia = $AsistenciaModel->find($id);
		if ($AsistenciaModel->delete($id) === false) {
			print_r($AsistenciaModel->errors());
		} else {
			$AsistenciaModel->purgeDeleted($id);
		}
		//recargar apgina
		return redirect()->to(site_url('/AsistenciasController'));
	}

	public function mostrarPDFasistencias()
	{
		require('./public/fpdf/fpdf.php');

		$request = \Config\Services::request();
		$CURID = $request->getPostGet('id');

		$query = $this->db->table("matriculas mat");
		$query->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID');
		$query->join('estudiantes est', 'est.ESTID = rcu.ESTID');
		$query->where('rcu.CURID =', $CURID);
		$query->select('est.*, rcu.*, mat.MATID');
		$estudiantes = $query->get()->getResultArray();

		// Obtener el conteo de estudiantes
		$contarEstudiantes = $this->db->table("registrocursos rcu");
		$contarEstudiantes->where('rcu.CURID =', $CURID);
		$contarEstudiantes->select('COUNT(DISTINCT rcu.ESTID) as TotalEstudiantes');
		$totalEstudiantes = $contarEstudiantes->get()->getRow()->TotalEstudiantes;

		$CursosModel = new CursosModel($db);
		$curso = $CursosModel->find($CURID);

		$AsistenciasModel = new AsistenciasModel($db);
		
		$curso_name = $curso['CURNOMBRE'];
		$m_Estudiantes = $totalEstudiantes;
		$modalidad = $curso['CURMODALIDAD'];
		$fech_ini = $curso['CURFECINICIO'];
		$fech_fin = $curso['CURFECFINAL'];
		$activo = $curso['CURESTADO'];

		/****************************************************************/
		//Incio
		/****************************************************************/
		
		$pdf = new \FPDF('L', 'mm', 'A4');
		
		
		$pdf->AddPage();
		$pdf->SetMargins(10, 10, 10);
		$pdf->Image('./public/img/logo.jpeg',10,1,28);
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(277, 7, "SISTEMA DE GESTION DE CENTRO DE CAPACITACION", 0, 0, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(277, 7, "REPORTE DE ASISTENCIAS", 0, 0, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Ln();$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Curso: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($curso_name), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("No. Estudiantes: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($m_Estudiantes), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Modalidad: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($modalidad), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Estado: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($activo), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha inicio: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($fech_ini), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha fin: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($fech_fin), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode(date("Y-m-d")), 1, 1, 'L');

		$pdf->Ln();


		$pdf->SetFont('Arial', 'B', 6);

		$pdf->Cell(40, 5, "Estudiantes", 1, 0, 'C');

		$asistencias = $AsistenciasModel->where('ASIOBSERVACION', $estudiantes[0]['ESTID'])->findAll();

		$pdf->SetFont('Arial', '', 3.8);
		foreach ($asistencias as $asistencia) {
			$fecha = $asistencia['ASIFECHA'];
			$timestamp = strtotime($fecha);
			$dia = date('d/m', $timestamp);

			$pdf->Cell(3.8, 5, $dia, 1, 0, 'C');
		}

		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(8, 5, "H.Asist", 1, 0, 'C');
		$pdf->Cell(6.5, 5, "%", 1, 1, 'C');


		foreach ($estudiantes as $estudiante) {
			$nombre_estudiante = $estudiante['ESTNOMBRE'] ;

			$asistencias = $AsistenciasModel->where('ASIOBSERVACION', $estudiante['ESTID'])->findAll();

			$estados = [];
			foreach ($asistencias as $asistencia) {
				$estados[] = $asistencia['ASIESTADO'];
			}

			$total_horas = count($estados) * 2;
			$total_horas_asistidas = array_sum($estados);

			$porcetanje = 0;
			if ($total_horas > 0) {
				$porcetanje = round((($total_horas_asistidas / $total_horas) * 100), 2);
			}

			$pdf->SetFont('Arial', '', 5);
			$pdf->Cell(40, 4, utf8_decode($nombre_estudiante), 1, 0, 'L');

			foreach ($asistencias as $asistencia) {
				$pdf->Cell(3.8, 4, $asistencia['ASIESTADO'], 1, 0, 'C');
			}

			$pdf->Cell(8, 4, utf8_decode($total_horas_asistidas), 1, 0, 'C');
			$pdf->Cell(6.5, 4, utf8_decode($porcetanje . '%'), 1, 0, 'C');

			$pdf->Ln();
		}

		$this->response->setHeader('Content-Type', 'application/pdf');

		$pdf->Output("asistencias_" . date("d_m_Y") . ".pdf", "I");
	}

	public function mostrarPDFasistenciasGeneral()
	{
		require('./public/fpdf/fpdf.php');

		$request = \Config\Services::request();
		$CURID = $request->getPostGet('id');

		$query = $this->db->table("matriculas mat");
		$query->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID');
		$query->join('estudiantes est', 'est.ESTID = rcu.ESTID');
		$query->where('rcu.CURID =', $CURID);
		$query->select('est.*, rcu.*, mat.MATID');
		$estudiantes = $query->get()->getResultArray();

		// Obtener el conteo de estudiantes
		$contarEstudiantes = $this->db->table("registrocursos rcu");
		$contarEstudiantes->where('rcu.CURID =', $CURID);
		$contarEstudiantes->select('COUNT(DISTINCT rcu.ESTID) as TotalEstudiantes');
		$totalEstudiantes = $contarEstudiantes->get()->getRow()->TotalEstudiantes;

		$CursosModel = new CursosModel($db);
		$curso = $CursosModel->find($CURID);

		$AsistenciasModel = new AsistenciasModel($db);

		$curso_name = $curso['CURNOMBRE'];
		$m_Estudiantes = $totalEstudiantes;
		$modalidad = $curso['CURMODALIDAD'];
		$fech_ini = $curso['CURFECINICIO'];
		$fech_fin = $curso['CURFECFINAL'];
		$activo = $curso['CURESTADO'];

		/****************************************************************/
		//Incio
		/****************************************************************/

		$pdf = new \FPDF('L', 'mm', 'A4');

		$pdf->AddPage();
		$pdf->SetMargins(10, 10, 10);
		$pdf->Image('./public/img/logo.jpeg',10,1,28);
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(277, 7, "SISTEMA DE GESTION DE CENTRO DE CAPACITACION", 0, 0, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(277, 7, "REPORTE DE ASISTENCIAS", 0, 0, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Ln();$pdf->Ln();$pdf->Ln();


		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Curso: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($curso_name), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("No. Estudiantes: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($m_Estudiantes), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Modalidad: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($modalidad), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Estado: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($activo), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha inicio: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($fech_ini), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha fin: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode($fech_fin), 1, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(40, 5, utf8_decode("Fecha: "), 1, 0, 'R');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, utf8_decode(date("Y-m-d")), 1, 1, 'L');

		$pdf->Ln();


		$pdf->SetFont('Arial', 'B', 9);

		$pdf->Cell(60, 5, "Estudiantes", 1, 0, 'C');
		$pdf->Cell(22, 5, "Total Horas", 1, 0, 'C');
		$pdf->Cell(25, 5, "Horas Asistidas", 1, 0, 'C');
		$pdf->Cell(22, 5, "%", 1, 0, 'C');
		$pdf->Cell(22, 5, "Estado", 1, 1, 'C');

		$pdf->SetFont('Arial', '', 9);

		foreach ($estudiantes as $estudiante) {
			$nombre_estudiante = $estudiante['ESTNOMBRE'];

			$asistencias = $AsistenciasModel->where('ASIOBSERVACION', $estudiante['ESTID'])->findAll();

			$estados = [];
			foreach ($asistencias as $asistencia) {
				$estados[] = $asistencia['ASIESTADO'];
			}

			$total_horas = count($estados) * 2;
			$total_horas_asistidas = array_sum($estados);

			$porcetanje = 0;
			if ($total_horas > 0) {
				$porcetanje = round((($total_horas_asistidas / $total_horas) * 100), 2);
			}

			// Validación del porcentaje
			if ($porcetanje > 70) {
				$estado = 'Aprobado';
				$color = array(0, 255, 0); // Verde
			} else {
				$estado = 'Reprobado';
				$color = array(255, 0, 0); // Rojo (puedes cambiar el color según tus necesidades)
			}

			// Configurar el color del texto

			$pdf->SetTextColor(0, 0, 0);

			$pdf->Cell(60, 4, utf8_decode($nombre_estudiante), 1, 0, 'L');
			$pdf->Cell(22, 4, utf8_decode($total_horas), 1, 0, 'C');
			$pdf->Cell(25, 4, utf8_decode($total_horas_asistidas), 1, 0, 'C');
			$pdf->Cell(22, 4, utf8_decode($porcetanje . '%'), 1, 0, 'C');
			$pdf->SetTextColor($color[0], $color[1], $color[2]);
			$pdf->Cell(22, 4, utf8_decode($estado), 1, 0, 'C');

			$pdf->SetTextColor(0, 0, 0);



			$pdf->Ln();
		}

		$this->response->setHeader('Content-Type', 'application/pdf');

		$pdf->Output("asistencias_" . date("d_m_Y") . ".pdf", "I");
	}
}
