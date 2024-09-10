<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PerfilesModel extends Model {
	protected $table = 'perfiles';
	protected $primaryKey = 'PERID';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['PERNOMBRE', 'PERESTADO'];

	protected $useTimestamps = true;
	protected $createdField = 'CREATED_AT';
	protected $updatedField = 'UPDATED_AT';
	protected $deletedField = 'DELETED_AT';

	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;

	//Aqui se llama al metodo auditar luego de realizar el insert
    protected $afterInsert = ["auditar"];

    //Aqui se llama al metodo auditar luego de realizar el update
    protected $afterUpdate = ["auditar"];

    //Aqui se llama al metodo auditar luego de realizar el delete
    protected $afterDelete = ["auditar"];


    //Metodo que se llama al momento de hacer algun cambio en la tabla
    protected function auditar(array $data)
    {  
        $AuditoriasModel = new AuditoriasModel();

        $usuid = session()->get('usuId');

        $audaccion = explode(" ", $this->getLastQuery())[0];

        if(isset($data['purge'])){
            $audaccion = "DELETE";
        }

        $audtabla = explode(" ", $this->getLastQuery())[2];

        if($audaccion=='UPDATE' || $audaccion=='DELETE'){
            $audtabla = explode(" ", $this->getLastQuery())[1];
        }


        $audfecha = (new Time('now'))->toDateString();
        $audhora = (new Time('now'))->toTimeString();
        $audip = session()->get('ip')?session()->get('ip'):$_SERVER['SERVER_NAME'];
        $audsentencia = $this->getLastQuery();

        $AuditoriasModel->save(array(
            'USUID'=>$usuid,
            'AUDACCION'=>$audaccion,
            'AUDTABLA'=>$audtabla,
            'AUDFECHA'=>$audfecha,
            'AUDHORA'=>$audhora,
            'AUDIP'=>$audip,
            'AUDHOST'=>$audip,
            'AUDSENTENCIA'=>$audsentencia,  
        ));
 
    }

	public function getOptions($id = null) {
		$this->select('perfiles.PERID, perfiles.PERNOMBRE, perfiles.PERESTADO, op.OPCID, op.OPCNOMBRE, op.OPCRUTA, op.OPCESTADO, po.POPID, po.POPESTADO');
		$this->join('perfilesopciones as po', 'perfiles.PERID = po.PERID');
		$this->join('opciones as op', 'op.OPCID = po.OPCID');
		$this->where('perfiles.PERID', $id);
		$this->orderBy('op.OPCNOMBRE');
		return $this->findAll();
	}
}
