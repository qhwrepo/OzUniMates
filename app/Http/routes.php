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
Route::get('/home','WelcomeController@cnindex');
Route::get('cn','WelcomeController@cnindex');
Route::get('en','WelcomeController@enindex');

Route::get('/magic','MagicController@index');
Route::get('/canvas','MagicController@canvas');


Route::get('student/register','Auth\AuthController@getStudentRegister');
Route::get('consultant/register','Auth\AuthController@getConsultantRegister');
Route::get('en/student/register','Auth\AuthController@getStudentRegisterEn');
Route::get('en/consultant/register','Auth\AuthController@getConsultantRegisterEn');

Route::post('student/register','Auth\AuthController@postStudentRegister');
Route::post('consultant/register','Auth\AuthController@postConsultantRegister');
Route::post('en/student/register','Auth\AuthController@postStudentRegisterEn');
Route::post('en/consultant/register','Auth\AuthController@postConsultantRegisterEn');


Route::post('login','Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');


Route::get('student/regis-success','StudentController@newbee');
Route::get('en/student/regis-success','StudentController@newbeeEn');
Route::get('student/home','StudentController@index');

Route::get('consultant/regis-success','ConsultantController@newbee');
Route::get('en/consultant/regis-success','ConsultantController@newbeeEn');
Route::get('consultant/home','ConsultantController@index');

// widgets, not displayed to users
Route::get('widgets/unimate','WidgetController@unimate');


