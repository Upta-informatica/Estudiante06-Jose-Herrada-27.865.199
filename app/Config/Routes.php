<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Login
$routes->get('/login', 'Login::Index');
$routes->resource('formulario_login');

// Registro

$routes->get('/registro', 'Registro::Index');
$routes->resource('formulario_registro');

// Dashboard

$routes->get('/dashboard', 'Dashboard::Index');
$routes->get('/dashboard/citas', 'Dashboard::Citas');
$routes->get('/dashboard/agenda_citas', 'Dashboard::Agenda_Citas');
$routes->get('/dashboard/mascotas', 'Dashboard::Mascotas');
$routes->get('/dashboard/doctores', 'Dashboard::Doctores');
$routes->get('/dashboard/configuracion', 'Dashboard::Configuracion');

// Formularios dashboard

$routes->post('/dashboard/citas/pedir_cita', 'Citas::Pedir_cita');
$routes->post('/dashboard/agregar_mascota', 'Home::Agregar_Mascota');

$routes->get('/dashboard/editar_mascota', 'EditarMascota::Index');
$routes->post('/dashboard/editar_mascota/editar_mascota', 'EditarMascota::editar_mascota');

$routes->get('/dashboard/borrar_mascota', 'EditarMascota::borrar_mascota');

$routes->get('/dashboard/agenda_citas/borrar_cita', 'Citas::borrar_cita');

$routes->get('/dashboard/doctor/borrar_doctor', 'Doctores::borrar_doctor');
$routes->get('/dashboard/doctor/editar_doctor', 'Doctores::Index');

$routes->post('/dashboard/doctor/editar_doctor/editar_doctor', 'Doctores::editar_doctor');
$routes->post('/dashboard/doctor/agregar_doctor', 'Doctores::agregar_doctor');

$routes->get('/dashboard/editar_usuario', 'Configuracion::editar_usuario_vista');
$routes->post('/dashboard/usuario/editar_usuario', 'Configuracion::editar_usuario');

$routes->get('/dashboard/borrar_usuario', 'Configuracion::borrar_usuario');

// Inventario

$routes->post('/dashboard/agregar_inventario', 'Configuracion::agregar_inventario');

$routes->get('/dashboard/inventario/modificar_inventario', 'Configuracion::modificar_inventario_v');
$routes->post('/dashboard/modificar_inventario/modificar_inventario', 'Configuracion::modificar_inventario');

$routes->get('/dashboard/inventario/borrar_inventario', 'Configuracion::borrar_inventario');

// Logout

$routes->get('/dashboard/logout', 'Dashboard::Logout');

$routes->post('/dashboard/usuario/agregar_usuario', 'Configuracion::Usuario');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
