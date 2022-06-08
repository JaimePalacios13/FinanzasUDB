<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->post('validateUser', 'LoginController::login');
$routes->get('logout', 'LoginController::cerrar_session');

/* DASHBOARD */
$routes->get('balance', 'HomeController::index');

/* entradas */
$routes->get('registros-de-entrada', 'EntradasController::index');
$routes->post('saveEntrada', 'EntradasController::saveEntrada');
$routes->get('grafEntradas', 'EntradasController::grafEntradas');

/* salidas */
$routes->get('registros-de-salida', 'SalidasController::index');
$routes->post('saveSalida', 'SalidasController::saveSalida');
$routes->get('grafSalidas', 'SalidasController::grafSalidas');


/* reporte */
$routes->get('reporte-de-balance', 'ReporteController::index');
$routes->post('reportes/data/all', 'ReporteController::selectAll');
$routes->get('print-reporte', 'ReporteController::print_reporte');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
