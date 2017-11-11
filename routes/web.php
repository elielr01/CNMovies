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

Route::get('/', 'HomeController@index');


Route::get('/signup', 'UserController@showSignUpForm');
Route::post('/signup', 'UserController@signUp')->name('signup');



//Login
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
//----------------------------------------------------------------------------------------------------------------------

//Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//----------------------------------------------------------------------------------------------------------------------



//User routes
Route::get('/user', 'UserController@index');

Route::get('/userInfo', 'UserController@showUserInfo');
Route::get('/modify-user-info', 'UserController@userInfoForm');
Route::post('/modify-user-info', 'UserController@modifyUserInfo')->name('modifyUserInfo');
Route::get('/change-password', 'UserController@changePasswordForm');
Route::post('/change-password', 'UserController@changePassword')->name('changePassword');


//Admin routes
Route::get('/admin/home', 'AdminController@index');

//Customer routes
Route::get('/customer/home', 'CustomerController@index');
