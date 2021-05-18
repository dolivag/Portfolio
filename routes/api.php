<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\PaintingsController;


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

Route::get('shops/{id}/pictures/{id2}', [PaintingsController::class, 'show']);

Route::put('shops/{id}/pictures/{id2}', [PaintingsController::class, 'update']);

Route::delete('shops/{id}/pictures/{id2}', [PaintingsController::class, 'delete']);

Route::delete('shops/{id}/pictures', [PaintingsController::class, 'burn_all']);
