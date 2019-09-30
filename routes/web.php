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

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource('users', 'UserController')->only([
    'create', 'store'
]);

Route::middleware(['auth'])->group(function () {
    Route::get('posts/user', 'PostController@user')->name('posts.user');
    Route::resource('posts', 'PostController')->except([
        'index'
    ]);

    Route::get('posts/{post}/reply', 'PostController@replyCreate')->name('posts.reply.create');
    Route::post('posts/{post}/reply', 'PostController@replyStore')->name('posts.reply.store');

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::resource('users', 'UserController')->except([
        'index', 'create', 'store'
    ]);

    Route::post('groups/{group}/join', 'MembershipController@store')->name('memberships.store');
    Route::get('groups/{group}/settings', 'MembershipController@edit')->name('memberships.edit');
    Route::patch('groups/{group}/settings', 'MembershipController@update')->name('memberships.update');
    Route::delete('groups/{group}/leave', 'MembershipController@destroy')->name('memberships.destroy');

    Route::get('groups/user', 'GroupController@user')->name('groups.user');
    Route::resource('groups', 'GroupController')->only([
        'edit', 'update'
    ]);

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::any('/tus/{any?}', function () {
    return app('tus-server')->serve()->send();
})->where('any', '.*');

Route::get('/pragmarx/countries/flag/file/{cca3}.svg', '\PragmaRX\CountriesLaravel\Package\Http\Controllers\Flag@file')
    ->name('countries.flag.file');

Route::group(['prefix' => 'install', 'middleware' => ['install']], function () {
    Route::get('/', [
        'as' => 'install.start',
        'uses' => 'InstallController@start'
    ]);

    Route::get('requirements', [
        'as' => 'install.requirements',
        'uses' => 'InstallController@requirements'
    ]);

    Route::get('permissions', [
        'as' => 'install.permissions',
        'uses' => 'InstallController@permissions'
    ]);

    Route::get('environment', [
        'as' => 'install.environment.create',
        'uses' => 'InstallController@environmentCreate'
    ]);

    Route::post('environment', [
        'as' => 'install.environment.store',
        'uses' => 'InstallController@environmentStore'
    ]);
});

Route::get('search', 'SearchController@search')->name('search');

Route::get('browse', 'CountryController@index')->name('countries.index');

Route::get('{country}', 'CountryController@show')->name('countries.show');
Route::get('{country}/{region}', 'RegionController@show')->name('regions.show');
Route::get('{country}/{region}/{group}', 'GroupController@show')->name('groups.show');
