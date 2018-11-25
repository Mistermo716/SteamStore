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

Route::get('', 'HomeController@index')->name('home');
Route::any('search', 'HomeController@search')->name('search');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', 'AdminController@index');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('cart', 'CartController@index')->name('cart');
Route::get('store', 'HomeController@store')->name('store');

Route::get('games.json', 'GameListingController@list');
Route::get('game/{game}', 'GameListingController@view')->name('game.view');
