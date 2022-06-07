<?php

namespace App\Controllers;
use App\Models\EntradasModel;
use App\Models\SalidasModel;

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $EntradasModel = new EntradasModel();
            $SalidasModel = new SalidasModel();

            /* SUMA DE LOS TOTALES DE ENTRADAS Y SALIDAS */
            $resultEntrada = $EntradasModel->select('sum(monto) as montoSumaEntrada')->findAll();
            $resultSalidas = $SalidasModel->select('sum(monto) as montoSumaSalida')->findAll();

            /* SE VALIDA CUANDO NO HAY NINGUN REGISTRO SI NO HAY REGISTRO SE PONE 0 */
            /* FLOAT VAL CONVIERTE A FLOAT, Y NUMBERFORMAT ASIGNA DOS DECIMALES */
            $TotalEntrada = $resultEntrada[0]['montoSumaEntrada'] == NULL ? number_format(floatval(0),2) :  number_format(floatval($resultEntrada[0]['montoSumaEntrada']),2);
            $TotalSalida = $resultSalidas[0]['montoSumaSalida'] == NULL ? number_format(floatval(0),2) : number_format(floatval($resultSalidas[0]['montoSumaSalida']),2);

            /* SE SACA LA DISPONIBILIDAD SE FORMATEA */
            $disponibilidad = number_format(floatval($TotalEntrada - $TotalSalida),2);

            /* SE ASIGNA EL VALOR A LOS ARRAY PARA ENVIAR LA VAR DATA A LA VISTA */
            $data['totalSumaIngreso'] = $TotalEntrada;
            $data['totalSumaSalida'] = $TotalSalida;
            $data['Disponibilidad'] = $disponibilidad;
            
            /* SE VALIDA LA SESSION */
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                
                /* SE IMPRIMEN LAS VISTAS Y SE ENVIA LA DATA */
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/home',$data);
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
