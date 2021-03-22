<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PaisController;
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

Route::get('paises', [PaisController::class, 'index']);
Route::post('paises', [PaisController::class, 'store']);
Route::get('paises/{pais}', [PaisController::class, 'show']);
Route::put('paises/{pais}', [PaisController::class, 'update']);
Route::delete('paises/{pais}', [PaisController::class, 'delete']);


Route::get('paises/{pais}/departamentos', [DepartamentoController::class, 'index']);
Route::post('paises/{pais}/departamentos', [DepartamentoController::class, 'store']);
Route::get('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'show']);
Route::put('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'update']);
Route::delete('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'destroy']);
