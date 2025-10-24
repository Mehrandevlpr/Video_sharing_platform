<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::post('/videos', [VideoController::class, 'store'])->name('front.videos.store');
Route::get('/videos/create', [VideoController::class, 'create'])->name('front.videos.create');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('front.videos.edit');
Route::post('/videos/{video}', [VideoController::class, 'update'])->name('front.videos.update');
Route::post('/categories/{category}/videos', [VideoController::class, 'index'])->name('front.videos.index');

require __DIR__.'/auth.php';
