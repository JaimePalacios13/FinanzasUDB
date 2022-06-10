<?php namespace App\Libraries;
//uso namespace
require_once APPPATH."/ThirdParty/dompdf/autoload.inc.php";
use Dompdf\Dompdf ;
//agrego y uso mi libreria dompdf hay que recordar el uso de Mayusculas y Minisculas.


class Pdfgenerator  {

    public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
    {
    $dompdf = new DOMPDF();
/*     $dompdf->set_base_path("http://localhost:8080/finanzas/assets/vendors/bootstrap/dist/css/bootstrap.css");
    ob_start();
    $html;
    $htmlfin = ob_get_clean();
 */ 
    $html .= '<link rel="stylesheet" href="<?= $url ?>/assets/vendors/bootstrap/dist/css/bootstrap.css" media="print">';
    $dompdf->loadHtml($html);
    $dompdf->set_base_path("http://localhost:8080/finanzas/assets/vendors/bootstrap/dist/css");
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();

    if ($stream) {
        // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
        $dompdf->stream($filename.".pdf", array("Attachment" => 1));
                }
    else  {
      return $dompdf->output();
    }
  }
}
?>