<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen/login', [DosenController::class, 'login'])->name('dosen.login')->name('login');

Route::get('/dashboard', [AbsenController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/dashboard', [AbsenController::class, 'store'])->name('absen.store');

    // admin
    Route::get('/dosen/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dosen/user', [AdminController::class, 'userList'])->name('admin.user');
    Route::delete('/dosen/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('/dosen/jammasuk', [AdminController::class, 'jamMasuk'])->name('admin.jam-masuk');
    Route::get('/dosen/jammasuk/{id}', [AdminController::class, 'jamMasukEdit'])->name('admin.jam-masuk.edit');
    Route::put('/dosen/jammasuk/{id}', [AdminController::class, 'jamMasukUpdate'])->name('admin.jam-masuk.update');

    Route::resource('/dosen/matakuliah', MatakuliahController::class);
    Route::resource('/dosen/profile', DosenProfileController::class)->names([
        'create' => 'dosen.profile.create',
        'store' => 'dosen.profile.store',
        'edit' => 'dosen.profile.edit',
        'destroy' => 'dosen.profile.destroy',
        'update' => 'dosen.profile.update',
        'index' => 'dosen.profile.index',
    ]);

    Route::get('/dosen/datadiri', [DosenProfileController::class, 'datadiri'])->name('dosen.datadiri');
    Route::patch('/dosen/datadiri', [DosenProfileController::class, 'updateDatadiri'])->name('dosen.datadiri.update');
    Route::put('/dosen/datadiri', [DosenProfileController::class, 'updatePassword'])->name('dosen.password.update');

    Route::resource('/dosen/kelas', KelasController::class);
});

require __DIR__ . '/auth.php';
