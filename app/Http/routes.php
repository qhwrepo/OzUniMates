<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','WelcomeController@index');
Route::get('en','WelcomeController@index');
Route::get('cn','WelcomeController@cnindex');

Route::get('en/index','MainController@index');

Route::get('en/users/{id}','UserController@show');
Route::get('en/user/create','UserController@create');
Route::post('en/user/store','UserController@store');

Route::get('en/regisnlogin','RegisController@index');
Route::get('cn/regisnlogin','RegisController@cnindex');
Route::get('en/success-regis','RegisController@success');


