<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\TrainingController;

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

// Route::get('/', [PrediksiController::class, 'index'])->name('prediksi.index');
Route::get('/', function () {
   return redirect()->route('login');
});  

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class)->except(['show']);
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
   Route::resource('prediksi', PrediksiController::class)->except(['show']);
   Route::resource('training', TrainingController::class)->except(['show']);
    Route::get('/laporan', [PrediksiController::class, 'laporan'])->name('laporan');
    Route::get('/laporan/cetak/{tanggal_awal?}/{tanggal_akhir?}', [PrediksiController::class, 'cetak_laporan'])->name('laporan.cetak');
});

require __DIR__.'/auth.php';
