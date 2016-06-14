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
Route::get('/', 'WelcomeController@index');
Route::get('admin', 							'AdminController@index');
Route::get('admin/iptable', 					'IptableController@index');
Route::post('admin/iptable/addAddress', 		'IptableController@addAddress');
Route::post('admin/iptable/updateAddress', 		'IptableController@updateAddress');
Route::post('admin/iptable/deleteAddress', 		'IptableController@deleteAddress');
Route::get('admin/test', 						'TestController@index');
Route::get('admin/test/history', 				'TestController@history');
Route::post('admin/test/import', 				'TestController@import');
Route::get('admin/test/{test_id}', 				'TestController@look_test');
Route::get('admin/test/upload', 				'TestController@upload');
Route::post('admin/test/remove', 				'TestController@remove');
Route::get('admin/student', 					'AdminStudentController@index');
Route::post('admin/student/import', 			'AdminStudentController@import');
Route::post('admin/student/update', 			'AdminStudentController@update');
Route::post('admin/student/remove', 			'AdminStudentController@remove');
Route::get('admin/administrators', 				'AdministratorsController@index');  
Route::post('admin/administrators/add', 		'AdministratorsController@add');
Route::post('admin/administrators/edit', 		'AdministratorsController@edit');
Route::post('admin/administrators/delete', 		'AdministratorsController@delete');

Route::get('student',							'StudentController@index');
Route::get('student/history',					'StudentHistoryController@index' );
Route::get('student/testing',					'TestingController@index');
Route::get('student/mark',						'MarkController@index');
Route::get('student/testing/{testlist_id}',		'TestingController@test');
Route::get('student/history/{history_test_id}',	'StudentHistoryController@test');

Route::get('trening', 'TreningController@index');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
