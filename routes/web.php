<?php

use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VideoController;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
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


// sql join  for popular video querybuilder
/**
 * select video.id as video_id, sum(likes.vote) from videos
 * left join likes 
 * on likes.likeable_id = video.id 
 * and likes.likeable_type = "\\App\\Models\\Video"
 * group by video.id;
 */


Route::get('/test',function(){
    //  DB::table('likes')
    //     ->insert([
    //         'vote'=> -1,
    //         'likeable_type' => 'App\\Models\Video',
    //         'likeable_id' => random_int(185,200),
    //         'user_id' => random_int(3,8),
    //         'created_at' => gmdate('Y-m-d'),
    //         'updated_at' => gmdate('Y-m-d'),
    //     ]);

    // Video::query()->update(['thumbnail' => 'AYTfWvsxP107DQxspCua9U2X4CRK94kXtZi0aySv_frame.jpg']);
});
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
