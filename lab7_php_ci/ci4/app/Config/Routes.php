<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about'); 
$routes->get('/contact', 'Page::contact'); 
$routes->get('/faqs', 'Page::faqs'); 

$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

$routes->get('/admin/artikel', 'Artikel::admin_index');
$routes->match(['get', 'post'], '/admin/artikel/add', 'Artikel::add');
$routes->match(['get', 'post'], '/admin/artikel/edit/(:num)', 'Artikel::edit/$1');
$routes->get('/admin/artikel/delete/(:num)', 'Artikel::delete/$1');
// API Routes
$routes->get('/post', 'Artikel::apiIndex');
$routes->post('/post', 'Artikel::apiCreate');
$routes->put('/post/(:num)', 'Artikel::apiUpdate/$1');
$routes->delete('/post/(:num)', 'Artikel::apiDelete/$1');
$routes->post('/api/login', 'Artikel::apiLogin');
