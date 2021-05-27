<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\PaintingsController;
use App\Http\Controllers\PassportController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [PassportController::class, 'register']);

Route::post('login', [PassportController::class, 'login']);

Route::post('recover', [PassportController::class, 'sendResetEmail']);



Route::middleware('auth:api')->group(function () {
    //Shops
    Route::get('shops', [ShopsController::class, 'index']);
    Route::get('shops/{id}', [ShopsController::class, 'show']);
    Route::get('shops/create', [ShopsController::class, 'create']);
    Route::post('shops', [ShopsController::class, 'store']);
    Route::put('shops/{id}', [ShopsController::class, 'update']);
    Route::delete('shops/{id}', [ShopsController::class, 'delete']);

    //Paintings
    Route::post('shops/{id}/pictures', [PaintingsController::class, 'store']);
    Route::get('shops/{id}/pictures', [PaintingsController::class, 'index']);
    Route::get('pictures/{id}', [PaintingsController::class, 'show']);
    Route::put('pictures/{id}', [PaintingsController::class, 'update']);
    Route::delete('pictures/{id}', [PaintingsController::class, 'delete']);
    Route::delete('shops/{id}/pictures', [PaintingsController::class, 'burn_all']);

    //Logout
    Route::post('logout', [PassportController::class, 'logout'])->name('logout');
});
