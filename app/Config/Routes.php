<?php

namespace Config;


$routes = Services::routes();
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
$routes->get('/', 'Home::index');
$routes->get("setup", "Setup::index");
service('auth')->routes($routes);
$routes->group("", ["filter" => "login"], static function ($routes) {
    $routes->get("set-password", "Password::set");
    $routes->post("set-password", "Password::update");
    $routes->get("articles/(:num)/delete", "Articles::confirmDelete/$1");
    $routes->resource("articles", ["placeholder" => "(:num)"]);
    $routes->get("articles/(:num)/image/edit", "Article\Image::new/$1");
    $routes->post("articles/(:num)/image/create", "Article\Image::create/$1");
    $routes->get("articles/(:num)/image", "Article\Image::get/$1");
    $routes->post("articles/(:num)/image/delete", "Article\Image::delete/$1");

});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
