<?php

use App\Http\Controllers\UploadOldController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [UploadOldController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadOldController::class, 'proses_upload'])->name('proses_upload');
