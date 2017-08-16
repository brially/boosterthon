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

Route::get('/', 'FundraiserController@index')->name('home');

Route::get('/guest-review/create', 'ReviewController@create')->name('guest-review');
Route::post('/guest-review', 'ReviewController@store')->name('guest-review-post');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/fundraiser', 'FundraiserController');
    Route::resource('/review', 'ReviewController');
});


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
