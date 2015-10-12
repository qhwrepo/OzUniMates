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
Route::get('cn','WelcomeController@show');

Route::get('en/index','MainController@index');

Route::get('en/newstudent','StudentController@create');

Route::get('en/counselors/{id}','CounselorController@show');
Route::get('en/newcounselor','CounselorController@create');
Route::post('en/counselor/store','CounselorController@store');


