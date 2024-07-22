<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
});

require __DIR__ . '/auth.php';
