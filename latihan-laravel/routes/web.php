<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/data-mahasiswa/{nim}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::get('/cari-mahasiswa', [MahasiswaController::class, 'cari']);

use App\Http\Controllers\MatakuliahController;

Route::get('/data-matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/data-matakuliah/{kode}', [MatakuliahController::class, 'show'])->name('matakuliah.show');