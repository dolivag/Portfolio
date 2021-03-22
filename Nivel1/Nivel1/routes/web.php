<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SaludoController;
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
//Vista1 mediante controlador
Route::get('/saludo/{nombre?}', [SaludoController::class, 'saludar']);

//Vista2 mediante función anónima
Route::get('/bienvenida', function () {
    return "Disfruta de nuestra página y no dudes en contactarnos";
});

Route::get('/personal/{nombre}', [PersonalController::class, 'show']);
