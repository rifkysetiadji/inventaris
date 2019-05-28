<?php

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
    return view('auth.login');
});
Route::get('/logpegawai', function () {
    return view('auth.logpegawai');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jenis', 'AdminController@list_jenis');
Route::post('/jenis', 'AdminController@add_jenis');
Route::post('/jenis/update', 'AdminController@update_jenis');
Route::post('/jenis/delete', 'AdminController@delete_jenis');

Route::get('/ruang', 'AdminController@list_ruang');
Route::post('/ruang', 'AdminController@add_ruang');
Route::post('/ruang/update', 'AdminController@update_ruang');
Route::post('/ruang/delete', 'AdminController@delete_ruang');

Route::get('/petugas', 'AdminController@list_petugas');
Route::post('/petugas', 'AdminController@add_petugas');
Route::post('/petugas/update', 'AdminController@update_petugas');
Route::post('/petugas/delete', 'AdminController@delete_petugas');

Route::get('/pegawai', 'AdminController@list_pegawai');
Route::post('/pegawai', 'AdminController@add_pegawai');
Route::post('/pegawai/update', 'AdminController@update_pegawai');
Route::post('/pegawai/delete', 'AdminController@delete_pegawai');

Route::get('/barang', 'AdminController@list_barang');
Route::post('/barang', 'AdminController@add_barang');
Route::post('/barang/update', 'AdminController@update_barang');
Route::post('/barang/delete', 'AdminController@delete_barang');

Route::post('/loginpegawai','PegawaiController@peglogin');
Route::get('/logoutpegawai','PegawaiController@peglogout');

Route::get('/pegawaihome', 'PegawaiController@home');
Route::post('/keranjang/add', 'PegawaiController@add_keranjang');
Route::post('/booking/cancel', 'PegawaiController@cancel_booking');
Route::post('/booking/add','PegawaiController@add_booking');
Route::post('/booking/acc','PetugasController@acc_booking');
Route::post('/booking/filter','PegawaiController@filter_booking');


Route::get('/peminjaman','PetugasController@list_peminjaman');
Route::post('/peminjaman/add','PetugasController@add_peminjaman');
Route::post('/peminjaman/kembali','PetugasController@kembali_peminjaman');
Route::post('/peminjaman/update','PetugasController@update_peminjaman');

