<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class RegistroDocentesModel extends Model
{
    protected $table      = 'registrodocente';
    protected $primaryKey = 'RDOID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['RDOID','DOCID','CURID','RDOFECHA','RDOESTADO'];
    // protected $allowedFields = ['RDOID  ','DOCID '];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $cleanValidationRules     = true;
    

    public function add($data) {
		return $this->db
                    ->table('registrodocente')
                    ->insert($data);
	}

    

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
}   