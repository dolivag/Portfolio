<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\RollController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::post('players', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {

    Route::put('players/{id}', [UserController::class, 'update']);
    Route::post('players/{id}/games', [RollController::class, 'store']);
    Route::delete('players/{id}/games', [RollController::class, 'deleteAll']);
    Route::get('players', [UserController::class, 'index']);
    Route::get('players/ranking', [UserController::class, 'ranking']);
    Route::get('players/{id}/games', [RollController::class, 'index']);
    Route::get('players/ranking/loser', [UserController::class, 'showLoser']);
    Route::get('players/ranking/winner', [UserController::class, 'showWinner']);
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('/refresh', [AuthController::class, 'refreshToken']);
});
