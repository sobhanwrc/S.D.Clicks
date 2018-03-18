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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', "AdminController@index");

Route::post('/login-submit', 'AdminController@login');
Route::get('redirect/google','AdminController@google_login');
Route::post('/fb-login', 'AdminController@fb_login')

Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin/dashboard', 'DashboardController@index');
	Route::get('/admin/profile', 'DashboardController@profile');
	Route::post('/admin/profile_submit', 'DashboardController@profile_submit');
	Route::get('/logout', 'DashboardController@logout');
});
