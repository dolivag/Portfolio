<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\TeamsController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');






Route::get('teams', [TeamsController::class, 'index']);

Route::get('teams/index', [TeamsController::class, 'index']);

Route::post('teams/index', [TeamsController::class, 'store']);

Route::get('teams/create', [TeamsController::class, 'create']);

Route::get('teams/edit/{id?}', [TeamsController::class, 'edit']);

Route::put('teams/edit/{id?}', [TeamsController::class, 'edit']);

Route::resource("teams", TeamsController::class)->middleware(['auth']);

Route::get('games', [GamesController::class, 'index'])->name('games');

Route::resource("games", GamesController::class)->parameters(["games" => "game"])->middleware(['auth']);

Route::get('login', function () {
    return view('auth/login');
})->name('login');
