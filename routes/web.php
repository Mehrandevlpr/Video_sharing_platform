<?php

use App\Events\VideoCreated;
use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VideoController;
use App\Models\User;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::post('/videos', [VideoController::class, 'store'])->name('front.videos.store');
Route::get('/videos/create', [VideoController::class, 'create'])->middleware('check.email.verification')->name('front.videos.create');
Route::get('/videos/{video}/', [VideoController::class, 'show'])->name('front.videos.show');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('front.videos.edit');
Route::post('/videos/{video}', [VideoController::class, 'update'])->name('front.videos.update');
Route::get('/categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])->name('categories.videos.index');


Route::post('/videos/{video}/comments', [CommentController::class ,'store'])->name('comments.store');
Route::get('/{likeable_type}/{likeable_id}/like', [LikeController::class ,'store'])->name('likes.store');
Route::get('/{likeable_type}/{likeable_id}/dislike', [DislikeController::class ,'store'])->name('dislikes.store');

require __DIR__.'/auth.php';
