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
Route::get('/login','loginController@index');



// --------------- user --------------------
// Route::get('/test', function () {
//     return view('user/detailberita');
// });
Route::get('/profile','UserController@profile');
Route::get('/','UserController@index');
Route::get('/detailberita/{id}','UserController@detailberita');
Route::get('/news','UserController@news');
Route::get('/turnament/upcoming','UserController@upcoming');

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


Route::get('/admin/turnament/','AdminController@index_turnament');
Route::get('/admin/turnament/tambah','AdminController@create_turnament');

Route::get('/admin/turnament/edit','AdminController@edit_turnament');

