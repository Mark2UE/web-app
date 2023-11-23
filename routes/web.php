<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use Illuminate\Http\Request;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');
//USER
Route::controller(UserController::class)->group(function(){
 
    Route::post('/store', 'register')->middleware('guest');
    Route::post('/logout', 'logout');
    Route::post('/login', 'login')->middleware('guest');
    Route::get('/user', 'show')->middleware('auth');
    Route::post('/upload', 'store')->middleware('auth');
    Route::get('/community', 'show_community')->middleware('auth');
 
});

//ADMIN CONTROLLER



