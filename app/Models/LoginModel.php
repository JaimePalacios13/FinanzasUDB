<?php

namespace App\Models;
use CodeIgniter\Model;
class LoginModel extends Model{

    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';

    public function validateUser($user,$password){
        $this->select('*');
        $this->where('usuario',$user);
        $this->where('pwd',$password);
        return $this->findAll();
    }
}