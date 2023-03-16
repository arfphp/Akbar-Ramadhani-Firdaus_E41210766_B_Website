<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// menentukan route atau rute utama '/' yang akan ditangani oleh aplikasi web. Ketika pengguna mengunjungi halaman utama, aplikasi web akan menampilkan view 'welcome' yang merupakan tampilan halaman selamat datang.
Route::get('/', function () {
    return view('welcome');
});

// menentukan route atau rute '/dashboard' yang akan ditangani oleh aplikasi web. Rute ini hanya dapat diakses oleh pengguna yang telah login dan verifikasi email, hal ini ditunjukkan dengan middleware ['auth', 'verified'].
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// menentukan middleware auth yang harus dipenuhi oleh pengguna sebelum mengakses rute-rute yang didefinisikan di dalam group tersebut. Dalam hal ini, group ini hanya berisi tiga rute yang memiliki akses ke halaman edit profil, update profil, dan hapus profil.
Route::middleware('auth')->group(function () {
    // menentukan rute '/profile' yang akan ditangani oleh controller 'ProfileController' pada method 'edit'.
    // Route ini diberi nama 'profile.edit' untuk memudahkan penggunaan URL di dalam kode aplikasi.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // menentukan rute '/profile' dengan metode HTTP PATCH yang akan ditangani oleh controller 'ProfileController' pada method 'update'.
    // Route ini diberi nama 'profile.update' untuk memudahkan penggunaan URL di dalam kode aplikasi.
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // menentukan rute '/profile' dengan metode HTTP DELETE yang akan ditangani oleh controller 'ProfileController' pada method 'destroy'.
    // Route ini diberi nama 'profile.destroy' untuk memudahkan penggunaan URL di dalam kode aplikasi.
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
