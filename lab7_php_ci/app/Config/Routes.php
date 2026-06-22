<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// API Routes
$routes->get('/post', 'Artikel::apiIndex');
$routes->post('/post', 'Artikel::apiCreate');
$routes->put('/post/(:num)', 'Artikel::apiUpdate/$1');
$routes->delete('/post/(:num)', 'Artikel::apiDelete/$1');
$routes->post('/api/login', 'Artikel::apiLogin');
