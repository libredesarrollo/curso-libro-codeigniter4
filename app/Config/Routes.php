<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('pelicula/new', 'Pelicula::new', ['as' => 'pelicula.new']);

$routes->get('login-manual', '\App\Controllers\Web\Usuario::login', ['as' => 'usuario.login']);
$routes->post('login', '\App\Controllers\Web\Usuario::login_post', ['as' => 'usuario.login.post']);
$routes->get('registrar-manual', '\App\Controllers\Web\Usuario::registrar', ['as' => 'usuario.registrar']);
$routes->post('registrar', '\App\Controllers\Web\Usuario::registrar_post', ['as' => 'usuario.registrar.post']);

$routes->get('logout', '\App\Controllers\Web\Usuario::logout', ['as' => 'usuario.logout']);

// API REST
$routes->group('api', ['namespace' => '\App\Controllers\Api'], function ($routes) {
    $routes->resource('pelicula');
    $routes->resource('categoria');
});

$routes->group('paypal', function ($routes) {
    $routes->post('process/(:alphanum)', '\App\Controllers\PayPal\PaymentPaypal::process/$1', ['as' => 'paypal-process']);
    $routes->get('', '\App\Controllers\PayPal\PaymentPaypal::index');
});


// shield
service('auth')->routes($routes);

$routes->group('dashboard', ['namespace' => '\App\Controllers\Dashboard'], function ($routes) {
    $routes->presenter('pelicula');
    $routes->presenter('categoria');
}); //3UH25970119751840

// SPATIE y permisos
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], function ($routes) {
    $routes->get('usuario', 'Usuario::index', ['as' => 'usuario.index', 'filter' => 'session']);
    $routes->get('usuario/(:num)', 'Usuario::show/$1', ['as' => 'usuario.show']);
    $routes->post('usuario/permisos_manejar/(:num)', 'Usuario::permisos_manejar/$1', ['as' => 'usuario.permisos_manejar']);
    $routes->post('usuario/grupos_manejar/(:num)', 'Usuario::grupos_manejar/$1', ['as' => 'usuario.grupos_manejar']);
});

// Inventario
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], function ($routes) {
    $routes->resource('category');
    $routes->resource('tag');
    
    $routes->get('product/trace/(:num)', 'Product::trace/$1', ['as' => 'product.trace']);
    $routes->resource('product');

    // $routes->get('demo-pdf', 'Product::demoPDF'); // DEMO

    $routes->post('product/add-stock/(:num)/(:num)', 'Product::addStock/$1/$2');
    $routes->post('product/exit-stock/(:num)/(:num)', 'Product::exitStock/$1/$2');

    $routes->get('user/get-by-type/(:alpha)', 'User::getUsers/$1/');
});


// *** Curso Codeigniter base

$routes->group('lib', function ($routes) {
	$routes->get('curl_get', 'MyLibraries::curl_get');
	$routes->get('curl_post', 'MyLibraries::curl_post');
	$routes->get('curl_put', 'MyLibraries::curl_put');
	$routes->get('curl_put', 'MyLibraries::curl_put');
	$routes->get('curl_remove', 'MyLibraries::curl_remove');
	$routes->get('agent', 'MyLibraries::agent');
	$routes->get('email', 'MyLibraries::email');
	$routes->get('encrypt', 'MyLibraries::encrypt');
	$routes->get('time', 'MyLibraries::time');
	$routes->get('uri', 'MyLibraries::uri');
	$routes->get('file', 'MyLibraries::file');
});

//$routes->get('/contacto', 'Home::contacto');
$routes->get('/contacto/(:any)', 'Home::contacto/$1', ['as' => 'contacto']);

$routes->get('/image', 'Home::image');
// $routes->get('/facebook', 'Home::facebook');

$routes->get('/image/(:num)/(:any)', 'Home::image/$1/$2', ['as' => 'get_image']);
$routes->get('/movie/image/(:num)', 'Movie::delete_image/$1', ['as' => 'image_delete']);
$routes->group('dashboard', function ($routes) {

	//$routes->get('movie', 'dashboard/MovieController::index');
	//$routes->get('movie/test/(:any)', 'dashboard/MovieController::test/$1');
	//$routes->get('movie/show/', 'dashboard/MovieController::show/');
});

$routes->resource('movie');
$routes->resource('category', ['except' => ['show']]);
$routes->resource('client', ['except' => ['show']]);

//***REST */
$routes->get('rest-movie/paginate','RestMovie::paginate');
$routes->get('rest-movie/search','RestMovie::search');

$routes->resource('rest-movie', ['controller' => 'RestMovie']);



$routes->get('/login', 'web/User::login', ['as' => 'user_login_get']);
$routes->post('/login_post', 'web/User::login_post', ['as' => 'user_login_post']);
$routes->post('/logout', 'web/User::logout', ['as' => 'user_logout']);


//helpers
$routes->get('/helper/array', 'Myhelper::array');
$routes->get('/helper/filesystem', 'Myhelper::filesystem');
$routes->get('/helper/number', 'Myhelper::number');
$routes->get('/helper/text', 'Myhelper::text');
$routes->get('/helper/url', 'Myhelper::url');

//**********/ Store */
$routes->get('/', 'Store/Movie::index', ['as' => 'store_movie_index']);

$routes->group('store', function ($routes) {

	// stripe
	// $routes->get('movie/stripe/client_secret_stripe/(:num)', 'Store\Movie::client_secret_stripe/$1', ['as' => 'store_client_secret_stripe']);
	// $routes->get('movie/stripe/show_stripe/(:num)', 'Store\Buyed::show_stripe/$1', ['as' => 'store_show_stripe']);
	// $routes->post('movie/stripe/buy_success/(:num)', 'Store\Movie::buy_success_stripe/$1', ['as' => 'store_movie_buy_success']);

	// $routes->get('pay/stripe/(:num)', 'Store\Movie::form_stripe/$1', ['as' => 'store_movie_form_stripe']);
	// $routes->get('(:num)', 'Store\Movie::show/$1', ['as' => 'store_movie_show']);
	// $routes->get('movie/buy/(:num)', 'Store\Movie::buy/$1', ['as' => 'store_movie_buy']);
	// $routes->get('movie/buy_success/(:num)', 'Store\Movie::buy_success/$1', ['as' => 'store_movie_buy_success']);
	// $routes->get('movie/buy_cancel/(:num)', 'Store\Movie::buy_cancel/$1', ['as' => 'store_movie_buy_cancel']);

	//*Buyed */
	$routes->get('buyed', 'Store\Buyed::index', ['as' => 'store_buyed_index']);
	$routes->get('buyed/(:num)', 'Store\Buyed::show/$1', ['as' => 'store_buyed_show']);
});


// CRUD generico
$routes->resource('categoryautocrud', ['controller' => 'CategoryAutoCRUD']); 


$routes->get('contacto', 'Other::contacto');
$routes->presenter('regular');
$routes->presenter('admin');
$routes->presenter('other');