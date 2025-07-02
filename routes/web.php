<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\OpiniController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/profile/sejarah', [ProfileController::class, 'sejarah'])->name('profile.sejarah');
Route::get('/profile/tugas-fungsi', [ProfileController::class, 'tugasFungsi'])->name('profile.tugas-fungsi');
Route::get('/profile/visi-misi', [ProfileController::class, 'visiMisi'])->name('profile.visi-misi');
Route::get('/profile/struktur-organisasi', [ProfileController::class, 'strukturOrganisasi'])->name('profile.struktur-organisasi');
Route::get('/profile/unit-kerja/{slug}', [ProfileController::class, 'unitKerja'])->name('profile.unit-kerja');
Route::get('/data-informasi/{slug}', [ProfileController::class, 'informasi'])->name('informasi.detail');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');

// Route::get('/opini', [OpiniController::class, 'index'])->name('opini.index');
Route::get('/opini/{slug}', [OpiniController::class, 'detail'])->name('opini.detail');

Route::get('/layanan/ptsp', [PelayananController::class, 'index'])->name('layanan.index');

Route::get('/pengaduan-masyarakat', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('/pengaduan-masyarakat', [PengaduanController::class, 'store'])->name('pengaduan.store');





// Route::get('/berita/1', function () {
//     return view('berita.detail');
// })->name('berita.detail');

// Route::get('/berita', function () {
//     return view('berita.daftar-berita');
// })->name('berita.index');

// Route::get('/sejarah', function () {
//     return view('profile.sejarah');
// })->name('profile.sejarah');

// Route::get('/tungsi', function () {
//     return view('profile.tugas-fungsi');
// })->name('profile.tugas-fungsi');

// Route::get('/visi-misi', function () {
//     return view('profile.visi-misi');
// })->name('profile.visi-misi');

// Route::get('/struktur-organisasi', function () {
//     return view('profile.struktur');
// })->name('profile.struktur');

Route::get('/subbagian-tata-usaha', function () {
    return view('profile.unit-kerja.tata-usaha');
})->name('profile.unit-kerja.tata-usaha');

// Route::get('/layanan-publik', function () {
//     return view('layanan.index');
// })->name('layanan.index');

// Route::get('/data-informasi/{slug}', function () {
//     return view('informasi.detail');
// })->name('informasi.detail');

// Route::get('/aduan-masyarakat', function () {
//     return view('aduan.index');
// })->name('aduan.index');
