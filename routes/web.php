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

Route::get('/', 'FundraiserController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/fundraiser', 'FundraiserController');
    Route::resource('/review', 'ReviewController');
});



Route::get('/home', 'HomeController@index')->name('home');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
