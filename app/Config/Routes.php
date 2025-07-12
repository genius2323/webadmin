<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =================================================================
// RUTE PUBLIK & AUTENTIKASI
// Rute ini bisa diakses siapa saja, bahkan sebelum login.
// =================================================================

// Jadikan halaman login sebagai halaman utama
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login/process', 'Auth::process');
$routes->get('/logout', 'Auth::logout');


// =================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN)
// Semua rute di dalam grup ini akan dicek oleh 'auth' filter.
// Jika belum login, akan otomatis dilempar ke halaman /login.
// =================================================================
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    
    // Rute untuk dashboard setelah login berhasil
    $routes->get('dashboard', 'Dashboard::index');

    // Rute untuk manajemen user
    $routes->get('user', 'User::index');
    $routes->get('user/create', 'User::create');
    $routes->post('user/store', 'User::store');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->get('user/delete/(:num)', 'User::delete/$1');

});
