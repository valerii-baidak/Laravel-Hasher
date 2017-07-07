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

Route::post('/algorithm/add', 'AlgorithmController@add');
Route::post('/algorithm/remove', 'AlgorithmController@remove');

Route::post('/word/add', 'WordController@add');
Route::post('/word/remove', 'WordController@remove');

Route::post('/save', 'HashController@save');







