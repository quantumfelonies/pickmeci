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
$routes->get('landing', 'LandingController::index');
$routes->get('frontend/landing', 'LandingController::index');
$routes->get('frontend/help', 'Help::help');


// $routes->get('auth/login', 'UserAuthController::login');
// $routes->get('auth/verify', 'UserAuthController::verifyOTP');
// $routes->post('send-otp', 'UserAuthController::sendOTP');
// $routes->post('verify-otp', 'UserAuthController::verifyOTP');

// Routes for the user section
$routes->get('/', 'Home::index');
$routes->get('auth/login', 'UserAuthController::login');
$routes->get('auth/verify', 'UserAuthController::verify');
$routes->post('sendOTP', 'UserAuthController::sendOTP');
$routes->post('verifyOTP', 'UserAuthController::verifyOTP');
$routes->get('user/index', 'UserAuthController::index');
$routes->get('user/logout', 'UserAuthController::logout');
$routes->get('user/voter', 'voter::index');
$routes->get('user/help', 'help::index');
$routes->get('user/year', 'year::index');
$routes->get('user/candidate', 'candidate::index');
$routes->get('user/confirmation', 'confirmation::index');
$routes->get('user/saveddata', 'saveddata::index');
$routes->post('user/SavedData', 'saveddata::index');
$routes->post('user/SavedData.php', 'SavedData::index');
$routes->get('user/validation', 'validation::index');
$routes->get('databasecontroller/connectToDatabase', 'DatabaseController::connectToDatabase');
$routes->get('user/profile', 'profile::index');
$routes->add('test_db_connection', 'test_db_connection::index');
$routes->post('processEmail', 'auth::processEmail');

// Routes for the admin section
$routes->group('admin', function ($routes) {
    // Admin authentication routes
    $routes->get('login', 'AdminAuthController::login');
    $routes->post('login', 'AdminAuthController::login');
    $routes->get('logout', 'AdminAuthController::logout');

    // Admin dashboard route
    $routes->get('index', 'AdminController::index');

    // Voters list route
    $routes->get('votersList', 'VoterController::index');

    // Candidate routes
    $routes->get('register', 'CandidateController::register');
    $routes->add('register', 'CandidateController::register');
    $routes->post('register', 'CandidateController::register');
    $routes->get('list', 'CandidateController::list');
    $routes->get('candidates/edit/(:num)', 'CandidateController::edit/$1');
    $routes->post('candidates/edit/(:num)', 'CandidateController::edit/$1');

    // Positions routes
    $routes->get('positions', 'PositionController::index');
    $routes->get('addposition', 'PositionController::add');
    $routes->get('positions/add', 'PositionController::add');
    $routes->get('positions/update/(:num)', 'PositionController::update/$1');
    $routes->get('positions/delete/(:num)', 'PositionController::delete/$1');
    $routes->post('positions/add', 'PositionController::add');
    $routes->post('positions/update/(:num)', 'PositionController::update/$1');
    $routes->post('positions/delete/(:num)', 'PositionController::delete/$1');

    //vote chart route
    $routes->get('admin/votes', 'VoteController::index');

    // $routes->get('admin/votes', 'VoteController::index');
    // $routes->get('admin/votes/chart', 'VoteController::chart');

});



// $routes->group ('admin', function ($routes) {
//     $routes->get('voters', function(){
//         return "I am tired"
//     });
//     $routes->get('RegCandidates', 'RegCandidatesController::regcandidates');
// }

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
