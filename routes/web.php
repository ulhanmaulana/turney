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
Route::get('/login','LoginController@index');
Route::post('/login/proses','LoginController@proses');
Route::get('/logout', 'LoginController@logout');
Route::post('/pendaftaran', 'PendaftaranController@pendaftaran');
Route::post('/checkemaileksist', 'PendaftaranController@checkEmailEksist');



// --------------- user --------------------
// Route::get('/test', function () {
//     return view('user/detailberita');
// });

Route::get('/','UserController@index');
Route::get('/detailberita/{id}','UserController@detailberita');
Route::get('/news','UserController@news');
Route::get('/turnament/upcoming','TurnamenController@upcoming');
Route::get('/turnament/upcoming/detail/{id}','TurnamenController@detailUpcoming');




Route::group(['middleware' => 'admin'], function () {
    // ======= admin ========
    Route::get('/admin', function () {
        return view('admin/index');
    });

    
    Route::get('/admin/berita/','AdminController@index');
    Route::get('/admin/berita/tambah','AdminController@create');
    Route::post('admin/berita/simpan', 'AdminController@store');
    Route::get('/admin/berita/edit/{id}','AdminController@edit');
    Route::post('/admin/berita/update/{id}','AdminController@update');
    Route::get('/admin/berita/delete/{id}', 'AdminController@destroy');


   // Route::get('/admin/turnament/','AdminController@index_turnament');
    Route::get('/admin/turnament/tambah','AdminController@create_turnament');

    

    Route::get('/admin/turnamen/', 'TurnamenController@index');
    Route::get('/admin/turnamen/tambah', 'TurnamenController@formTambah');
    Route::post('/admin/turnamen/simpan', 'TurnamenController@simpan');
    Route::get('/admin/turnamen/edit/{id}','TurnamenController@formEdit');
    Route::post('/admin/turnamen/update','TurnamenController@update');
    Route::get('/admin/turnamen/delete/{id}', 'TurnamenController@destroy');

    Route::get('/admin/pembayaran/', 'PembayaranController@index');
    Route::post('/admin/pembayaran/konfirmasi', 'PembayaranController@konfirmasi');

    Route::get('/admin/pendaftaran/', 'PendaftaranController@index');

});
Route::group(['middleware' => 'peserta'], function () {
    Route::get('/peserta/profile','PesertaController@peserta_profile');
    Route::get('/peserta/pembayaran','PembayaranController@pembayaran_peserta');
    Route::post('/peserta/pembayaran', 'PembayaranController@pembayaran');
    Route::get('/peserta/setting', 'AkunController@setting_peserta');
    Route::post('/peserta/setting/simpan', 'AkunController@change_pass');

});