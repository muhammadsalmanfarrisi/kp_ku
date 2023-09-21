<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::resource('/katuser', \App\Http\Controllers\KatuserController::class);
Route::resource('/katadmin', \App\Http\Controllers\KatadminController::class);
// Route::resource('/adminshow', \App\Http\Controllers\KatadminController::class);
Route::resource('/dokumen', \App\Http\Controllers\DokumenController::class);
Route::resource('/dokadmin', \App\Http\Controllers\DokadminController::class);
Route::resource('/dokuser', \App\Http\Controllers\DokuserController::class);
Route::resource('/instansi', \App\Http\Controllers\InstansiController::class);
Route::resource('/cabang', \App\Http\Controllers\CabangController::class);
Route::resource('/unit', \App\Http\Controllers\UnitController::class);
Route::resource('/produk', \App\Http\Controllers\ProdukController::class);
Route::resource('/pilihinstansi', \App\Http\Controllers\PilihinstansiController::class);
Route::resource('/kelola-user', \App\Http\Controllers\KelolauserController::class);
Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
// Route::resource('/create-user', \App\Http\Controllers\CreateuserController::class);
// Route::resource('/data', \App\Http\Controllers\DataController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::get('admin-page', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->middleware('role:admin')->name('admin.page');
Route::get('user-page', [App\Http\Controllers\HomeController::class, 'indexUser'])->middleware('role:user')->name('user.page');


Route::get('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'show'])->name('change.password');
Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'update'])->name('update.password');

Route::get('p_instansi', [App\Http\Controllers\SelectController::class, 'instansi'])->name('p_instansi.index');
Route::get('selectPro', [App\Http\Controllers\SelectController::class, 'produk'])->name('s_produk.index');
Route::get('selectCab/{id}', [App\Http\Controllers\SelectController::class, 'cabang']);
Route::get('selectUni/{id}', [App\Http\Controllers\SelectController::class, 'unit']);
Route::get('/data', [\App\Http\Controllers\DataController::class, 'index']);
