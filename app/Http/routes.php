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

Route::get('student/register','Auth\AuthController@getStudentRegister');
Route::get('consultant/register','Auth\AuthController@getConsultantRegister');

Route::post('student/register','Auth\AuthController@postStudentRegister');
Route::post('consultant/register','Auth\AuthController@postConsultantRegister');

Route::post('consultant/description/update','ConsultantController@descriptionUpdate');
Route::post('student/description/update','StudentController@descriptionUpdate');
Route::post('consultant/notification/update','ConsultantController@notificationUpdate');
Route::post('student/notification/update','StudentController@notificationUpdate');
Route::post('consultant/avatar/upload','ConsultantController@avatarUpload');
Route::post('student/avatar/upload','StudentController@avatarUpload');

Route::post('login','Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('student/home','StudentController@home');

Route::get('consultant/home','ConsultantController@home');


// =======================================
// Dashboard
// =======================================
Route::get('student/dashboard/overall','StudentController@dashboardOverall');
Route::get('student/dashboard/avatar','StudentController@dashboardAvatar');
Route::get('student/dashboard/case','StudentController@dashboardCase');

Route::get('consultant/dashboard/overall','ConsultantController@dashboardOverall');
Route::get('consultant/dashboard/avatar','ConsultantController@dashboardAvatar');
Route::get('consultant/dashboard/case','ConsultantController@dashboardCase');

// =======================================
// Email Activation
// =======================================
Route::get('student/activation','StudentController@studentActivation');
Route::get('student/{studid}/activate','StudentController@activate');

Route::get('consultant/activation','ConsultantController@consultantActivation');
Route::get('consultant/{consid}/activate','ConsultantController@activate');


// =======================================
// Messenger
// =======================================
Route::get('student/messages','MessageController@stuIndex');
Route::post('student/messages','MessageController@stuNew');
Route::post('student/messages/new','MessageController@newMessage');

Route::get('consultant/messages','MessageController@conIndex');
Route::post('consultant/messages','MessageController@conNew');
Route::post('consultant/messages/new','MessageController@newMessage');

// =======================================
// English version
// =======================================
Route::group(array('prefix' => 'en'), function() {

	Route::get('/','WelcomeController@enindex');
	Route::get('student/register','Auth\AuthController@getStudentRegisterEn');
    Route::get('consultant/register','Auth\AuthController@getConsultantRegisterEn');
    Route::post('student/register','Auth\AuthController@postStudentRegisterEn');
	Route::post('consultant/register','Auth\AuthController@postConsultantRegisterEn');
	Route::get('student/regis-success','StudentController@newbeeEn');
	Route::get('consultant/regis-success','ConsultantController@newbeeEn');
	Route::get('student/home','StudentController@homeEn');
	Route::get('consultant/home','ConsultantController@homeEn');
});


// =======================================
// API Routes
// =======================================
Route::group(array('prefix' => 'api'), function() {

	Route::resource('students','StudentController',
		array('only' => array('index')));
	Route::resource('consultants','ConsultantController',
		array('only' => array('index')));

	Route::get('student/{studid}/universities','StudentController@universities');
	Route::get('student/{studid}/majors','StudentController@majors');
	Route::get('student/{stuid}/username','StudentController@username');
	Route::get('student/{stuid}/avatar_small','StudentController@avatar_small');

	Route::get('consultant/{conid}/tags','ConsultantController@tags');
	Route::get('consultant/{conid}/username','ConsultantController@username');
	Route::get('consultant/{conid}/avatar_small','ConsultantController@avatar_small');

	Route::get('thread/{threadid}/messages','MessageController@getMessages');
});

// ================================
// my dear kitten
// ================================
Route::get('/magic',function(){
	return view('magic.maomao');
});
Route::get('/canvas',function(){
	return view('magic.canvas');
});
