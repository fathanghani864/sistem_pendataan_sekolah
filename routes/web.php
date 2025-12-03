<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UserController; // Pastikan kamu punya controller ini jika mau pakai menu User
use Illuminate\Support\Facades\Route;

// HAPUS BARIS INI (Penyebab error sebelumnya)
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard; 

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Tambahkan ->name('home') agar route('home') di sidebar bekerja
    Route::get('/home', [HomeController::class, 'index'])->name('home');

   

    // 2. Ubah nama resource jadi huruf kecil semua agar cocok dengan sidebar
    // Sidebar: route('jurusan.index') -> Resource: 'jurusan'
    Route::resource('jurusan', JurusanController::class);
    
    // Sidebar: route('kelas.index') -> Resource: 'kelas'
    Route::resource('kelas', KelasController::class);
    
    // Sidebar: route('siswa.index') -> Resource: 'siswa'
    Route::resource('siswa', SiswaController::class);
    
  
    Route::resource('tahun-ajar', TahunAjaranController::class);

      Route::resource('user', UserController::class);
   

Route::put('/siswa/{id}/update-kelas-ajar', 
    [SiswaController::class, 'updateKelasAjar']
)->name('siswa.updateKelasAjar');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';