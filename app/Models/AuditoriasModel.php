<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditoriasModel extends Model
{
    protected $table      = 'auditorias';
    protected $primaryKey = 'AUDID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['USUID','AUDACCION','AUDTABLA','AUDFECHA','AUDHORA','AUDIP','AUDHOST','AUDSENTENCIA'];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // public function paginateCustom(int $nb_page) {
    //     return $this->select()->join('usuarios', 'usuarios.USUID = auditorias.USUID')->paginate($nb_page);
    // }

    
}   