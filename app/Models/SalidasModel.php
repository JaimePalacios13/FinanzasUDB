<?php

namespace App\Models;
use CodeIgniter\Model;
class SalidasModel extends Model{

    protected $table = 'registrosalidas';
    protected $primaryKey = 'id_salida';
    protected $allowedFields = [
        'id_salida',
        'tipoSalida',
        'monto',
        'fechaSalida',
        'facturaImg',
        'idusuario'
    ];

    public function DataSalidas(){
        $this->select('*');
        return $this->findAll();
    }
}