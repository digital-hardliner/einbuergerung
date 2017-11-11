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

Route::get('/', 'IndexController@index');

Route::get('/einbuergerungstest','IndexController@index');

Route::get('/einbuergererungstest-pruefen','IndexController@evaluate_test');

Route::get('/einbuergerungstest2017','IndexController@start_test');

Route::get('/fragenkatalog','IndexController@catalogue');

Route::get('/informationen', 'IndexController@informations');

Route::get('/populate_general', 'IndexController@populate_general');

Route::get('/impressum','IndexController@impressum');

Route::get('/write-to-user', 'IndexController@write_to_user');