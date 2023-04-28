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

// GET user actions
Route::get('/user', 'App\Http\Controllers\UserController@index');
// GET user account options
Route::get('/user/options', 'App\Http\Controllers\UserController@options');
// GET user travel history
Route::get('/user/travels', 'App\Http\Controllers\UserController@travels');
// GET travels search
Route::get('/user/travels/search', 'App\Http\Controllers\UserController@search');
// POST travels search
Route::post('/user/travels/search', 'App\Http\Controllers\UserController@search');
// GET add travels form
Route::get('/user/travels/add', 'App\Http\Controllers\UserController@store');
// POST add travel
Route::post('/user/travels/add', 'App\Http\Controllers\UserController@store');
// GET modify travel form
Route::get('/user/travels/edit', 'App\Http\Controllers\UserController@edit');
// POST modify travel
Route::post('/user/travels/edit', 'App\Http\Controllers\UserController@edit');

