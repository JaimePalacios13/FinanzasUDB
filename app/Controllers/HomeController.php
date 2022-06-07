<?php

namespace App\Controllers;
/* use App\Models\LoginModel */;

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/home');
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}
