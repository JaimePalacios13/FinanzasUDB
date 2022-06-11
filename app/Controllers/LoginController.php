<?php

namespace App\Controllers;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if (!isset($_SESSION['sesion_activa'])) {
                echo view('template/header');
                echo view('Login/login');
                echo view('template/footer');
            }else {
                header('Location:'.base_url('/balance'));
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);exit();
        }
    }

    public function login(){
        try {
            $LoginModel = new LoginModel();
            $validateUser = $LoginModel->validateUser($_POST['user'],$_POST['pwd']);
            if (count($validateUser) > 0) {
                $session = session();
                $dataSession=[
                    'id_usuario' => $validateUser[0]['idusuario'],
                    'nombre' => $validateUser[0]['nombre'],
                    'sesion_activa' => 1
                ];
                $session->set($dataSession);
                echo json_encode('success');
            }else{
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function cerrar_session(){
        try {
            $session = session();
            $session->destroy();
            return redirect()->to(base_url('/'));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
