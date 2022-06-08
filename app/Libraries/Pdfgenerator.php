<?php namespace App\Libraries;
//uso namespace
require_once APPPATH."/ThirdParty/dompdf/autoload.inc.php";
use Dompdf\Dompdf ;
//agrego y uso mi libreria dompdf hay que recordar el uso de Mayusculas y Minisculas.


class Pdfgenerator  {

    public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
    {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
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