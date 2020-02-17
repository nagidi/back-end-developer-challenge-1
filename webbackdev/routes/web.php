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

Route::get('/','TvshowController@index')->name('tvshow-index');
Route::get('tvshow','TvshowController@index')->name('tvshow-index');
Route::post('formaddshow','TvshowController@create')->name('tvshow-create');
Route::post('tvshow-edit','TvshowController@showedit')->name('tvshow-edit');
Route::post('tvshow-delete','TvshowController@deleteItem')->name('tvshow-delete');