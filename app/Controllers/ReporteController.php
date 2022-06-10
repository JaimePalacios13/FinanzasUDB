<?php

namespace App\Controllers;

use App\Models\EntradasModel;
use App\Models\SalidasModel;
use App\Libraries\Pdfgenerator;
use Exception;

class ReporteController extends BaseController
{

    public $SalidasModel;
    public $EntradasModel;

    public function __construct()
    {
        $this->EntradasModel = new EntradasModel();
        $this->SalidasModel = new SalidasModel();
    }

    public function index()
    {
        try {
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/reporte');
                echo view('template/footer');
            } else {
                header('Location:' . base_url('/balance'));
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
            exit();
        }
    }

    public function selectAll()
    {

        $fecha = $this->request->getGet("fecha_inicio");
        $this->request->getGet("fecha_inicio") != '' ? session()->set("fecha_inicio",$fecha) : session()->set("fecha_inicio","") ; 

        $data["salidas"] = $this->SalidasModel->where("date_format(fechaSalida,'%Y-%m')",$fecha)->findAll();
        $data["entradas"] = $this->EntradasModel->where("date_format(fechaEntrada,'%Y-%m')",$fecha)->findAll();
        echo json_encode($data);
    }

    public function print_reporte()
    {
        /*         $pdf = new PDFPDF;
        $data = array();
 */
        /*         $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('modules/print/reporte'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
 */
        try {

            $img = $_POST['base64'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $fileData = base64_decode($img);
            $fileName = uniqid() . '.png';
            $path = $_SERVER['DOCUMENT_ROOT'] . '/finanzas/assets/upload/' . $fileName;
                        
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/finanzas/assets/upload/' . $fileName, $fileData);
            $data["path"] = $path;
            $fecha = session()->get("fecha_inicio");
            $data["salidas"] = $this->SalidasModel->where("date_format(fechaSalida,'%Y-%m')",$fecha)->findAll();
            $data["entradas"] = $this->EntradasModel->where("date_format(fechaEntrada,'%Y-%m')",$fecha)->findAll();
            $data["url"] = base_url();
            $data["fecha"] = $fecha;

            $Pdfgenerator = new Pdfgenerator();
            $html =  view('print/reporte', $data);
            $Pdfgenerator->generate($html, 'Reporte Mensual');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
