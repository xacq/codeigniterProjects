<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class AreasModel extends Model
{
    protected $table      = 'areas';
    protected $primaryKey = 'AREID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['AREID','ARENOMBRE'];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [
       
    ];
    protected $validationMessages = [
       
    ];
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
    public function obtenerCantidadUsuarios() {
        $query = $this->db->query('SELECT COUNT(*) AS cantidad_usuarios FROM usuarios');
        $resultado = $query->getRow();
    
        if ($resultado) {
            return $resultado->cantidad_usuarios;
        } else {
            return 0; // Devuelve 0 si no se encontraron resultados.
        }
    }
    public function calcularPorcentajeUsuariosCreadosEsteMes() {
        // Consulta SQL
        $sql = "SELECT 
                    COUNT(*) AS usuarios_mes_actual,
                    (SELECT COUNT(*) FROM usuarios WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m')) AS usuarios_mes_pasado,
                    (COUNT(*) / (SELECT COUNT(*) FROM usuarios WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m'))) * 100 AS porcentaje_creacion
                FROM usuarios
                WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE, '%Y-%m')";

        // Ejecutar la consulta y devolver el resultado como un arreglo
        return $this->db->query($sql)->getResultArray();
    }

    public function contarEstudiantes() {
          $query = $this->db->query('SELECT COUNT(*) as total_estudiantes from estudiantes');
          $resultado = $query->getRow();
      
          if ($resultado) {
              return $resultado->total_estudiantes;
          } else {
              return 0; // Devuelve 0 si no se encontraron resultados.
          }
    }
    public function calcularPorcentajeEstudiantesCreadosEsteMes() {
        $sql = "SELECT 
                    COUNT(*) AS estudiantes_mes_actual,
                    (SELECT COUNT(*) FROM estudiantes WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m')) AS estudiantes_mes_pasado,
                    (COUNT(*) / (SELECT COUNT(*) FROM estudiantes WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m'))) * 100 AS porcentaje_creacion
                FROM estudiantes
                WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURRENT_DATE, '%Y-%m')";
    
        return $this->db->query($sql)->getResultArray();
    }
    
    public function contarDocentes() {
        $query = $this->db->query('SELECT COUNT(*) as total_docentes from docentes');
        $resultado = $query->getRow();
    
        if ($resultado) {
            return $resultado->total_docentes;
        } else {
            return 0; // Devuelve 0 si no se encontraron resultados.
        }
  }
  public function contarCursos() {
    $query = $this->db->query('SELECT COUNT(*) as total_cursos from cursos');
    $resultado = $query->getRow();

    if ($resultado) {
        return $resultado->total_cursos;
    } else {
        return 0; // Devuelve 0 si no se encontraron resultados.
    }
}
}   
