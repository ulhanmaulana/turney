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

// --------------- user --------------------
Route::get('/', function () {
    return view('user/index');
});

Route::get('/test', function () {
    return view('user/coba');
});

// ======= admin ========
Route::get('/admin', function () {
    return view('admin/index');
});


Route::get('/admin/berita/','AdminController@index');
Route::get('/admin/berita/tambah','AdminController@create');
Route::post('admin/berita/simpan', 'AdminController@store');