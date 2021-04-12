<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
});


Route::get('catalog', function () {
    return view('catalog/index');
});

Route::get('catalog/show/{id}', function ($id) {
    return view('catalog/show')->with('id', $id);
});

Route::get('catalog/create', [CatalogController::class, 'create']);

Route::post('catalog/create', [CatalogController::class, 'create']);

Route::post('catalog', [CatalogController::class, 'store']);

Route::put('catalog', [CatalogController::class, 'update']);

Route::get('catalog/delete/{id}', [CatalogController::class, 'delete']);

Route::get('catalog/edit/{id}', [CatalogController::class, 'edit']);

Route::get('catalog/index', function () {
    return view('catalog/index');
});

Route::get('login', [UserController::class, 'userLogin'])->name('login');

Route::get('logout', [UserController::class, 'userLogout']);



Route::post('login', [UserController::class, 'userInfo'])->name('loginSuccess');




Route::get('signup', function () {
    return view('auth/signup');
});

Route::get('recover', function () {
    return view('auth/recover');
});
