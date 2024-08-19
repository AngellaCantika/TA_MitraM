<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarMobilController;
use App\Http\Controllers\MobilMekanikController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AlatBeratController;

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

// User not logged in
Route::group(['middleware'=> 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// Untuk semua Role 
Route::group(['middleware'=> ['auth', 'checkrole:1,2,3']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// Untuk Admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Routes for Mobil Management
    Route::get('/admin/mobil', [DaftarMobilController::class, 'index'])->name('daftar_mobil.index');
    Route::get('/admin/mobil/create', [DaftarMobilController::class, 'create'])->name('daftar_mobil.create');
    Route::post('/admin/mobil', [DaftarMobilController::class, 'store'])->name('daftar_mobil.store');
    Route::get('/admin/mobil/{id}/edit', [DaftarMobilController::class, 'edit'])->name('daftar_mobil.edit');
    Route::put('/admin/mobil/{id}', [DaftarMobilController::class, 'update'])->name('daftar_mobil.update');
    Route::delete('/admin/mobil/{id}', [DaftarMobilController::class, 'destroy'])->name('daftar_mobil.destroy');

    // Routes for User Management
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/admin/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Untuk Mekanik
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/mekanik', [MekanikController::class, 'index'])->name('mekanik.index');
    
    // Routes untuk mengambil data mobil
    Route::get('/mekanik/mobil', [MobilMekanikController::class, 'index'])->name('mekanik.daftar_mobil.index');
    Route::get('/mekanik/mobil/create', [MobilMekanikController::class, 'create'])->name('mekanik.daftar_mobil.create');
    Route::post('/mekanik/mobil', [MobilMekanikController::class, 'store'])->name('mekanik.daftar_mobil.store');
    Route::get('/mekanik/mobil/{id}/edit', [MobilMekanikController::class, 'edit'])->name('mekanik.daftar_mobil.edit');
    Route::put('/mekanik/mobil/{id}', [MobilMekanikController::class, 'update'])->name('mekanik.daftar_mobil.update');
    Route::delete('/mekanik/mobil/{id}', [MobilMekanikController::class, 'destroy'])->name('mekanik.daftar_mobil.destroy');

    // Routes ke Alat Berat
    Route::get('/mekanik/alat-berat', [MekanikAlatBeratController::class, 'index'])->name('mekanik.alat_berat.index');
    Route::get('/mekanik/alat-berat/create', [MekanikAlatBeratController::class, 'create'])->name('mekanik.alat_berat.create');
    Route::post('/mekanik/alat-berat', [MekanikAlatBeratController::class, 'store'])->name('mekanik.alat_berat.store');
    Route::get('/mekanik/alat-berat/{id}/edit', [MekanikAlatBeratController::class, 'edit'])->name('mekanik.alat_berat.edit');
    Route::put('/mekanik/alat-berat/{id}', [MekanikAlatBeratController::class, 'update'])->name('mekanik.alat_berat.update');
    Route::delete('/mekanik/alat-berat/{id}', [MekanikAlatBeratController::class, 'destroy'])->name('mekanik.alat_berat.destroy');
});

// Routes for Alat Berat Management (Admin and Mechanic)
Route::group(['middleware' => ['auth', 'checkrole:1,2', 'role.layout']], function() {
    Route::get('/alat-berat', [AlatBeratController::class, 'index'])->name('alat_berat.index');
    Route::get('/alat-berat/create', [AlatBeratController::class, 'create'])->name('alat_berat.create');
    Route::post('/alat-berat', [AlatBeratController::class, 'store'])->name('alat_berat.store');
    Route::get('/alat-berat/{id}', [AlatBeratController::class, 'show'])->name('alat_berat.show'); 
    Route::get('/alat-berat/{id}/edit', [AlatBeratController::class, 'edit'])->name('alat_berat.edit');
    Route::put('/alat-berat/{id}', [AlatBeratController::class, 'update'])->name('alat_berat.update');
    Route::delete('/alat-berat/{id}', [AlatBeratController::class, 'destroy'])->name('alat_berat.destroy');
});


// Untuk User 
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/HalamanUser', [UserPageController::class, 'index'])->name('userpage.index');
});



