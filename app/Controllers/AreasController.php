<?php 
namespace App\Controllers;

use App\Models\AreasModel;
use \App\Models\CursosModel;

class AreasController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');

	}
	public function index(){
		$builder = $this->db->table("areas");
		$builder->select('*');
		$areas = $builder->get()->getResult();
		// $areas=array('areas'=>$areas);
		//metodo pager
		$model = new AreasModel();
        $data = [
            'areas' => $model->paginate(10),
			'cantidadusuarios' => $model->obtenerCantidadUsuarios(),
			'porcentajeusuarios' => $model->calcularPorcentajeUsuariosCreadosEsteMes(),
			'cantidadestudiantes' => $model->contarEstudiantes(),
			'porcentajeestudiantes' => $model->calcularPorcentajeEstudiantesCreadosEsteMes(),
			'cantidaddocentes' => $model->contarDocentes(),
			'cantidadcursos' => $model->contarCursos(),
            'pager' => $model->pager,
			'pagi_path' => 'sgcc/areas',
			'content' => 'Areas/AreasListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
	}
	public function home(){
		$builder = $this->db->table("areas");
		$builder->select('*');
		$areas = $builder->get()->getResult();
		// $areas=array('areas'=>$areas);
		//metodo pager
		$model = new AreasModel();
        $data = [
            'areas' => $model->paginate(10),
			'cantidadusuarios' => $model->obtenerCantidadUsuarios(),
			'porcentajeusuarios' => $model->calcularPorcentajeUsuariosCreadosEsteMes(),
			'cantidadestudiantes' => $model->contarEstudiantes(),
			'porcentajeestudiantes' => $model->calcularPorcentajeEstudiantesCreadosEsteMes(),
			'cantidaddocentes' => $model->contarDocentes(),
			'cantidadcursos' => $model->contarCursos(),
            'pager' => $model->pager,
			'pagi_path' => 'sgcc/areas',
			'content' => 'Areas/home'
        ];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
	}
    public function nuevo(){
		$data = [
			'content' => 'Areas/AreasNuevo'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function guardar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ARENOMBRE'=>$request->getPostGet('txtAreas'),
		);

		if($AreasModel->insert($data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		session()->setFlashdata('mensaje', 'Se ha registrado el area de manera correctamente');
		session()->setFlashdata('title', 'Area Registrada Correctamente');
		session()->setFlashdata('status', 'success');
		 
		return redirect()->to(site_url('/AreasController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);

		$data = [
			'areas' => $areas,
			'content' => 'Areas/AreasEditar'
		];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;			
	}

	public function modificar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'AREID'=>$request->getPost('txtCodigo'),
			'ARENOMBRE'=>$request->getPost('txtAreas'),
		);

		$AREID=$request->getPost('txtCodigo');
		if($AreasModel->update($AREID,$data)===false){
			var_dump($AreasModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado el area de manera correctamente');
		session()->setFlashdata('title', 'Area Actualizada Correctamente');
		session()->setFlashdata('status', 'success');
		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);
		
		session()->setFlashdata('mensaje', 'Se ha eliminado el area de manera correctamente');
		session()->setFlashdata('status', 'success');

		$data = [
			'areas' => $areas,
			'content' => 'Areas/AreasBorrar'
		];
		
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;		
	}
		
	public function eliminar() {
		$request = \Config\Services::request();
		$AreasModel = new AreasModel($db);
		$id = $request->getPostGet('txtCodigo');
	
		// Verifica si existen registros relacionados en la base de datos
		$CursosModel = new CursosModel($db);
		$count = $CursosModel->where('AREID', $id)->countAllResults();
	
		if ($count > 0) {
			
			$mensaje = "No se puede eliminar el área porque existen $count cursos relacionados.";
			session()->setFlashdata('mensaje', $mensaje);
		} else {
			if ($AreasModel->delete($id) === false) {
				$message = "Error al eliminar el área: " . print_r($AreasModel->errors(), true);
			} else {
				
			}
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado el area de manera correctamente');
		session()->setFlashdata('title', 'Area Eliminada Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/AreasController'));
	}
	

}
