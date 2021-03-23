<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\Saludo1Controller;
use App\Http\Controllers\Saludo2Controller;
use App\Http\Controllers\Saludo3Controller;
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
//Ejercicio 2
//Vista1
Route::get('/saludo/{nombre?}', [Saludo1Controller::class, 'saludar']);
Route::get('/saludo', [Saludo1Controller::class, 'bienvenida']);

//Vista2
Route::get('/saludo2', [Saludo2Controller::class, 'get']);

//Vista3
Route::get('/saludo3', [Saludo3Controller::class, 'get']);

Route::get('/personal/{nombre}', [PersonalController::class, 'show']);
