<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('xss')->group(function () {
    Route::post('/submit-form', [FormController::class, 'submit']);
});

Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img()]);
});

// Route untuk menampilkan form dan menangani form submission
Route::match(['get', 'post'], '/qrku', [QrCodeController::class, 'showQrForm'])->name('qrku');

require __DIR__.'/auth.php';
