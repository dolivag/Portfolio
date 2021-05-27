<?php

use App\Http\Controllers\PaintingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;

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
    return view('home');
});

Route::get('/shop/{id}/paintings', [PaintingsController::class, 'index']);

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [PassportController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [PassportController::class, 'register']);
