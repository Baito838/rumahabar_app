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
$routes->get('/home', 'Home::index');
$routes->get('/blogs', 'Home::blog');
$routes->get('/pendaftaran', 'Home::pendaftaran');
$routes->get('/about', 'Home::about');
$routes->get('/learn', 'Home::learn');

$routes->get('/masuk', 'Auth::login');
$routes->post('/masuk/auth', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register');
$routes->post('/daftar', 'Auth::daftar');
$routes->get('/daftar', 'Auth::daftar');
$routes->get('blog/(:any)', 'Home::Detail/$1');


$routes->get('/profile', 'Profile::index', ['filter' => 'filter']);
$routes->post('/profile_update', 'Profile::update', ['filter' => 'filter']);
$routes->get('/ganti_password', 'Profile::index', ['filter' => 'filter']);
$routes->post('/profile_update_password', 'Profile::update_password', ['filter' => 'filter']);


$routes->get('/pemasukan', 'Keuangan_CRUD::Pemasukan', ['filter' => 'filter']);
$routes->get('/pengeluaran', 'Keuangan_CRUD::Pengeluaran', ['filter' => 'filter']);
$routes->get('/donasi', 'Keuangan_CRUD::Donasi', ['filter' => 'filter']);
$routes->post('/tambah_keuangan', 'Keuangan_CRUD::Create', ['filter' => 'filter']);
$routes->post('/ubah_keuangan', 'Keuangan_CRUD::Update', ['filter' => 'filter']);
$routes->post('/hapus_keuangan', 'Keuangan_CRUD::Delete', ['filter' => 'filter']);



$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'filter']);

$routes->get('/unggulan', 'Dashboard::Jadwal', ['filter' => 'filter']);
$routes->post('/tambah_unggulan', 'Dashboard::Tambah_Unggulan', ['filter' => 'filter']);
$routes->post('/update_unggulan', 'Dashboard::Ubah_Unggulan', ['filter' => 'filter']);
$routes->post('/hapus_unggulan', 'Dashboard::Hapus_Unggulan', ['filter' => 'filter']);

$routes->get('/jadwal_harian', 'Dashboard::Jadwal', ['filter' => 'filter']);
$routes->post('/jadwal_harian', 'Dashboard::Jadwal_Harian', ['filter' => 'filter']);

$routes->post('/tambah_jadwal_mingguan', 'Dashboard::Tambah_Jadwal', ['filter' => 'filter']);
$routes->post('/hapus_mingguan', 'Dashboard::Hapus_Jadwal_Mingguan', ['filter' => 'filter']);
$routes->post('/jadwal_mingguan', 'Dashboard::Jadwal_Mingguan', ['filter' => 'filter']);

$routes->get('/jadwal_mingguan', 'Dashboard::Jadwal', ['filter' => 'filter']);

$routes->get('/user', 'Dashboard::User', ['filter' => 'filter']);
$routes->post('/update', 'Dashboard::User_Update', ['filter' => 'filter']);
$routes->post('/hapus', 'Dashboard::User_Delete', ['filter' => 'filter']);

$routes->get('/santri', 'Biodata::User', ['filter' => 'filter']);
$routes->get('/wali', 'Biodata::User', ['filter' => 'filter']);
$routes->get('/karyawan', 'Biodata::User', ['filter' => 'filter']);
$routes->post('/tambah_data', 'Biodata::Create', ['filter' => 'filter']);
$routes->post('/ubah_data', 'Biodata::Update', ['filter' => 'filter']);
$routes->post('/hapus_data', 'Biodata::Delete', ['filter' => 'filter']);

$routes->get('/absen_santri', 'Absen::Santri', ['filter' => 'filter']);
$routes->get('/absen_pengajar', 'Absen::Pengajar', ['filter' => 'filter']);
$routes->get('/laporan_absen', 'Absen::Laporan', ['filter' => 'filter']);
$routes->get('/laporan_absen_santri', 'Absen::Laporan_Santri', ['filter' => 'filter']);
$routes->get('/laporan_full', 'Absen::Absen_Full', ['filter' => 'filter']);
$routes->post('/absensi', 'Absen::Create_Absen', ['filter' => 'filter']);
$routes->post('/truncate_absen', 'Absen::Truncate_Absen', ['filter' => 'filter']);


$routes->get('/diniyah', 'Laporan_Nilai::Diniyah', ['filter' => 'filter']);
$routes->get('/ziyadah', 'Laporan_Nilai::Ziyadah', ['filter' => 'filter']);
$routes->get('/bahasa_arab', 'Laporan_Nilai::Bahasa', ['filter' => 'filter']);

$routes->post('/tambah_nilai', 'Laporan_Nilai::Tambah', ['filter' => 'filter']);
$routes->post('/update_nilai', 'Laporan_Nilai::Ubah', ['filter' => 'filter']);
$routes->post('/hapus_nilai', 'Laporan_Nilai::Hapus', ['filter' => 'filter']);


$routes->post('/tambah_blog', 'Blog::Tambah_Artikel', ['filter' => 'filter']);
$routes->get('/blog_create', 'Blog::Artikel', ['filter' => 'filter']);
$routes->get('/blog_update', 'Blog::Artikel_CRUD', ['filter' => 'filter']);
$routes->post('/ubah_blog', 'Blog::Artikel_Ubah', ['filter' => 'filter']);
$routes->post('/hapus_blog', 'Blog::Hapus', ['filter' => 'filter']);
$routes->get('dashboard/(:any)', 'Blog::Detail/$1', ['filter' => 'filter']);


/*
* --------------------------------------------------------------------

/*
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
