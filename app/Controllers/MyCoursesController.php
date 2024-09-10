<?php 
namespace App\Controllers;

use App\Models\RegistroCursosModel;
use App\Models\EstudianteModel;

class MyCoursesController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$session=session();
		$usuid=$session->get('usuId');
		$usuCedula=$session->get('usuCedula');

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->where('ESTCEDULA', $usuCedula)->first();
		$estid = $estudiante['ESTID'];
		
		$builder = $this->db->query("select * from registrocursos as rg join cursos as c on c.CURID=rg.CURID where ESTID=$estid");
		$registrocursos = $builder->getResult();
		// var_dump($registrocursos);
		// die();
		$builder = $this->db->query("select c.* from cursos as c where c.CURID not in (select rc.CURID from registrocursos as rc where ESTID='$estid') and c.CURESTADO = 'ACTIVO'");
		$cursos = $builder->getResult();

        $data = [
            'registrocursos' => $registrocursos,
            'cursos' => $cursos,
			'content' => 'DashboardEstudiante/MyCoursesView'
        ];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;

	}

	public function matricular(){
		$registrocursos= new RegistroCursosModel($db);
		$request=\Config\Services::request();
		$session=session();
		$usuid=$session->get('usuId');
		$usuCedula=$session->get('usuCedula');

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->where('ESTCEDULA', $usuCedula)->first();

		 $data=array(
			'CURID'=>$request->getPostGet('curid'),	
			'ESTID'=>$estudiante['ESTID'],	
			'RCUFECHA'=> date('Y-m-d'),
			'RCUESTADO'=>'ACTIVO',
		);
		
		if($registrocursos->save($data)===false){
			var_dump($registrocursos->errors());
		}
		return redirect()->to(site_url('/MyCoursesController'));

	}

	public function unmatricular(){
		$request=\Config\Services::request();

		$registrocursos=new RegistroCursosModel($db);
		$id=$request->getPostGet('curid');
		
		if($registrocursos->delete($id)===false){
			print_r($registrocursos->errors());
		}else{
			$registrocursos->purgeDeleted($id);
		}



		return redirect()->to(site_url('/MyCoursesController'));

	}
}