<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// menu utama web
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('home/berita', 'Home::Berita');
$routes->get('home/viewberita/(:any)', 'Home::ViewBerita/$1');
$routes->get('home/detailjurusan/(:segment)', 'Home::DetailJurusan/$1');
$routes->get('home/guru', 'Home::Guru');
$routes->get('home/download', 'Home::Download');
$routes->get('home/sejarah', 'Home::Sejarah');
$routes->get('home/visimisi', 'Home::Visimisi');
$routes->get('home/sambutan', 'Home::Sambutan');
// dashboard
$routes->get('dashboard', 'Dashboard::index');
// jurusan
$routes->get('jurusan', 'Jurusan::index');
$routes->get('jurusan/input', 'Jurusan::Input');
$routes->add('jurusan/insertdata', 'Jurusan::InsertData');
$routes->get('jurusan/editdata/(:segment)', 'Jurusan::EditData/$1');
$routes->add('jurusan/updatedata/(:segment)', 'Jurusan::UpdateData/$1');
$routes->get('jurusan/deletedata/(:segment)', 'Jurusan::DeleteData/$1');
// kelas
$routes->get('kelas', 'Kelas::index');
$routes->add('kelas/insertdata', 'Kelas::InsertData');
$routes->add('kelas/updatedata/(:segment)', 'Kelas::UpdateData/$1');
$routes->get('kelas/deletedata/(:segment)', 'Kelas::DeleteData/$1');
// Tahun Ajaran
$routes->get('ta', 'Ta::index');
$routes->add('ta/insertdata', 'Ta::InsertData');
$routes->add('ta/updatedata/(:segment)', 'Ta::UpdateData/$1');
$routes->get('ta/deletedata/(:segment)', 'Ta::DeleteData/$1');
// mapel
$routes->get('mapel', 'Mapel::index');
$routes->add('mapel/insertdata', 'Mapel::InsertData');
$routes->add('mapel/updatedata/(:segment)', 'Mapel::UpdateData/$1');
$routes->get('mapel/deletedata/(:segment)', 'Mapel::DeleteData/$1');
// guru
$routes->get('user', 'User::index');
$routes->get('user/input', 'User::Input');
$routes->add('user/insertdata', 'User::InsertData');
$routes->get('user/editdata/(:segment)', 'User::EditData/$1');
$routes->add('user/updatedata/(:segment)', 'User::UpdateData/$1');
$routes->get('user/deletedata/(:segment)', 'User::DeleteData/$1');
// guru
$routes->get('guru', 'Guru::index');
$routes->get('guru/input', 'Guru::Input');
$routes->add('guru/insertdata', 'Guru::InsertData');
$routes->get('guru/editdata/(:segment)', 'Guru::EditData/$1');
$routes->add('guru/updatedata/(:segment)', 'Guru::UpdateData/$1');
$routes->get('guru/deletedata/(:segment)', 'Guru::DeleteData/$1');
// siswa
$routes->get('siswa', 'Siswa::index');
$routes->get('siswa/input', 'Siswa::Input');
$routes->add('siswa/insertdata', 'Siswa::InsertData');
$routes->get('siswa/editdata/(:segment)', 'Siswa::EditData/$1');
$routes->add('siswa/updatedata/(:segment)', 'Siswa::UpdateData/$1');
$routes->get('siswa/deletedata/(:segment)', 'Siswa::DeleteData/$1');
// download
$routes->get('download', 'Download::index');
$routes->get('download/input', 'Download::Input');
$routes->add('download/insertdata', 'Download::InsertData');
$routes->get('download/editdata/(:segment)', 'Download::EditData/$1');
$routes->add('download/updatedata/(:segment)', 'Download::UpdateData/$1');
$routes->get('download/deletedata/(:segment)', 'Download::DeleteData/$1');

// berita
$routes->get('berita', 'Berita::index');
$routes->get('berita/input', 'Berita::Input');
$routes->add('berita/insertdata', 'Berita::InsertData');
$routes->get('berita/editdata/(:segment)', 'Berita::EditData/$1');
$routes->add('berita/updatedata/(:segment)', 'Berita::UpdateData/$1');
$routes->get('berita/deletedata/(:segment)', 'Berita::DeleteData/$1');
$routes->get('berita/view/(:segment)', 'Berita::View/$1');
// auth
$routes->get('auth', 'Auth');
$routes->get('login', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->add('auth/ceklogin', 'Auth::CekLogin');
// setting
$routes->add('setting/logo', 'Setting::Logo');
$routes->add('setting/updatelogoheader', 'Setting::UpdateLogoHeader');
$routes->add('setting/updatelogosekolah', 'Setting::UpdateLogoSekolah');
$routes->add('setting/updatelogodinas', 'Setting::UpdateLogoDinas');
$routes->add('setting/sekolah', 'Setting::Sekolah');
$routes->add('setting/updatesekolah', 'Setting::UpdateSekolah');
$routes->add('setting/sambutan', 'Setting::Sambutan');
$routes->add('setting/updatesambutan', 'Setting::UpdateSambutan');
$routes->get('setting/deletedata/(:segment)', 'Setting::DeleteData/$1');
// slider
$routes->get('slider', 'Slider::index');
$routes->get('slider/input', 'Slider::Input');
$routes->add('slider/insertdata', 'Slider::InsertData');
$routes->get('slider/editdata/(:segment)', 'Slider::EditData/$1');
$routes->add('slider/updatedata/(:segment)', 'Slider::UpdateData/$1');
$routes->get('slider/deletedata/(:segment)', 'Slider::DeleteData/$1');
/*
 * --------------------------------------------------------------------
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
