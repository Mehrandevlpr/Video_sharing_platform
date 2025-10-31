<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function(){
    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/videos/{video:slug}', [VideoController::class, 'show']);
    Route::post('/videos', [VideoController::class, 'store']);
    Route::put('/videos/{video:slug}', [VideoController::class, 'update']);
    Route::delete('/videos/{video:slug}', [VideoController::class, 'destroy']);
});

Route::prefix('v1/auth/')->group(function(){
    Route::post('login',[AuthController::class, 'login']);
    Route::get('client', [AuthController::class ,'client'])->middleware('auth:sanctum');
});