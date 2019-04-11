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

Route::get('/', 'UserController@index')->name('index');
Route::get('/complain', 'ComplaintController@complain')->name('complain');
Route::post('/save_complain', 'ComplaintController@saveComplaint')->name('save_complain');




Route::post('/login', 'UserController@login')->name('signin');


Route::get('/add_user', 'UserController@addUser')->name('add_user');
Route::post('/save_user', 'UserController@saveUser')->name('save_user');
Route::get('/view_users', 'UserController@viewUsers')->name('view_users');
Route::get('/edit_user/{id}', 'UserController@editUser')->name('edit_user');
Route::post('/update_user', 'UserController@updateUser')->name('update_user');
Route::get('/delete_user/{id}', 'UserController@deleteUser')->name('delete_user');




Route::get('/add_location', 'LocationController@addLocation')->name('add_location');
Route::post('/save_location', 'LocationController@saveLocation')->name('save_location');
Route::get('/view_locations', 'LocationController@viewLocations')->name('view_locations');
Route::get('/edit_location/{id}', 'LocationController@editLocation')->name('edit_location');
Route::post('/update_location', 'LocationController@updateLocation')->name('update_location');
Route::get('/delete_location/{id}', 'LocationController@deleteLocation')->name('delete_location');


Route::get('/add_resident', 'ResidentController@addResident')->name('add_resident');
Route::post('/save_resident', 'ResidentController@saveResident')->name('save_resident');
Route::get('/view_residents', 'ResidentController@viewResidents')->name('view_residents');
Route::get('/edit_resident/{id}', 'ResidentController@editResident')->name('edit_resident');
Route::post('/update_resident', 'ResidentController@updateResident')->name('update_resident');
Route::get('/delete_resident/{id}', 'ResidentController@deleteResident')->name('delete_resident');


Route::get('/add_notification', 'NotificationController@addNotification')->name('add_notification');
Route::post('/save_notification', 'NotificationController@saveNotification')->name('save_notification');
Route::get('/view_notifications', 'NotificationController@viewNotifications')->name('view_notifications');

Route::get('/view_complaints', 'AdminComplainController@viewComplaints')->name('view_complaints');
Route::get('/view_solved_complaints', 'AdminComplainController@viewSolvedComplaints')->name('view_solved_complaints');
Route::get('/edit_complain/{id}', 'AdminComplainController@editComplaint')->name('edit_complain');
Route::post('/update_complain', 'AdminComplainController@updateComplaint')->name('update_complain');

Route::get('/report', 'ReportController@viewReport')->name('report');



Route::get('/change_password', 'UserController@changePassword')->name('change_password');
Route::post('/save_changed_password', 'UserController@savePassword')->name('save_changed_password');
Route::get('/logout', 'UserController@logout')->name('logout');
