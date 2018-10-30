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

// Home
Route::get('/', 'HomeController@index')->name('home');

// Posts
Route::get('posts/user', 'PostController@user')->name('posts.user');
Route::resource('posts', 'PostController')->except([
    'index'
]);

Route::get('posts/{post}/reply', 'PostController@replyCreate')->name('posts.reply.create');
Route::post('posts/{post}/reply', 'PostController@replyStore')->name('posts.reply.store');

// Users
Route::get('profile', 'UserController@profile')->name('profile');
Route::resource('users', 'UserController')->except([
    'index'
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

// Memberships
Route::post('groups/{group}/join', 'MembershipController@store')->name('memberships.store');
Route::get('groups/{group}/settings', 'MembershipController@edit')->name('memberships.edit');
Route::patch('groups/{group}/settings', 'MembershipController@update')->name('memberships.update');
Route::delete('groups/{group}/leave', 'MembershipController@destroy')->name('memberships.destroy');

// Groups
Route::get('groups/user', 'GroupController@user')->name('groups.user');
Route::resource('groups', 'GroupController')->only([
    'edit', 'update'
]);

// Uploads
Route::any('/tus/{any?}', function () {
    return app('tus-server')->serve()->send();
})->where('any', '.*');

// Flag images
Route::get('/pragmarx/countries/flag/file/{cca3}.svg', '\PragmaRX\CountriesLaravel\Package\Http\Controllers\Flag@file')
    ->name('countries.flag.file');

// Search
Route::get('search', 'SearchController@search')->name('search');

// Countries
Route::get('browse', 'CountryController@index')->name('countries.index');
Route::get('{country}', 'CountryController@show')->name('countries.show');

// Regions
Route::get('{country}/{region}', 'RegionController@show')->name('regions.show');

// Groups
Route::get('{country}/{region}/{group}', 'GroupController@show')->name('groups.show');
