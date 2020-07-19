<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::livewire('/', 'slash')->middleware('throttle:30,1')->name('home');
Route::get('/', 'UrlsController@index')->middleware('throttle:30,1')->name('home');

Route::get('/{url}', 'UrlsController@shortenLink');