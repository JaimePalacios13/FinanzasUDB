<?php

namespace App\Models;
use CodeIgniter\Model;
class EntradasModel extends Model{

    protected $table = 'registroentradas';
    protected $primaryKey = 'id_entrada';
    protected $allowedFields = [
        'id_entrada',
        'tipoEntrada',
        'monto',
        'fechaEntrada',
        'facturaImg',
        'idusuario'
    ];

    public function DataEntradas(){
        $this->select('*');
        return $this->findAll();
    }

    public function grafEntradas(){
        $this->select('*,sum(monto) as sumaMontos');
        $this->groupBy('fechaEntrada');
        $this->groupBy('tipoEntrada');
        return $this->findAll();
    }
}