<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =================================================================
// RUTE PUBLIK & AUTENTIKASI
// =================================================================

$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login/process', 'Auth::process');
$routes->get('/logout', 'Auth::logout');


// =================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN)
// =================================================================
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    // Master Customer
    $routes->get('mastercustomer', 'MasterCustomer::index');
    $routes->get('mastercustomer/create', 'MasterCustomer::create');
    $routes->post('mastercustomer/save', 'MasterCustomer::save');
    $routes->get('mastercustomer/edit/(:num)', 'MasterCustomer::edit/$1');
    $routes->post('mastercustomer/update/(:num)', 'MasterCustomer::update/$1');
    $routes->get('mastercustomer/delete/(:num)', 'MasterCustomer::delete/$1');
    // Master Sales
    $routes->get('mastersales', 'MasterSales::index');
    $routes->get('mastersales/create', 'MasterSales::create');
    $routes->post('mastersales/save', 'MasterSales::save');
    $routes->get('mastersales/edit/(:num)', 'MasterSales::edit/$1');
    $routes->post('mastersales/update/(:num)', 'MasterSales::update/$1');
    $routes->get('mastersales/delete/(:num)', 'MasterSales::delete/$1');
    // API untuk modal pilih sales
    $routes->get('salesapi', 'SalesApi::index');
    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Manajemen User
    $routes->resource('user');
    
    // --- Rute Penjualan (CRUD Lengkap) ---
    $routes->get('penjualan', 'Penjualan::index'); // Daftar semua penjualan
    $routes->get('penjualan/new', 'Penjualan::new'); // Form tambah penjualan baru
    $routes->post('penjualan/create', 'Penjualan::create'); // Proses pembuatan penjualan baru
    $routes->get('penjualan/detail/(:num)', 'Penjualan::detail/$1'); // Lihat detail penjualan
    $routes->post('penjualan/addItem/(:num)', 'Penjualan::addItem/$1'); // Tambah item ke penjualan
    $routes->get('penjualan/deleteItem/(:num)', 'Penjualan::deleteItem/$1'); // Hapus item dari penjualan
    $routes->get('penjualan/finalize/(:num)', 'Penjualan::finalize/$1'); // Finalisasi penjualan

    // Batas Tanggal
    $routes->get('batas-tanggal', 'BatasTanggal::index');
    $routes->post('batas-tanggal/update', 'BatasTanggal::update');

    // --- Master Data ---
    $routes->resource('masterkategori', ['controller' => 'MasterKategori']);
    $routes->resource('masterdaya', ['controller' => 'MasterDaya']);
    $routes->resource('masterdimensi', ['controller' => 'MasterDimensi']);
    $routes->resource('masterfiting', ['controller' => 'MasterFiting']);
    $routes->resource('mastergondola', ['controller' => 'MasterGondola']);
    $routes->resource('masterjenis', ['controller' => 'MasterJenis']);
    $routes->resource('masterjumlahmata', ['controller' => 'MasterJumlahMata']);
    $routes->resource('masterkaki', ['controller' => 'MasterKaki']);
    $routes->resource('mastermerk', ['controller' => 'MasterMerk']);
    $routes->resource('mastermodel', ['controller' => 'MasterModel']);
    $routes->resource('masterpelengkap', ['controller' => 'MasterPelengkap']);
    $routes->resource('mastersatuan', ['controller' => 'MasterSatuan']);
    $routes->resource('masterukuranbarang', ['controller' => 'MasterUkuranBarang']);
    $routes->resource('mastervoltase', ['controller' => 'MasterVoltase']);
    $routes->resource('masterwarnabibir', ['controller' => 'MasterWarnaBibir']);
    $routes->resource('masterwarnabody', ['controller' => 'MasterWarnaBody']);
    $routes->resource('masterwarnasinar', ['controller' => 'MasterWarnaSinar']);

});
