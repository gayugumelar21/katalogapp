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

    // Halaman Depan
    Route::get('/', 'App\Http\Controllers\DepanController@index');
    Route::get('/cari', 'App\Http\Controllers\DepanController@cari');
    Route::get('/about', 'App\Http\Controllers\DepanController@about');

    // login
    Route::get('login', 'App\Http\Controllers\AdminController@formLogin')->name('login');
    Route::post('login', 'App\Http\Controllers\AdminController@login');

    // admin
    Route::group(['middleware' => 'auth', 'middleware' => 'is_admin'], function () {
        Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');
        // kelola produk
        Route::resource('admin/produk', 'App\Http\Controllers\ProdukController');
        Route::get('admin/api.produk', 'App\Http\Controllers\ProdukController@apiProduk');
        // kelola akun
        Route::resource('admin/akun', 'App\Http\Controllers\AkunController');
        Route::get('admin/api.akun', 'App\Http\Controllers\AkunController@apiAkun');

    });

    // member
    Route::group(['middleware' => 'auth'], function () {
        Route::get('member/dashboard', 'App\Http\Controllers\UserController@index')->name('memberDashboard');
        Route::get('logout', 'App\Http\Controllers\AdminController@logout')->name('logout');
    });
