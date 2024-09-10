<?php 
namespace App\Controllers;

use App\Models\EstudianteModel;
use App\Models\UsuariosModel;
use App\Models\PerfilesModel;
use App\Models\RegistroCursosModel;

class EstudianteController extends BaseController
{
	protected $db;
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$builder = $this->db->table("estudiantes");
		$builder->select('*');
		$builder->where('ESTESTADO', 'ACTIVO');
		$estudiantes = $builder->get()->getResult();
		
		//metodo pager
		$model = new EstudianteModel();
        $data = [
			'estudiantes' => $estudiantes,
			'content' => 'Estudiantes/EstListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function nuevo(){
		$data = [
			'content' => 'Estudiantes/EstNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);		

		return $estructura;
	}

    public function guardar(){
		$EstudianteModel= new EstudianteModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
				'ESTCEDULA'=>$request->getPostGet('txtCedula'),
                'ESTNOMBRE'=>$request->getPostGet('txtNombre'),
                'ESTDIRECCION'=>$request->getPostGet('txtDreccion'),
                'ESTTELEFONO'=>$request->getPostGet('txtTelefono'),
                'ESTCORREO'=>$request->getPostGet('txtCorreo'),
                'ESTESTADO'=>$request->getPostGet('txtEstado'),
		);
		
		if($EstudianteModel->insert($data)===false){
			var_dump($EstudianteModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha registrado el estudiante de manera correctamente');
		session()->setFlashdata('title', 'Estudiante Registrado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/EstudianteController'));
	}

	public function editar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$builder = $this->db->table("estudiantes");
		$builder->select('*');
		$builder->where('ESTID',$id);
		$estudiantes = $builder->get()->getResultArray();

		$data = [
			'content' => 'Estudiantes/EstEditar',
			'estudiantes' => $estudiantes[0]
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;			
	}

	public function modificar(){
		$EstudianteModel= new EstudianteModel($db);
		$request=\Config\Services::request();
		$data=array(
			
			'ESTCEDULA'=>$request->getPostGet('txtCedula'),
			'ESTNOMBRE'=>$request->getPostGet('txtNombre'),
			'ESTDIRECCION'=>$request->getPostGet('txtDreccion'),
			'ESTTELEFONO'=>$request->getPostGet('txtTelefono'),
			'ESTCORREO'=>$request->getPostGet('txtCorreo'),
			'ESTESTADO'=>$request->getPostGet('txtEstado'),
			
		);
		$ESTID=$request->getPostGet('txtCodigo');
		
		if($EstudianteModel->update($ESTID,$data)===false){
			var_dump($EstudianteModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado el estudiante de manera correctamente');
		session()->setFlashdata('title', 'Estudiante Actualizado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/EstudianteController'));
		
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$builder = $this->db->table("estudiantes");
		$builder->select('*');
		$builder->where('ESTID',$id);
		$estudiantes = $builder->get()->getResultArray();
	
		$data = [
			'content' => 'Estudiantes/EstBorrar',
			'estudiantes' => $estudiantes[0]
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;		
	}


		
	public function eliminar(){
		$request = \Config\Services::request();
		$EstudianteModel = new EstudianteModel($db);
		$id = $request->getPostGet('txtCodigo');
		$estudiante = $EstudianteModel->find($id);
	
		$RegistroCursosModel = new RegistroCursosModel($db);
		$count = $RegistroCursosModel->where('ESTID', $id)->countAllResults();
	
		if ($count > 0) {
			$mensaje = "No se puede eliminar el estudiante porque tiene $count cursos asignados.";
    		session()->setFlashdata('mensaje', $mensaje);
			//$mensajeError = "No se puede eliminar el estudiante porque tiene $count cursos asignados.";
		} else {
			/*if ($EstudianteModel->delete($id) === false) {
				$mensajeError = "Error al eliminar el estudiante: " . print_r($EstudianteModel->errors(), true);
			} else {
				$EstudianteModel->purgeDeleted($id);
				return redirect()->to(site_url('/EstudianteController'));
			}*/
			$EstudianteModel->update($id, ['ESTESTADO' => 'INACTIVO']);

		}
		session()->setFlashdata('mensaje', 'Se ha eliminado el estudiante de manera correctamente');
		session()->setFlashdata('title', 'Estudiante Eliminado Correctamente');
		session()->setFlashdata('status', 'success');
		//$data = ['mensajeError' => $mensajeError,	];
	
		return redirect()->to(site_url('/EstudianteController'));
	}
	



	
	public function nuevoreg(){
		$data['validation'] = $this->validator;
		session()->setFlashdata('mensaje', 'Se ha registrado el estudiante de manera correctamente');
			session()->setFlashdata('title', 'Estudiante Registrado Correctamente');
			session()->setFlashdata('status', 'success');
		$estructura =	view('Estudiantes/EstNuevoReg',$data);		
		return $estructura;
		
	}



	
	public function guardarreg(){
		$session = session();
		$request=\Config\Services::request();
        $rules = [
            'txtNombre' => 
			[ 
				'rules' => 'required',
				'errors' => [
					'required' => 'Campo Nombre es requerido'
				]
			],
            'txtCedula' => 
			[ 
				'rules' => 'required|numeric|min_length[10]',
				'errors' => [
					'required' => 'Campo C&eacute;dula es requerido',
					'min_length' => 'M&iacute;nimo 10 digitos...'
				]
			],		
            'txtCorreo' => 
			[ 
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Campo Correo es requerido',
					'valid_email' => 'Digite un correo valido...'
					
				]
				
			],	
		
			
        ];
		

		if ( $this->validate($rules) ) { 
			$EstudianteModel= new EstudianteModel($db);
			
			$data=array(
					
					'ESTCEDULA'=>$request->getPostGet('txtCedula'),
					'ESTNOMBRE'=>$request->getPostGet('txtNombre'),
					'ESTDIRECCION'=>$request->getPostGet('txtDreccion'),
					'ESTTELEFONO'=>$request->getPostGet('txtTelefono'),
					'ESTCORREO'=>$request->getPostGet('txtCorreo'),
					'ESTESTADO'=>'ACTIVO',
			);
			
			if($EstudianteModel->insert($data)===false){
				var_dump($EstudianteModel->errors());
			}

			$UsuariosModel= new UsuariosModel($db);
			$data=array(
				'PERID'=>2,
				'USUNOMBRE'=>$request->getPostGet('txtNombre'),
				'USUCEDULA'=>$request->getPostGet('txtCedula'),
				'USUCLAVE'=>$request->getPostGet('txtCedula'),
				'USUCORREO'=>$request->getPostGet('txtCorreo'),
				'USUESTADO'=>'ACTIVO',	
			);
			if($UsuariosModel->save($data)===false){
				var_dump($UsuariosModel->errors());
			}
			
			
			$estructura = view('Login/Login');
			return $estructura;
			
		} else {
			$data['validation'] = $this->validator;
			
			$estructura =	view('Estudiantes/EstNuevoReg', $data);
			return $estructura;
		}
		
	}
}
