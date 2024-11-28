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

Route::group(['middleware' => 'auth'], function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/produk', [App\Http\Controllers\ProductsController::class, 'index'])->name('produk.index');
Route::get('/produk/data', [App\Http\Controllers\ProductsController::class, 'data'])->name('produk.data');
Route::post('/produk/tambah', [App\Http\Controllers\ProductsController::class, 'tambah'])->name('produk.tambah');
Route::post('/produk/upload', [App\Http\Controllers\ProductsController::class, 'upload'])->name('produk.upload');
Route::get('/produk/excel', [App\Http\Controllers\ProductsController::class, 'excel'])->name('produk.excel');
Route::post('/produk/hapus', [App\Http\Controllers\ProductsController::class, 'hapus'])->name('produk.hapus');

Route::get('/user/profil', [App\Http\Controllers\UsersController::class, 'profil'])->name('user.profil');

});
