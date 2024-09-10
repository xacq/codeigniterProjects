<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class ItemsModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'ITEID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ITEID', 'ITENOMBRE','ITEOBSERVACION','ITEESTADO'];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

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
        $audip = session()->get('ip');
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