<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UserController;

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

Route::resource("departamentos", DepartamentoController::class);



Route::get('/', function () {
    return view('home');
});

Route::get('empleados', function () {
    return view('empleados/index');
});

Route::get('empleados/index', [EmpleadosController::class, 'index']);

Route::post('empleados/index', [EmpleadosController::class, 'store']);

Route::get('empleados/create', [EmpleadosController::class, 'create']);

Route::get('empleados/edit', [EmpleadosController::class, 'edit']);

Route::put('empleados/edit', [EmpleadosController::class, 'edit']);

Route::resource("empleados", EmpleadosController::class);

Route::get('departamentos', [DepartamentoController::class, 'index']);

Route::get('departamentos/show', [DepartamentoController::class, 'show']);

Route::get('login', [UserController::class, 'userLogin'])->name('login');

Route::get('logout', [UserController::class, 'userLogout']);


Route::post('login', [UserController::class, 'userInfo'])->name('loginSuccess');


Route::get('signup', function () {
    return view('auth/signup');
});

Route::get('recover', function () {
    return view('auth/recover');
});
