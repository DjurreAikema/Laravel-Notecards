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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'CardController@index')->name('dashboard');

Route::group(['prefix' => 'cards'], function () {
    Route::get('/create', 'CardController@create')->name('create.card');
    Route::post('/store', 'CardController@store')->name('store.card');
});
