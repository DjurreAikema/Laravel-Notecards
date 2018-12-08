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
Auth::routes();

Route::get('/', 'CardController@index')->name('index'); //Send user to dashboard
Route::get('/home', 'CardController@index')->name('dashboard'); //Send user to dashboard

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout'); //Log user out

Route::group(['prefix' => 'cards'], function () {
    Route::get('/create', 'CardController@create')->name('create.card'); //Create a new card page
    Route::post('/store', 'CardController@store')->name('store.card'); //Save the new card

    Route::get('/trash', 'CardController@trash')->name('trash.card'); //See softdeleted cards
    Route::get('/remove/{card}', 'CardController@softdelete')->name('remove.card'); //Softdelete card
    Route::get('/delete/{card}', 'CardController@destroy')->name('delete.card'); //Delete card from db

    Route::get('/edit/{card}', 'CardController@edit')->name('edit.card'); //Edit selected card page
    Route::patch('/update/{card}', 'CardController@update')->name('update.card'); //Save card edits

    Route::get('/finished', 'CardController@finished')->name('finished.card'); //See finished cards
    Route::get('/finish/{card}', 'CardController@finish')->name('finish.card'); //Add card to finished
});
