<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route - redirect to home
$routes->get('/', 'Home::index');

// Homepage routes
$routes->get('home', 'Home::index');
$routes->get('about', 'Home::about');

$routes->get('services', 'Home::services');
$routes->get('contact', 'Home::contact');

// Registration routes
$routes->get('register', 'Registration::index');
$routes->post('register', 'Registration::create');
$routes->get('register/success', 'Registration::success');

// Login routes (for future implementation)
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

// Admin routes (for future CMS features)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('users', 'Admin\Users::index');
    $routes->get('content', 'Admin\Content::index');
    $routes->get('settings', 'Admin\Settings::index');
});

// API routes for AJAX requests
$routes->group('api', function($routes) {
    $routes->post('register', 'Api\Registration::create');
    $routes->get('services', 'Api\Services::list');
});

