<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->group(function() {
    Route::get('/', function () { return "Admin Logged In~"; })->name('admin')->middleware('auth:admin');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login');
    Route::get('/register', 'AuthAdmin\LoginController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'AuthAdmin\LoginController@register')->name('admin.register');
});
