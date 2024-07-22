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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/user', [AdminController::class, 'userList'])->name('admin.user');
    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('/admin/jammasuk', [AdminController::class, 'jamMasuk'])->name('admin.jam-masuk');
    Route::get('/admin/jammasuk/{id}', [AdminController::class, 'jamMasukEdit'])->name('admin.jam-masuk.edit');
    Route::put('/admin/jammasuk/{id}', [AdminController::class, 'jamMasukUpdate'])->name('admin.jam-masuk.update');
});

require __DIR__ . '/auth.php';
