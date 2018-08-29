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

// Countries
Route::get('/', 'CountryController@index');
Route::resource('countries', 'CountryController')->only([
    'show'
]);

// Regions
Route::resource('regions', 'RegionController')->only([
    'show'
]);

// Groups
Route::resource('groups', 'GroupController')->only([
    'show'
]);

// Posts
Route::resource('posts', 'PostController')->except([
    'index'
]);

// Users
Route::get('profile', 'UserController@profile')->name('profile');
Route::resource('users', 'UserController')->except([
    'index', 'destroy'
]);

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Passwords
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
