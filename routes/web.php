<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaHasMatakuliahController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\SuperadminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen/login', [DosenController::class, 'login'])->name('dosen.login')->name('login');

Route::get('/dashboard', [AbsenController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// loginAdmin
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminLoginPost'])->name('admin.login.post');

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
    // Route::resource('/dosen/profile', DosenProfileController::class)->names([
    //     'create' => 'dosen.profile.create',
    //     'store' => 'dosen.profile.store',
    //     'edit' => 'dosen.profile.edit',
    //     'destroy' => 'dosen.profile.destroy',
    //     'update' => 'dosen.profile.update',
    //     'index' => 'dosen.profile.index',
    // ]);

    // Route::get('/dosen/datadiri', [DosenProfileController::class, 'datadiri'])->name('dosen.datadiri');
    // Route::patch('/dosen/datadiri', [DosenProfileController::class, 'updateDatadiri'])->name('dosen.datadiri.update');
    // Route::put('/dosen/datadiri', [DosenProfileController::class, 'updatePassword'])->name('dosen.password.update');

    Route::resource('/dosen/kelas', KelasController::class);
    Route::resource('/dosen/mahasiswa', MahasiswaHasMatakuliahController::class);

    // superadmin
    Route::get('/superadmin/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/superadmin/mahasiswa', [SuperadminController::class, 'mahasiswa'])->name('superadmin.mahasiswa');
    Route::get('/superadmin/dosen', [SuperadminController::class, 'dosen'])->name('superadmin.dosen');
    // create
    Route::get('/superadmin/dosen/create', [SuperadminController::class, 'createDosen'])->name('superadmin.dosen.create');
    Route::get('/superadmin/mahasiswa/create', [SuperadminController::class, 'createMahasiswa'])->name('superadmin.mahasiswa.create');
    // store
    Route::post('/superadmin/dosen/create', [SuperadminController::class, 'storeDosen'])->name('superadmin.dosen.store');
    Route::post('/superadmin/mahasiswa/create', [SuperadminController::class, 'storeMahasiswa'])->name('superadmin.mahasiswa.store');
    // edit
    Route::get('/superadmin/dosen/{id}/edit', [SuperadminController::class, 'editDosen'])->name('superadmin.dosen.edit');
    Route::get('/superadmin/mahasiswa/{id}/edit', [SuperadminController::class, 'editMahasiswa'])->name('superadmin.mahasiswa.edit');
    // update
    Route::patch('/superadmin/dosen/{id}/edit', [SuperadminController::class, 'updateDosen'])->name('superadmin.dosen.update');
    Route::patch('/superadmin/mahasiswa/{id}/edit', [SuperadminController::class, 'updateMahasiswa'])->name('superadmin.mahasiswa.update');
    // show
    Route::get('/superadmin/dosen/{id}', [SuperadminController::class, 'showDosen'])->name('superadmin.dosen.show');
    Route::get('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'showMahasiswa'])->name('superadmin.mahasiswa.show');
    // delete
    Route::delete('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.mahasiswa.destroy');
    Route::delete('/superadmin/dosen/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.dosen.destroy');
});

require __DIR__ . '/auth.php';
