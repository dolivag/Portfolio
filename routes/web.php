<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedroomsController;
use App\Http\Controllers\ReservationsController;

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

Route::resource("reservations", ReservationsController::class);

Route::resource("bedrooms", BedroomsController::class);

Route::get('bedrooms/create', [BedroomsController::class, 'create']);

Route::get('reservations/create', [ReservationsController::class, 'create']);

Route::get('getRooms/{people}', [ReservationsController::class, 'getRooms']);

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';
