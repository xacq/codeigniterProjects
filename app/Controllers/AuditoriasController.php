<?php 
namespace App\Controllers;

use App\Models\AuditoriasModel;
//fix error Class 'Dompdf\Cpdf' not found
require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php'; 
class AuditoriasController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$builder = $this->db->table("auditorias");
		$builder->select('*');
		$builder->join('usuarios', 'usuarios.USUID = auditorias.USUID');
		$aud = $builder->get()->getResult();

		$data = [
			'auditorias' => $aud,
			'content' => 'Auditorias/AuditoriaListar'
		];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;

	}
	public function nuevo()
	{
		$builder = $this->db->table("usuarios");
		$builder->select('USUID ,USUNOMBRE');
		$usuarios = $builder->get()->getResult();
		$usuarios=array('usuarios'=>$usuarios);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Auditorias/AuditoriaNuevo',$usuarios).
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;

	}
	public function guardar(){
		$AuditoriasModel= new AuditoriasModel();
		$request=\Config\Services::request();
		$data=array(
			'USUID'=>$request->getPostGet('cmbUsuario'),
			'AUDACCION'=>$request->getPostGet('txtAccion'),
			'AUDTABLA'=>$request->getPostGet('txtTabla'),
			'AUDFECHA'=>$request->getPostGet('txtFecha'),
			'AUDHORA'=>$request->getPostGet('txtHora'),
			'AUDIP'=>$request->getPostGet('txtIp'),
			'AUDHOST'=>$request->getPostGet('txtHost'),
			'AUDSENTENCIA'=>$request->getPostGet('txtSentencia')			
		);
	
		if($AuditoriasModel->save($data)===false){
			var_dump($AuditoriasModel->errors());
		}
		$builder = $this->db->table("auditorias");
		$builder->select("*");
		$builder->join('usuarios', 'auditorias.USUID   = usuarios.USUID');
		$builder->orderBy('AUDID ','asc');
		$auditorias = $builder->get()->getResult();
		$auditorias =array('auditorias'=>$auditorias);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Auditorias/AuditoriaListar',$auditorias).
						view('Estructura/Footer');
        return $estructura;
		
		
	}

    public function editar(){
		$request=\Config\Services::request();
		if($request->getPostGet('id')){
        $id=$request->getPostGet('id');
		
		}else{
			$id=$request->uri->getSegment(3);
			
		}
		
		$AuditoriasModel=new AuditoriasModel($db);
        $auditorias=$AuditoriasModel->find($id);
		$auditorias=array('auditorias'=>$auditorias);
		//var_dump($estudiantes);
		$builder = $this->db->table("usuarios");
		$builder->select('USUID ,USUNOMBRE');
		$usuarios = $builder->get()->getResult();
		$builder = $this->db->table("usuarios");
		$builder->select('USUID ,USUNOMBRE');
		$usuarios = $builder->get()->getResult();
		//$ciudades=array('ciudades'=>$ciudades);
		$data['auditorias']=$auditorias;
		$data['usuarios']=$usuarios;
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Auditorias/AuditoriaEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
					return $estructura;		
	}
	public function modificar(){
		$AuditoriasModel= new AuditoriasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'AUDID'=>$request->getPostGet('txtCodigo'),
			'USUID'=>$request->getPostGet('cmbUsuario'),
			'AUDACCION'=>$request->getPostGet('txtAccion'),
			'AUDTABLA'=>$request->getPostGet('txtTabla'),
			'AUDFECHA'=>$request->getPostGet('txtFecha'),
			'AUDHORA'=>$request->getPostGet('txtHora'),
			'AUDIP'=>$request->getPostGet('txtIp'),
			'AUDHOST'=>$request->getPostGet('txtHost'),
			'AUDSENTENCIA'=>$request->getPostGet('txtSentencia')
			
		);
		$AUDID=$request->getPostGet('txtCodigo');

		if($AuditoriasModel->update($AUDID,$data)===false){
			var_dump($AuditoriasModel->errors());
		}
		return redirect()->to(site_url('/AuditoriasController'));
	}
	
			public function borrar(){
			$request=\Config\Services::request();
			$id=$request->getPostGet('id');

			$AuditoriasModel=new AuditoriasModel($db);
			$auditorias=$AuditoriasModel->find($id);
			$auditorias=array('auditorias'=>$auditorias);
			//var_dump($estudiantes);

             $builder = $this->db->table("usuarios");
            $builder->select('USUID,USUNOMBRE');
            $usuarios = $builder->get()->getResult();
            $builder = $this->db->table("usuarios");
            $builder->select('USUID,USUNOMBRE');
            $usuarios = $builder->get()->getResult();
            //$ciudades=array('ciudades'=>$ciudades);
            $data['auditorias']=$auditorias;
            $data['usuarios']=$usuarios;
            
			$estructura=	view('Estructura/Header').
								view('Estructura/Menu').
								view('Auditorias/AuditoriaBorrar',$data).
								view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
								return $estructura;	
		}	
		
		public function eliminar(){
			$request=\Config\Services::request();
			$AuditoriasModel=new AuditoriasModel($db);
			$id=$request->getPostGet('txtCodigo');
			$auditorias=$AuditoriasModel->find($id);
			$auditorias=array('auditorias'=>$auditorias);
			
			if($AuditoriasModel->delete($id)===false){
				print_r($AuditoriasModel->errors());
			}else{
				$AuditoriasModel->purgeDeleted($id);
			}
			   
			return redirect()->to(site_url('/AuditoriasController'));	
		}

	public function reportePDf(){

		//get data
		$auditorias = $this->db->table("auditorias t1")
							->select("*")
							->join('usuarios t2', 't2.USUID = t1.USUID')
							->orderBy('t1.CREATED_AT','desc')
		 					->get()->getResultArray();
    	$data['auditorias'] = $auditorias;
		//invocar dompdf
		$dompdf = new \Dompdf\Dompdf(array('enable_remote' => true)); 
		//carga el template dompdf
		$dompdf->loadHtml(view('Auditorias/reporteAuditorias', $data));
		//set paramatros pdf
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		//retorna pdf download
		$dompdf->stream('reporteAuditoria.pdf');
	}
}