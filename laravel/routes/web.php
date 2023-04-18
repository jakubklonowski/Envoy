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
// GET logout
Route::get('/logout', 'App\Http\Controllers\LoginController@destroy');

// POST register
Route::post('/register', 'App\Http\Controllers\RegistrationController@store');
// DELETE register
Route::delete('/register', 'App\Http\Controllers\RegistrationController@destroy');

// GET (user) account
Route::get('/account', 'App\Http\Controllers\AccountController@index');
// GET travels search
Route::get('/account/travels/search', 'App\Http\Controllers\AccountController@search');
// GET travel history
Route::get('/account/travels', 'App\Http\Controllers\AccountController@travels');
// GET (user) account options
Route::get('/account/options', 'App\Http\Controllers\AccountController@options');