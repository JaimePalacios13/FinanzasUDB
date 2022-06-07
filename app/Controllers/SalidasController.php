<?php

namespace App\Controllers;
use App\Models\SalidasModel;

class SalidasController extends BaseController
{
    public function index()
    {
        try {
            $SalidasModel = new SalidasModel();
            $data['registrosSalidas'] = $SalidasModel->DataSalidas();
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/salidas',$data);
                echo view('template/footer');
            }else {
                header('Location:'.base_url('/logout'));
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);exit();
        }
    }

    public function saveSalida(){
        try {
            $session = session();
            $SalidasModel = new SalidasModel();

            $data = $_POST['imagemSalida'];

            /* limpiar imagen base64 */
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);

            $img = base64_decode($image_array_2[1]); // decodificar imagen
            $image_name = "finanzas".time().".jpg"; 
            $path =  $_SERVER['DOCUMENT_ROOT'] . '/finanzas/assets/upload/' . $image_name;

            file_put_contents($path, $img); // sube la imagen

            $img = base_url().'/assets/upload/'.$image_name; //ruta a almacenar en la bd

            $data = array(
                'tipoSalida' => $_POST['tipoSalida'],
                'monto'       => $_POST['monto'],
                'fechaSalida'=> $_POST['fechaRegistro'],
                'facturaImg'  => $img,
                'idusuario'   => $session->get('id_usuario')
            );
            if ($SalidasModel->insert($data)) {
                echo json_encode('success');
            }else{
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            echo json_encode($th);
        }
    }

    public function grafSalidas(){
        try {
            $SalidasModel = new SalidasModel();

            $data['data'] = $SalidasModel->grafSalidas();
            echo json_encode($data);
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
