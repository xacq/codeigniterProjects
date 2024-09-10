<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;


class RegistroCalificacionesModel extends Model
{
    protected $table      = 'registrocalificaciones';
    protected $primaryKey = 'RCAID ';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['RCAID  ','CITID ','MATID ','RCAFECHA','RCANOTA','RCAEQUIVALENTE','RCAOBSERVACION','RCAESTADO'];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $deletedField  = 'DELETED_AT';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function add($data) {
		return $this->db
                    ->table('registrocalificaciones')
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
    
    public function insertarNota($MATID, $CITID,$nota)
    {
        // Verifica si la nota1 no es nula o vacía antes de insertarla
        if ($nota !== null && $nota !== '') {
            try {
                $FECHA = date('Y-m-d'); // Cambia el formato según tus necesidades
                $data = [
                    'MATID' => $MATID,
                    'CITID' => $CITID,
                    'RCANOTA' => $nota,
                    'RCAFECHA'=> $FECHA
                    // Agrega aquí otros campos si los tienes
                ];
    
                // Inserta los datos en la tabla registrocalificaciones
                $this->db->table('registrocalificaciones')->insert($data);
    
                // Verifica si la inserción fue exitosa
                if ($this->db->affectedRows() > 0) {
                    // La inserción se realizó con éxito
                    return true;
                } else {
                    // No se insertaron filas, lo que indica un error
                    return false;
                }
            } catch (\Exception $e) {
                // Ocurrió una excepción, maneja el error según tus necesidades
                log_message('error', $e->getMessage()); // Registra el mensaje de error en el registro
                return false;
            }
        } else {
            // La nota es nula o vacía, por lo que no se inserta y se devuelve false
            return false;
        }
    }
    public function obtenerCalificacionesItems()
{
    $builder = $this->db->table('calificacionesitems ca');
    $builder->join('calificaciones fi', 'ca.CALID = fi.CALID');
    $builder->join('items it', 'ca.ITEID = it.ITEID');
    $builder->where(['fi.CALESTADO'=>'ACTIVO']);
    $query = $builder->get();
    return $query->getResultArray();
}
    
public function actualizarNota($RCAID, $nota,$RCAEQUIVALENTE,$RCAOBSERVACION,$FECHA)
{
    $data = ['RCANOTA' => $nota,
            'RCAEQUIVALENTE' =>$RCAEQUIVALENTE,
            'RCAOBSERVACION' =>$RCAOBSERVACION,
            'RCAFECHA' => $FECHA];

    $this->db->table('registrocalificaciones')->where('RCAID', $RCAID)->update($data);
}

    
public function notamax()
{
        $builder = $this->db->table('calificaciones');
        $query = $builder->get();
            return $query->getResultArray();
}   
public function obtenerNotasPorRCAIDs($RCAIDs)
{
    // Realiza una consulta select utilizando los IDs proporcionados
    $builder = $this->db->table('registrocalificaciones');
    $builder->whereIn('RCAID', $RCAIDs);
    $query = $builder->get();

    // Devuelve los resultados de la consulta en forma de arreglo
    return $query->getResultArray();
}





}   