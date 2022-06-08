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
            }else {
                header('Location:'.base_url('/home'));
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);exit();
        }
    }

    public function selectAll(){
        $data["salidas"] = $this->SalidasModel->findAll();
        $data["entradas"] = $this->EntradasModel->findAll();
        echo json_encode($data);
    }

    public function print_reporte(){
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
            $Pdfgenerator = new Pdfgenerator() ;
            $html =  view('print/reporte');
            $Pdfgenerator->generate($html, 'prueba') ;
            } catch(Exception $e) {
            echo $e->getMessage() ;
            }

/*         $this->pdf->generar_pdf('modules/print/reporte', $data, "landscape", "presupuesto mensual");
 */    }

}
