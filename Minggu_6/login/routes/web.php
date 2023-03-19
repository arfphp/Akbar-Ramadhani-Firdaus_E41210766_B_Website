<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Ini adalah route dasar yang mengarahkan ke halaman selamat datang (welcome page) pada aplikasi web. Ketika permintaan GET dilakukan ke alamat URL dasar (localhost:8000 atau domain yang digunakan), Laravel akan mengeksekusi fungsi anonim yang mengembalikan view "welcome".
Route::get('/', function () {
    return view('welcome');
});

// Ini adalah route yang mengarahkan ke halaman dashboard setelah user berhasil login. Route ini hanya dapat diakses oleh user yang sudah login dan telah melakukan verifikasi email. Jika user belum login, maka Laravel akan mengarahkan user ke halaman login. Jika user sudah login tetapi belum melakukan verifikasi email, maka Laravel akan mengarahkan user ke halaman verifikasi email. Jika user sudah login dan verifikasi email berhasil dilakukan, maka Laravel akan menampilkan halaman dashboard. Nama route ini adalah "dashboard".
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Ini adalah group middleware yang mengelompokkan beberapa route yang memerlukan autentikasi user. Setiap route dalam group middleware ini hanya dapat diakses oleh user yang sudah login. Jika user belum login, maka Laravel akan mengarahkan user ke halaman login. Group middleware ini terdiri dari 3 route yaitu edit profile, update profile, dan delete profile. Nama-nama route ini adalah "profile.edit", "profile.update", dan "profile.destroy".
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ini adalah kode yang mengarahkan ke file auth.php yang berisi definisi route untuk autentikasi user seperti halaman login, register, dan reset password. Route yang terdapat dalam file auth.php juga telah dilengkapi dengan middleware untuk verifikasi email. Jadi, user baru yang mendaftar akan menerima email verifikasi dan harus melakukan verifikasi sebelum bisa login.
require __DIR__ . '/auth.php';
