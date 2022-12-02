<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LandingPageController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'UsersController::login_page');
$routes->add('/loginAuth', 'UsersController::loginAuth');
$routes->get('/register', 'UsersController::register_page');
$routes->add('/save_register', 'UsersController::save_register');
$routes->add('/logout', 'UsersController::logout');

$routes->get('/home', 'Home::index');
$routes->get('/profile', 'ProfileController::index');
$routes->get('/editProfile/(:segment)', 'ProfileController::edit_page/$1');
$routes->add('/saveProfile', 'ProfileController::save_profile');

$routes->get('/post', 'PostController::index');
$routes->add('/posting', 'PostController::save_posting');

$routes->add('/comment', 'PostController::comment');
$routes->add('/like', 'PostController::likes');
$routes->add('/unlike', 'PostController::unlikes');
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
