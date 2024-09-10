<?php 
namespace App\Controllers;

use App\Models\RegistroCalificacionesModel;
use App\Models\CalificacionesItemsModel;
use App\Models\MatriculasModel;
use App\Models\DocentesModel;
use App\Models\CalificacionesModel;
use App\Models\CursosModel;
use App\Models\EstudianteModel;

class RegistroCalificacionesController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}

	public function index()
	{
		$session=session();
		$perfilId=$session->get('perfilId');
		
		$query = $this->db->table("cursos cur");
		$query->join('registrodocente rdo', 'cur.CURID = rdo.CURID');

		if ( $perfilId <> 1 ) {
			$usuCedula=$session->get('usuCedula');
			$docenteModel=new DocentesModel($db);
			$docente=$docenteModel->where('DOCCEDULA', $usuCedula)->first();
			$DOCID = $docente['DOCID'];			
			$query->where('rdo.DOCID =', $DOCID);
		}
		
		$query->select('cur.*, rdo.DOCID');
		$cursos = $query->get()->getResultArray();

		$data = [
			'content' => 'RegistroCalificaciones/Listar',
			'cursos' => $cursos
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}

	public function indexEstudiantes()
	{	
		$request=\Config\Services::request();
		$CURID = $request->getPostGet('id');

		$query = $this->db->table("matriculas mat")
		->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID')
		->join('estudiantes est', 'est.ESTID = rcu.ESTID')
		->join('registrocalificaciones reg', 'mat.MATID = reg.MATID', 'left')
		->where('rcu.CURID', $CURID)
		->select('est.ESTID, est.ESTNOMBRE, est.ESTCEDULA, est.ESTCORREO,mat.MATID,reg.RCAFECHA, GROUP_CONCAT(reg.RCANOTA ORDER BY reg.RCANOTA ASC SEPARATOR ", ") AS Notas')
		->groupBy('est.ESTID, est.ESTNOMBRE, est.ESTCEDULA, est.ESTCORREO,reg.RCAFECHA')
		->get();

		$estudiantes = $query->getResultArray();
	

		$CursosModel=new CursosModel($db);
        $curso=$CursosModel->find($CURID);
		
		$RegistroCalificacionesModel= new RegistroCalificacionesModel($db);
		$notasITEMS = $RegistroCalificacionesModel->obtenerCalificacionesItems();
		$notamax = $RegistroCalificacionesModel->notamax();
		// Recorrer los resultados de estudiantes
		foreach ($estudiantes as $estudiante) {
			$MATID = $estudiante['MATID'];
			$Notas = $estudiante['Notas'];
			
			// Verificar si las notas son NULL para el estudiante actual
			if ($Notas === NULL) {
				// Recorrer los resultados de calificaciones items y obtener ITEID
				foreach ($notasITEMS as $nota) {
					$ITEID = $nota['ITEID'];
					
					// Insertar la nota en la base de datos
					$RegistroCalificacionesModel->insertarNota($MATID, $ITEID, 0);
				}
			} 
		}
		$query = $this->db->table("matriculas mat")
		->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID')
		->join('estudiantes est', 'est.ESTID = rcu.ESTID')
		->join('registrocalificaciones reg', 'mat.MATID = reg.MATID', 'left')
		->where('rcu.CURID', $CURID) 
		->select("est.ESTID, est.ESTNOMBRE, est.ESTCEDULA, est.ESTCORREO, mat.MATID,reg.RCAFECHA, GROUP_CONCAT(CONCAT(reg.RCAID, ':', reg.RCANOTA) ORDER BY reg.RCAID ASC SEPARATOR ', ') AS Notas")
		->groupBy("est.ESTID, est.ESTNOMBRE, est.ESTCEDULA, est.ESTCORREO,mat.MATID,reg.RCAFECHA")
		->get();
	
		$estudiantes = $query->getResultArray();
		$data = [
			'content' => 'RegistroCalificaciones/ListarEstudiante',
			'estudiantes' => $estudiantes,
			'curso' => $curso,
			'notas' => $notasITEMS,	
			'notamax' => $notamax,
			'tipoCalificacion' => $notasITEMS[0]['CITTIPO']
		];
		

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}	

	public function indexCalificacion()
	{	
		$request=\Config\Services::request();
		$ESTID = $request->getPostGet('id');
		$MATID = $request->getPostGet('mat');

		$CalificacionesModel = new CalificacionesModel($db);
		$calificacionData = $CalificacionesModel->findAll();

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->find($ESTID);

		$data = [
			'content' => 'RegistroCalificaciones/ListarCalificacion',
			'calificaciones' => $calificacionData,
			'estudiante' => $estudiante,
			'MATID' => $MATID,
			'ESTID' => $ESTID,
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}

	public function viewItem() 
	{
		$request = \Config\Services::request();
		$CALID = $request->getPostGet('calificacion');
		$MATID = $request->getPostGet('MATID');
		$ESTID = $request->getPostGet('ESTID');

		$calificacionesItems = $this->db->table("calificacionesitems t1")
        ->join('calificaciones t2', 't2.CALID = t1.CALID')
        ->join('items t3', 't3.ITEID = t1.ITEID ')
		->join('registrocalificaciones registro', 'registro.CITID = t1.CITID', 'left')
		->where('t1.CALID ', $CALID)
		->select('t3.ITENOMBRE, t1.CITPONDERACION,  t1.CITTIPO, registro.RCANOTA, registro.RCAEQUIVALENTE, registro.RCAOBSERVACION, t1.CITID')
        ->get()
        ->getResultArray();	
		
		$data = [
			'calificacionesItems' => $calificacionesItems,
			'fecha_actual' => date('Y-m-d'),
			'MATID' => $MATID,		
			'ESTID' => $ESTID,			
		];		
		
		$html = view('RegistroCalificaciones/tableItemsCalificaciones', $data);

		echo json_encode(array(
			"status" => TRUE,
			"html" => $html
		));		

	}

	public function nuevo(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		//listado items
		$listadoItems = $this->db->table("calificacionesitems t1")
									->select('*')
									->join('items t3', 't1.ITEID = t3.ITEID')
									->get()->getResultArray();
		$data['listadoItems']= $listadoItems;
		//alumno 
		$alumno = $this->db->table("matriculas t1")
									->select('*')
									->join('registrocursos t2', 't2.RCUID = t1.RCUID')
									->join('cursos t3', 't2.CURID = t3.CURID')
									->join('estudiantes t4', 't2.ESTID = t4.ESTID')
									->where('t1.MATID = ', $id )
									->get()->getResultArray();
		foreach($alumno as $a){
			$estudiante = $a['ESTNOMBRE'];
			$curso = $a['CURNOMBRE'];
		}			
		$data['estudiante'] = $estudiante;
		$data['matriculaId']= $id;
		$data['curso']= $curso;
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('RegistroCalificaciones/Registrar', $data).
						view('Estructura/Footer');
		return $estructura;			
	}

	public function guardar(){

		$request=\Config\Services::request();
		$RegistroCalificacionesModel= new RegistroCalificacionesModel($db);
		
		$ESTID = $request->getPostGet('ESTID');
		$MATID = $request->getPostGet('MATID');
		$txtFecha_Final = $request->getPostGet('txtFecha_Final');

		// Convertir la fecha al formato 'Y-m-d' (año-mes-día)
		$fechaNormalizada = date('Y-m-d', strtotime($txtFecha_Final));

		$data=array(
			'MATID'=>$MATID,
			'CITID'=>$request->getPostGet('CITID'),
			'RCAFECHA'=>$fechaNormalizada,
			'RCANOTA'=>$request->getPostGet('nota'),
			'RCAEQUIVALENTE'=>$request->getPostGet('equivalente'),
			'RCAOBSERVACION'=>$request->getPostGet('observacion'),
			'RCAESTADO'=>'ACTIVO',
		);
		
		if($RegistroCalificacionesModel->add($data)===false){
			var_dump($RegistroCalificacionesModel->errors());
			
		}
			
		//redirige a metodo index
		return redirect()->to(site_url('/RegistroCalificacionesController/indexCalificacion?id='.$ESTID.'&mat='.$MATID ));	
	}

	public function eliminar(){

		$request=\Config\Services::request();
		$RegistroCalificacionesModel = new RegistroCalificacionesModel($db);
		$id = $request->getPostGet('id');
		
		if($RegistroCalificacionesModel->delete($id)===false){
			print_r($RegistroCalificacionesModel->errors());
		}else{
			$RegistroCalificacionesModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/RegistroCalificacionesController'));	
	}

	//----------------------registrarNotas------------------------

	



public function registrarNotas()
	{
		$request = \Config\Services::request();
		$CURID = $request->getPost('CURID');
		
		$cantidadNotas = $request->getPost('cantidaditems');
		$APROB = $request->getPost('aprobado');
		$txtFecha_Final = $request->getPost('txtFecha_Final');
		// Obtén todas las entradas POST que comienzan con 'reg_'
		$inputData = $request->getPost();
		$notasActualizadas = [];
		// Obtén todos los RCAID enviados en el formulario
		$rcaids = [];
	
		foreach ($inputData as $inputName => $inputValue) {
			// Verifica si el nombre de entrada comienza con 'reg_'
			if (strpos($inputName, 'reg_') === 0) {
				// Extrae el RCAID de la entrada
				$RCAID = substr($inputName, strlen('reg_'));
				$rcaids[] =$RCAID;
				// Agrega el RCAID y su valor correspondiente al arreglo de notas actualizadas
				$notasActualizadas[$RCAID] = $inputValue;
			}
		}
		// Obtén todos los datos POST
				$postData = $request->getPost();

				// Inicializa un arreglo para almacenar los valores de equivalente y MATID
				$equivalenteData = [];

				// Recorre los datos POST para identificar los campos de equivalente
				foreach ($postData as $fieldName => $fieldValue) {
					// Verifica si el campo comienza con 'equivalente_'
					if (strpos($fieldName, 'equivalente_') === 0) {
						// Extrae el valor MATID del nombre del campo
						$MATID = substr($fieldName, strlen('equivalente_'));

						// Agrega el valor de equivalente y MATID al arreglo
						$equivalenteData[$MATID] = $fieldValue;
					}
				}

				$RegistroCalificacionesModel = new RegistroCalificacionesModel();

		foreach ($notasActualizadas as $RCAID => $nota) {
			// Llama a la función del modelo para obtener los datos por RCAID específico
					$resultado = $RegistroCalificacionesModel->obtenerNotasPorRCAIDs([$RCAID]);

					// Supongamos que $resultado contiene un solo elemento, ya que estás buscando un RCAID específico
					if (!empty($resultado) && count($resultado) == 1) {
						$MATID = $resultado[0]['MATID']; // Obtiene el MATID del resultado
					}
					if (array_key_exists($MATID, $equivalenteData)) {
						$equivalente = $equivalenteData[$MATID]; // Obtiene el equivalente utilizando el MATID
					}
					if (floatval($APROB) <= floatval($equivalente)) {
						$observacion = "Aprobado";
					} else {
						$observacion = "Reprobado";
					}
			// Realiza la actualización en la base de datos para cada RCAID
			$RegistroCalificacionesModel->actualizarNota($RCAID, $nota,$equivalente,$observacion,$txtFecha_Final);
		}	
		session()->setFlashdata('mensaje', 'Se ha registrado las notas de manera correctamente');
		session()->setFlashdata('title', 'Notas Registradas Correctamente');
		session()->setFlashdata('status', 'success');
		
		// Redirecciona a donde necesites después de actualizar las notas
		return redirect()->to(base_url('/RegistroCalificacionesController'));
	}

	
}
