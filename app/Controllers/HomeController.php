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
            $resultEntrada = $EntradasModel->select('sum(monto) as montoSumaEntrada')->first();
            $resultSalidas = $SalidasModel->select('sum(monto) as montoSumaSalida')->first();

            /* SE VALIDA CUANDO NO HAY NINGUN REGISTRO SI NO HAY REGISTRO SE PONE 0 */
            /* FLOAT VAL CONVIERTE A FLOAT, Y NUMBERFORMAT ASIGNA DOS DECIMALES */
            if ($resultEntrada['montoSumaEntrada'] == NULL || $resultSalidas['montoSumaSalida'] == NULL) {
                $TotalEntrada = number_format(floatval(0),2);
                $TotalSalida = number_format(floatval(0),2);
            }else {
                /* SINO ES NULL EXISTE UN DATO, SE CNVIERTE Y SE FORMATEA */
                $TotalEntrada = number_format(floatval($resultEntrada['montoSumaEntrada']),2);
                $TotalSalida = number_format(floatval($resultSalidas['montoSumaSalida']),2);
            }

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
