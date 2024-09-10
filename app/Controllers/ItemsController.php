<?php 
namespace App\Controllers;

use App\Models\ItemsModel;

class ItemsController extends BaseController
{
	protected $db;
    public function __construct(){
      
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index() {
		$builder = $this->db->table("items");
		$builder->select('*');
		$builder->where('ITEESTADO', 'ACTIVO');
		$items = $builder->get()->getResult();
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsListar'			
		];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;		
	}

    public function nuevo() {
		$data = [
			'content' => 'Items/ItemsNuevo'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function guardar(){
		$ItemsModel= new ItemsModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ITENOMBRE'=>$request->getPostGet('txtNombre'),
            'ITEOBSERVACION'=>$request->getPostGet('txtObservacion'),
            'ITEESTADO'=>$request->getPostGet('txtEstado'),
			
		);
		
		if($ItemsModel->insert($data)===false){
			var_dump($ItemsModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha registrado el item de manera correctamente');
		session()->setFlashdata('title', 'Item Registrado Correctamente');
		session()->setFlashdata('status', 'success');
	
		//redirige a metodo index
		return redirect()->to(site_url('/ItemsController'));	
	}



	public function editar(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		$ItemsModel=new ItemsModel($db);
		$items=$ItemsModel->find($id);
		
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsEditar'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function modificar(){
		$ItemsModel= new ItemsModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ITENOMBRE'=>$request->getPostGet('txtNombre'),
            'ITEOBSERVACION'=>$request->getPostGet('txtObservacion'),
            'ITEESTADO'=>$request->getPostGet('txtEstado'),
		);
		$ITEID=$request->getPost('txtCodigo');
		if($ItemsModel->update($ITEID,$data)===false){
			var_dump($ItemsModel->errors());
		}
		session()->setFlashdata('mensaje', 'Se ha actualizado el item de manera correctamente');
		session()->setFlashdata('title', 'Item Actualizado Correctamente');
		session()->setFlashdata('status', 'success');
		//redirige a metodo index
		return redirect()->to(site_url('/ItemsController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$ItemsModel=new ItemsModel($db);
		$items=$ItemsModel->find($id);
		
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsBorrar'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}
	

	public function eliminar(){
		$request=\Config\Services::request();
		$ItemsModel=new ItemsModel($db);
		$id = $request->getPostGet('id'); //editar 
           
		$items=$ItemsModel->find($id);
		$items=array('opciones'=>$items);
		$ItemsModel->update($id, ['ITEESTADO' => 'INACTIVO']);  // editar
		
		if($ItemsModel->delete($id)===false){
			print_r($ItemsModel->errors());
		}else{
			$ItemsModel->purgeDeleted($id);
		}
		session()->setFlashdata('mensaje', 'Se ha eliminado el item de manera correctamente');
		session()->setFlashdata('title', 'Item Eliminado Correctamente');
		session()->setFlashdata('status', 'success');
		return redirect()->to(site_url('/ItemsController'));
		
	}

}
