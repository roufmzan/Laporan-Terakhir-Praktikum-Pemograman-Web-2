<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->setAutoRoute(true);

$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});

// Route untuk fitur AJAX
$routes->get('/ajax', 'AjaxController::index');
$routes->get('/ajax/getData', 'AjaxController::getData');
$routes->delete('/ajax/delete/(:num)', 'AjaxController::delete/$1');

// Route untuk REST API (Read Only)
$routes->get('post', 'Post::index');
$routes->get('post/(:segment)', 'Post::show/$1');

// Mengamankan method POST, PUT, dan DELETE untuk resource /post
$routes->post('post', 'Post::create', ['filter' => 'apiauth']);
$routes->put('post/(:segment)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->delete('post/(:segment)', 'Post::delete/$1', ['filter' => 'apiauth']);

$routes->post('api/login', 'Api\Auth::login');

// Handle CORS Preflight OPTIONS request
$routes->options('(:any)', '', ['filter' => 'cors']);
