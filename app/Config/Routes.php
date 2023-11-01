<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/membership','Home::membership');
$routes->get('/book','Home::book');
$routes->get('/services','Home::services');
$routes->get('/products','Home::products');
$routes->get('/register','Home::register');
//authentication
$routes->post('/check','Home::Authentication');
$routes->get('/logout','Home::logout');
//saving admin data
$routes->post('/add-account','Home::addAccount');
$routes->post('/update','Home::updateAccount');
$routes->post('/save-product','Home::saveProduct');
$routes->post('/update-product','Home::updateProduct');
$routes->post('/save-membership','Home::saveFee');

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('admin/dashboard','Home::Dashboard');
    $routes->get('admin/maintenance','Home::Maintenance');
    $routes->get('admin/new-account','Home::newAccount');
    $routes->get('admin/edit/(:any)','Home::Edit/$1');
    $routes->get('admin/products','Home::allProducts');
    $routes->get('admin/new-product','Home::newProduct');
    $routes->get('admin/edit-product/(:any)','Home::editProduct/$1');
    $routes->get('admin/fee','Home::addFee');
});

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('/auth','Home::Auth');
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
