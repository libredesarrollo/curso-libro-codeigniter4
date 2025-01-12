<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('dashboard', ['namespace' => '\App\Controllers\Dashboard'], function ($routes) {
    $routes->presenter('pelicula');
    $routes->presenter('categoria');
}); //3UH25970119751840

$routes->get('pelicula/new', 'Pelicula::new', ['as' => 'pelicula.new']);

$routes->get('login', '\App\Controllers\Web\Usuario::login', ['as' => 'usuario.login']);
$routes->post('login', '\App\Controllers\Web\Usuario::login_post', ['as' => 'usuario.login.post']);
$routes->get('registrar', '\App\Controllers\Web\Usuario::registrar', ['as' => 'usuario.registrar']);
$routes->post('registrar', '\App\Controllers\Web\Usuario::registrar_post', ['as' => 'usuario.registrar.post']);

$routes->get('logout', '\App\Controllers\Web\Usuario::logout', ['as' => 'usuario.logout']);

// API REST
$routes->group('api', ['namespace' => '\App\Controllers\Api'], function ($routes) {
    $routes->resource('pelicula');
});

$routes->group('paypal', function ($routes) {
    $routes->post('process/(:alphanum)', '\App\Controllers\PayPal\PaymentPaypal::process/$1', ['as' => 'paypal-process']);
    $routes->get('', '\App\Controllers\PayPal\PaymentPaypal::index');
});