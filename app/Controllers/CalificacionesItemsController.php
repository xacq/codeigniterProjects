<?php 
namespace App\Controllers;

use App\Models\CalificacionesModel;
use App\Models\ItemsModel;

class CalificacionesItemsController extends BaseController
{
	protected $db;
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
        
		$calificacionesItems = $this->db->table("calificacionesitems t1")
        ->join('calificaciones t2', 't2.CALID = t1.CALID')
        ->join('items t3', 't3.ITEID = t1.ITEID ')
        ->get()
        ->getResultArray();

        $data = array('calificacionesItems'=>$calificacionesItems); 
        
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('CalificacionesItems/listar', $data).
						view('Estructura/Footer');
        return $estructura;
	}

    public function nuevo(){

        //get data calificaciones
        $CalificacionesModel = new CalificacionesModel($db);
        $calificacionesData = $CalificacionesModel->findAll();
        //get data items
        $ItemsModel = new ItemsModel($db);
        $itemsData = $ItemsModel->findAll();
        
        $data = [];
        $data['calificaciones'] = $calificacionesData;
        $data['items'] = $itemsData;
        $estructura = view('Estructura/Header') .
        view('Estructura/Menu') .
        view('CalificacionesItems/registrarItems', $data) .
        view('Estructura/Footer');
		return $estructura;
    }


	public function grabar(){
		//inserta el nuevo item de calificaciones
	}

	public function editar(){
		//muestra la pantalla de edicion de item de calificaciones
	}
	public function actulizar(){
		//actuliza item de calificaciones
	}
	public function eliminar(){
		//elimina item de calificaciones
	}
}
