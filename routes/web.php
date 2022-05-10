<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchatController;

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

Route::get('/liste', [AchatController::class, 'index'])->name('station.index');
Route::get('/admin', [AchatController::class, 'admin'])->name('station.admin');
Route::get('/stats', [AchatController::class, 'stats'])->name('station.stats');
Route::get('/search', [AchatController::class, 'search'])->name('station.search');
Route::get('/searchdate', [AchatController::class, 'searchdate'])->name('station.search_date');
Route::get('/searchadmin', [AchatController::class, 'searchadmin'])->name('station.search_admin');

Route::get('/creer', [AchatController::class, 'create'])->name('station.creer');
Route::post('/store', [AchatController::class, 'store'])->name('station.store');

Route::get('/details/{achat}', [AchatController::class, 'show'])->name('station.details');
Route::get('/edit/{achat}', [AchatController::class, 'edit'])->name('station.edite');
Route::post('/edit/{achat}', [AchatController::class, 'update'])->name('station.update');
Route::get('/delete/{achat}', [AchatController::class, 'destroy'])->name('station.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
