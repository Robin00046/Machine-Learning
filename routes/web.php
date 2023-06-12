<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HasilController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
   Route::resource('prediksi', PrediksiController::class)->except(['show']);
   Route::resource('training', TrainingController::class)->except(['show']);
});

require __DIR__.'/auth.php';
