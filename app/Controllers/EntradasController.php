<?php

namespace App\Controllers;
use App\Models\EntradasModel;

class EntradasController extends BaseController
{
    public function index()
    {
        try {
            $EntradasModel = new EntradasModel();
            $data['registrosEntradas'] = $EntradasModel->DataEntradas();
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/entradas',$data);
                echo view('template/footer');
            }else {
                header('Location:'.base_url('/logout'));
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);exit();
        }
    }

    public function saveEntrada(){
        try {
            $session = session();
            $EntradasModel = new EntradasModel();

            $data = $_POST['imagemEntrada'];

            /* limpiar imagen base64 */
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);

            $img = base64_decode($image_array_2[1]); // decodificar imagen
            $image_name = "finanzas".time().".jpg"; 
            $path =  $_SERVER['DOCUMENT_ROOT'] . '/finanzas/assets/upload/' . $image_name;

            file_put_contents($path, $img); // sube la imagen

            $img = base_url().'/assets/upload/'.$image_name; //ruta a almacenar en la bd

            $data = array(
                'tipoEntrada' => $_POST['tipoEntrada'],
                'monto'       => $_POST['monto'],
                'fechaEntrada'=> $_POST['fechaRegistro'],
                'facturaImg'  => $img,
                'idusuario'   => $session->get('id_usuario')
            );
            if ($EntradasModel->insert($data)) {
                echo json_encode('success');
            }else{
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            echo json_encode($th);
        }
    }

    public function grafEntradas(){
        try {
            $EntradasModel = new EntradasModel();

            $data['data'] = $EntradasModel->grafEntradas();
            echo json_encode($data);
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
