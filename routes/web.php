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


Route::group(['middleware'=>'guest'],function () {
    Route::get('/', 'AuthController@index')->name('index');
    Route::get('/complain', 'ComplaintController@complain')->name('complain');
    Route::post('/save_complain', 'ComplaintController@saveComplaint')->name('save_complain');
    Route::post('/login', 'AuthController@login')->name('signin');
});

Route::group(['middleware'=>'auth'],function () {
    Route::get('/change_password', 'Admin\UserController@changePassword')->name('change_password');
    Route::post('/save_changed_password', 'Admin\UserController@savePassword')->name('save_changed_password');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::post('/initiate', "Api\\Payments\\PaynowController@initExpress")->name('initiate');
    Route::post('/poll', "Api\\Payments\\PaynowController@pollTransaction")->name('poll');
});


Route::group(['namespace' => 'Admin','middleware'=>'auth'],function () {

    Route::get('/add_admin', 'AdminController@addAdmin')->name('add_admin');
    Route::post('/save_admin', 'AdminController@saveAdmin')->name('save_admin');
    Route::get('/edit_admin/{id}', 'AdminController@editAdmin')->name('edit_admin');
    Route::post('/update_admin', 'AdminController@updateAdmin')->name('update_admin');
    Route::get('/view_admins', 'AdminController@viewAdmins')->name('view_admins');
    Route::get('/delete_admin/{id}', 'AdminController@deleteAdmin')->name('delete_admin');



    Route::get('/add_city', 'CityController@addCity')->name('add_city');
    Route::post('/save_city', 'CityController@saveCity')->name('save_city');
    Route::get('/view_cities', 'CityController@viewCities')->name('view_cities');
    Route::get('/edit_city/{id}', 'CityController@editCity')->name('edit_city');
    Route::post('/update_city', 'CityController@updateCity')->name('update_city');
    Route::get('/delete_city/{id}', 'CityController@deleteCity')->name('delete_city');



    Route::get('/add_council', 'CouncilController@addCouncil')->name('add_council');
    Route::post('/save_council', 'CouncilController@saveCouncil')->name('save_council');
    Route::get('/edit_council/{id}', 'CouncilController@editCouncil')->name('edit_council');
    Route::post('/update_council', 'CouncilController@updateCouncil')->name('update_council');
    Route::get('/view_councils', 'CouncilController@viewCouncils')->name('view_councils');
    Route::get('/delete_council/{id}', 'CouncilController@deleteCouncil')->name('delete_council');



    Route::get('/add_user', 'CouncilUserController@addUser')->name('add_user');
    Route::post('/save_user', 'CouncilUserController@saveUser')->name('save_user');
    Route::get('/view_users', 'CouncilUserController@viewUsers')->name('view_users');
    Route::get('/edit_user/{id}', 'CouncilUserController@editUser')->name('edit_user');
    Route::post('/update_user', 'CouncilUserController@updateUser')->name('update_user');
    Route::get('/delete_user/{id}', 'CouncilUserController@deleteUser')->name('delete_user');
});

Route::group(['namespace' => 'Council','middleware'=>'auth'],function () {
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

    Route::get('/view_complaints', 'ComplaintsController@viewComplaints')->name('view_complaints');
    Route::get('/view_solved_complaints', 'ComplaintsController@viewSolvedComplaints')->name('view_solved_complaints');
    Route::get('/edit_complain/{id}', 'ComplaintsController@updateComplaint')->name('edit_complain');

    Route::get('/report', 'ReportController@viewReport')->name('report');


});

Route::group(['namespace' => 'Client','middleware'=>'auth'],function () {
    Route::get('/add_payment', 'PurchaseController@addPurchase')->name('add_payment');
    Route::get('/view_payments', 'PurchaseController@viewPurchases')->name('view_payments');
});




















