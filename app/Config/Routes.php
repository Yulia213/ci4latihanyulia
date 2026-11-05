<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/user', 'User::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'User::kondisi');

$routes->get('/dashboard', function () {
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
    return view('dashboard');
});

$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');

$routes->post('/user/delete/(:num)', 'User::delete/$1');

$routes->get('/tambah', 'User::create');
$routes->post('/tambah', 'User::tambah');
