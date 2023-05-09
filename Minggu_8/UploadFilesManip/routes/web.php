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
Route::post('/upload/resize', [UploadOldController::class, 'resize_upload'])->name('upload_resize');

Route::get('/dropzone', [UploadOldController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone', [UploadOldController::class, 'dropzone_store'])->name('dropzone.store');

Route::get('/pdf_upload', [UploadOldController::class, 'pdf_upload'])->name('pdf_upload');
Route::post('/pdf_upload/store', [UploadOldController::class, 'pdf_store'])->name('pdf_store');
