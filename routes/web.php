<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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




//USER
Route::controller(UserController::class)->group(function () {


    Route::post('/logout', 'logout');
    Route::post('/login', 'login');
    Route::get('/user', 'show')->middleware('auth');
    Route::post('/upload', 'store')->middleware('auth');
    Route::get('/community', 'show_community')->middleware('auth');

    Route::get('/welcome', 'index');
    Route::get('/home', 'index');
    Route::get('/', 'index')->name('home');
    Route::post('/user/update', 'update');
    Route::get('/community/account', 'account');
    Route::get('/community/gacha', 'gacha');
    // Route::get('/forgot-password', 'show_form')->name('show.forgot');
    // Route::post('/forgot-password', 'forgot_password')->name('forgot.password')->middleware('guest');
    // Route::get('/reset/{resettoken}', 'password_reset')->name('validation');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login/google', 'redirectToGoogle');
    Route::get('/login/google/callback', 'handleGoogleCallback');


    // routes/web.php

    Route::get('/login/github', 'redirectToGitHub');
    Route::get('/login/github/callback', 'handleGitHubCallback');


    // Route::get('login/facebook', 'redirectToFacebook');
    // Route::get('login/facebook/callback', 'handleFacebookCallback');
});



//POST
Route::controller(PostController::class)->group(function () {
    Route::post('/community/post/{token}', 'post')->middleware('auth');
    Route::get('/community/view/{id}', 'view')->middleware('auth');
    Route::get('/community/profile', 'user_profile')->middleware('auth')->name('view.profile');
    Route::post('/community/comment/{id}', 'comment')->middleware('auth');
    Route::post('/community/comment/update/{id}', 'update')->middleware('auth');
    Route::get('/community/profile/delete/{id}', 'delete_post')->middleware('auth');
    Route::get('/community/users/{id}', 'view_profile')->middleware('auth');
});
//ADMIN CONTROLLER
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::post('/adminreg', 'login');
    Route::get('/admin/dashboard', 'show');
    Route::get('/admin/dashboard/users', 'show_users');

    Route::get('/admin/dashboard/users/update/{id}', 'update_user');
    Route::get('/admin/dashboard/users/delete/{id}', 'delete_user');



    Route::get('/admin/dashboard/post', 'show_post');
    Route::get('/admin/dashboard/post/update/{id}', 'show_post_update');
    route::post('/community/post/update/{id}', 'update_post');
    route::get('/admin/dashboard/post/delete/{id}', 'delete_post');
});
