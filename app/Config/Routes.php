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
    $routes->post('user/update/(:num)', 'User::update/$1');
    $routes->get('user/delete/(:num)', 'User::delete/$1');

    // Rute untuk master kategori
    $routes->get('masterkategori', 'MasterKategori::index');
    $routes->get('masterkategori/create', 'MasterKategori::create');
    $routes->post('masterkategori/store', 'MasterKategori::store');
    $routes->get('masterkategori/edit/(:num)', 'MasterKategori::edit/$1');
    $routes->post('masterkategori/update/(:num)', 'MasterKategori::update/$1');
    $routes->get('masterkategori/delete/(:num)', 'MasterKategori::delete/$1');
    // Rute untuk master daya
    $routes->get('masterdaya', 'MasterDaya::index');
    $routes->get('masterdaya/create', 'MasterDaya::create');
    $routes->post('masterdaya/store', 'MasterDaya::store');
    $routes->get('masterdaya/edit/(:num)', 'MasterDaya::edit/$1');
    $routes->post('masterdaya/update/(:num)', 'MasterDaya::update/$1');
    $routes->get('masterdaya/delete/(:num)', 'MasterDaya::delete/$1');
    // Rute untuk master dimensi
    $routes->get('masterdimensi', 'MasterDimensi::index');
    $routes->get('masterdimensi/create', 'MasterDimensi::create');
    $routes->post('masterdimensi/save', 'MasterDimensi::save');
    $routes->get('masterdimensi/edit/(:num)', 'MasterDimensi::edit/$1');
    $routes->post('masterdimensi/update/(:num)', 'MasterDimensi::update/$1');
    $routes->post('masterdimensi/delete/(:num)', 'MasterDimensi::delete/$1');

    // Rute untuk master fiting
    $routes->get('masterfiting', 'MasterFiting::index');
    $routes->get('masterfiting/create', 'MasterFiting::create');
    $routes->post('masterfiting/save', 'MasterFiting::save');
    $routes->get('masterfiting/edit/(:num)', 'MasterFiting::edit/$1');
    $routes->post('masterfiting/update/(:num)', 'MasterFiting::update/$1');
    $routes->post('masterfiting/delete/(:num)', 'MasterFiting::delete/$1');

    // Rute untuk master gondola
    $routes->get('mastergondola', 'MasterGondola::index');
    $routes->get('mastergondola/create', 'MasterGondola::create');
    $routes->post('mastergondola/save', 'MasterGondola::save');
    $routes->get('mastergondola/edit/(:num)', 'MasterGondola::edit/$1');
    $routes->post('mastergondola/update/(:num)', 'MasterGondola::update/$1');
    $routes->post('mastergondola/delete/(:num)', 'MasterGondola::delete/$1');

    // Rute untuk master jenis
    $routes->get('masterjenis', 'MasterJenis::index');
    $routes->get('masterjenis/create', 'MasterJenis::create');
    $routes->post('masterjenis/save', 'MasterJenis::save');
    $routes->get('masterjenis/edit/(:num)', 'MasterJenis::edit/$1');
    $routes->post('masterjenis/update/(:num)', 'MasterJenis::update/$1');
    $routes->post('masterjenis/delete/(:num)', 'MasterJenis::delete/$1');

    // Rute untuk master jumlah mata
    $routes->get('masterjumlahmata', 'MasterJumlahMata::index');
    $routes->get('masterjumlahmata/create', 'MasterJumlahMata::create');
    $routes->post('masterjumlahmata/save', 'MasterJumlahMata::save');
    $routes->get('masterjumlahmata/edit/(:num)', 'MasterJumlahMata::edit/$1');
    $routes->post('masterjumlahmata/update/(:num)', 'MasterJumlahMata::update/$1');
    $routes->post('masterjumlahmata/delete/(:num)', 'MasterJumlahMata::delete/$1');

    // Rute untuk master kaki
    $routes->get('masterkaki', 'MasterKaki::index');
    $routes->get('masterkaki/create', 'MasterKaki::create');
    $routes->post('masterkaki/save', 'MasterKaki::save');
    $routes->get('masterkaki/edit/(:num)', 'MasterKaki::edit/$1');
    $routes->post('masterkaki/update/(:num)', 'MasterKaki::update/$1');
    $routes->post('masterkaki/delete/(:num)', 'MasterKaki::delete/$1');

    // Rute untuk master merk
    $routes->get('mastermerk', 'MasterMerk::index');
    $routes->get('mastermerk/create', 'MasterMerk::create');
    $routes->post('mastermerk/save', 'MasterMerk::save');
    $routes->get('mastermerk/edit/(:num)', 'MasterMerk::edit/$1');
    $routes->post('mastermerk/update/(:num)', 'MasterMerk::update/$1');
    $routes->post('mastermerk/delete/(:num)', 'MasterMerk::delete/$1');

    // Rute untuk master model
    $routes->get('mastermodel', 'MasterModel::index');
    $routes->get('mastermodel/create', 'MasterModel::create');
    $routes->post('mastermodel/save', 'MasterModel::save');
    $routes->get('mastermodel/edit/(:num)', 'MasterModel::edit/$1');
    $routes->post('mastermodel/update/(:num)', 'MasterModel::update/$1');
    $routes->post('mastermodel/delete/(:num)', 'MasterModel::delete/$1');

    // Rute untuk master pelengkap
    $routes->get('masterpelengkap', 'MasterPelengkap::index');
    $routes->get('masterpelengkap/create', 'MasterPelengkap::create');
    $routes->post('masterpelengkap/save', 'MasterPelengkap::save');
    $routes->get('masterpelengkap/edit/(:num)', 'MasterPelengkap::edit/$1');
    $routes->post('masterpelengkap/update/(:num)', 'MasterPelengkap::update/$1');
    $routes->post('masterpelengkap/delete/(:num)', 'MasterPelengkap::delete/$1');

    // Rute untuk master satuan
    $routes->get('mastersatuan', 'MasterSatuan::index');
    $routes->get('mastersatuan/create', 'MasterSatuan::create');
    $routes->post('mastersatuan/save', 'MasterSatuan::save');
    $routes->get('mastersatuan/edit/(:num)', 'MasterSatuan::edit/$1');
    $routes->post('mastersatuan/update/(:num)', 'MasterSatuan::update/$1');
    $routes->post('mastersatuan/delete/(:num)', 'MasterSatuan::delete/$1');

    // Rute untuk master ukuran barang
    $routes->get('masterukuranbarang', 'MasterUkuranBarang::index');
    $routes->get('masterukuranbarang/create', 'MasterUkuranBarang::create');
    $routes->post('masterukuranbarang/save', 'MasterUkuranBarang::save');
    $routes->get('masterukuranbarang/edit/(:num)', 'MasterUkuranBarang::edit/$1');
    $routes->post('masterukuranbarang/update/(:num)', 'MasterUkuranBarang::update/$1');
    $routes->post('masterukuranbarang/delete/(:num)', 'MasterUkuranBarang::delete/$1');

    // Rute untuk master voltase
    $routes->get('mastervoltase', 'MasterVoltase::index');
    $routes->get('mastervoltase/create', 'MasterVoltase::create');
    $routes->post('mastervoltase/save', 'MasterVoltase::save');
    $routes->get('mastervoltase/edit/(:num)', 'MasterVoltase::edit/$1');
    $routes->post('mastervoltase/update/(:num)', 'MasterVoltase::update/$1');
    $routes->post('mastervoltase/delete/(:num)', 'MasterVoltase::delete/$1');

    // Rute untuk master warna bibir
    $routes->get('masterwarnabibir', 'MasterWarnaBibir::index');
    $routes->get('masterwarnabibir/create', 'MasterWarnaBibir::create');
    $routes->post('masterwarnabibir/save', 'MasterWarnaBibir::save');
    $routes->get('masterwarnabibir/edit/(:num)', 'MasterWarnaBibir::edit/$1');
    $routes->post('masterwarnabibir/update/(:num)', 'MasterWarnaBibir::update/$1');
    $routes->post('masterwarnabibir/delete/(:num)', 'MasterWarnaBibir::delete/$1');

    // Rute untuk master warna body
    $routes->get('masterwarnabody', 'MasterWarnaBody::index');
    $routes->get('masterwarnabody/create', 'MasterWarnaBody::create');
    $routes->post('masterwarnabody/save', 'MasterWarnaBody::save');
    $routes->get('masterwarnabody/edit/(:num)', 'MasterWarnaBody::edit/$1');
    $routes->post('masterwarnabody/update/(:num)', 'MasterWarnaBody::update/$1');
    $routes->post('masterwarnabody/delete/(:num)', 'MasterWarnaBody::delete/$1');

    // Rute untuk master warna sinar
    $routes->get('masterwarnasinar', 'MasterWarnaSinar::index');
    $routes->get('masterwarnasinar/create', 'MasterWarnaSinar::create');
    $routes->post('masterwarnasinar/save', 'MasterWarnaSinar::save');
    $routes->get('masterwarnasinar/edit/(:num)', 'MasterWarnaSinar::edit/$1');
    $routes->post('masterwarnasinar/update/(:num)', 'MasterWarnaSinar::update/$1');
    $routes->post('masterwarnasinar/delete/(:num)', 'MasterWarnaSinar::delete/$1');
});
