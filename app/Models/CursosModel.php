<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class CursosModel extends Model
{
    protected $table      = 'cursos';
    protected $primaryKey = 'CURID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['CURID','AREID','CURNOMBRE','CURFECINICIO','CURFECFINAL','CURPRECIO','CURNUMESTUDIANTES','CURMODALIDAD','CURESTADO'];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function paginateCustom(int $nb_page) {
        $session = session();
        if ($_SESSION['perfilId'] === '3'){
            $data = $this->select()->join('areas', 'cursos.AREID  = areas.AREID')
            ->join('registrodocente', 'cursos.CURID = registrodocente.CURID')
            ->join('docentes', 'registrodocente.DOCID = docentes.DOCID')
            ->where('registrodocente.DOCID', $_SESSION['docenteId'])
            ->paginate($nb_page);
            //d($data);
           return $data;
        }else{
            return $this->select()->join('areas', 'cursos.AREID  = areas.AREID')
                // ->join('registrodocente', 'cursos.CURID = registrodocente.CURID')
                // ->join('docentes', 'registrodocente.DOCID = docentes.DOCID')
                ->paginate($nb_page);
        }
    }
    public function getAllData() {
        $session = session();
        if ($_SESSION['perfilId'] === '3') {
            $data = $this->select()
                ->join('areas', 'cursos.AREID  = areas.AREID')
                ->join('registrodocente', 'cursos.CURID = registrodocente.CURID')
                ->join('docentes', 'registrodocente.DOCID = docentes.DOCID')
                ->where('registrodocente.DOCID', $_SESSION['docenteId'])
                ->where('CURESTADO', 'ACTIVO')
                ->get()
                ->getResultArray();
    
            return $data;
        } else {
            return $this->select()
                ->join('areas', 'cursos.AREID  = areas.AREID')
                ->where('CURESTADO', 'ACTIVO')
                ->get()
                ->getResultArray();
        }
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