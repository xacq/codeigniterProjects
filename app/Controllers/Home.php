<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\PagosModel;
use App\Models\PerfilesModel;
use App\Models\DocentesModel;

class Home extends BaseController {
	// public function index() {

	// 	$estructura = view('Estructura/Header') .
	// 		view('Estructura/Menu') .
	// 		view('Admin') .
	// 		view('Estructura/Footer');
	// 	return $estructura;
	// }

	public function login() {
		
		$estructura = view('Login/Login');
		// $estructura = view('Pagos/factura copy.php');
		return $estructura;
	}

	public function auth() {
		$session = session();
		$request = \config\Services::request();
		$UsuariosModel = new UsuariosModel($db);
		$DocentesModel = new DocentesModel($db);

		$usuario = $request->getPostGet('txtUsuario');
		$clave = $request->getPostGet('txtClave');
		$usuario = $UsuariosModel->where('USUCEDULA', $usuario)->findAll();
		$estado = false;
		$perfilId = '';
		foreach ($usuario as $usuLogin) {
			if ($usuLogin ['USUCLAVE'] === $clave) {
				$session->set('usuId', $usuLogin['USUID']);
				$session->set('usuNombre', $usuLogin['USUNOMBRE']);
				$session->set('usuCedula', $usuLogin['USUCEDULA']);
				$session->set('perfilId', $usuLogin['PERID']);
				$session->set('correo', $usuLogin['USUCORREO']);
				$session->set('ip',$request->getIPAddress());
				$session->set('login', TRUE);
				$estado = true;
				$perfilId = $usuLogin['PERID'];
			}
		}
		//pagos pendientes
		$fechaActual = date('Y-m-d');
		$this->db =db_connect();
		$totalPagosPendientes = $this->db->table("pagos")
										->select('*')
										->where('pagos.PAGESTADO =', 'PENDIENTE')
										->where('pagos.PAGFECHA <',$fechaActual )
										->get()->getResultArray();
		$session->set('totalPagosPendientes', count($totalPagosPendientes));

		// menu
		
		$PerfilesModel = new PerfilesModel($db);
		$menu = $PerfilesModel->getOptions($perfilId);
		
		$session->set('menu', $menu);

		if ($estado == true) {
			switch ($perfilId) {
				case '1':
					return redirect('areas');
					break;
				case '2':
					return redirect()->to(site_url('/MyCoursesController'));
					break;
				case '3':
					$docente = $DocentesModel->where('DOCCEDULA', $request->getPostGet('txtUsuario'))->findAll();
					foreach ($docente as $doc) {
						$session->set('docenteId', $doc['DOCID']);
					}
					return redirect()->to(site_url('/CursosController'));
					break;
				default:
					return redirect()->to('login');
					break;
			}
		} else {
			return redirect()->to('login');
		}
		
	}

	public function logout() {
		$session = session();
		$session->destroy();
		return redirect()->to(site_url());
	}

}
