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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// //crear
$routes->get('pelicula/new', 'Pelicula::new', ['as' => 'pelicula.new']);
// $routes->post('pelicula/create', 'Pelicula::create');

// // ver
// $routes->get('pelicula', 'Pelicula::index');
// $routes->get('pelicula/(:num)', 'Pelicula::show/$1');

// // actualizar
// $routes->get('pelicula/(:num)/edit', 'Pelicula::edit/$1');
// $routes->post('pelicula/update/(:num)', 'Pelicula::update/$1');
// //$routes->put('pelicula/(:num)','Pelicula::update/$1');

// // eliminar
// $routes->post('pelicula/delete/(:num)', 'Pelicula::delete/$1');
// $routes->delete('pelicula/(:num)', 'Pelicula::update/$1');

//['namespace' => 'App\Controllers']

$routes->group('dashboard',['namespace' =>'\App\Controllers\Dashboard'], function ($routes) {
    $routes->presenter('pelicula');
    $routes->presenter('categoria');
});

//$routes->presenter('/dashboard/categoria', ['controller' =>'\App\Controllers\Categoria']);
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
