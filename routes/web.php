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

/////////////////////////////////////////////// Admin /////////////////////////////////////////////////

Route::get('login','adminController@login');// show login page
Route::get('signUp','adminController@signUp');// show sign up page
Route::get('adminHome','adminController@adminHome');// show admin home
Route::post('saveAdmin','adminController@saveAdmin');// save admin data after sign up
Route::post('showAdmin','adminController@showAdmin');// admin  Page
Route::get('personalHome/{adminId}','adminController@personalHome');// edit admin
Route::put('updateAdmin/{adminId}','adminController@updateAdmin');// save admin data after edit
Route::get('logout','adminController@logout');// logout admin

/////////////////////////////////////////////// File /////////////////////////////////////////////////

Route::post('saveFile','fileController@saveFile');// save file
Route::get('deleteFile/{fileId}','fileController@deleteFile');// delete File

/////////////////////////////////////////////// Notification /////////////////////////////////////////

Route::get('api/{iemi?}/{device_token?}','guzzleController@getData');// store devie_token 
Route::get('notification/{fileId}','guzzleController@sendNotification');// Send Notification 
