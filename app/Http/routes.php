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

Route::get('/','WelcomeController@cnindex');
Route::get('cn','WelcomeController@cnindex');
Route::get('en','WelcomeController@enindex');

Route::get('/magic','MagicController@index');

Route::get('/index','MainController@cnindex');
Route::get('cn/index','MainController@cnindex');
Route::get('en/index','MainController@enindex');

Route::post('en/user/login','LoginController@index');

Route::get('student/new','StudentController@create');
Route::post('student/store','StudentController@store');

Route::get('consultant/new','ConsultantController@create');
Route::post('consultant/store','ConsultantController@store');



