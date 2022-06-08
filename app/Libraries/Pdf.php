<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
namespace App\Libraries;
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function ci()
    {
        return get_instance();
    }


    public function generar_pdf($view, $data = array(), $posicion = "portrait", $nombre_archivo)
    {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', $posicion);

        // Render the HTML as PDF
        $dompdf->render();
        $time = time();
        $name = "pdf/libros/{$nombre_archivo}.pdf"; 
        // Output the generated PDF to Browser
        $dompdf->stream($name);

        $output = $dompdf->output();

        file_put_contents($name, $output);
    }


    public function load_view($view, $data = array(), $posicion = "portrait", $id, $correo = "no_send")
    {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', $posicion);

        // Render the HTML as PDF
        $dompdf->render();
        $time = time();

        $name = $posicion == "portrait" ? "pdf/Presupuesto_" . $id . ".pdf" : "pdf/Inventario.pdf"; // personalizado especificamente para este sistema

        // Output the generated PDF to Browser
        $dompdf->stream($name);

        $output = $dompdf->output();

        file_put_contents($name, $output);

        if ($correo != "no_send") {            
            header("Location: http://c2480531.ferozo.com/envio_pdf/$correo/$id");
        }
    }

}
