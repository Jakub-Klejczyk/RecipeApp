<?php

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

#APP

Route::get('/', function () {
    return view('app');
})->middleware('auth');

Route::get('/logowanie', function () {
    return view('app');
})->middleware('guest');

Route::get('/rejestracja', function () {
    return view('app');
})->middleware('guest');

#USERS

//create user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('login')->middleware('guest');

//log user out
Route::post('/users/logout', [UserController::class, 'logout']);