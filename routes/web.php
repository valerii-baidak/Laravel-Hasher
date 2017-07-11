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

Route::get('/', 'NavigationController@index');
Route::post('/save', 'HashController@save');

Route::group (['prefix' => 'algorithm'], function(){
	Route::post('add', 'AlgorithmController@add');
	Route::post('remove', 'AlgorithmController@remove');
});

Route::group (['prefix' => 'word'], function(){
	Route::post('add', 'WordController@add');
	Route::post('remove', 'WordController@remove');
});









