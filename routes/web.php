<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\kategoriController;

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
    return view('index');
})->name('index');


Route::get('/login', [sessionController::class, 'index'])->name('sesi.index');
Route::get('/register', [sessionController::class, 'registerIndex'])->name('sesi.regisIndex');
Route::post('/sesi/login', [sessionController::class, 'login'])->name('sesi.login');
Route::post('/sesi/register', [sessionController::class, 'register'])->name('sesi.register');
Route::get('/sesi/logout', [sessionController::class, 'logout'])->name('sesi.logout');

// admin
Route::get('/admin', function () {
    return view('dashboard_admin.index');
})->name('admin');
Route::get('/admin/buku', [bukuController::class, 'showAllBukuDashboard'])->name('buku.dashboard');
Route::get('/admin/tambah/buku', [bukuController::class, 'viewAddBukuDashboard'])->name('buku.view.add');
Route::post('/admin/tambah/buku/proses', [bukuController::class, 'addBukuDashboard'])->name('buku.add');
Route::delete('/admin/buku/delete/{id}', [bukuController::class, 'deleteBukuDashboard'])->name('buku.delete');
Route::get('/admin/buku/download/{file?}', [bukuController::class, 'downloadFiles'])->name('fileBuku.download');
Route::get('/admin/buku/edit/{id}', [bukuController::class, 'viewEditBukuDashboard'])->name('buku.view.edit');
Route::patch('/admin/buku/edit/proses/{id}', [bukuController::class, 'editBukuDashboard'])->name('buku.edit');


Route::get('/admin/kategori', [kategoriController::class, 'index'])->name('kategori.dashboard');
Route::get('/admin/kategori/tambah', [kategoriController::class, 'viewAddKategoriDashboard'])->name('kategori.view.add');
Route::post('/admin/kategori/tambah/proses', [kategoriController::class, 'addKategoriDashboard'])->name('kategori.add');
Route::delete('/admin/kategori/delete/{id}', [kategoriController::class, 'deleteKategoriDashboard'])->name('kategori.delete');


// user
Route::get('/user', function () {
    return view('dashboard_user.index');
})->name('user');
