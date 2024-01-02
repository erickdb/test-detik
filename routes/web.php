<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\userBukuController;

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


//Landing 
Route::get('/', [landingController::class, 'showAllBuku'])->name('index');
Route::get('/buku/{kategoris?}', [landingController::class, 'showBukuByCategory'])->name('buku.kategori');
Route::get('buku/download/{file?}', [bukuController::class, 'downloadFiles'])->name('buku.download');

Route::middleware(['GuestMiddleware'])->group(function () {
    Route::get('/login', [sessionController::class, 'index'])->name('sesi.index');
    Route::get('/register', [sessionController::class, 'registerIndex'])->name('sesi.regisIndex');
    Route::post('/login/proses', [sessionController::class, 'login'])->name('sesi.login');
    Route::post('/register/proses', [sessionController::class, 'register'])->name('sesi.register');
});

Route::get('/logout/all', [sessionController::class, 'logout'])->name('sesi.logout.all');
Route::get('/error', function () {
    return view('error');
})->name('error.page');

// admin
Route::middleware(['AdminMiddleware'])->group(function () {
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
    Route::get('/admin/buku/cetakLaporanPdf', [bukuController::class, 'cetakLaporanPdf'])->name('buku.pdf');
    Route::get('/admin/buku/cetakLaporanExcel', [bukuController::class, 'cetakLaporanExcel'])->name('buku.excel');
    Route::get('/admin/kategori', [kategoriController::class, 'index'])->name('kategori.dashboard');
    Route::get('/admin/kategori/tambah', [kategoriController::class, 'viewAddKategoriDashboard'])->name('kategori.view.add');
    Route::post('/admin/kategori/tambah/proses', [kategoriController::class, 'addKategoriDashboard'])->name('kategori.add');
    Route::delete('/admin/kategori/delete/{id}', [kategoriController::class, 'deleteKategoriDashboard'])->name('kategori.delete');
    Route::get('/admin/kategori/edit/{id}', [kategoriController::class, 'viewEditkategoriDashboard'])->name('kategori.view.edit');
    Route::patch('/admin/kategori/edit/proses/{id}', [kategoriController::class, 'editkategoriDashboard'])->name('kategori.edit');
    Route::get('/logout/admin', [sessionController::class, 'logout'])->name('sesi.logout.admin');
});


// user
Route::middleware(['UserMiddleware'])->group(function () {
    Route::get('/user', function () {
        return view('dashboard_user.index');
    })->name('user');
    Route::get('/user/buku', [userBukuController::class, 'showAllBukuDashboard'])->name('user.buku.dashboard');
    Route::get('/user/tambah/buku', [userBukuController::class, 'viewAddBukuDashboard'])->name('user.buku.view.add');
    Route::post('/user/tambah/buku/proses', [userBukuController::class, 'addBukuDashboard'])->name('user.buku.add');
    Route::delete('/user/buku/delete/{id}', [userBukuController::class, 'deleteBukuDashboard'])->name('user.buku.delete');
    Route::get('/user/buku/download/{file?}', [userBukuController::class, 'downloadFiles'])->name('user.fileBuku.download');
    Route::get('/user/buku/edit/{id}', [userBukuController::class, 'viewEditBukuDashboard'])->name('user.buku.view.edit');
    Route::patch('/user/buku/edit/proses/{id}', [userBukuController::class, 'editBukuDashboard'])->name('user.buku.edit');
    Route::get('/logout/user', [sessionController::class, 'logout'])->name('sesi.logout.user');
});