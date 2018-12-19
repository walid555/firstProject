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

Route::get('admin','adminController@index');// show login page
Route::get('adminHome','adminController@adminHome');// show dashboard
Route::post('saveAdmin','adminController@saveAdmin');// login admin
Route::post('showAdmin','adminController@showAdmin');// admin Page
Route::get('personalHome/{adminId}','adminController@personalHome');// edit admin
Route::put('updateAdmin/{adminId}','adminController@updateAdmin');// edit admin
Route::get('logout','adminController@logout');// logout admin

/////////////////////////////////////////////// File /////////////////////////////////////////////////

Route::post('saveFile','fileController@saveFile');// save file
Route::get('deleteFile/{fileId}','fileController@deleteFile');// delete File