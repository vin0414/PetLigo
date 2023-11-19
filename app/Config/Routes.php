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
$routes->get('/load-products','Home::loadProducts');
$routes->get('/search-products','Home::searchProducts');
$routes->get('/filter-products','Home::filterProducts');
$routes->get('/filter-category-products','Home::filterCategoryProducts');
$routes->get('/cart/buy/(:any)','Cart::buy/$1');
$routes->get('/cart/remove/(:any)','Cart::remove/$1');
$routes->get('/cart/view','Cart::viewCart');
$routes->get('/cart/details/(:any)','Cart::details/$1');
$routes->get('/register','Home::register');
$routes->get('/forgot-password','Home::forgotPassword');
//authentication
$routes->post('/check','Home::Authentication');
$routes->post('/check-account','Home::checkAccount');
$routes->get('/logout','Home::logout');
$routes->post('/create-account','Home::createAccount');
$routes->get('/verify/email', 'Home::verify');
$routes->post('/verify-email','Home::verifyEmail');
$routes->get('/sign-out','Home::signOut');
//saving admin data
$routes->post('/add-account','Home::addAccount');
$routes->post('/update','Home::updateAccount');
$routes->post('/save-product','Home::saveProduct');
$routes->post('/update-product','Home::updateProduct');
$routes->post('/save-membership','Home::saveFee');
$routes->post('/update-fee','Home::updateFee');
$routes->post('/save-discount','Home::saveDiscount');
$routes->post('/update-discount','Home::updateDiscount');
$routes->post('/add-stocks','Home::addStocks');
$routes->post('/add-services','Home::addServices');
$routes->post('/update-services','Home::updateServices');
$routes->get('/back-up','DownloadController::backup');
$routes->post('/save-category','Home::saveCategory');
//customer
$routes->post('/save-pet','Customer::savePet');
$routes->post('cart/checkout','Cart::checkOut');

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('admin/dashboard','Home::Dashboard');
    $routes->get('admin/reservations','Home::Reservations');
    $routes->get('admin/orders','Home::Orders');
    $routes->get('admin/membership','Home::Members');
    $routes->get('admin/reports','Home::Reports');
    $routes->get('admin/maintenance','Home::Maintenance');
    $routes->get('admin/new-account','Home::newAccount');
    $routes->get('admin/edit/(:any)','Home::Edit/$1');
    $routes->get('admin/products','Home::allProducts');
    $routes->get('admin/new-product','Home::newProduct');
    $routes->get('admin/edit-product/(:any)','Home::editProduct/$1');
    $routes->get('admin/fee','Home::addFee');
    $routes->get('admin/edit-fee/(:any)','Home::editFee/$1');
    $routes->get('admin/edit-discount/(:any)','Home::editDiscount/$1');
    $routes->get('admin/new-services','Home::newServices');
    $routes->get('admin/edit-services/(:any)','Home::editServices/$1');
    $routes->get('admin/profile','Home::Profile');
});

$routes->group('',['filter'=>'customerAuthCheck'],function($routes)
{
    $routes->get('customer/dashboard','Customer::Dashboard');
    $routes->get('customer/reservations','Customer::Reservations');
    $routes->get('customer/orders','Customer::Orders');
    $routes->get('customer/pets','Customer::Pets');
    $routes->get('customer/profile','Customer::Profile');
    $routes->get('cart/shipping','Customer::shipping');
    $routes->get('customer/success','Customer::Success');
});

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('/auth','Home::Auth');
});

$routes->group('',['filter'=>'customerAlreadyLoggedIn'],function($routes)
{
    $routes->get('/sign-in','Home::Login');
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
