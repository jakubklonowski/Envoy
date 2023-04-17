<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// GET home
Route::get('/', function () {
    return view('home');
});

// GET, POST, DELETE login
Route::resource('/login', 'App\Http\Controllers\LoginController')->only(['index', 'store', 'destroy']);

// POST register
Route::post('/register', 'App\Http\Controllers\RegistrationController@store');

// GET (user) account
Route::get('/account', 'App\Http\Controllers\AccountController@index');