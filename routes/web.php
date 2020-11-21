<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rute Admin Home
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');

// Rute Setting Akun
Route::get('/admin/akun', 'AdminController@setting_akun')->name('setting.akun')->middleware('admin');
Route::put('/admin/akun/update/{id}', 'AdminController@update_akun')->name('update.akun')->middleware('admin');
Route::put('/admin/akun/password/{id}', 'AdminController@update_password')->middleware('admin');

// Rute User / Bendahara
Route::get('/get_data_user/{id}', 'AdminController@get_data_user')->middleware('admin');
Route::get('/admin/user', 'AdminController@user')->name('user')->middleware('admin');
Route::get('/admin/user/show/{id}', 'AdminController@user_show')->name('user.show')->middleware('admin');
Route::post('/admin/user/store', 'AdminController@user_store')->name('user.store')->middleware('admin');
Route::put('/admin/user/update/{id}', 'AdminController@user_update')->name('user.update')->middleware('admin');
Route::get('/admin/user/delete/{id}', 'AdminController@user_delete')->name('user.delete')->middleware('admin');

// Rute Siswa
// Route::get('/get_data_siswa/{id}', 'AdminController@get_data_siswa')->middleware('admin');
Route::get('/admin/siswa', 'AdminController@siswa')->name('siswa')->middleware('admin');
Route::get('/admin/siswa/{id}', 'AdminController@siswa_show')->name('siswa.show')->middleware('admin');

// Rute Riwayat
Route::get('/admin/riwayat', 'AdminController@riwayat')->middleware('admin');
// Route::get('/admin/riwayat/delete_all', 'AdminController@riwayat_delete')->middleware('admin');

// Rute Pembayaran
Route::get('/admin/pembayaran/masuk', 'AdminController@pembayaran_masuk')->middleware('admin');
Route::get('/admin/pembayaran/masuk/{id}', 'AdminController@pembayaran_show_masuk')->middleware('admin');
Route::get('/admin/kas/masuk/cetak_kas_masuk', 'AdminController@cetak_kas_masuk_all')->middleware('admin');
Route::get('/admin/pembayaran/masuk/cetak_pdf/{id}', 'AdminController@cetak_pembayaran_masuk')->middleware('admin');

Route::get('/admin/pembayaran/keluar', 'AdminController@pembayaran_keluar')->middleware('admin');
Route::get('/admin/pembayaran/keluar/{id}', 'AdminController@pembayaran_show_keluar')->middleware('admin');
Route::get('/admin/kas/keluar/cetak_kas_keluar', 'AdminController@cetak_kas_keluar_all')->middleware('admin');
Route::get('/admin/pembayaran/keluar/cetak_pdf/{id}', 'AdminController@cetak_pembayaran_keluar')->middleware('admin');

// Rute Pesan
Route::get('/admin/pesan', 'AdminController@pesan')->middleware('admin');
Route::put('/admin/pesan/{id}', 'AdminController@pesan_read')->middleware('admin');

// Rute Multimedia
Route::get('/admin/multimedia', 'AdminController@multimedia_index')->middleware('admin');
Route::post('/admin/multimedia/store', 'AdminController@multimedia_store')->middleware('admin');
Route::get('/admin/multimedia/delete/{id}', 'AdminController@multimedia_delete')->middleware('admin');

// =============================================================================================================== //

// Rute Bendahara Home
Route::get('/user', 'BendaharaController@index')->middleware('bendahara');

// Rute Setting Akun
Route::get('/user/akun', 'BendaharaController@setting_akun')->name('setting.akun.user')->middleware('bendahara');
Route::put('/user/akun/update/{id}', 'BendaharaController@update_akun')->name('update.akun.user')->middleware('bendahara');

// Rute Siswa
Route::get('/user/siswa', 'BendaharaController@siswa')->middleware('bendahara');
Route::post('/user/siswa/store', 'BendaharaController@siswa_store')->name('siswa.store')->middleware('bendahara');
// Route::get('/user/siswa/delete/{id}', 'BendaharaController@siswa_delete')->middleware('bendahara');

// Rute Riwayat
Route::get('/user/riwayat', 'BendaharaController@riwayat')->middleware('bendahara');
Route::get('/user/riwayat/delete_all', 'BendaharaController@riwayat_delete')->middleware('bendahara');

// Rute Pembayaran
Route::get('/user/pembayaran', 'BendaharaController@pembayaran')->middleware('bendahara');
Route::get('/user/pembayaran/show/{nama}', 'BendaharaController@pembayaran_user')->middleware('bendahara');
Route::post('/user/pembayaran/store', 'BendaharaController@pembayaran_store')->middleware('bendahara');
Route::get('/user/pembayaran/delete/{id}', 'BendaharaController@pembayaran_delete')->middleware('bendahara');

// Rute Bayar masuk & keluar
Route::get('/user/pembayaran/masuk', 'BendaharaController@pembayaran_masuk')->middleware('bendahara');
Route::get('/user/pembayaran/keluar', 'BendaharaController@pembayaran_keluar')->middleware('bendahara');
Route::post('/user/pembayaran/keluar/store', 'BendaharaController@pembayaran_keluar_store')->middleware('bendahara');
// Route::get('/user/pembayaran/delete/{id}', 'BendaharaController@pembayaran_keluar_delete')->middleware('bendahara');

// Rute Cetak PDF
Route::get('/user/pembayaran/kas-masuk/cetak_pdf', 'BendaharaController@cetak_kas_masuk')->middleware('bendahara');
Route::get('/user/pembayaran/kas-keluar/cetak_pdf', 'BendaharaController@cetak_kas_keluar')->middleware('bendahara');
Route::get('/user/pembayaran/{id}/kas-masuk-siswa/cetak_pdf', 'BendaharaController@cetak_kas_masuk_siswa')->middleware('bendahara');

// Rute Pesan
Route::get('/user/pesan', 'BendaharaController@pesan')->middleware('bendahara');
Route::get('/user/pesan/create', 'BendaharaController@pesan_create')->middleware('bendahara');
Route::post('/user/pesan/store', 'BendaharaController@pesan_store')->middleware('bendahara');
